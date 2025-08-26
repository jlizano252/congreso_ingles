@include('layout.sections.private-head')

@include('layout.sections.messages')

<!-- ===============================================-->
<!--    Main Content-->
<!-- ===============================================-->
<main class="main" id="top">
    <div class="container" data-layout="container">

        <div class="row flex-center min-vh-100 py-6 mt-lg-n7">
            <div class="col-sm-10 col-md-8 col-lg-6 col-xl-4 col-xxl-3"><a class="d-flex flex-center m-2" href="../../../index.html">
                    <img class="me-2" src="{{ asset('images/ivetc-brand-footer.png') }}" alt="" width="150" />
                </a>
                <div class="card">
                    <div class="card-body p-4">
                        <div class="row flex-between-center mb-2">
                            <div class="col-auto">
                                <h5>Log in</h5>
                            </div>
{{--                            <div class="col-auto fs--1 text-600"><span class="mb-0 undefined">or</span> <span><a href="../../../pages/authentication/simple/register.html">Create an account</a></span></div>--}}
                        </div>
                        <form action="{{ route('login') }}" method="post">
                            @csrf
                            <div class="mb-3">
                                <input name="email" class="form-control" type="text" placeholder="#IDE" />
                            </div>
                            <div class="mb-3">
                                <input name="password" class="form-control" type="password" placeholder="Password" />
                            </div>
{{--                            <div class="row flex-between-center">--}}
{{--                                <div class="col-auto">--}}
{{--                                    <div class="form-check mb-0">--}}
{{--                                        <input class="form-check-input" type="checkbox" id="basic-checkbox" checked="checked" />--}}
{{--                                        <label class="form-check-label mb-0" for="basic-checkbox">Remember me</label>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                                <div class="col-auto"><a class="fs--1" href="../../../pages/authentication/simple/forgot-password.html">Forgot Password?</a></div>--}}
{{--                            </div>--}}
                            <div class="mb-3">
                                <button class="btn btn-primary d-block w-100 mt-3" type="submit" name="submit">Log in</button>
                            </div>

                            @error('email') <div class="text-danger small mt-2 text-center">Authentication error...</div>  @enderror
                            @error('password') <div class="text-danger small mt-2 text-center">Authentication error...</div>  @enderror

                        </form>
{{--                        <div class="position-relative mt-4">--}}
{{--                            <hr />--}}
{{--                            <div class="divider-content-center">or log in with</div>--}}
{{--                        </div>--}}
{{--                        <div class="row g-2 mt-2">--}}
{{--                            <div class="col-sm-6"><a class="btn btn-outline-google-plus btn-sm d-block w-100" href="#"><span class="fab fa-google-plus-g me-2" data-fa-transform="grow-8"></span> google</a></div>--}}
{{--                            <div class="col-sm-6"><a class="btn btn-outline-facebook btn-sm d-block w-100" href="#"><span class="fab fa-facebook-square me-2" data-fa-transform="grow-8"></span> facebook</a></div>--}}
{{--                        </div>--}}
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>
<!-- ===============================================-->
<!--    End of Main Content-->
<!-- ===============================================-->

@include('layout.sections.private-foot')
