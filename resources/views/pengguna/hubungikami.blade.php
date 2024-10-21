<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content />
        <meta name="author" content />
        <title>Hubungi-Sipekara</title>
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
        <style>
            .bg-custom-blue-wrapper {
                display: flex;
                justify-content: center;
            }
            .bg-custom-blue {
                background-color: #EEEEEE;
                padding: 3rem;
                border-radius: 1rem;
                max-width: 800px;
                width: 100%;
            }
            .bg-custom-blue .container {
                background-color: white;
                border-radius: 4px;
                padding: 2rem;
            }
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
        </style>
    </head>
    <body class="d-flex flex-column">
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
            <!-- Page content-->
            <section class="py-5">
                <div class="container px-5">
                    <!-- Tambahkan pesan sukses di sini -->
                    @if (session('success'))
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            {{ session('success') }}
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    @endif

                    <div class="bg-custom-blue-wrapper">
                        <!-- Contact form -->
                        <div class="bg-custom-blue rounded-4 py-5 px-4 px-md-5">
                            <div class="text-center mb-5">
                                <h1 class="fw-bolder">Hubungi Kami</h1>
                                <p class="lead fw-normal text-muted mb-0">Sampaikan aduan atau laporan anda melalui form di bawah!</p>
                            </div>
                            <div class="row gx-5 justify-content-center">
                                <div class="col-lg-8 col-xl-6">
                                <form id="contactForm" action="{{ route('contact.submit') }}" method="POST">
                                    @csrf
                                    <div class="form-floating mb-3">
                                        <input class="form-control" id="nama" name="nama" type="text" placeholder="Enter your name..." data-sb-validations="required" />
                                        <label for="nama">Nama</label>
                                    </div>
                                    <div class="form-floating mb-3">
                                        <input class="form-control" id="email" name="email" type="email" placeholder="name@example.com" data-sb-validations="required,email" />
                                        <label for="email">Email address</label>
                                    </div>
                                    <div class="form-floating mb-3">
                                        <input class="form-control" id="kecamatan" name="kecamatan" type="text" placeholder="Enter your kecamatan..." data-sb-validations="required" />
                                        <label for="kecamatan">Kecamatan</label>
                                    </div>
                                    <div class="form-floating mb-3">
                                        <input class="form-control" id="desa" name="desa" type="text" placeholder="Enter your desa..." data-sb-validations="required" />
                                        <label for="desa">Desa</label>
                                    </div>
                                    <div class="form-group mb-3">
                                        <select id="jenis_pelayanan" name="pelayanan" class="form-control">
                                            <option value="">- Pilih Jenis Aduan -</option>
                                            <option value="Konsultasi Pengajuan Bantuan Bibit">Pengajuan Bantuan Bibit</option>
                                            <option value="Permohonan Mediasi">Permohonan Mediasi</option>
                                            <option value="Pencegahan & Penanggulangan Hama/Penyakit">Pencegahan & Penanggulangan Hama/Penyakit</option>
                                            <option value="Aduan atau Laporan Lainnya">Aduan atau Laporan Lainnya</option>
                                        </select>
                                    </div>
                                    <div class="form-floating mb-3">
                                        <textarea class="form-control" id="pesan" name="pesan" type="text" placeholder="Enter your message here..." style="height: 10rem" data-sb-validations="required"></textarea>
                                        <label for="pesan">Pesan</label>
                                    </div>
                                    <div class="d-grid">
                                        <button class="btn btn-primary btn-lg" id="submitButton" type="submit">Submit</button>
                                    </div>
                                </form>
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
                    <div class="col-auto"><div class="small m-0"> &copy;copyright by Rida Ramdayani</div></div>
                </div>
            </div>
        </footer>
        <!-- Bootstrap core JS-->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
        <!-- Core theme JS-->
        <script src="js/scripts.js"></script>

        
    </body>
</html>
