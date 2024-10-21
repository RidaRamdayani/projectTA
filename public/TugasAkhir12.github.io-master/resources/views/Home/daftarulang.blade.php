<!DOCTYPE html>
<html>

<head>
  <!-- Basic -->
  <meta charset="utf-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <!-- Mobile Metas -->
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
  <!-- Site Metas -->
  <meta name="keywords" content="" />
  <meta name="description" content="" />
  <meta name="author" content="" />
  <link rel="icon" href="images/logomidarulilmi.png" type="image/ico" />

  <title>daftarulang</title>

  <!-- bootstrap core css -->
  <link rel="stylesheet" type="text/css" href="../../css/bootstrap.css" />
  <link rel="stylesheet" type="text/css" href="path/to/your/style.css">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/2.10.2/umd/popper.min.js"></script>
  <!-- fonts style -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:400,700|Poppins:400,600,700&display=swap" rel="stylesheet" />
  <!-- Custom styles for this template -->
  <link href="../../css/style.css" rel="stylesheet" />
  <!-- responsive style -->
  <link href="../../css/responsive.css" rel="stylesheet" />
</head>

<body class="sub_page">
    <div class="right_col" role="main">
      <br>
        <h1 class="text-center mb-4">Formulir Daftar Ulang</h1>
            <div class="page-title">
                  <div class="row justify-content-center">
                  <div class="card">
                    <div class="card-body">
                      <form action="/insertdata" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="mb-3">
                          <label for="exampleInputEmail1" class="form-label">Nama Siswa</label>
                          <input type="text" name = "nama" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                        </div>
                        <div class="mb-3">
                          <label for="jeniskelamin" class="form-label">Jenis Kelamin</label>
                          <select class="form-select" name="jeniskelamin" id="jeniskelamin">
                            <option value="jeniskelamin">Jenis Kelamin</option>
                            <option value="laki-laki">Laki-Laki</option>
                            <option value="perempuan">perempuan</option>
                          </select>
                        </div>
                          <div class="mb-3">
                            <label for="kelas" class="form-label">Kelas</label>
                            <select id="kelas" name="kelas" class="form-select" aria-label="Default select example">
                            <option value="0" selected>Pilih kelas</option>
                            <option value="2">Kelas 2</option>
                            <option value="3">Kelas 3</option>
                            <option value="4">Kelas 4</option>
                            <option value="5">Kelas 5</option>
                            <option value="6">Kelas 6</option>
                            </select>
                          </div>
                          <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">Biaya Daftar Ulang</label>
                            <select class="form-select" name = "biaya" aria-label="Default select example">
                              <option selected>pilih Biaya</option>
                              <option value="550.000">Rp 550.000</option>
                              <option value="600.000">Rp 600.000</option>
                            </select>  
                            <small id="tanggalLahirHelp" class="form-text text-muted">Mohon Dibayar ke Bank yang disediakan</small>
                            <small id="tanggalLahirHelp" class="form-text text-muted">REK BRI = 7213.01.011141 53 6</small> 
                            <small id="tanggalLahirHelp" class="form-text text-muted">REK BCA = 4213.01.011141 53 6</small>                    
                        </div>
                        <button type="submit" class="btn btn-primary">Submit</button>
                        <a href="index" class="btn btn-danger">Kembali</a>
                      </form>
                      
                      @if(session('success'))
                      <div class="alert alert-success mt-4">
                          {{ session('success') }}
                      </div>
                      @endif
                  </div>
              </div>
          </div>
      </div>
  </div>
  <!-- contact section -->

 

  <!-- end contact section -->

  <!-- info section -->
 
  <!-- end info section -->

  <!-- footer section -->

  <!-- footer section -->

  <script type="text/javascript" src="js/jquery-3.4.1.min.js"></script>
  <script type="text/javascript" src="js/bootstrap.js"></script>

  </body>

</html>