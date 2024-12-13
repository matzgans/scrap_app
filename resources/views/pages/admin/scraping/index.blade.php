<x-admin-layout>
    <div class="container-fluid">
        <div class="card mt-4">
            <div class="card-header p-3 pb-0">
                @if (Session::has('message'))
                    <div class="alert alert-success alert-dismissible fade show text-white" role="alert">
                        <span class="alert-icon align-middle">
                            <span class="material-symbols-rounded text-md">
                                thumb_up_off_alt
                            </span>
                        </span>
                        <span class="alert-text"><strong>Success!</strong> T{{ Session::get('message') }}</span>
                        <button class="btn-close" data-bs-dismiss="alert" type="button" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                @endif
                <div class="row">
                    <div class="col-12">
                        <div class="card my-4">
                            <div class="card-header position-relative mt-n4 z-index-2 mx-3 p-0">
                                <div class="bg-gradient-dark shadow-dark border-radius-lg pb-3 pt-4">
                                    <h6 class="text-capitalize ps-3 text-white">Data Scraping</h6>
                                </div>
                            </div>
                            <div class="card-body px-0 pb-2">
                                <div class="col-md-12 text-end">
                                    <a class="btn btn-primary mx-3" href="{{ route('admin.scraping.create') }}"><i
                                            class="material-symbols-rounded text-sm">add</i>
                                        Tambah Scraping</a>
                                </div>
                                <div class="table-responsive px-3">
                                    <table class="align-items-center mb-0 table">
                                        <thead>
                                            <tr>
                                                <th
                                                    class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                                                    Link Yang Di Cari</th>
                                                <th
                                                    class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 text-start">
                                                    Kata Yang Di Cari</th>
                                                <th
                                                    class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 text-start">
                                                    Kata Yang Berhubunngan</th>
                                                <th
                                                    class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 text-start">
                                                    Link Yang Berhubunngan</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($scraping_datas as $scraping_data)
                                                <tr>
                                                    <td>
                                                        <a
                                                            href="{{ $scraping_data->link }}">{{ $scraping_data->link }}</a>
                                                    </td>
                                                    <td class="text-center align-middle text-sm">
                                                        <span
                                                            class="badge badge-sm bg-gradient-success">{{ $scraping_data->word }}</span>
                                                    </td>
                                                    <td class="text-center align-middle">
                                                        @foreach ($scraping_data->related_words as $related_word)
                                                            <span
                                                                class="text-secondary font-weight-bold text-xs">{{ $related_word }}</span>
                                                        @endforeach
                                                    </td>
                                                    <td class="text-start align-middle">
                                                        @foreach ($scraping_data->related_links as $related_links)
                                                            <a class="text-secondary font-weight-bold text-xs"
                                                                href="{{ $related_links }}">{{ $related_links }}</a>
                                                        @endforeach
                                                    </td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="container-fluid py-2">
        <footer class="footer py-4">
            <div class="container-fluid">
                <div class="row align-items-center justify-content-lg-between">
                    <div class="col-lg-6 mb-lg-0 mb-4">
                        <div class="copyright text-muted text-lg-start text-center text-sm">
                            ©
                            <script>
                                document.write(new Date().getFullYear())
                            </script>,
                            made with <i class="fa fa-heart"></i> by
                            <a class="font-weight-bold" href="https://www.creative-tim.com" target="_blank">Creative
                                Tim</a>
                            for a better web.
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <ul class="nav nav-footer justify-content-center justify-content-lg-end">
                            <li class="nav-item">
                                <a class="nav-link text-muted" href="https://www.creative-tim.com"
                                    target="_blank">Creative Tim</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link text-muted" href="https://www.creative-tim.com/presentation"
                                    target="_blank">About Us</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link text-muted" href="https://www.creative-tim.com/blog"
                                    target="_blank">Blog</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link text-muted pe-0" href="https://www.creative-tim.com/license"
                                    target="_blank">License</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </footer>
    </div>

    @push('scripts')
    @endpush
</x-admin-layout>
