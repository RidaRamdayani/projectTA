@extends('Layout.admin')

@section('content')
<div class="content-wrapper">
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <!-- Header content can be added here -->
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item active">Home</li>
                        <li class="breadcrumb-item"><a href="{{ route('notification.notifikasi') }}">Notifikasi</a></li>
                    </ol>
                </div>
            </div>
        </div>
    </div>

    <div class="container">
        @if (session('success'))
            <div class="alert alert-success" id="success-alert">{{ session('success') }}</div>
        @endif

        <h1>Pesan Masuk:</h1>

        @if ($contacts->isNotEmpty())
        <div class="table-responsive">
                <table class="table table-bordered table-sm"> <!-- Tambahkan table-sm untuk tabel yang lebih kecil -->
                    <thead>
                        <tr>
                            <th>Nama</th>
                            <th>Email</th>
                            <th>Kecamatan</th>
                            <th>Desa</th>
                            <th>Jenis</th>
                            <th>Pesan</th>
                            <th>Tanggal Masuk</th> <!-- Tambahkan kolom Tanggal Masuk -->
                            <th>Aksi</th> <!-- Kolom aksi -->
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($contacts as $contact)
                            <tr>
                                <td>{{ $contact->nama }}</td>
                                <td>{{ $contact->email }}</td>
                                <td>{{ $contact->kecamatan }}</td>
                                <td>{{ $contact->desa }}</td>
                                <td>{{ $contact->pelayanan }}</td>
                                <td>{{ $contact->pesan }}</td>
                                <td>{{ $contact->created_at->format('d-m-Y H:i') }}</td> <!-- Menampilkan tanggal masuk -->
                                <td class="d-flex">
                                    <a href="mailto:{{ $contact->email }}?subject=Respon%20Laporan%20Anda&body=Terima%20kasih%20atas%20laporan%20Anda.%20Berikut%20ini%20adalah%20respon%20kami%3A" class="btn btn-primary btn-sm" style="margin-right: 2px;"> <!-- Tambahkan inline CSS -->
                                        Balas
                                    </a>
                                    @if (!$contact->status_respon)
                                        <form action="{{ route('notification.respond', $contact->id) }}" method="POST" style="display:inline;">
                                            @csrf
                                            @method('PATCH')
                                            <button type="submit" class="btn btn-success btn-sm">Tandai Respon</button>
                                        </form>
                                    @else
                                        <span class="badge badge-success btn-sm">Sudah Direspon</span>
                                    @endif
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        @else
            <p>Tidak Ada Notifikasi Yang Masuk.</p>
        @endif
    </div>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        var successAlert = document.getElementById('success-alert');
        if (successAlert) {
            setTimeout(function() {
                successAlert.style.display = 'none';
            }, 3000); // Waktu dalam milidetik (3000 ms = 3 detik)
        }
    });
</script>
@endsection
