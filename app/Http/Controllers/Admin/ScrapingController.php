<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Scraping;
use GuzzleHttp\Client;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class ScrapingController extends Controller
{
    public function index()
    {
        $scraping_datas =  Scraping::all();
        return view('pages.admin.scraping.index', compact('scraping_datas'));
    }
    public function create()
    {
        return view('pages.admin.scraping.create');
    }
    public function store(Request $request)
    {
        $request->validate([
            'links' => 'required|array|min:1',
            'links.*' => 'required|url',
            'word' => 'required|string|min:1',
        ]);

        $results = [];
        $searchWord = $request->word;

        if (empty($searchWord)) {
            throw new \Exception('Word to search cannot be empty');
        }

        // Fungsi untuk membersihkan teks dari karakter tersembunyi dan whitespace berlebih
        function cleanText($text)
        {
            return trim(preg_replace('/\s+/', ' ', $text));
        }

        // Fungsi untuk mengambil kata terkait dari elemen spesifik
        function extractRelatedWordsFromElements($dom, $searchWord)
        {
            $elementsToCheck = ['h1', 'h2', 'h3', '.title'];
            $relatedWords = [];

            foreach ($elementsToCheck as $selector) {
                if (strpos($selector, '.') === 0) {
                    // Cari elemen berdasarkan class
                    $className = substr($selector, 1);
                    $xpath = new \DOMXPath($dom);
                    $nodes = $xpath->query("//*[contains(@class, '$className')]");
                } else {
                    // Cari elemen berdasarkan tag
                    $nodes = $dom->getElementsByTagName($selector);
                }

                foreach ($nodes as $node) {
                    $text = $node->textContent;
                    $cleanedText = cleanText($text); // Bersihkan teks

                    // Periksa apakah kata pencarian ada dalam teks
                    if (stripos($cleanedText, $searchWord) !== false) {
                        // Simpan kalimat atau teks yang mengandung kata pencarian
                        $relatedWords[] = $cleanedText;
                    }
                }
            }

            // Debug: Cek hasil yang akan dikembalikan


            // Hilangkan duplikasi dan sortir array
            $relatedWords = array_unique($relatedWords);  // Hilangkan duplikasi
            $relatedWords = array_values($relatedWords);  // Mengatur ulang indeks array

            return $relatedWords; // Kembalikan array yang terurut
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
                    // Menambahkan link terkait
                    $filteredLinks[] = $href;
                }
            }
            $filteredLinks = array_unique($filteredLinks);  // Hilangkan duplikasi
            $filteredLinks = array_values($filteredLinks);

            return $filteredLinks; // Hilangkan duplikasi
        }

        foreach ($request->links as $link) {
            try {
                // Ambil konten utama dari link
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

                // Cari kata terkait dari elemen tertentu
                $relatedWords = extractRelatedWordsFromElements($dom, $searchWord);

                // Ekstrak link yang relevan
                $relatedLinks = scrapeLinks($link, $searchWord);

                // Simpan hasil ke results
                $results[] = [
                    'link' => $link,
                    'word' => $searchWord,
                    'related_words' => $relatedWords,
                    'related_links' => $relatedLinks,
                ];
            } catch (\Exception $e) {
                $results[] = [
                    'link' => $link,
                    'word' => $searchWord,
                    'error' => $e->getMessage(),
                    'related_words' => [],
                    'related_links' => [],
                ];
            }
        }

        if (!$results) {
            return redirect()->back()->with([
                'message' => 'Scraping Tidak Berhasil Di Disimpan',
            ]);
        }

        foreach ($results as $data) {
            Scraping::create([
                'link' => $data['link'],
                'word' => $data['word'],
                'related_words' => $data['related_words'],
                'related_links' => $data['related_links'],
            ]);
        }



        // Redirect kembali ke form dengan data yang sudah diolah
        return redirect()->route('admin.scraping.index')->with([
            'message' => 'Scraping berhasil dilakukan!',
        ]);
    }
}
