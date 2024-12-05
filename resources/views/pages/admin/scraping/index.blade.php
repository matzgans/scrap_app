<x-admin-layout>
    <div class="container-fluid">
        <div class="card mt-4">
            <div class="card-header p-3 pb-0">
                <div class="row">
                    <div class="col-6 d-flex align-items-center">
                        <h6 class="mb-0">Data Scraping</h6>
                    </div>
                    <div class="col-6 text-end">
                        <a class="btn bg-gradient-dark mb-0" href="{{ route('admin.scraping.create') }}"><i
                                class="material-symbols-rounded text-sm">add</i>&nbsp;&nbsp; Tambah Data Scraping</a>
                    </div>
                </div>

                <div class="col-12">
                    <div class="card my-4">
                        <div class="card-body px-0 pb-2">
                            <div class="table-responsive p-0">
                                <table class="align-items-center mb-0 table">
                                    <thead>
                                        <tr>
                                            <th
                                                class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                                Author</th>
                                            <th
                                                class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                                                Function</th>
                                            <th
                                                class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 text-center">
                                                Status</th>
                                            <th
                                                class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 text-center">
                                                Employed</th>
                                            <th class="text-secondary opacity-7"></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>
                                                <div class="d-flex px-2 py-1">
                                                    <div>
                                                        <img class="avatar avatar-sm border-radius-lg me-3"
                                                            src="../assets/img/team-2.jpg" alt="user1">
                                                    </div>
                                                    <div class="d-flex flex-column justify-content-center">
                                                        <h6 class="mb-0 text-sm">John Michael</h6>
                                                        <p class="text-secondary mb-0 text-xs">john@creative-tim.com</p>
                                                    </div>
                                                </div>
                                            </td>
                                            <td>
                                                <p class="font-weight-bold mb-0 text-xs">Manager</p>
                                                <p class="text-secondary mb-0 text-xs">Organization</p>
                                            </td>
                                            <td class="text-center align-middle text-sm">
                                                <span class="badge badge-sm bg-gradient-success">Online</span>
                                            </td>
                                            <td class="text-center align-middle">
                                                <span class="text-secondary font-weight-bold text-xs">23/04/18</span>
                                            </td>
                                            <td class="align-middle">
                                                <a class="text-secondary font-weight-bold text-xs" data-toggle="tooltip"
                                                    data-original-title="Edit user" href="javascript:;">
                                                    Edit
                                                </a>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <div class="d-flex px-2 py-1">
                                                    <div>
                                                        <img class="avatar avatar-sm border-radius-lg me-3"
                                                            src="../assets/img/team-3.jpg" alt="user2">
                                                    </div>
                                                    <div class="d-flex flex-column justify-content-center">
                                                        <h6 class="mb-0 text-sm">Alexa Liras</h6>
                                                        <p class="text-secondary mb-0 text-xs">alexa@creative-tim.com
                                                        </p>
                                                    </div>
                                                </div>
                                            </td>
                                            <td>
                                                <p class="font-weight-bold mb-0 text-xs">Programator</p>
                                                <p class="text-secondary mb-0 text-xs">Developer</p>
                                            </td>
                                            <td class="text-center align-middle text-sm">
                                                <span class="badge badge-sm bg-gradient-secondary">Offline</span>
                                            </td>
                                            <td class="text-center align-middle">
                                                <span class="text-secondary font-weight-bold text-xs">11/01/19</span>
                                            </td>
                                            <td class="align-middle">
                                                <a class="text-secondary font-weight-bold text-xs" data-toggle="tooltip"
                                                    data-original-title="Edit user" href="javascript:;">
                                                    Edit
                                                </a>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <div class="d-flex px-2 py-1">
                                                    <div>
                                                        <img class="avatar avatar-sm border-radius-lg me-3"
                                                            src="../assets/img/team-4.jpg" alt="user3">
                                                    </div>
                                                    <div class="d-flex flex-column justify-content-center">
                                                        <h6 class="mb-0 text-sm">Laurent Perrier</h6>
                                                        <p class="text-secondary mb-0 text-xs">laurent@creative-tim.com
                                                        </p>
                                                    </div>
                                                </div>
                                            </td>
                                            <td>
                                                <p class="font-weight-bold mb-0 text-xs">Executive</p>
                                                <p class="text-secondary mb-0 text-xs">Projects</p>
                                            </td>
                                            <td class="text-center align-middle text-sm">
                                                <span class="badge badge-sm bg-gradient-success">Online</span>
                                            </td>
                                            <td class="text-center align-middle">
                                                <span class="text-secondary font-weight-bold text-xs">19/09/17</span>
                                            </td>
                                            <td class="align-middle">
                                                <a class="text-secondary font-weight-bold text-xs" data-toggle="tooltip"
                                                    data-original-title="Edit user" href="javascript:;">
                                                    Edit
                                                </a>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <div class="d-flex px-2 py-1">
                                                    <div>
                                                        <img class="avatar avatar-sm border-radius-lg me-3"
                                                            src="../assets/img/team-3.jpg" alt="user4">
                                                    </div>
                                                    <div class="d-flex flex-column justify-content-center">
                                                        <h6 class="mb-0 text-sm">Michael Levi</h6>
                                                        <p class="text-secondary mb-0 text-xs">michael@creative-tim.com
                                                        </p>
                                                    </div>
                                                </div>
                                            </td>
                                            <td>
                                                <p class="font-weight-bold mb-0 text-xs">Programator</p>
                                                <p class="text-secondary mb-0 text-xs">Developer</p>
                                            </td>
                                            <td class="text-center align-middle text-sm">
                                                <span class="badge badge-sm bg-gradient-success">Online</span>
                                            </td>
                                            <td class="text-center align-middle">
                                                <span class="text-secondary font-weight-bold text-xs">24/12/08</span>
                                            </td>
                                            <td class="align-middle">
                                                <a class="text-secondary font-weight-bold text-xs" data-toggle="tooltip"
                                                    data-original-title="Edit user" href="javascript:;">
                                                    Edit
                                                </a>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <div class="d-flex px-2 py-1">
                                                    <div>
                                                        <img class="avatar avatar-sm border-radius-lg me-3"
                                                            src="../assets/img/team-2.jpg" alt="user5">
                                                    </div>
                                                    <div class="d-flex flex-column justify-content-center">
                                                        <h6 class="mb-0 text-sm">Richard Gran</h6>
                                                        <p class="text-secondary mb-0 text-xs">richard@creative-tim.com
                                                        </p>
                                                    </div>
                                                </div>
                                            </td>
                                            <td>
                                                <p class="font-weight-bold mb-0 text-xs">Manager</p>
                                                <p class="text-secondary mb-0 text-xs">Executive</p>
                                            </td>
                                            <td class="text-center align-middle text-sm">
                                                <span class="badge badge-sm bg-gradient-secondary">Offline</span>
                                            </td>
                                            <td class="text-center align-middle">
                                                <span class="text-secondary font-weight-bold text-xs">04/10/21</span>
                                            </td>
                                            <td class="align-middle">
                                                <a class="text-secondary font-weight-bold text-xs"
                                                    data-toggle="tooltip" data-original-title="Edit user"
                                                    href="javascript:;">
                                                    Edit
                                                </a>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <div class="d-flex px-2 py-1">
                                                    <div>
                                                        <img class="avatar avatar-sm border-radius-lg me-3"
                                                            src="../assets/img/team-4.jpg" alt="user6">
                                                    </div>
                                                    <div class="d-flex flex-column justify-content-center">
                                                        <h6 class="mb-0 text-sm">Miriam Eric</h6>
                                                        <p class="text-secondary mb-0 text-xs">miriam@creative-tim.com
                                                        </p>
                                                    </div>
                                                </div>
                                            </td>
                                            <td>
                                                <p class="font-weight-bold mb-0 text-xs">Programator</p>
                                                <p class="text-secondary mb-0 text-xs">Developer</p>
                                            </td>
                                            <td class="text-center align-middle text-sm">
                                                <span class="badge badge-sm bg-gradient-secondary">Offline</span>
                                            </td>
                                            <td class="text-center align-middle">
                                                <span class="text-secondary font-weight-bold text-xs">14/09/20</span>
                                            </td>
                                            <td class="align-middle">
                                                <a class="text-secondary font-weight-bold text-xs"
                                                    data-toggle="tooltip" data-original-title="Edit user"
                                                    href="javascript:;">
                                                    Edit
                                                </a>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
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
</x-admin-layout>
