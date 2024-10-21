<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Sipekara</title>
    <!-- Favicon-->
    <link rel="icon" type="image/x-icon" href="assets/favicon.ico" />
    <!-- Custom Google font-->
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@100;200;300;400;500;600;700;800;900&amp;display=swap" rel="stylesheet" />
    <!-- Bootstrap icons-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css" rel="stylesheet" />
    <!-- Core theme CSS (includes Bootstrap)-->
    <link href="{{ asset('tampilanuser/css/styles.css') }}" rel="stylesheet" />
    <title>Running Text</title>
    <style>
        .marquee-section {
            position: relative;
            overflow: hidden;
            background-color: #37B7C3;
            padding: 10px 0;
        }

        .running-text-container {
            position: relative;
            overflow: hidden;
            height: 40px;
        }

        .running-text {
            position: absolute;
            white-space: nowrap;
            animation: marquee 20s linear infinite;
        }

        .running-text p {
            display: inline-block;
            padding: 10px 20px;
            color: #FCF8F3;
            border-radius: 5px;
        }

        @keyframes marquee {
            0% {
                transform: translateX(100%);
            }

            100% {
                transform: translateX(-100%);
            }
        }

        .container-fluid {
            max-width: 100%;
            padding: 0 15px;
            margin: 0;
        }

        .embed-responsive {
            position: relative;
            overflow: hidden;
            width: 100%;
            height: 0;
            padding-top: 56.25%;
            /* 16:9 aspect ratio */
        }

        .embed-responsive iframe {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            border: 0;
        }

        .bg-custom-blue {
            background-color: #37B7C3;
        }

        @media (max-width: 768px) {
            .running-text p {
                font-size: 14px;
            }

            .bg-custom-blue {
                padding: 20px 10px;
            }
        }

        .resp {
            width: 100%;
            height: 85vh;
        }

        @media (max-width: 650px) {
            .resp {
                width: 100%;
                height: 70vh;
            }
        }
        
    </style>
</head>

<body class="d-flex flex-column h-100">
    <main class="flex-shrink-0">
        <!-- Navigation-->
        @include('layouts.navbaruser')
        <div class="marquee-section">
            <div class="running-text-container">
                <div class="running-text">
                    <p>
                        Dinas Perkebunan dan Peternakan Kabupaten Kubu Raya Jl. Adisucipto No.15,2, Arang Limbung, Kec. Sungai Raya, Kabupaten Kubu Raya, Kalimantan Barat 78391
                    </p>
                </div>
            </div>
        </div>
        <!-- Header-->
        <header class="py-2">
            <div class="container-fluid pb-5">
                <!-- <div class="card-body"> -->
                <div class="border resp">
                    <iframe style="height: 100%; width: 100%;" src="https://lookerstudio.google.com/embed/reporting/78834fd9-597f-44d7-a373-b77ce6e47e80/page/aOt9D" frameborder="0" style="border:0" allowfullscreen sandbox="allow-storage-access-by-user-activation allow-scripts allow-same-origin allow-popups allow-popups-to-escape-sandbox">
                    </iframe>
                </div>
                <!-- </div> -->
            </div>
        </header>
        <!-- About Section-->
        <section class="bg-custom-blue py-5">
            <div class="container px-5">
                <div class="row gx-5 justify-content-center">
                    <div class="col-xxl-8">
                        <div class="text-center my-5">
                            <h2 class="display-5 fw-bolder"><span class="text-gradient d-inline">DISBUNNAK</span></h2>
                            <h3 class="display-5 fw-bolder"><span class="text-gradient d-inline">Kabupaten Kubu Raya</span></h3>
                            <p class="lead fw-light mb-4">Bidang Prasarana dan Bina Usaha</p>
                            <p class="lead fw-light mb-4">Sistem Informasi Visualisasi Data Perkebunan Rakyat Kabupaten Kubu Raya</p>
                            <div class="d-flex justify-content-center fs-2 gap-4">
                                <a class="text-gradient" href="https://www.instagram.com/disbunnakkuburaya?igsh=eWFhbDF0NHByOHY2"><i class="bi bi-instagram"></i></a>
                                <a class="text-gradient" href="https://youtube.com/@disbunnakkuburaya90?si=zfa6j1powP9RhwFe"><i class="bi bi-youtube"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>
    <!-- Footer-->
    <footer class="bg-white py-4 mt-auto">
        <div class="container px-5">
            <div class="row align-items-center justify-content-between flex-column flex-sm-row">
                <div class="col-auto">
                    <div class="small m-0">&copy;copyright by Rida Ramdayani</div>
                </div>
                <div class="col-auto">
                    <a class="small" href="{{ url('/dashboard') }}">Admin</a>
                </div>
            </div>
        </div>
    </footer>
    <!-- Bootstrap core JS-->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
    <!-- Core theme JS-->
    <script src="{{ asset('tampilanuser/js/scripts.js') }}"></script>
</body>

</html>