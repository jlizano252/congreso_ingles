<!doctype html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport"
        content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{ asset('css/ivetc.css') }}">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Slabo+27px&display=swap" rel="stylesheet">
    <title>V-ETC</title>
</head>
{{--<body id="page-body" data-bs-spy="scroll" data-bs-target="#ivetc-menu" data-bs-offset="40" tabindex="0">--}}

<body id="page-body">
    <div class="pre-loader" id="preloader">
        <div class="lds-roller">
            <div></div>
            <div></div>
            <div></div>
            <div></div>
            <div></div>
            <div></div>
            <div></div>
            <div></div>
        </div>
        <img class="pre-loader-image" src="{{ asset('images/ivetc-brand-loading-sm-min.png') }}" alt="loading-brand-sm">
    </div>

    <nav id="ivetc-menu" class="ivetc-navbar navbar navbar-expand-lg navbar-dark">
        <div class="container">
            <a class="py-lg-0 navbar-brand text-decoration: none;" href="https://ivetc.centroatenea.network/">
                <img src="{{ asset('images/ETC_white.png') }}" class="d-inline-block align-text-top">
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse justify-content-lg-end" id="navbarSupportedContent">
                <ul class="navbar-nav mb-2 mb-lg-0">
                    <li class="nav-item menu-item">
                        <a class="nav-link" href="{{ route('webpage.index') }}">Home</a>
                    </li>
                    <li class="nav-item menu-item">
                        <a class="nav-link" href="documents" data-bs-toggle="modal" data-bs-target="#loadingModal">Documents</a>
                    </li>
                    <li class="nav-item menu-item">
                        <a class="nav-link active" href="#hero-section">Details</a>
                    </li>
                    <li class="nav-item menu-item mt-4 mt-lg-0">
                        <a href="{{ route('public.register.index') }}" class="btn register_btn btn-warning fw-normal px-5" style="background-color: orange">Register</a>
                    </li>
                    <li class="nav-item menu-item mt-4 mt-lg-0">
                        <a href="{{ route('public.postularse.index') }}" class="btn register_btn btn-warning fw-normal px-5" style="background-color: orange">Applicant</a>
                    </li>
                </ul>

            </div>
        </div>
    </nav>

    <section class="hero" id="hero-section">
        <div class="left-squares">
            <img src="{{ asset('images/ivetc_sq_left_00.png') }}">
        </div>
        <div class="right-squares">
            <img src="{{ asset('images/ivetc_sq_left_00.png') }}">
        </div>
        <div class="container">
            <div class="hero-content">
                <div class="row justify-content-center position-relative">
                    <h1 class="detail-title text-center text-uppercase mb-3 fw-bold text-white-50">Congress Details</h1>
                </div>
            </div>
        </div>
    </section>

    <section class="about-details" id="about-section">
        <div class="container">
            <div class="row justify-content-center align-items-start">
                <div class="col-12 col-lg-6 d-flex justify-content-center about-details-img">
                    <img class="img-fluid" src="{{ asset('images/ivetc-image-02.png') }}" alt="image">
                </div>
                <div class="col-12 col-lg-6 mt-4 mt-lg-0">
                    <h1 class="title text-uppercase"><strong>About us</strong></h1>

                    <p style="line-height: 1.8">The Costa Rican educational system currently finds itself in a fragile state given its unresolved structural problems, which date back to years prior to 2018. Since then, these problems have been aggravated by distinct forces: union strikes, teacher strikes and the pandemic. The State of Education (Program Estado de la Nación, 2021) catalogues this crisis as the worst in the recent decades, branding it an
                        educational shut down. This emergency has affected all three levels of the Costa Rican educational system: primary, secondary, and diversified.
                        <br>
                        As a result of this situation, the weaknesses and needs of the teaching population are not only evident, but are considered a crucial and strategic point in the resurrection of the Costa Rican
                        educational system.
                    </p>
                </div>

                <div class="col-12 mt-lg-2">
                    <p style="line-height: 1.8">Particularly, in what corresponds to language teaching, the Ministry of Public Education, in conjunction with the University of Costa Rica, carried out a linguistic proficiency exam with a sampling of 6,000 primary level students and 73,000 secondary level students. The results show that, despite having an improvement in comparison to the exam executed in 2019, knowledge of the English language is still lower than the expected outcomes according to the level descriptions set forth by the Common European Framework of Reference for Languages, which are implemented in MEP programs . For example, 64% of the students in their last year of public academic secondary school placed in beginning and elementary levels (A1 y A2) .</p>
                    <p style="line-height: 1.8">Due to the educational shutdown, it is fundamental to facilitate academic spaces of knowledge that merge towards creating change through the strengthening of significant and transforming best practices in the field of teaching English as a foreign language. With a holistic and innovative approach, in pursuit of generating meaningful change, the IV English Teaching Congress will address the use of technology, contextualize the educational status of the Huetar Northern Region and remedy the educational lag taking place in local institutions. </p>
                </div>
            </div>
        </div>
    </section>

    <section class="mission">
        <div class="container">
            <div class="row">
                <div class="img-container col-12 col-md-4 col-lg-3 pe-lg-4 d-flex justify-content-center align-items-center">
                    <img class="img-fluid" src="{{ asset('images/Acronimo_year.png') }}" alt="">
                </div>
                <div class="col-12 col-md-8 col-lg-9 ps-lg-5 mt-4 mt-md-0">
                    <h2 class="title text-uppercase"><strong>Mission</strong></h2>
                    <p style="line-height: 1.8">To contribute to the professional development of English teachers in the Huetar Northern Region through the improvement of educational practices based on the exchange of pertinent and effective pedagogical experiences and the use of innovative tools in the teaching and learning process of English as a foreign language.</p>
                    <h2 class="title text-uppercase mt-4 mt-lg-5"><strong>Vision</strong></h2>
                    <p style="line-height: 1.8">To constitute a space for academic reference in regard to trainings, pedagogical innovations, collaboration and feedback, which effectively contribute to the teaching and learning process of English as a foreign language for English teachers in the Huetar Northern Region.</p>
                </div>
            </div>

            <div class="row justify-content-center position-relative mt-5" style="z-index: 2">
                <div class="col-12 col-md-10 col-lg-6 col-xl-5">
                    <div class="video mb-3">
                        <video class="frame_video shadow" controls>
                            <source src="https://etai.aulavirtual.co.cr/assets/ivetc/IV-English-Teaching-Congress-2022.mp4" type="video/mp4">
                            Your browser does not support the video tag.
                        </video>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <div class="position-relative">
        <div style="height: 250px; background-color: lightgrey; bottom: 0; width: 100%; z-index: 1" class="position-absolute"></div>
    </div>

    <div class="waves-bg">
        <section class="gen-objective">
            <div class="container">
                <h1 class="title-1 fw-bold text-uppercase"><strong>General objective</strong></h1>
                <div class="row">
                    <div class="col-12 col-lg-7">
                        <p style="line-height: 1.8">To strengthen academic spaces for the enhancement of effective pedagogical practices in the teaching of English as a foreign language, through the establishment of partnerships and collaborative networks aimed at promoting the economic, socio-educational, and cultural development of the Huetar Norte Region of Costa Rica.</p>
                    </div>
                </div>
                <div class="row justify-content-center mt-5">
                    <div class="col-12 col-lg-8">
                        <h1 class="title-2 fw-bold text-uppercase text-center">Specific Objectives</h1>

                        <div class="points mt-4 mb-4 d-flex align-items-center position-relative">
                            <div style="margin-left: 7px; height: 50px; width: 50px; font-size: 2rem; left: -15px" class="position-absolute d-flex justify-content-center align-items-center point text-white rounded">
                                <strong>1</strong>
                            </div>
                            <div class="py-2 ps-5 pe-3 rounded" style="background-color: rgba(0,0,0,.05)">
                                <p class="m-0">To establish networks for collaboration and academic exchange among faculty members from the various educational institutions of the Huetar Norte Region of Costa Rica.</p>
                            </div>
                        </div>

                        <div class="points mt-4 mb-4 d-flex align-items-center position-relative">
                            <div style="margin-left: 7px; height: 50px; width: 50px; font-size: 2rem; left: -15px" class="position-absolute d-flex justify-content-center align-items-center point text-white rounded">
                                <strong>2</strong>
                            </div>
                            <div class="py-2 ps-5 pe-3 rounded" style="background-color: rgba(0,0,0,.05)">
                                <p class="m-0">To consolidate strategic alliances between educational institutions in the Huetar Norte Region of Costa Rica for the strengthening of English language teaching and learning as a foreign language.</p>
                            </div>
                        </div>

                        <div class="points mt-4 mb-4 d-flex align-items-center position-relative">
                            <div style="margin-left: 7px; height: 50px; width: 50px; font-size: 2rem; left: -15px" class="position-absolute d-flex justify-content-center align-items-center point text-white rounded">
                                <strong>3</strong>
                            </div>
                            <div class="py-2 ps-5 pe-3 rounded" style="background-color: rgba(0,0,0,.05)">
                                <p class="m-0">To provide effective pedagogical tools to English language teachers in the Huetar Norte Region of Costa Rica for the improvement of English teaching and learning processes.</p>
                            </div>
                        </div>

                        <div class="points mt-4 mb-4 d-flex align-items-center position-relative">
                            <div style="margin-left: 7px; height: 50px; width: 50px; font-size: 2rem; left: -15px" class="position-absolute d-flex justify-content-center align-items-center point text-white rounded">
                                <strong>4</strong>
                            </div>
                            <div class="py-2 ps-5 pe-3 rounded" style="background-color: rgba(0,0,0,.05)">
                                <p class="m-0">To encourage strategies that address teacher empowerment and well-being as a means of inspiration in the classroom.</p>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </section>

        <section class="networks">
            <div class="container">
                <div class="d-flex justify-content-center align-items-center">
                    <img class="img-fluid mt-3" style="max-width: 169px" src="{{ asset('images/ivetc_img_02.png') }}" alt="">
                    <div style="height: 60px; width: 2px; background-color: rgba(0,0,0,.4); margin: 0 15px"></div>
                    <div class="d-flex justify-content-start align-items-center">
                        <a class="social-icon" href="https://www.facebook.com/IVETC2022 " target="_blank">
                            <img style="max-width: 40px; opacity: .5" class="img-fluid mx-2" src="{{ asset('images/facebook.png') }}" alt="facebook">
                        </a>
                        <a class="social-icon" href="https://www.instagram.com/ivenglishteaching/ " target="_blank">
                            <img style="max-width: 40px; opacity: .5" class="img-fluid mx-2" src="{{ asset('images/instagram.png') }}" alt="instagram">
                        </a>
                        <a class="social-icon" href="https://www.youtube.com/channel/UCK2Bks7PSSS4zCsRgsnqylg/featured" target="_blank">
                            <img style="max-width: 50px; opacity: .5" class="img-fluid mx-2" src="{{ asset('images/youtube.png') }}" alt="youtube">
                        </a>
                    </div>
                </div>
            </div>
        </section>

        <!-- <section class="information">
            <div class="container">
                <h1 class="title text-center fw-bolder">MORE INFORMATION?</h1>
                {{-- <h5 class="fw-bolder text-center">Subscribe and join our group!</h5>--}}
                <div class="row justify-content-center">
                    <div class="col-12 col-md-8">
                        {{-- <p class="text-center">We will sending important information through our newsletter to keep you updated on all events and news that we will be planning this new year for you.</p>--}}
                        <p class="text-center">Feel free to contact us at our official email:
                            <i class="fw-bold">englishteachingcongress4@gmail.com</i>
                        </p>
                    </div>
                    <div class="col-12 col-md-7">
                        <div class="d-flex justify-content-center">
                            {{-- <a class="btn info_btn fw-normal px-5 mt-4 me-3" href="">Subscribe</a>--}}
                            <button class="btn reg_btn fw-normal px-5 mt-3" data-bs-toggle="modal" data-bs-target="#registerModal">Register</button>
                        </div>
                    </div>
                </div>
            </div>
        </section> -->

        <section class="footer py-3">
            <div class="d-flex justify-content-center">
                <img class="img-fluid" style="max-width: 120px;" src="{{ asset('images/ivetc-brand-footer.png') }}" alt="footer-image">
            </div>
            <p class="text-center text-white small fw-light mb-0"><strong>V CONGRESO DE LA ENSEÑANZA DEL INGLÉS</strong></p>
            <p class="text-center text-white-50 small fw-normal mb-0">REGIÓN HUETAR NORTE 2025</p>

            <div class="footer-menu text-center my-4 text-white-50">
                <a style="text-decoration: none" class="menu-item text-white small mx-2" href="">COMMITTEES</a> |
                <a style="text-decoration: none" class="menu-item text-white small mx-2" href="">PARTNERS</a> |
                <a style="text-decoration: none" class="menu-item text-white small mx-2" href="">CONTACTS</a>
            </div>

            <div class=" mb-4">
                {{-- <div class="d-flex justify-content-center align-items-center">--}}
                {{-- <img style="max-width: 20px; opacity: .5" class="img-fluid mx-1" src="{{ asset('images/facebook.png') }}" alt="facebook">--}}
                {{-- <img style="max-width: 20px; opacity: .5" class="img-fluid mx-1" src="{{ asset('images/instagram.png') }}" alt="facebook">--}}
                {{-- <img style="max-width: 30px; opacity: .5" class="img-fluid mx-1" src="{{ asset('images/youtube.png') }}" alt="facebook">--}}
                {{-- </div>--}}
            </div>
        </section>
        <div class="footer-border"></div>
    </div>

    {{-- Register --}}
    <!-- <div class="modal fade" id="registerModal" tabindex="-1" aria-labelledby="registerModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content rounded">
                <div class="modal-header modal-header-blue text-white">
                    <h5 class="modal-title" id="registerModalLabel">Register</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="d-flex justify-content-center">
                        <img style="max-width: 100px" src="{{ @asset('images/Acronimo_year.png') }}" alt="" class="img-fluid">
                    </div>

                    <div class="container-lg">
                        <p class="small text-muted mt-2 mb-3"><i>Complete the form to register. We will be contacting you to complete the registration process.</i></p>
                        <form class="small">
                            <div class="mb-3">
                                <label for="ideInput" class="form-label mb-0">IDE:</label>
                                <input type="text" class="form-control form-control-sm" id="ideInput">
                            </div>
                            <div class="mb-3">
                                <label for="nameInput" class="form-label mb-0">Name:</label>
                                <input type="text" class="form-control form-control-sm" id="nameInput">
                            </div>
                            <div class="mb-3">
                                <label for="lastnameInput" class="form-label mb-0">Lastname:</label>
                                <input type="text" class="form-control form-control-sm" id="lastnameInput">
                            </div>
                            <div class="mb-3">
                                <label for="emailInput" class="form-label mb-0">Email:</label>
                                <input type="email" class="form-control form-control-sm" id="emailInput">
                            </div>
                            <div class="d-flex justify-content-end mb-2">
                                <button class="btn btn-secondary me-2" data-bs-dismiss="modal">Close</button>
                                <button class="btn info_btn info_btn fw-normal">Register</button>
                            </div>
                        </form>
                    </div>
                </div>
                 <div class="modal-header modal-header-blue text-white">
                <h5 class="modal-title" id="loadingModalLabel">Coming soon!</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="d-flex justify-content-center">
                    <div class="position-relative">
                        <div class="lds-roller"><div></div><div></div><div></div><div></div><div></div><div></div><div></div><div></div></div>
                        <img class="pre-loader-image position-absolute" style="max-width: 35px; left: 0; right: 0; margin: auto; top: 23px" src="{{ asset('images/ivetc-brand-loading-sm-min.png') }}" alt="loading-brand-sm">
                    </div>
                </div>

                {{--                    <h3 class="text-uppercase mb-4 mt-3 text-warning"><strong>Modality</strong></h3>--}}
                <div class="d-flex justify-content-center">
                    <p class="text-uppercase"><strong>Coming soon!</strong></p>
                </div>

                <div class="d-flex justify-content-end mt-3 mb-3">
                    <button class="btn info_btn info_btn fw-normal px-5 mt-4" data-bs-dismiss="modal">Close</button>
                </div>
            </div> 
            </div>
        </div>
    </div> -->

    <div class="modal fade" id="loadingModal" tabindex="-1" aria-labelledby="#loadingModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content rounded">
                <div class="modal-header modal-header-blue text-white">
                    <h5 class="modal-title" id="loadingModalLabel"></h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    {{-- <div class="d-flex justify-content-center">--}}
                    {{-- <div class="position-relative">--}}
                    {{-- <div class="lds-roller"><div></div><div></div><div></div><div></div><div></div><div></div><div></div><div></div></div>--}}
                    {{-- <img class="pre-loader-image position-absolute" style="max-width: 35px; left: 0; right: 0; margin: auto; top: 23px" src="{{ asset('images/ivetc-brand-loading-sm-min.png') }}" alt="loading-brand-sm">--}}
                    {{-- </div>--}}
                    {{-- </div>--}}

                    {{-- <h3 class="text-uppercase mb-4 mt-3 text-warning"><strong>Modality</strong></h3>--}}

                    <h3 class="text-etc-orange text-center mb-4 fw-bold" id="modalityModalLabel">Book of Abtracts and Program</h3>

                    <div class="d-flex justify-content-center">
                        <div class="download-icon-01 text-center mx-4" style="width: 100%; max-width: 100px;">
                            <!-- <a class="animate" target="_blank" href="https://cms.centroatenea.app/downloads/book_of_abstracts_ivetc_2022.pdf">
                                <img class="img-fluid" style="max-width: 60px;" src="https://cms.centroatenea.app/images/icons/download-pdf-01.png" alt="">
                            </a> -->
                            <p class="small">Book of Abstracts VETC 2025</p>
                        </div>
                        <div class="download-icon-01 text-center mx-4" style="width: 100%; max-width: 100px;">
                            <!-- <a class="animate" target="_blank" href="https://cms.centroatenea.app/downloads/book_of_biographies_organizing_committee_2022.pdf">
                                <img class="img-fluid" style="max-width: 60px;" src="https://cms.centroatenea.app/images/icons/download-pdf-01.png" alt="">
                            </a> -->
                            <p class="small">Book of Biographies Organizing Committee 2025</p>
                        </div>
                        <div class="download-icon-01 text-center mx-4" style="width: 100%; max-width: 100px;">
                            <!-- <a class="animate" target="_blank" href="https://cms.centroatenea.app/downloads/congress_programivetc_2022.pdf">
                                <img class="img-fluid" style="max-width: 60px;" src="https://cms.centroatenea.app/images/icons/download-pdf-01.png" alt="">
                            </a> -->
                            <p class="small">Congress Program VETC 2025</p>
                        </div>
                    </div>

                    <div class="d-flex justify-content-end mt-3 mb-3">
                        <button class="btn info_btn info_btn fw-normal px-5 mt-4" data-bs-dismiss="modal">Close</button>
                    </div>
                </div>
            </div>
        </div>
    </div>


    {{-- scripts --}}
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"
        integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4="
        crossorigin="anonymous"></script>

    {{-- Bootstrap JS (incluye Popper) --}}
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
        crossorigin="anonymous"></script>

    <script src="{{ asset('js/app.js') }}"></script>
    <script src="{{ asset('js/pre-loader.js') }}"></script>
    <script src="{{ asset('js/menu.js') }}"></script>

    <script>
        document.addEventListener("DOMContentLoaded", function() {
            let scrollSpy = new bootstrap.ScrollSpy(document.body, {
                target: '#ivetc-menu'
            });
        });
    </script>

</body>

</html>