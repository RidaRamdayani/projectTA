<nav class="navbar navbar-expand-lg navbar-light bg-white py-3">
    <div class="container px-2">
        <a class="navbar-brand">
            <img src="{{ asset('tampilan/dist/img/logo_KKR.png') }}" alt="Logo" style="height: 40px; margin-right: 10px;">
            <span class="fw-bolder text-primary">SIPEKARA</span>
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav ms-auto mb-2 mb-lg-0 small fw-bolder">
                <li class="nav-item">
                    <a class="nav-link {{ Request::is('/') ? 'active' : '' }}" href="{{ url('/') }}">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ Request::is('informasi') ? 'active' : '' }}" href="{{ url('/informasi') }}">Informasi</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ Request::is('hubungikami') ? 'active' : '' }}" href="{{ url('/hubungikami') }}">Hubungi Kami</a>
                </li>
            </ul>
        </div>
    </div>
</nav>

<style>
    .nav-link.active {
        background-color: #EBF4F6;
        font-weight: bold;
    }
</style>
