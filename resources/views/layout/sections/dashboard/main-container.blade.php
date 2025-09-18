<!-- ===============================================-->
<!--    Main Content-->
<!-- ===============================================-->
<style>
    .page-link {
        font-size: .6rem !important;
    }
</style>
<main class="main" id="top">
    <div class="container" data-layout="container">

        <nav class="navbar navbar-light navbar-glass navbar-top navbar-expand-lg">

            {{-- <button class="btn navbar-toggler-humburger-icon navbar-toggler me-1 me-sm-3" type="button" data-bs-toggle="collapse" data-bs-target="#navbarStandard" aria-controls="navbarStandard" aria-expanded="false" aria-label="Toggle Navigation"><span class="navbar-toggle-icon"><span class="toggle-line"></span></span></button>--}}
            <a class="navbar-brand me-1 me-sm-3" href="{{ route('webpage.index') }}">
                <div class="d-flex align-items-center">
                    <img class="me-2" src="{{ asset('images/ivetc-brand-loading-sm-min.png') }}" alt="" width="40" />
                    <span class="font-sans-serif mb-0">V-ETC</span>
                </div>
            </a>
            {{-- <div class="collapse navbar-collapse scrollbar" id="navbarStandard">--}}
            {{-- <ul class="navbar-nav" data-top-nav-dropdowns="data-top-nav-dropdowns">--}}
            {{-- <li class="nav-item dropdown"><a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" id="dashboards">Dashboard</a>--}}
            {{-- <div class="dropdown-menu dropdown-caret dropdown-menu-card border-0 mt-0" aria-labelledby="dashboards">--}}
            {{-- <div class="bg-white dark__bg-1000 rounded-3 py-2"><a class="dropdown-item link-600 fw-medium" href="../index.html">Default</a><a class="dropdown-item link-600 fw-medium" href="../dashboard/analytics.html">Analytics</a><a class="dropdown-item link-600 fw-medium" href="../dashboard/crm.html">CRM</a><a class="dropdown-item link-600 fw-medium" href="../dashboard/e-commerce.html">E commerce</a><a class="dropdown-item link-600 fw-medium" href="../dashboard/lms.html">LMS<span class="badge rounded-pill ms-2 badge-soft-success">New</span></a><a class="dropdown-item link-600 fw-medium" href="../dashboard/project-management.html">Management</a><a class="dropdown-item link-600 fw-medium" href="../dashboard/saas.html">SaaS</a>--}}
            {{-- </div>--}}
            {{-- </div>--}}
            {{-- </li>--}}
            {{-- </ul>--}}
            {{-- </div>--}}
            <ul class="navbar-nav navbar-nav-icons ms-auto flex-row align-items-center">

                <li class="nav-item dropdown"><a class="nav-link pe-0 ps-2" id="navbarDropdownUser" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <div class="d-flex justify-content-end align-items-center">
                            <div class="d-flex justify-content-end flex-column me-2 text-end">
                                <div class="">{{ \Illuminate\Support\Facades\Auth::user()->name .' '. \Illuminate\Support\Facades\Auth::user()->lastname}}</div>
                                <div class="fw-normal small">{{ \Illuminate\Support\Facades\Auth::user()->ide}}</div>
                            </div>
                            <div class="avatar avatar-xl">
                                <img class="rounded-circle" src="{{ asset('images/team/avatar.png') }}" alt="" />
                            </div>
                        </div>
                    </a>
                    <div class="dropdown-menu dropdown-caret dropdown-caret dropdown-menu-end py-0" aria-labelledby="navbarDropdownUser">
                        <div class="bg-white dark__bg-1000 rounded-2 py-2">
                            {{-- <a class="dropdown-item fw-bold text-warning" href="#!"><span class="fas fa-crown me-1"></span><span>Go Pro</span></a>--}}

                            {{-- <div class="dropdown-divider"></div>--}}
                            {{-- <a class="dropdown-item" href="#!">Set status</a>--}}
                            {{-- <a class="dropdown-item" href="../pages/user/profile.html">Profile &amp; account</a>--}}
                            {{-- <a class="dropdown-item" href="#!">Feedback</a>--}}

                            {{-- <div class="dropdown-divider"></div>--}}
                            {{-- <a class="dropdown-item" href="../pages/user/settings.html">Settings</a>--}}

                            <form class="dropdown-item" action="{{ route('logout') }}" method="post">
                                @csrf
                                <button class="dropdown-item" type="submit">Logout</button>
                            </form>
                        </div>
                    </div>
                </li>
            </ul>
        </nav>
        <div class="content">
            <div class="row mb-3">
                <div class="col-12 col-md-6 col-lg-3">
                    @livewire('admin.widgets.total-records-widget')
                </div>
                <div class="col-12 col-md-6 col-lg-3">
                    @livewire('admin.widgets.total-m-e-p-records-widget')
                </div>
                <div class="col-12 col-md-6 col-lg-3">
                    @livewire('admin.widgets.total-private-inst-records-widget')
                </div>
                <div class="col-12 col-md-6 col-lg-3">
                    @livewire('admin.widgets.total-certificate-records-widget')
                </div>
            </div>

            <div class="row ps-3">
                <div class="col-12">
                    <div class="row mt-3">
                        <div class="col-12 col-lg-2 p-2 rounded bg-opacity-10 bg-secondary">

                            <!-- Nav vertical -->
                            <ul class="nav nav-pills flex-column fs--1 fw-semi-bold text-uppercase" id="myTab" role="tablist">
                                <li class="nav-item mb-2">
                                    <a class="nav-link active" id="tab-participants" data-bs-toggle="tab" href="#content-participants" role="tab" aria-controls="content-participants" aria-selected="true">
                                        Participants
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" id="tab-applicants" data-bs-toggle="tab" href="#content-applicants" role="tab" aria-controls="content-applicants" aria-selected="false">
                                        Applicants
                                    </a>
                                </li>
                            </ul>

                        </div>

                        <div class="col-12 col-lg-10">
                            <div class="tab-content" id="pill-myTabContent">
                                {{-- Tab Participants --}}
                                <div class="tab-pane fade show active" id="content-participants" role="tabpanel" aria-labelledby="tab-participants">
                                    @livewire('admin.dashboard.records-table')
                                </div>

                                {{-- Tab Applicants --}}
                                <div class="tab-pane fade" id="content-applicants" role="tabpanel" aria-labelledby="tab-applicants">
                                    @livewire('admin.dashboard.applicants-table')
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <footer class="footer">
                <div class="row g-0 justify-content-between fs--1 mt-4 mb-3">
                    <div class="col-12 col-sm-auto text-center">
                        <p class="mb-0 text-500">Sponsored with ❤ by Jenhson Lizano<span class="d-none d-sm-inline-block">|</span><br class="d-sm-none" /> 2025</p>
                    </div>
                    <div class="col-12 col-sm-auto text-center">
                        <p class="mb-0 text-600">v1.0.0</p>
                    </div>
                </div>
            </footer>
        </div>
    </div>
</main>
<!-- ===============================================-->
<!--    End of Main Content-->
<!-- ===============================================-->