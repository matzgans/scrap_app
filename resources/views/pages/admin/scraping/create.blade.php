<x-admin-layout>
    <div class="container-fluid">

        <div class="card mt-4">
            <div class="card-header p-3 pb-0">
                <div class="row">
                    <div class="col-6 d-flex align-items-center">
                        <h6 class="mb-0">Tambah Data Scraping</h6>
                    </div>
                </div>
                <div class="col-12">
                    <div class="card my-4">
                        <div class="card-body pb-2">

                            <form action="{{ route('admin.scraping.store') }}" method="POST">
                                @csrf
                                <div class="row">
                                    <div class="col-md-12" id="links-container">
                                        <div class="input-group input-group-outline my-3">
                                            <label class="form-label">Masukan Link 1</label>
                                            <input class="form-control" name="links[]" type="text" required>
                                        </div>
                                    </div>
                                    <button class="btn btn-primary" id="add-link-button" type="button">Tambah
                                        Link</button>
                                    <div class="col-md-12">
                                        <div class="input-group input-group-outline my-3">
                                            <label class="form-label">Masukkan Kata</label>
                                            <input class="form-control" name="word" type="text">
                                        </div>
                                    </div>
                                </div>
                                {{-- <button class="btn btn-primary" id="add-link-button" type="button">Tambah Link</button> --}}
                                <button class="btn btn-success" type="submit">Cari</button>

                            </form>


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
    <script>
        document.getElementById('add-link-button').addEventListener('click', function() {
            // Container tempat input links berada
            const linksContainer = document.getElementById('links-container');

            // Hitung jumlah input link yang ada
            const linkCount = linksContainer.getElementsByTagName('input').length + 1;

            // Buat elemen div baru untuk input
            const newLinkDiv = document.createElement('div');
            newLinkDiv.classList.add('col-md-12');

            // Tambahkan input baru dan tombol hapus ke dalam div
            newLinkDiv.innerHTML = `
                <div class="input-group input-group-outline my-3">
                    <label class="form-label">Masukan Link ${linkCount}</label>
                    <input class="form-control" name="links[]" type="text" required>
                    <button type="button" class="btn btn-danger remove-link-button" style="margin-left: 10px;">Hapus</button>
                </div>
            `;

            // Masukkan elemen baru ke dalam container
            linksContainer.appendChild(newLinkDiv);

            // Menambahkan event listener untuk tombol hapus
            const removeButton = newLinkDiv.querySelector('.remove-link-button');
            removeButton.addEventListener('click', function() {
                linksContainer.removeChild(newLinkDiv);
            });
        });
    </script>


</x-admin-layout>
