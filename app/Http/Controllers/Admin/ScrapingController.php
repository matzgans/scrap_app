<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use GuzzleHttp\Client;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class ScrapingController extends Controller
{
    public function index()
    {
        return view('pages.admin.scraping.index');
    }
    public function create()
    {
        return view('pages.admin.scraping.create');
    }
    public function store(Request $request)
    {
        // dd($request);
        $request->validate([
            'links' => 'required|array|min:1',
            'links.*' => 'required|url',
            'word' => 'required|string|min:1',
        ]);

        $results = [];
        $aggregatedResults = [
            'headers' => [],
            'links' => [],
            'related_links' => [],
        ];

        $searchWord = $request->word;

        if (empty($searchWord)) {
            throw new \Exception('Word to search cannot be empty');
        }

        // Fungsi untuk mengambil header (h1, h2, h3 dengan prioritas)
        function extractFirstHeader($dom)
        {
            $headerTags = ['h1', 'h2', 'h3'];
            foreach ($headerTags as $tag) {
                $elements = $dom->getElementsByTagName($tag);
                if ($elements->length > 0) {
                    return $elements->item(0)->textContent; // Ambil teks dari header pertama yang ditemukan
                }
            }
            return null; // Jika tidak ada header
        }

        // Fungsi untuk scraping link terkait
        function scrapeLinks($link, $searchWord)
        {
            $filteredLinks = [];
            $dom = new \DOMDocument();
            @$dom->loadHTML(file_get_contents($link));

            // Ekstrak semua tag <a>
            $anchorTags = $dom->getElementsByTagName('a');
            foreach ($anchorTags as $tag) {
                $href = $tag->getAttribute('href');
                if (!empty($href) && strpos(strtolower($href), strtolower($searchWord)) !== false) {
                    $filteredLinks[] = $href;
                }
            }
            return $filteredLinks;
        }

        foreach ($request->links as $link) {
            try {
                // Fetch konten utama dari link
                $ch = curl_init($link);
                curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
                curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
                $html = curl_exec($ch);
                curl_close($ch);

                if (!$html) {
                    throw new \Exception('Failed to retrieve content');
                }

                $dom = new \DOMDocument();
                @$dom->loadHTML($html);

                $body = $dom->getElementsByTagName('body')->item(0);
                $content = $body ? $body->textContent : '';

                // Cari header
                $header = extractFirstHeader($dom);

                // Ekstrak link yang relevan
                $relatedLinks = scrapeLinks($link, $searchWord);

                $relatedHeaders = [];
                // Proses related links untuk mengambil header terkait
                foreach ($relatedLinks as $relatedLink) {
                    try {
                        $relatedHtml = file_get_contents($relatedLink);
                        @$dom->loadHTML($relatedHtml);
                        $relatedHeader = extractFirstHeader($dom);

                        if ($relatedHeader) {
                            $relatedHeaders[] = $relatedHeader;
                            $aggregatedResults['headers'][] = $relatedHeader;
                        }
                        $aggregatedResults['links'][] = $relatedLink;
                    } catch (\Exception $e) {
                        // Error pada related link diabaikan
                    }
                }

                // Simpan hasil ke results
                $results[] = [
                    'link' => $link,
                    'word' => $searchWord,
                    'matches' => substr_count(strtolower($content), strtolower($searchWord)),
                    'header' => [
                        'main' => $header,
                        'related' => $relatedHeaders,
                    ],
                    'related_links' => $relatedLinks,
                ];

                // Tambahkan hasil ke agregat
                if ($header) {
                    $aggregatedResults['headers'][] = $header;
                }
                $aggregatedResults['links'][] = $link;
            } catch (\Exception $e) {
                $results[] = [
                    'link' => $link,
                    'word' => $searchWord,
                    'matches' => 0,
                    'error' => $e->getMessage(),
                    'header' => [
                        'main' => null,
                        'related' => [],
                    ],
                    'related_links' => [],
                ];
            }
        }

        // Hilangkan duplikasi dalam data agregat
        $aggregatedResults['headers'] = array_unique($aggregatedResults['headers']);
        $aggregatedResults['links'] = array_unique($aggregatedResults['links']);
        $aggregatedResults['related_links'] = array_unique($aggregatedResults['related_links']);

        // Tampilkan hasil akhir untuk debug


        // Simpan hasil yang terstruktur ke dalam session
        session()->flash('results', $results);
        session()->flash('aggregated_results', $aggregatedResults);

        // Redirect kembali ke form dengan data yang sudah diolah
        return redirect()->back()->with([
            'message' => 'Scraping berhasil dilakukan!',
        ]);
    }
}
