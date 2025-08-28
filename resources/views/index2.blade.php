<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <!-- Add the slick-theme.css if you want default styling -->
    <link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css"/>
    <!-- Add the slick-theme.css if you want default styling -->
    <link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick-theme.min.css"/>
    <link rel="stylesheet" href="{{ asset('css/ivetc.css') }}">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Slabo+27px&display=swap" rel="stylesheet">
    <title>V-ETC</title>
</head>
<body>

<div class="pre-loader" id="preloader">
    <div class="lds-roller"><div></div><div></div><div></div><div></div><div></div><div></div><div></div><div></div></div>
    <img class="pre-loader-image" src="{{ asset('images/ivetc-brand-loading-sm-min.png') }}" alt="loading-brand-sm">
</div>

<div>
    <nav class="navbar ivetc-navbar">
        <div class="container-fluid py-0">
            <div class="container">
                <div class="row navbar-items d-flex justify-content-between align-items-center">
                    <div class="col-12 col-md-4 navbar-images">
                        <a class="navbar-brand; text-decoration: none;" href="#">
                            <img src="{{ asset('images/ETC_white.png') }}" class="d-inline-block align-text-top">
                        </a>
                    </div>
                    <div class="col-12 col-md-7 navbar-images d-none d-lg-block">
                        <ul class="navbar-images-list text-white fw-bolder d-flex justify-content-end align-items-center mt-2" style="list-style: none">
                            <a class="text-white text-decoration-none menu-item" href=""><li>Home</li></a>
                            <a class="text-white text-decoration-none menu-item" href=""><li>Speakers</li></a>
                            <a class="text-white text-decoration-none menu-item" href=""><li>Details</li></a>
                            <a class="text-white text-decoration-none menu-item" href=""><li>Platform</li></a>
                            <li><a class="btn register_btn btn-warning fw-normal px-5" style="background-color: orange" href="{{route('public.register.index')}}">Register</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </nav>
</div>

<section class="hero">
    <div class="left-squares">
        <img src="{{ asset('images/ivetc_sq_left_00.png') }}" alt="">
    </div>
    <div class="container">
        <div class="hero-content">
            <div class="row justify-content-center">
                <div class="col-12 col-md-5">
                    <div class="hero-left-images d-flex mt-4 justify-content-center justify-content-md-end align-items-md-end flex-column">
                        <img class="title" src="{{ asset('images/ivetc_title_00.png') }}" alt="title">
                    </div>
                </div>
                <div class="col-12 col-md-6">
                    <div class="hero-right-media mt-4">
                        <div class="video shadow"></div>
                        <div class="text mt-2">
                            <p class="fw-bolder mb-0" style="font-size: 1.4rem">Learn more about previous editions.</p>
                            <p class="fw-bolder mt-0" style="font-size: 1.6rem; line-height: 1"><span class="fw-normal">Take a tour of the</span> <span class="fw-bold">different experiences of the congress!</span></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="row justify-content-center mt-5">
            <div class="col-12 col-md-9">
                <div class="hero-bar bg-light shadow">
                    <div class="container px-4">
                        <div class="row justify-content-center">
                            <div class="col-3 left-pill pill shadow rounded d-flex justify-content-center align-items-center text-white">
                                <h5>TARGET</h5>
                            </div>
                            <div class="col-4 center-pill pill shadow rounded d-flex justify-content-center align-items-center text-white mx-3" data-bs-toggle="modal" data-bs-target="#exampleModal">
                                <h5>CALENDAR</h5>
                            </div>
                            <div class="col-3 right-pill pill shadow rounded d-flex justify-content-center align-items-center text-white">
                                <h5>MODALITY</h5>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="about">
    <div class="container">
        <div class="row justify-content-center align-items-center">
            <div class="col-12 col-md-6">
                <img class="img-fluid" src="{{ asset('images/ivetc-image-01.png') }}" alt="image">
            </div>
            <div class="col-12 col-md-6">
                <h1 class="title text-uppercase"><strong>About us</strong></h1>

                <p style="line-height: 1.8">The Costa Rican educational system currently finds itself in a fragile state given its unresolved structural problems, which date back to years prior to 2018.  Since then, these problems have been aggravated by distinct forces: union strikes, teacher strikes and the pandemic. The State of Education (Program Estado de la Nación, 2021)  catalogues this crisis as the worst in the recent decades, branding it an
                    educational shut down. This emergency has affected all three levels of the Costa Rican educational system: primary, secondary, and diversified.
                    <br>
                    As a result of this situation, the weaknesses and needs of the teaching population are not only evident, but are considered a crucial and strategic point in the resurrection of the Costa Rican
                    educational system.</p>

                <a class="btn info_btn info_btn fw-normal px-5 mt-4" href="">Read more about...</a>
            </div>
        </div>
    </div>
</section>

<section class="academic_frame">
    <div class="container">
        <h1 class="title text-uppercase mb-5"><strong>Academic Frame</strong></h1>
        <div class="row">
            <div class="col-12 col-md-6">
                <div class="row">
                    <div class="col-12">
                        <div class="point-title-container d-flex align-items-center">
                            <div class="number shadow me-2">1</div>
                            <div class="title">
                                <h4 class="text-uppercase text-muted fw-bold my-0">The use of technology in times of change</h4>
                            </div>
                        </div>
                        <ul class="mt-3 p-0" style="list-style: none">
                            <li class="mb-2">
                                <img class="me-2" style="max-width: 20px; height: auto" src="{{ asset('images/play-button.png') }}" alt="">
                                <span>Innovative methodologies from an interdisciplinary approach in English.</span>
                            </li>
                            <li class="mb-2">
                                <img class="me-2" style="max-width: 20px; height: auto" src="{{ asset('images/play-button.png') }}" alt="">
                                <span>Virtual activities that generate interest from English students.</span>
                            </li>
                            <li class="mb-2">
                                <img class="me-2" style="max-width: 20px; height: auto" src="{{ asset('images/play-button.png') }}" alt="">
                                <span>New perspectives on the use of technology in teaching English.</span>
                            </li>
                            <li class="mb-2">
                                <img class="me-2" style="max-width: 20px; height: auto" src="{{ asset('images/play-button.png') }}" alt="">
                                <span>Elaboration of interactive online resources for teaching English.</span>
                            </li>
                        </ul>
                    </div>
                    <div class="col-12 mt-4">
                        <div class="point-title-container d-flex align-items-center">
                            <div class="number shadow me-2">3</div>
                            <div class="title">
                                <h4 class="text-uppercase text-muted fw-bold my-0">Support for the educational lag in the Huetar Northern Region</h4>
                            </div>
                        </div>
                        <ul class="mt-3 p-0" style="list-style: none">
                            <li class="mb-2">
                                <img class="me-2" style="max-width: 20px; height: auto" src="{{ asset('images/play-button.png') }}" alt="">
                                <span>Strategies for academic leveling based on accelerated learning.</span>
                            </li>
                            <li class="mb-2">
                                <img class="me-2" style="max-width: 20px; height: auto" src="{{ asset('images/play-button.png') }}" alt="">
                                <span>Techniques for promoting autonomous learning and collaboration.</span>
                            </li>
                            <li class="mb-2">
                                <img class="me-2" style="max-width: 20px; height: auto" src="{{ asset('images/play-button.png') }}" alt="">
                                <span>Formative and summative evaluation processes for decision making and techniques for providing effective feedback.</span>
                            </li>
                            <li class="mb-2">
                                <img class="me-2" style="max-width: 20px; height: auto" src="{{ asset('images/play-button.png') }}" alt="">
                                <span>Promoting learning communities for educational contexts.</span>
                            </li>
                            <li class="mb-2">
                                <img class="me-2" style="max-width: 20px; height: auto" src="{{ asset('images/play-button.png') }}" alt="">
                                <span>Competency based learning and projects.</span>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="col-12 col-md-6">
                <div class="point-title-container d-flex align-items-center">
                    <div class="number shadow me-2">2</div>
                    <div class="title">
                        <h4 class="text-uppercase text-muted fw-bold my-0">Teaching English in the Huetar Northern Region</h4>
                    </div>
                </div>
                <h5 class="mt-4">Panorama of the current English situation:</h5>
                <ul class="p-0" style="list-style: none">
                    <li class="mb-2">
                        <img class="me-2" style="max-width: 20px; height: auto" src="{{ asset('images/play-button.png') }}" alt="">
                        <span>Presentation of the eighth report from the Estado de la Educación.</span>
                    </li>
                    <li class="mb-2">
                        <img class="me-2" style="max-width: 20px; height: auto" src="{{ asset('images/play-button.png') }}" alt="">
                        <span>Presentation from CINDE (technical education and employability).</span>
                    </li>
                    <li class="mb-2">
                        <img class="me-2" style="max-width: 20px; height: auto" src="{{ asset('images/play-button.png') }}" alt="">
                        <span>Presentation from the Agencia para el Desarrollo de la Zona Norte.</span>
                    </li>
                    <li class="mb-2">
                        <img class="me-2" style="max-width: 20px; height: auto" src="{{ asset('images/play-button.png') }}" alt="">
                        <span>Importance of the Language Proficiency Exam (Alianza MEP-UCR).</span>
                    </li>
                </ul>
                <h5 class="mt-4">Panorama from the teacher’s perspective:</h5>
                <ul class="p-0" style="list-style: none">
                    <li class="mb-2">
                        <img class="me-2" style="max-width: 20px; height: auto" src="{{ asset('images/play-button.png') }}" alt="">
                        <span>Successful experiences of didactic planning in times of change.</span>
                    </li>
                    <li class="mb-2">
                        <img class="me-2" style="max-width: 20px; height: auto" src="{{ asset('images/play-button.png') }}" alt="">
                        <span>Successful experiences in pedagogical mediation in times of change.</span>
                    </li>
                    <li class="mb-2">
                        <img class="me-2" style="max-width: 20px; height: auto" src="{{ asset('images/play-button.png') }}" alt="">
                        <span>Successful experiences in learning assessment in times of change.</span>
                    </li>
                    <li class="mb-2">
                        <img class="me-2" style="max-width: 20px; height: auto" src="{{ asset('images/play-button.png') }}" alt="">
                        <span>Successful experiences in communication processes in times of change.</span>
                    </li>
                    <li class="mb-2">
                        <img class="me-2" style="max-width: 20px; height: auto" src="{{ asset('images/play-button.png') }}" alt="">
                        <span>Successful experiences with at-risk populations.</span>
                    </li>
                </ul>
            </div>
            <div class="col-12 col-md-6 d-none"></div>
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
                            <img class="img-fluid" src="{{ asset('images/committee/dr_patricia_lopez_estrada.jpg') }}" alt="committee-memb">
                        </div>
                    </div>
                    <div class="member-user">
                        <p class="text-center mb-0">Dr. Patricia López Estrada</p>
                        <p class="text-center mb-0"><i>General coordinator</i></p>
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
                            <img class="img-fluid" src="{{ asset('images/committee/med_maria_castillo_hernandez.jpg') }}" alt="committee-memb">
                        </div>
                    </div>
                    <div class="member-user">
                        <p class="text-center mb-0">MEd. María Castillo Hernández</p>
                        <p class="text-center mb-0"><i>Scientific coordinator</i></p>
                        <div class="inst d-flex justify-content-center align-items-start">
                            <img class="img-fluid" style="max-width: 60px" src="{{ asset('images/committee/utn.png') }}" alt="">
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
                            <img class="img-fluid" src="{{ asset('images/committee/licda_ana_yansy_morales_solis.jpg') }}" alt="committee-memb">
                        </div>
                    </div>
                    <div class="member-user">
                        <p class="text-center mb-0">Licda. A. Yansy Morales Solís</p>
                        <p class="text-center mb-0"><i>Communication coordinator</i></p>
                        <div class="inst d-flex justify-content-center align-items-start">
                            <img class="img-fluid" style="max-width: 100px" src="{{ asset('images/committee/ucr.png') }}" alt="">
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
                            <img class="img-fluid" src="{{ asset('images/committee/med_eduardo_castro_miranda.jpg') }}" alt="committee-memb">
                        </div>
                    </div>
                    <div class="member-user">
                        <p class="text-center mb-0">MEd. Eduardo Castro Miranda</p>
                        <p class="text-center mb-0"><i>Committee member</i></p>
                        <div class="inst d-flex justify-content-center align-items-start">
                            <img class="img-fluid" style="max-width: 60px" src="{{ asset('images/committee/utn.png') }}" alt="">
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
                            <img class="img-fluid" src="{{ asset('images/committee/med_jose_manuel_vargas_vasquez.jpg') }}" alt="committee-memb">
                        </div>
                    </div>
                    <div class="member-user">
                        <p class="text-center mb-0">MEd. Miguel Vargas Vásquez</p>
                        <p class="text-center mb-0"><i>Committee member</i></p>
                        <div class="inst d-flex justify-content-center align-items-start">
                            <img class="img-fluid" style="max-width: 60px" src="{{ asset('images/committee/utn.png') }}" alt="">
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
                            <img class="img-fluid" src="{{ asset('images/committee/licda_joselyn_rojas_rodriguez.jpg') }}" alt="committee-memb">
                        </div>
                    </div>
                    <div class="member-user">
                        <p class="text-center mb-0">Licda. Joselyn Rojas Rodríguez</p>
                        <p class="text-center mb-0"><i>Committee member</i></p>
                        <div class="inst d-flex justify-content-center align-items-start">
                            <img class="img-fluid" style="max-width: 50px" src="{{ asset('images/committee/mep.png') }}" alt="">
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
                            <img class="img-fluid" src="{{ asset('images/committee/licda_patricia_leiton_moya.jpg') }}" alt="committee-memb">
                        </div>
                    </div>
                    <div class="member-user">
                        <p class="text-center mb-0">Licda. Patricia Leitón Moya</p>
                        <p class="text-center mb-0"><i>Committee member</i></p>
                        <div class="inst d-flex justify-content-center align-items-start">
                            <img class="img-fluid" style="max-width: 80px" src="{{ asset('images/committee/in.png') }}" alt="">
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
                            <img class="img-fluid" src="{{ asset('images/committee/msc_ronny_carmona_miranda.jpg') }}" alt="committee-memb">
                        </div>
                    </div>
                    <div class="member-user">
                        <p class="text-center mb-0">MSc. Ronny Carmona Miranda</p>
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
                            <img class="img-fluid" src="{{ asset('images/committee/ma_amanda_rossi_flood.jpg') }}" alt="committee-memb">
                        </div>
                    </div>
                    <div class="member-user">
                        <p class="text-center mb-0">MA. Amanda Rossi Flood</p>
                        <p class="text-center mb-0"><i>Committee member</i></p>
                        <div class="inst d-flex justify-content-center align-items-start">
                            <img class="img-fluid" style="max-width: 100px" src="{{ asset('images/committee/ucr.png') }}" alt="">
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
                            <img class="img-fluid" src="{{ asset('images/committee/lic_ardui_flores_calderon.jpg') }}" alt="committee-memb">
                        </div>
                    </div>
                    <div class="member-user">
                        <p class="text-center mb-0">Lic. Ardui Flores Calderón</p>
                        <p class="text-center mb-0"><i>Committee member</i></p>
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
                            <img class="img-fluid" src="{{ asset('images/committee/med_gerardo_matamoros_arce.jpg') }}" alt="committee-memb">
                        </div>
                    </div>
                    <div class="member-user">
                        <p class="text-center mb-0">MEd. Gerardo Matamoros Arce</p>
                        <p class="text-center mb-0"><i>Committee member</i></p>
                        <div class="inst d-flex justify-content-center align-items-start">
                            <img class="img-fluid" style="max-width: 60px" src="{{ asset('images/committee/utn.png') }}" alt="">
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
                        <p class="text-center mb-0">Lic. Jorge Chaves Blanco</p>
                        <p class="text-center mb-0"><i>Committee member</i></p>
                        <div class="inst d-flex justify-content-center align-items-start">
                            <img class="img-fluid" style="max-width: 60px" src="{{ asset('images/committee/etai.png') }}" alt="">
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
                            <img class="img-fluid" src="{{ asset('images/committee/msc_yorleni_mora_rivera.jpg') }}" alt="committee-memb">
                        </div>
                    </div>
                    <div class="member-user">
                        <p class="text-center mb-0">MSc. Yorleni Mora Rivera</p>
                        <p class="text-center mb-0"><i>Committee member</i></p>
                        <div class="inst d-flex justify-content-center align-items-start">
                            <img class="img-fluid" style="max-width: 50px" src="{{ asset('images/committee/uned.png') }}" alt="">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="networks">
        <div class="container">
            <div class="d-flex justify-content-center align-items-center">
                <h1 style="letter-spacing: .01em" class="text-uppercase fw-light me-2">FOLLOW US!</h1>
                <div style="height: 60px; width: 2px; background-color: rgba(0,0,0,.4); margin: 0 15px"></div>
                <div class="d-flex justify-content-start align-items-center">
                    <img style="max-width: 40px; opacity: .5" class="img-fluid mx-2" src="{{ asset('images/facebook.png') }}" alt="facebook">
                    <img style="max-width: 40px; opacity: .5" class="img-fluid mx-2" src="{{ asset('images/instagram.png') }}" alt="facebook">
                    <img style="max-width: 50px; opacity: .5" class="img-fluid mx-2" src="{{ asset('images/youtube.png') }}" alt="facebook">
                </div>
            </div>
        </div>
    </section>

    <section class="information">
        <div class="container">
            <h1 class="title text-center fw-bolder">MORE INFORMATION?</h1>
            <h5 class="fw-bolder text-center">Subscribe and join our group!</h5>
            <div class="row justify-content-center">
                <div class="col-12 col-md-8">
                    <p class="text-center">We will sending important information through our newsletter to keep you updated on all events and news that we will be planning this new year for you.</p>
                </div>
                <div class="col-12 col-md-7">
                    <div class="d-flex justify-content-center">
                        <a class="btn info_btn fw-normal px-5 mt-4 me-3" href="">Subscribe</a>
                        <a class="btn reg_btn fw-normal px-5 mt-4 ms-3" href="">Register</a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="footer py-3">
        <div class="d-flex justify-content-center">
            <img class="img-fluid" style="max-width: 120px;" src="{{ asset('images/ivetc-brand-footer.png') }}" alt="footer-image">
        </div>
        <p class="text-center text-white small fw-light mb-0"><strong>IV CONGRESO DE LA ENSEÑANZA DEL INGLÉS</strong></p>
        <p class="text-center text-white-50 small fw-normal mb-0">REGIÓN HUETAR NORTE 2022</p>

        <div class="footer-menu text-center my-4 text-white-50">
            <a style="text-decoration: none" class="menu-item text-white small mx-2" href="">COMMITTEES</a> |
            <a style="text-decoration: none" class="menu-item text-white small mx-2" href="">PARTNERS</a> |
            <a style="text-decoration: none" class="menu-item text-white small mx-2" href="">PLATFORM</a> |
            <a style="text-decoration: none" class="menu-item text-white small mx-2" href="">ZOOM</a> |
            <a style="text-decoration: none" class="menu-item text-white small mx-2" href="">CONTACTS</a>
        </div>

        <div class="">
            <div class="d-flex justify-content-center align-items-center">
                <img style="max-width: 20px; opacity: .5" class="img-fluid mx-1" src="{{ asset('images/facebook.png') }}" alt="facebook">
                <img style="max-width: 20px; opacity: .5" class="img-fluid mx-1" src="{{ asset('images/instagram.png') }}" alt="facebook">
                <img style="max-width: 30px; opacity: .5" class="img-fluid mx-1" src="{{ asset('images/youtube.png') }}" alt="facebook">
            </div>
        </div>
    </section>
    <div class="footer-border"></div>
</div>

{{-- Modals --}}
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content rounded">
            <div class="modal-header modal-header-blue text-white">
                <h5 class="modal-title" id="exampleModalLabel">Calendar</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <table class="table table-hover">
                    <thead class="thead-dark">
                    <tr>
                        <th scope="col">Week</th>
                        <th scope="col">Modality</th>
                        <th scope="col">Date</th>
                        <th scope="col">Platform</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr>
                        <th scope="row">
                            <h1 class="text-primary">1</h1>
                        </th>
                        <td>
                            <ul class="mb-0 ps-0" style="list-style: none">
                                <li>Synchronous</li>
                                <li>Asynchronous </li>
                            </ul>
                        </td>
                        <td class="table-info">
                            <ul class="mb-0 ps-0" style="list-style: none">
                                <li>17/11/2022 (4:00 to 8:00 p.m.)</li>
                                <li>From 18/11/2022 to 23/11/2022</li>
                            </ul>
                        </td>
                        <td>
                            <ul class="mb-0 ps-0" style="list-style: none">
                                <li>Zoom</li>
                                <li>Moodle</li>
                            </ul>
                        </td>
                    </tr>
                    <tr>
                        <th scope="row">
                            <h1 class="text-warning">2</h1>
                        </th>
                        <td>
                            <ul class="mb-0 ps-0" style="list-style: none">
                                <li>Synchronous</li>
                                <li>Asynchronous </li>
                            </ul>
                        </td>
                        <td class="table-info">
                            <ul class="mb-0 ps-0" style="list-style: none">
                                <li>24/11/2022 (4:00 to 8:00 p.m.)</li>
                                <li>From 25/11/2022 to 30/11/2022</li>
                            </ul>
                        </td>
                        <td>
                            <ul class="mb-0 ps-0" style="list-style: none">
                                <li>Zoom</li>
                                <li>Moodle</li>
                            </ul>
                        </td>
                    </tr>
                    <tr>
                        <th scope="row">
                            <h1 class="text-info">3</h1>
                        </th>
                        <td>
                            <ul class="mb-0 ps-0" style="list-style: none">
                                <li>Synchronous</li>
                                <li>Asynchronous </li>
                            </ul>
                        </td>
                        <td class="table-info">
                            <ul class="mb-0 ps-0" style="list-style: none">
                                <li>01/12/2022 (4:00 to 8:00 p.m.)</li>
                                <li>From 02/12/2022 to 07/12/2022</li>
                            </ul>
                        </td>
                        <td>
                            <ul class="mb-0 ps-0" style="list-style: none">
                                <li>Zoom</li>
                                <li>Moodle</li>
                            </ul>
                        </td>
                    </tr>
                    <tr>
                        <th scope="row">
                            <h1 class="text-danger">4</h1>
                        </th>
                        <td>
                            <ul class="mb-0 ps-0" style="list-style: none">
                                <li>Synchronous</li>
                                <li>Asynchronous </li>
                            </ul>
                        </td>
                        <td class="table-info">
                            <ul class="mb-0 ps-0" style="list-style: none">
                                <li>08/12/2022 (4:00 to 8:00 p.m.)</li>
                                <li>From 09/12/2022 to 14/12/2022</li>
                            </ul>
                        </td>
                        <td>
                            <ul class="mb-0 ps-0" style="list-style: none">
                                <li>Zoom</li>
                                <li>Moodle</li>
                            </ul>
                        </td>
                    </tr>
                    </tbody>
                </table>
            </div>
{{--            <div class="modal-footer">--}}
{{--                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>--}}
{{--                <button type="button" class="btn btn-primary">Save changes</button>--}}
{{--            </div>--}}
        </div>
    </div>
</div>


<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
<script src="{{ asset('js/pre-loader.js') }}"></script>
<script src="{{ asset('js/app.js') }}"></script>
<script type="text/javascript" src="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js"></script>
<script src="{{ asset('js/slick.js') }}"></script>

</body>
</html>
