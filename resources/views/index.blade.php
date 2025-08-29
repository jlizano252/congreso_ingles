<!doctype html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport"
        content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <!-- Add the slick-theme.css if you want default styling -->
    <link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css" />
    <!-- Add the slick-theme.css if you want default styling -->
    <link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick-theme.min.css" />
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
            <a class="py-lg-0 navbar-brand text-decoration: none;" href="https://vetc.centroatenea.network/">
                <img src="{{ asset('images/ETC_white.png') }}" class="d-inline-block align-text-top">
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse justify-content-lg-end" id="navbarSupportedContent">
                <ul class="navbar-nav mb-2 mb-lg-0">
                    <li class="nav-item menu-item">
                        <a class="nav-link active" href="#hero-section">Home</a>
                    </li>
                    <li class="nav-item menu-item">
                        <a class="nav-link" href="documents" data-bs-toggle="modal" data-bs-target="#loadingModal">Documents</a>
                    </li>
                    <li class="nav-item menu-item">
                        <a class="nav-link" href="{{ route('webpage.details') }}">Details</a>
                    </li>
                    <li class="nav-item menu-item mt-4 mt-lg-0">
                        <a href="{{ route('public.register.index') }}" class="btn register_btn btn-warning fw-normal px-5" style="background-color: orange">Participant</a>
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
            <img src="{{ asset('images/ivetc_sq_left_00.png') }}" alt="">
        </div>
        <div class="container">
            <div class="hero-content">
                <div class="row justify-content-center position-relative">
                    <div class="col-12 col-md-5">
                        <div class="hero-left-images px-4 px-md-0">
                            <picture>
                                <source media="(min-width:768px)" srcset="{{ asset('images/ivetc_title_00.png') }}">
                                <img src="{{ asset('images/ivetc_title_00.png') }}" class="img-fluid">
                            </picture>
                        </div>
                    </div>
                    <div class="col-12 col-md-6">
                        <div class="hero-right-media mt-4">
                            <div class="video">
                                {{-- <iframe class="frame_video shadow" src="https://www.youtube.com/embed/K4TOrB7at0Y" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>--}}
                                <video class="frame_video shadow" controls>
                                    <source src="https://etai.aulavirtual.co.cr/assets/ivetc/IV-English-Teaching-Congress-2022.mp4" type="video/mp4">
                                    Your browser does not support the video tag.
                                </video>
                            </div>
                            <div class="text mt-2">
                                <p class="fw-bolder mb-0 text-center text-md-start" style="font-size: 1.5rem">Learn more about previous editions.</p>
                                <p class="fw-bolder mt-0 text-center text-md-start" style="font-size: 1.5rem; line-height: 1"><span>Take a tour of the</span> <span>different experiences of the congress!</span></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="info-banner">
        <div class="container">
            <div class="row justify-content-center mt-5">
                <div class="col-12 col-lg-9">
                    <div class="hero-bar bg-light shadow">
                        <div class="px-4">
                            <div class="row justify-content-center">
                                <div class="col-3 left-pill pill shadow rounded d-flex justify-content-center align-items-center text-white" data-bs-toggle="modal" data-bs-target="#targetModal">
                                    <h5 class="d-none d-lg-block">ABOUT</h5>
                                    <h6 class="d-block d-lg-none">ABOUT</h6>
                                </div>
                                <div class="col-4 center-pill pill shadow rounded d-flex justify-content-center align-items-center text-white mx-3" data-bs-toggle="modal" data-bs-target="#exampleModal">
                                    <h5>CALENDAR</h5>
                                </div>
                                {{-- <div class="col-3 right-pill pill shadow rounded d-flex justify-content-center align-items-center text-white" data-bs-toggle="modal" data-bs-target="#modalityModal">
                                    <h5 class="d-none d-lg-block">MODALITY</h5>
                                    <h6 class="d-block d-lg-none">MODALITY</h6> --}}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        </div>
    </section>

    <section class="about" id="about-section">
        <div class="container">
            <div class="row justify-content-center align-items-start">
                <div class="col-12 col-lg-6 d-flex justify-content-center">
                    <img class="img-fluid" src="{{ asset('images/ivetc-image-01.png') }}" alt="image">
                </div>
                <div class="col-12 col-lg-6 mt-4 mt-lg-0">
                    <h1 class="title text-uppercase"><strong>About us</strong></h1>

                    <p style="line-height: 1.8">The Costa Rican educational system currently finds itself in a fragile state given its unresolved structural problems, which date back to years prior to 2018. Since then, these problems have been aggravated by distinct forces: union strikes, teacher strikes and the pandemic. The State of Education (Program Estado de la Nación, 2021) catalogues this crisis as the worst in the recent decades, branding it an
                        educational shut down. This emergency has affected all three levels of the Costa Rican educational system: primary, secondary, and diversified.
                        <br>
                        As a result of this situation, the weaknesses and needs of the teaching population are not only evident, but are considered a crucial and strategic point in the resurrection of the Costa Rican
                        educational system.
                    </p>

                    <a class="btn info_btn info_btn fw-normal px-5 mt-4" href="{{ route('webpage.details') }}">Read more about...</a>
                </div>
            </div>
        </div>
    </section>

    <section class="academic_frame">
        <div class="container">
            <h1 class="title text-uppercase mb-5"><strong>Academic Frame</strong></h1>
            <div class="row">
                <div class="col-12 col-lg-6">
                    <div class="row">
                        <div class="col-12">
                            <div class="point-title-container d-flex align-items-center">
                                <div class="number shadow me-2">1</div>
                                <div class="title">
                                    <h4 class="text-uppercase text-muted fw-bold my-0">Teacher Well-being: Creating a Healthy Work-Life Balance</h4>
                                </div>
                            </div>
                            <ul class="mt-3 p-0" style="list-style: none">
                                <li class="mb-2 d-flex align-items-start justify-content-start">
                                    <img class="me-2 mt-1" style="max-width: 21px; height: 17px" src="{{ asset('images/ivetc-point.png') }}" alt="">
                                    <span>Teacher Wellness: Physical & Mental Health in Action – Daily strategies to care for body and mind.</span>
                                </li>
                                <li class="mb-2 d-flex align-items-start justify-content-start">
                                    <img class="me-2 mt-1" style="max-width: 21px; height: 17px" src="{{ asset('images/ivetc-point.png') }}" alt="">
                                    <span>Burnout Recovery Toolkit: Practical strategies to reignite passion for teaching.</span>
                                </li>
                                <li class="mb-2 d-flex align-items-start justify-content-start">
                                    <img class="me-2 mt-1" style="max-width: 21px; height: 17px" src="{{ asset('images/ivetc-point.png') }}" alt="">
                                    <span>Emotional Intelligence in the Classroom: Tools for Teachers to Thrive.</span>
                                </li>
                                <li class="mb-2 d-flex align-items-start justify-content-start">
                                    <img class="me-2 mt-1" style="max-width: 21px; height: 17px" src="{{ asset('images/ivetc-point.png') }}" alt="">
                                    <span>Building a Positive Classroom Environment: A Key to Teacher Empowerment.</span>
                                </li>
                                <li class="mb-2 d-flex align-items-start justify-content-start">
                                    <img class="me-2 mt-1" style="max-width: 21px; height: 17px" src="{{ asset('images/ivetc-point.png') }}" alt="">
                                    <span>Mindfulness for Educators: Applied techniques to reduce anxiety and improve focus in the classroom.</span>
                                </li>
                            </ul>
                        </div>

                        <div class="col-12 mt-4 d-none d-lg-block">
                            <div class="point-title-container d-flex align-items-center">
                                <div class="number shadow me-2">3</div>
                                <div class="title">
                                    <h4 class="text-uppercase text-muted fw-bold my-0">Teaching English for Specific Purposes (ESP): Adapting Lessons to Meet Student Needs</h4>
                                </div>
                            </div>
                            <ul class="mt-3 p-0" style="list-style: none">
                                <li class="mb-2 d-flex align-items-start justify-content-start">
                                    <img class="me-2 mt-1" style="max-width: 21px; height: 17px" src="{{ asset('images/ivetc-point.png') }}" alt="">
                                    <span>Strategies for academic leveling based on accelerated learning.</span>
                                </li>
                                <li class="mb-2 d-flex align-items-start justify-content-start">
                                    <img class="me-2 mt-1" style="max-width: 21px; height: 17px" src="{{ asset('images/ivetc-point.png') }}" alt="">
                                    <span>Techniques for promoting autonomous learning and collaboration.</span>
                                </li>
                                <li class="mb-2 d-flex align-items-start justify-content-start">
                                    <img class="me-2 mt-1" style="max-width: 21px; height: 17px" src="{{ asset('images/ivetc-point.png') }}" alt="">
                                    <div>Formative and summative evaluation processes for decision making and techniques for providing effective feedback.</div>
                                </li>
                                <li class="mb-2 d-flex align-items-start justify-content-start">
                                    <img class="me-2 mt-1" style="max-width: 21px; height: 17px" src="{{ asset('images/ivetc-point.png') }}" alt="">
                                    <span>Promoting learning communities for educational contexts.</span>
                                </li>
                                <li class="mb-2 d-flex align-items-start justify-content-start">
                                    <img class="me-2 mt-1" style="max-width: 21px; height: 17px" src="{{ asset('images/ivetc-point.png') }}" alt="">
                                    <span>Competency based learning and projects.</span>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>

                <div class="col-12 col-lg-6 mt-4 mt-lg-0">
                    <div class="point-title-container d-flex align-items-center">
                        <div class="number shadow me-2">2</div>
                        <div class="title">
                            <h4 class="text-uppercase text-muted fw-bold my-0">Empowering Teachers Through Technology: Digital Tools for Classroom Efficiency</h4>
                        </div>
                    </div>
                    <ul class="p-0" style="list-style: none">
                        <li class="mb-2 d-flex align-items-start justify-content-start">
                            <img class="me-2 mt-1" style="max-width: 21px; height: 17px" src="{{ asset('images/ivetc-point.png') }}" alt="">
                            <span>AI in Language Teaching: Opportunities and Challenges for Educators</span>
                        </li>
                        <li class="mb-2 d-flex align-items-start justify-content-start">
                            <img class="me-2 mt-1" style="max-width: 21px; height: 17px" src="{{ asset('images/ivetc-point.png') }}" alt="">
                            <span>Tech-Savvy Teaching: How technology can reduce stress and optimize time.</span>
                        </li>
                        <li class="mb-2 d-flex align-items-start justify-content-start">
                            <img class="me-2 mt-1" style="max-width: 21px; height: 17px" src="{{ asset('images/ivetc-point.png') }}" alt="">
                            <span>Gamification in the Classroom: Making Learning Fun and Effective</span>
                        </li>
                        <li class="mb-2 d-flex align-items-start justify-content-start">
                            <img class="me-2 mt-1" style="max-width: 21px; height: 17px" src="{{ asset('images/ivetc-point.png') }}" alt="">
                            <span>Designing Rubrics for ESL Assessment using AI.</span>
                        </li>
                        <li class="mb-2 d-flex align-items-start justify-content-start">
                            <img class="me-2 mt-1" style="max-width: 21px; height: 17px" src="{{ asset('images/ivetc-point.png') }}" alt="">
                            <span>Work Smarter, Not Harder: Time management and organization to reduce workload.</span>
                        </li>
                    </ul>
                </div>
            </div>
    </section>

    <div class="waves-bg">
        <section class="committee">
            <div class="container">
                <h1 class="title text-uppercase mb-5"><strong>Organizing Committee</strong></h1>

                <div class="members pb-4" id="committee">

                    {{-- Member --}}
                    <div class="member-card">
                        <div class="member-container position-relative">
                            <div class="squ1 rounded"></div>
                            <div class="squ2 rounded"></div>
                            <div class="squ3 rounded"></div>
                            <div class="squ4 rounded"></div>
                            <div class="member-image shadow border">
                                <img class="img-fluid" src="{{ asset('images/committee/med_gerardo_matamoros_arce.jpg') }}" alt="committee-memb">
                            </div>
                        </div>
                        <div class="member-user">
                            <p class="text-center mb-0">Gerardo Matamoros Arce</p>
                            <p class="text-center mb-0"><i>Academic Coordinator</i></p>
                            <div class="inst d-flex justify-content-center align-items-start">
                                <img class="img-fluid" style="max-width: 100px" src="{{ asset('images/committee/utn.png') }}" alt="">
                            </div>
                        </div>
                    </div>

                    {{-- Member --}}
                    <div class="member-card">
                        <div class="member-container position-relative">
                            <div class="squ1 rounded"></div>
                            <div class="squ2 rounded"></div>
                            <div class="squ3 rounded"></div>
                            <div class="squ4 rounded"></div>
                            <div class="member-image shadow border">
                                <img class="img-fluid" src="{{ asset('images/committee/grabiela_hernandez_salazar.jpg') }}" alt="committee-memb">
                            </div>
                        </div>
                        <div class="member-user">
                            <p class="text-center mb-0">Ana Gabriela Hernández Salazar</p>
                            <p class="text-center mb-0"><i>Academic Coordinator</i></p>
                            <div class="inst d-flex justify-content-center align-items-start">
                                <img class="img-fluid" style="max-width: 100px" src="{{ asset('images/committee/tec.jpg') }}" alt="">
                            </div>
                        </div>
                    </div>

                    {{-- Member --}}
                    <div class="member-card">
                        <div class="member-container position-relative">
                            <div class="squ1 rounded"></div>
                            <div class="squ2 rounded"></div>
                            <div class="squ3 rounded"></div>
                            <div class="squ4 rounded"></div>
                            <div class="member-image shadow border">
                                <img class="img-fluid" src="{{ asset('images/committee/anthony_javier_campos_centeno.jpeg') }}" alt="committee-memb">
                            </div>
                        </div>
                        <div class="member-user">
                            <p class="text-center mb-0">Anthony Javier Campos Centeno</p>
                            <p class="text-center mb-0"><i>Logistics Coordinator</i></p>
                            <div class="inst d-flex justify-content-center align-items-start">
                                <img class="img-fluid" style="max-width: 100px" src="{{ asset('images/committee/casc.png') }}" alt="">
                            </div>
                        </div>
                    </div>

                    {{-- Member --}}
                    <div class="member-card">
                        <div class="member-container position-relative">
                            <div class="squ1 rounded"></div>
                            <div class="squ2 rounded"></div>
                            <div class="squ3 rounded"></div>
                            <div class="squ4 rounded"></div>
                            <div class="member-image shadow border">
                                <img class="img-fluid" src="{{ asset('images/committee/licda_flora_gonzalez_arias.jpg') }}" alt="committee-memb">
                            </div>
                        </div>
                        <div class="member-user">
                            <p class="text-center mb-0">Flora González Arias</p>
                            <p class="text-center mb-0"><i>Committee member</i></p>
                            <div class="inst d-flex justify-content-center align-items-start">
                                <img class="img-fluid" style="max-width: 100px" src="{{ asset('images/committee/in.png') }}" alt="">
                            </div>
                        </div>
                    </div>

                    {{-- Member --}}
                    <div class="member-card">
                        <div class="member-container position-relative">
                            <div class="squ1 rounded"></div>
                            <div class="squ2 rounded"></div>
                            <div class="squ3 rounded"></div>
                            <div class="squ4 rounded"></div>
                            <div class="member-image shadow border">
                                <img class="img-fluid" src="{{ asset('images/committee/jairo_jose_porras_mendez.jpeg') }}" alt="committee-memb">
                            </div>
                        </div>
                        <div class="member-user">
                            <p class="text-center mb-0">Jairo José Porras Méndez</p>
                            <p class="text-center mb-0"><i>Committee member</i></p>
                            <div class="inst d-flex justify-content-center align-items-start">
                                <img class="img-fluid" style="max-width: 100px" src="{{ asset('images/committee/mep.jpeg') }}" alt="">
                            </div>
                        </div>
                    </div>

                    {{-- Member --}}
                    <div class="member-card">
                        <div class="member-container position-relative">
                            <div class="squ1 rounded"></div>
                            <div class="squ2 rounded"></div>
                            <div class="squ3 rounded"></div>
                            <div class="squ4 rounded"></div>
                            <div class="member-image shadow border">
                                <img class="img-fluid" src="{{ asset('images/committee/jairo_viales_angulo.jpeg') }}" alt="committee-memb">
                            </div>
                        </div>
                        <div class="member-user">
                            <p class="text-center mb-0">Jairo Viales Angulo</p>
                            <p class="text-center mb-0"><i>Committee member</i></p>
                            <div class="inst d-flex justify-content-center align-items-start">
                                <img class="img-fluid" style="max-width: 50px" src="{{ asset('images/committee/una.jpg') }}" alt="">
                            </div>
                        </div>
                    </div>

                    {{-- Member --}}
                    <div class="member-card">
                        <div class="member-container position-relative">
                            <div class="squ1 rounded"></div>
                            <div class="squ2 rounded"></div>
                            <div class="squ3 rounded"></div>
                            <div class="squ4 rounded"></div>
                            <div class="member-image shadow border">
                                <img class="img-fluid" src="{{ asset('images/committee/adrian_carmona_miranda.jpeg') }}" alt="committee-memb">
                            </div>
                        </div>
                        <div class="member-user">
                            <p class="text-center mb-0">Adrian Carmona Miranda</p>
                            <p class="text-center mb-0"><i>Committee member</i></p>
                            <div class="inst d-flex justify-content-center align-items-start">
                                <img class="img-fluid" style="max-width: 50px" src="{{ asset('images/committee/una.jpg') }}" alt="">
                            </div>
                        </div>
                    </div>

                    {{-- Member --}}
                    <div class="member-card">
                        <div class="member-container position-relative">
                            <div class="squ1 rounded"></div>
                            <div class="squ2 rounded"></div>
                            <div class="squ3 rounded"></div>
                            <div class="squ4 rounded"></div>
                            <div class="member-image shadow border">
                                <img class="img-fluid" src="{{ asset('images/committee/juan_luis_zamora_solano.jpeg') }}" alt="committee-memb">
                            </div>
                        </div>
                        <div class="member-user">
                            <p class="text-center mb-0">Juan Luis Zamora Solano</p>
                            <p class="text-center mb-0"><i>Committee member</i></p>
                            <div class="inst d-flex justify-content-center align-items-start">
                                <img class="img-fluid" style="max-width: 100px" src="{{ asset('images/committee/etai.png') }}" alt="">
                            </div>
                        </div>
                    </div>

                    {{-- Member --}}
                    <div class="member-card">
                        <div class="member-container position-relative">
                            <div class="squ1 rounded"></div>
                            <div class="squ2 rounded"></div>
                            <div class="squ3 rounded"></div>
                            <div class="squ4 rounded"></div>
                            <div class="member-image shadow border">
                                <img class="img-fluid" src="{{ asset('images/committee/maria_paula_molina_hernandez.jpg') }}" alt="committee-memb">
                            </div>
                        </div>
                        <div class="member-user">
                            <p class="text-center mb-0">María Paula Molina Hernández</p>
                            <p class="text-center mb-0"><i>Committee member</i></p>
                            <div class="inst d-flex justify-content-center align-items-start">
                                <img class="img-fluid" style="max-width: 100px" src="{{ asset('images/committee/etai.png') }}" alt="">
                            </div>
                        </div>
                    </div>

                    {{-- Member --}}
                    <div class="member-card">
                        <div class="member-container position-relative">
                            <div class="squ1 rounded"></div>
                            <div class="squ2 rounded"></div>
                            <div class="squ3 rounded"></div>
                            <div class="squ4 rounded"></div>
                            <div class="member-image shadow border">
                                <img class="img-fluid" src="{{ asset('images/committee/maria_vega_zamora.PNG') }}" alt="committee-memb">
                            </div>
                        </div>
                        <div class="member-user">
                            <p class="text-center mb-0">María Vega Zamora</p>
                            <p class="text-center mb-0"><i>Committee member</i></p>
                            <div class="inst d-flex justify-content-center align-items-start">
                                <img class="img-fluid" style="max-width: 100px" src="{{ asset('images/committee/casc.png') }}" alt="">
                            </div>
                        </div>
                    </div>

                    {{-- Member --}}
                    <div class="member-card">
                        <div class="member-container position-relative">
                            <div class="squ1 rounded"></div>
                            <div class="squ2 rounded"></div>
                            <div class="squ3 rounded"></div>
                            <div class="squ4 rounded"></div>
                            <div class="member-image shadow border">
                                <img class="img-fluid" src="{{ asset('images/committee/marco_alvarado_barboza.jpeg') }}" alt="committee-memb">
                            </div>
                        </div>
                        <div class="member-user">
                            <p class="text-center mb-0">Marco Alvarado Barboza</p>
                            <p class="text-center mb-0"><i>Committee member</i></p>
                            <div class="inst d-flex justify-content-center align-items-start">
                                <img class="img-fluid" style="max-width: 100px" src="{{ asset('images/committee/uned.png') }}" alt="">
                            </div>
                        </div>
                    </div>

                    {{-- Member --}}
                    <div class="member-card">
                        <div class="member-container position-relative">
                            <div class="squ1 rounded"></div>
                            <div class="squ2 rounded"></div>
                            <div class="squ3 rounded"></div>
                            <div class="squ4 rounded"></div>
                            <div class="member-image shadow border">
                                <img class="img-fluid" src="{{ asset('images/committee/rommy_acuña_ramirez.JPG') }}" alt="committee-memb">
                            </div>
                        </div>
                        <div class="member-user">
                            <p class="text-center mb-0">Rommy Acuña Ramirez</p>
                            <p class="text-center mb-0"><i>Committee member</i></p>
                            <div class="inst d-flex justify-content-center align-items-start">
                                <img class="img-fluid" style="max-width: 100px" src="{{ asset('images/committee/uned.png') }}" alt="">
                            </div>
                        </div>
                    </div>

                    {{-- Member --}}
                    <div class="member-card">
                        <div class="member-container position-relative">
                            <div class="squ1 rounded"></div>
                            <div class="squ2 rounded"></div>
                            <div class="squ3 rounded"></div>
                            <div class="squ4 rounded"></div>
                            <div class="member-image shadow border">
                                <img class="img-fluid" src="{{ asset('images/committee/mariana_valerio_vindas.jpg') }}" alt="committee-memb">
                            </div>
                        </div>
                        <div class="member-user">
                            <p class="text-center mb-0">Mariana Valerio Vindas</p>
                            <p class="text-center mb-0"><i>Committee member</i></p>
                            <div class="inst d-flex justify-content-center align-items-start">
                                <img class="img-fluid" style="max-width: 100px" src="{{ asset('images/committee/utn.png') }}" alt="">
                            </div>
                        </div>
                    </div>

                    {{-- Member --}}
                    <div class="member-card">
                        <div class="member-container position-relative">
                            <div class="squ1 rounded"></div>
                            <div class="squ2 rounded"></div>
                            <div class="squ3 rounded"></div>
                            <div class="squ4 rounded"></div>
                            <div class="member-image shadow border">
                                <img class="img-fluid" src="{{ asset('images/committee/lic_jorge_chaves_blanco.jpg') }}" alt="committee-memb">
                            </div>
                        </div>
                        <div class="member-user">
                            <p class="text-center mb-0">Jorge Chaves Blanco</p>
                            <p class="text-center mb-0"><i>General Coordinator</i></p>
                            <div class="inst d-flex justify-content-center align-items-start">
                                <img class="img-fluid" style="max-width: 100px" src="{{ asset('images/committee/etai.png') }}" alt="">
                            </div>
                        </div>
                    </div>

                    {{-- Member --}}
                    <div class="member-card">
                        <div class="member-container position-relative">
                            <div class="squ1 rounded"></div>
                            <div class="squ2 rounded"></div>
                            <div class="squ3 rounded"></div>
                            <div class="squ4 rounded"></div>
                            <div class="member-image shadow border">
                                <img class="img-fluid" src="{{ asset('images/committee/jessica_chaves_chaves.jpeg') }}" alt="committee-memb">
                            </div>
                        </div>
                        <div class="member-user">
                            <p class="text-center mb-0">Jessica Chaves Chaves</p>
                            <p class="text-center mb-0"><i>Committee Member</i></p>
                            <div class="inst d-flex justify-content-center align-items-start">
                                <img class="img-fluid" style="max-width: 100px" src="{{ asset('images/committee/etai.png') }}" alt="">
                            </div>
                        </div>
                    </div>

                    {{-- Member --}}
                    <div class="member-card">
                        <div class="member-container position-relative">
                            <div class="squ1 rounded"></div>
                            <div class="squ2 rounded"></div>
                            <div class="squ3 rounded"></div>
                            <div class="squ4 rounded"></div>
                            <div class="member-image shadow border">
                                <img class="img-fluid" src="{{ asset('images/committee/ardui_zur_flores_calderon.jpeg') }}" alt="committee-memb">
                            </div>
                        </div>
                        <div class="member-user">
                            <p class="text-center mb-0">Ardui Zur Flores Calderon</p>
                            <p class="text-center mb-0"><i>Committee Member</i></p>
                            <div class="inst d-flex justify-content-center align-items-start">
                                <img class="img-fluid" style="max-width: 100px" src="{{ asset('images/committee/tec.jpg') }}" alt="">
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

        <section class="information">
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
        </section>

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

    {{-- Modals --}}
    {{-- Calendar --}}
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content rounded">
                <div class="modal-header modal-header-blue text-white">
                    <h5 class="modal-title" id="exampleModalLabel">Calendar</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <h3 class="text-uppercase mb-4 mt-2 text-warning text-center"><strong>Calendar</strong></h3>
                    <table class="table table-hover calendar-table">
                        <thead class="thead-dark">
                            <tr>
                                <th scope="col">Day</th>
                                <th scope="col">Modality</th>
                                <th scope="col">Date</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <th scope="row">
                                    <h1 class="text-primary">1</h1>
                                </th>
                                <td>
                                    <ul class="mb-0 ps-0" style="list-style: none">
                                        <li>On-site</li>
                                    </ul>
                                </td>
                                <td class="table-info">
                                    <ul class="mb-0 ps-0" style="list-style: none">
                                        <li class="border-dashed">27/11/2025 (8:00 a.m. to 4:00 p.m.)</li>
                                        <li class="p-3 bg-gray-100 rounded-lg hover:bg-blue-100 transition">
                                            8:00 a.m. a 9:00 a.m. <span class="font-semibold text-blue-600">(Opening)</span>
                                        </li>
                                        <li class="p-3 bg-gray-100 rounded-lg hover:bg-blue-100 transition">
                                            9:30 a.m. a 12:00 p.m. <span class="font-semibold text-blue-600">(Academic Block 1*)</span>
                                        </li>
                                        <li class="p-3 bg-gray-100 rounded-lg hover:bg-blue-100 transition">
                                            12:00 p.m. a 1:00 p.m. <span class="font-semibold text-blue-600">(Lunch)</span>
                                        </li>
                                        <li class="p-3 bg-gray-100 rounded-lg hover:bg-blue-100 transition">
                                            1:00 p.m. a 3:30 p.m. <span class="font-semibold text-blue-600">(Academic Block 2*)</span>
                                        </li>
                                        <li class="p-3 bg-gray-100 rounded-lg hover:bg-blue-100 transition">
                                            3:30 p.m. a 4:00 p.m. <span class="font-semibold text-blue-600">(Coffee Break)</span>
                                        </li>
                                    </ul>
                                </td>
                            </tr>
                            <tr>
                                <th scope="row">
                                    <h1 class="text-warning">2</h1>
                                </th>
                                <td>
                                    <ul class="mb-0 ps-0" style="list-style: none">
                                        <li>On-site</li>
                                    </ul>
                                </td>
                                <td class="table-info">
                                    <ul class="mb-0 ps-0" style="list-style: none">
                                        <li class="border-dashed">28/11/2025 (8:00 a.m. to 4:00 p.m.)</li>
                                        <li class="p-3 bg-gray-100 rounded-lg hover:bg-blue-100 transition">
                                            8:00 a.m. a 9:00 a.m. <span class="font-semibold text-blue-600">(Opening)</span>
                                        </li>
                                        <li class="p-3 bg-gray-100 rounded-lg hover:bg-blue-100 transition">
                                            9:30 a.m. a 12:00 p.m. <span class="font-semibold text-blue-600">(Academic Block 3*)</span>
                                        </li>
                                        <li class="p-3 bg-gray-100 rounded-lg hover:bg-blue-100 transition">
                                            12:00 p.m. a 1:00 p.m. <span class="font-semibold text-blue-600">(Lunch)</span>
                                        </li>
                                        <li class="p-3 bg-gray-100 rounded-lg hover:bg-blue-100 transition">
                                            1:00 p.m. a 3:30 p.m. <span class="font-semibold text-blue-600">(Academic Block 4*)</span>
                                        </li>
                                        <li class="p-3 bg-gray-100 rounded-lg hover:bg-blue-100 transition">
                                            3:30 p.m. a 4:00 p.m. <span class="font-semibold text-blue-600">(Coffee Break)</span>
                                        </li>
                                    </ul>
                                </td>
                            </tr>
                        </tbody>
                    </table>

                    <div class="d-flex justify-content-end mt-3 mb-3">
                        <button class="btn info_btn info_btn fw-normal px-5 mt-4" data-bs-dismiss="modal">Close</button>
                    </div>

                </div>
            </div>
        </div>
    </div>

    {{-- Target --}}
    <div class="modal fade" id="targetModal" tabindex="-1" aria-labelledby="targetModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content rounded">
                <div class="modal-header modal-header-blue text-white">
                    <h5 class="modal-title" id="targetModalLabel">About the Congress</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="d-flex justify-content-center">
                        <img style="max-width: 100px" src="{{ @asset('images/Acronimo_year.png') }}" alt="" class="img-fluid">
                    </div>

                    <h3 class="text-uppercase mb-4 mt-5 text-warning"><strong>Importance</strong></h3>
                    <p style="border-left: 15px solid lightgrey; padding: 0 0 0 20px">English is the most widely used lingua franca in the world; therefore, it is an indispensable tool for the development of competencies in academic and socio-productive settings. At the national level, and especially at the local level, this conference will strengthen the national strategy on the importance of expanding English language teaching coverage through inter-institutional collaboration and regionalization. In this regard, the 5th Conference on English Language Teaching of the Huetar Norte Region 2025 aims to establish itself as a space for the exchange of pedagogical experiences through dialogue on the emerging challenges and realities faced by teachers in the region. </p>

                    <h3 class="text-uppercase mb-4 mt-3 text-darkblue"><strong>Scope</strong></h3>
                    <p style="border-left: 15px solid lightgrey; padding: 0 0 0 20px">The aim of this conference is to strengthen academic spaces for the enhancement of effective pedagogical practices in the teaching of English as a foreign language, through the establishment of partnerships and collaborative networks that promote the economic, socio-educational, and cultural development of the Huetar Norte Region of Costa Rica. </p>

                    <h3 class="text-uppercase mb-4 mt-3 text-warning"><strong>Target Population</strong></h3>
                    <p style="border-left: 15px solid lightgrey; padding: 0 0 0 20px">This fifth conference seeks not only to enhance and provide teachers with good educational practices, but also to promote the participation of English teachers from areas with low socio-economic indicators and socio-educational vulnerability across the four regions that make up the Huetar Norte Region: San Carlos, Norte-Norte (Upala, Guatuso, Los Chiles), Sarapiquí (the districts of Puerto Viejo and La Virgen in the canton of Sarapiquí), and Occidente (the district of San Isidro de Peñas Blancas in the canton of San Ramón). </p>

                    <div class="d-flex justify-content-end mt-3 mb-3">
                        <button class="btn info_btn info_btn fw-normal px-5 mt-4" data-bs-dismiss="modal">Close</button>
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- Modality --}}
    <div class="modal fade" id="modalityModal" tabindex="-1" aria-labelledby="modalityModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content rounded">
                <div class="modal-header modal-header-blue text-white">
                    <h5 class="modal-title" id="modalityModalLabel">Modality</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body p-0">
                    {{-- <div class="d-flex justify-content-center">--}}
                    {{-- <img style="max-width: 100px" src="{{ @asset('images/Acronimo_year.png') }}" alt="" class="img-fluid">--}}
                    {{-- </div>--}}

                    {{-- <h3 class="text-uppercase mb-4 mt-3 text-warning"><strong>Modality</strong></h3>--}}
                    {{-- <p style="border-left: 15px solid lightgrey; padding: 0 0 0 20px">The congress will be virtual with a synchronous session (once a week: Thursday from 4:00 to 8:00 p.m.) and asynchronous sessions (the rest of the week from Friday to Wednesday) using the technological platforms, Zoom (synchronous sessions) and Moodle (asynchronous sessions).</p>--}}

                    <img class="img-fluid" src="{{ asset('images/congress_modality-min.jpeg') }}" alt="etc-img">
                    <div class="modal-footer bg-darkblue">
                        <div class="d-flex justify-content-end bg-d">
                            <button class="btn reg_btn fw-normal px-5 " data-bs-dismiss="modal">Close</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- Register --}}
    {{-- <div class="modal fade" id="registerModal" tabindex="-1" aria-labelledby="registerModalLabel" aria-hidden="true">--}}
    {{-- <div class="modal-dialog">--}}
    {{-- <div class="modal-content rounded">--}}
    {{-- --}}{{-- <div class="modal-header modal-header-blue text-white">--}}
    {{-- --}}{{-- <h5 class="modal-title" id="registerModalLabel">Register</h5>--}}
    {{-- --}}{{-- <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>--}}
    {{-- --}}{{-- </div>--}}
    {{-- --}}{{-- <div class="modal-body">--}}
    {{-- --}}{{-- <div class="d-flex justify-content-center">--}}
    {{-- --}}{{-- <img style="max-width: 100px" src="{{ @asset('images/Acronimo_year.png') }}" alt="" class="img-fluid">--}}
    {{-- --}}{{-- </div>--}}

    {{-- --}}{{-- <div class="container-lg">--}}
    {{-- --}}{{-- <p class="small text-muted mt-2 mb-3"><i>Complete the form to register. We will be contacting you to complete the registration process.</i></p>--}}
    {{-- --}}{{-- <form class="small">--}}
    {{-- --}}{{-- <div class="mb-3">--}}
    {{-- --}}{{-- <label for="ideInput" class="form-label mb-0">IDE:</label>--}}
    {{-- --}}{{-- <input type="text" class="form-control form-control-sm" id="ideInput">--}}
    {{-- --}}{{-- </div>--}}
    {{-- --}}{{-- <div class="mb-3">--}}
    {{-- --}}{{-- <label for="nameInput" class="form-label mb-0">Name:</label>--}}
    {{-- --}}{{-- <input type="text" class="form-control form-control-sm" id="nameInput" >--}}
    {{-- --}}{{-- </div>--}}
    {{-- --}}{{-- <div class="mb-3">--}}
    {{-- --}}{{-- <label for="lastnameInput" class="form-label mb-0">Lastname:</label>--}}
    {{-- --}}{{-- <input type="email" class="form-control form-control-sm" id="lastnameInput">--}}
    {{-- --}}{{-- </div>--}}
    {{-- --}}{{-- <div class="mb-3">--}}
    {{-- --}}{{-- <label for="emailInput" class="form-label mb-0">Email:</label>--}}
    {{-- --}}{{-- <input type="email" class="form-control form-control-sm" id="emailInput">--}}
    {{-- --}}{{-- </div>--}}
    {{-- --}}{{-- <div class="d-flex justify-content-end mb-2">--}}
    {{-- --}}{{-- <button class="btn btn-secondary me-2" data-bs-dismiss="modal">Close</button>--}}
    {{-- --}}{{-- <button class="btn info_btn info_btn fw-normal" >Register</button>--}}
    {{-- --}}{{-- </div>--}}
    {{-- --}}{{-- </form>--}}
    {{-- --}}{{-- </div>--}}
    {{-- --}}{{-- </div>--}}
    {{-- <div class="modal-header modal-header-blue text-white">--}}
    {{-- <h5 class="modal-title" id="loadingModalLabel">Coming soon!</h5>--}}
    {{-- <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>--}}
    {{-- </div>--}}
    {{-- <div class="modal-body">--}}
    {{-- <div class="d-flex justify-content-center">--}}
    {{-- <div class="position-relative">--}}
    {{-- <div class="lds-roller"><div></div><div></div><div></div><div></div><div></div><div></div><div></div><div></div></div>--}}
    {{-- <img class="pre-loader-image position-absolute" style="max-width: 35px; left: 0; right: 0; margin: auto; top: 23px" src="{{ asset('images/ivetc-brand-loading-sm-min.png') }}" alt="loading-brand-sm">--}}
    {{-- </div>--}}
    {{-- </div>--}}

    {{-- --}}{{-- <h3 class="text-uppercase mb-4 mt-3 text-warning"><strong>Modality</strong></h3>--}}
    {{-- <div class="d-flex justify-content-center">--}}
    {{-- <p class="text-uppercase"><strong>Coming soon!</strong></p>--}}
    {{-- </div>--}}

    {{-- <div class="d-flex justify-content-end mt-3 mb-3">--}}
    {{-- <button class="btn info_btn info_btn fw-normal px-5 mt-4" data-bs-dismiss="modal">Close</button>--}}
    {{-- </div>--}}
    {{-- </div>--}}
    {{-- </div>--}}
    {{-- </div>--}}
    {{-- </div>--}}

    {{-- Loading --}}
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

    {{--scripts--}}
    <!-- jQuery (si usas Slick o jQuery) -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <!-- Slick Carousel -->
    <script src="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js"></script>

    <!-- Bootstrap JS (incluye Popper) -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

    <!-- Tus scripts -->
    <script src="{{ asset('js/app.js') }}"></script>
    <script src="{{ asset('js/pre-loader.js') }}"></script>
    <script src="{{ asset('js/menu.js') }}"></script>
    <script src="{{ asset('js/slick.js') }}"></script>
    <!-- Inicialización de ScrollSpy -->
    <script>
        let scrollSpy = new bootstrap.ScrollSpy(document.body, {
            target: '#ivetc-menu'
        });
    </script>

</body>

</html>