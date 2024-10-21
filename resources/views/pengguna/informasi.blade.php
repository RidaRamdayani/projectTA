<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
<meta name="description" content="" />
<meta name="author" content="" />
<title>Informasi-Sipekara</title>
<!-- Favicon-->
<link rel="icon" type="image/x-icon" href="assets/favicon.ico" />
<!-- Custom Google font-->
<link rel="preconnect" href="https://fonts.googleapis.com" />
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
<link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@100;200;300;400;500;600;700;800;900&amp;display=swap" rel="stylesheet" />
<!-- Bootstrap icons-->
<link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css" rel="stylesheet" />
<!-- Core theme CSS (includes Bootstrap)-->
<link href="css/styles.css" rel="stylesheet" />
<link rel="stylesheet" href="styles.css">
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
        0% { transform: translateX(100%); }
        100% { transform: translateX(-100%); }
    }

    .bg-custom-blue {
        background-color: #021526;
    }
    
    .indent {
        text-indent: 40px;
    }

    .carousel-item img {
        width: 100%;
        height: 500px; /* Set height to your desired value */
        object-fit: cover; /* Ensures the image covers the container while maintaining aspect ratio */
    }

    @media (max-width: 768px) {
        .carousel-item img {
            height: 300px; /* Adjust height for smaller screens */
        }
        .address-section p {
            font-size: 14px;
        }
        .card img {
            width: 100%;
            height: auto;
            object-fit: cover;
        }
    }
</style>
</head>
<body class="d-flex flex-column h-100 bg-light">
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
        <!-- Projects Section-->
        <section class="py-5">
            <div class="container px-5 mb-5">
                <div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="carousel" data-bs-interval="2000">
                    <div class="carousel-indicators">
                        <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
                        <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1" aria-label="Slide 2"></button>
                        <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2" aria-label="Slide 3"></button>
                    </div>
                    <div class="carousel-inner">
                        <div class="carousel-item active">
                            <img src="{{ asset('tampilan/dist/img/sawit.jpg') }}" class="d-block w-100" alt="image 1">
                        </div>
                        <div class="carousel-item">
                            <img src="{{ asset('tampilan/dist/img/kelapa 2.jpg') }}" class="d-block w-100" alt="image 2">
                        </div>
                        <div class="carousel-item">
                            <img src="{{ asset('tampilan/dist/img/karet.jpg') }}" class="d-block w-100" alt="image 3">
                        </div>
                    </div>
                    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Previous</span>
                    </button>
                    <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Next</span>
                    </button>
                </div>

                <div class="row gx-5 justify-content-center mt-5">
                    <div class="col-lg-11 col-xl-9 col-xxl-8">
                        <div class="card overflow-hidden shadow rounded-4 border-0 mb-5">
                            <div class="card-body p-0">
                                <div class="d-flex flex-column flex-md-row align-items-center">
                                    <div class="p-5">
                                        <h4 class="fw-bolder">Dinas Perkebunan dan Peternakan Kabupaten Kubu Raya</h4>
                                        <p class="indent">DISBUNNAK memiliki 4 bidang yaitu bidang prasarana dan bina usaha, bidang produksi dan pembenihan, bidang perlindungan dan penyuluhan, bidang peternakan dan kesehatan hewan.                                                
                                        </p>
                                        <p>website ini menampilkan informasi dan visualisasi data perkebunan rakyat di kabupaten Kubu Raya yang di olah oleh bidang prasarana & bina usaha dan diperoleh dari penyuluh.</p>
                                    </div>
                                    
                                </div>
                            </div>
                        </div>
                        <!-- Project Card 1-->
                        <div class="card overflow-hidden shadow rounded-4 border-0 mb-5">
                            <div class="card-body p-0">
                                <div class="d-flex flex-column flex-md-row align-items-center">
                                    <div class="p-5">
                                        <h2 class="fw-bolder">Informasi 1</h2>
                                        <p>Mengunjungi lahan perkebunan kelapa dalam lokal pada kecamatan Batu Ampar</p>
                                    </div>
                                    <img class="img-fluid" src="{{ asset('tampilan/dist/img/batu-ampar.jpg') }}" alt="batuampar" style="width: 300px; height: 400px; object-fit: cover;" />
                                </div>
                            </div>
                        </div>
                        <!-- Project Card 2-->
                        <div class="card overflow-hidden shadow rounded-4 border-0 mb-5">
                            <div class="card-body p-0">
                                <div class="d-flex flex-column flex-md-row align-items-center">
                                    <div class="p-5">
                                        <h2 class="fw-bolder">Informasi 2</h2>
                                        <p>Mengunjungi lahan perkebunan karet pada kecamatan Sungai Ambawang</p>
                                    </div>
                                    <img class="img-fluid" src="{{ asset('tampilan/dist/img/sui ambawang.jpg') }}" alt="suiambawang" style="width: 300px; height: 400px; object-fit: cover;" />
                                </div>
                            </div>
                        </div>
                        <div class="card overflow-hidden shadow rounded-4 border-0">
                            <div class="card-body p-0">
                                <div class="d-flex flex-column flex-md-row align-items-center">
                                    <div class="p-5">
                                        <h2 class="fw-bolder">Informasi 3</h2>
                                        <p>Mengunjungi lahan perkebunan kelapa dalam lokal pada Desa Sungai Rengas Kecamatan Sungai Kakap</p>
                                    </div>
                                    <img class="img-fluid" src="{{ asset('tampilan/dist/img/biji kopi.jpg') }}" alt="suikakap" style="width: 600px; height: 400px; object-fit: cover;" />
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- Call to action section-->
        <section class="bg-custom-blue py-5 text-white">
            <div class="container px-5 my-5">
                <div class="row">
                    <div class="col-md-6 pr-md-4 mb-4 mb-md-0">
                        <div class="embed-responsive embed-responsive-16by9">
                            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d7973.93966702294!2d109.37872867236564!3d-0.18534050975907962!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e1d5cbbf2399161%3A0x46856816073e6655!2sJl.%20Adisucipto%20No.15%2C%20Arang%20Limbung%2C%20Kec.%20Sungai%20Raya%2C%20Kabupaten%20Kubu%20Raya%2C%20Kalimantan%20Barat%2078391!5e0!3m2!1sen!2sid!4v1652082326655!5m2!1sen!2sid" 
                                width="100%" height="350" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                        </div>
                    </div>
                    <div class="col-md-6 pl-md-4">
                        <div class="text-left text-md-left">
                            <h5 class="address">Alamat:</h5>
                            <p style="font-size: 16px; color: #73BBA3;" class="mb-4">Jl. Adi Sucipto No.15,2, Arang Limbung, Kec. Sungai Raya, Kabupaten Kubu Raya, Kalimantan Barat 78391</p>
                            <h5 class="address">Email:</h5>
                            <p style="font-size: 18px; color: #73BBA3;">disbunnak@kuburaya.go.id</p>
                            <h5 class="address">Telepon:</h5>
                            <p style="font-size: 18px; color: #73BBA3;">0561722381</p>
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
                <div class="col-auto"><div class="small m-0"> &copy; copy right by Rida Ramdayani</div></div>
            </div>
        </div>
    </footer>
    <!-- Bootstrap core JS-->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <!-- Core theme JS-->
    <script src="js/scripts.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/5.1.0/js/bootstrap.bundle.min.js"></script>
</body>
</html>
