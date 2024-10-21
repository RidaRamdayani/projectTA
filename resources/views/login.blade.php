<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Sipekara</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="{{ asset('tampilan/plugins/fontawesome-free/css/all.min.css') }}">
  <!-- icheck bootstrap -->
  <link rel="stylesheet" href="{{ asset('tampilan/plugins/icheck-bootstrap/icheck-bootstrap.min.css') }}">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{ asset('tampilan/dist/css/adminlte.min.css') }}">
  

    <style>
    .logo-container {
      display: flex;
      justify-content: center;
    }
    .text-gradient {
      background: -webkit-linear-gradient(315deg, #4F1787 0%, #3795BD 100%);
      -webkit-background-clip: text;
      -webkit-text-fill-color: transparent;
    }

    .bold-text {
      font-weight: bold;
    }
    </style>
</head>
<body class="hold-transition login-page">
<div class="login-box">
  <!-- /.login-logo -->
  <div class="card card-outline card-primary">
    <div class="card-header text-center">
        <!-- Tulisan DISBUNNAK di atas logo -->
        <div class="text-center">
          <!-- Logo di bawah tulisan -->
          <div class="logo-container">
            <img src="{{ asset('tampilan/dist/img/logo_KKR.png') }}" alt="Logo" style="width: 60px; height: auto;" class="mt-2">
          </div>
          <h2 class="display-5 fw-bolder bold-text"><span class="text-gradient d-inline">SIPEKARA</span></h2>
        </div>
    </div>
    <div class="card-body">
      <p class="login-box-msg">Masukkan Email dan Password Anda</p>

      <form action="/loginproses" method="post">
        @csrf
        <div class="input-group mb-3">
          <input type="email" class="form-control" name ="email" placeholder="Email">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-envelope"></span>
            </div>
          </div>
        </div>
        <div class="input-group mb-3">
          <input type="password" class="form-control" name ="password" placeholder="Password">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-8">
            <p class="mb-0">
              <a href="/" class="text-center">sipekara</a>
            </p>
          </div>
          <!-- /.col -->
          <div class="col-4">
            <button type="submit" class="btn btn-primary btn-block">Sign In</button>
          </div>
          <!-- /.col -->
        </div>
      </form>

      <!-- <p class="mb-0">
        <a href="/register" class="text-center">Register a new membership</a>
      </p> -->
    </div>
    <!-- /.card-body -->
  </div>
  <!-- /.card -->
</div>
<!-- /.login-box -->

<!-- jQuery -->
<script src="{{ asset('tampilan/plugins/jquery/jquery.min.js') }}"></script>
<!-- Bootstrap 4 -->
<script src="{{ asset('tampilan/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
<!-- AdminLTE App -->
<script src="{{ asset('tampilan/dist/js/adminlte.min.js') }}"></script>
</body>
</html>
