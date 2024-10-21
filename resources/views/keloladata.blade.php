@extends('Layout.admin')

@section('content')
<div class="content-wrapper">
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-3">
                <div class="col-sm-6">
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item active">Home</li>
                        <li class="breadcrumb-item"><a href="olahdata">Kelola Data</a></li>
                    </ol>
                </div>
            </div>
        </div>
    </div>

    <div class="container" style="margin-top: -30px;"> <!-- Mengurangi margin top container utama --> 
        <div class="row mb-3">
            <div class="col-auto">
                <a href="/tambahdata" class="btn btn-success btn-sm">Tambah Data</a>
            </div>
            <div class="col-auto">
                <button type="button" class="btn btn-info btn-sm" data-toggle="modal" data-target="#TambahKecamatan">
                    Tambah Kecamatan
                </button>
            </div>
            
            <div class="col-auto">
                <button type="button" class="btn btn-secondary btn-sm" data-toggle="modal" data-target="#TambahDesa">
                    Tambah Desa
                </button>
            </div>
            <div class="col-auto">
                <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#cetakPdfModal">
                    Cetak PDF
                </button>
            </div>
            
            <!-- <div class="col-auto">
                <button type="button" class="btn btn-warning btn-sm" data-toggle="modal" data-target="#importExcelModal">
                    Import Excel
                </button>
            </div> -->
        </div>

        @if (session('success'))
            <div class="alert alert-success" id="success-alert">{{ session('success') }}</div>
        @endif

        @if (session('warning'))
            <div class="alert alert-warning" id="warning-alert">{{ session('warning') }}</div>
        @endif

        <form action="{{ url('/olahdata') }}" method="GET" class="mb-3">
            <div class="row g-2 align-items-center">
                <div class="col-auto">
                    <select name="periode" id="periode" class="form-control form-control-sm">
                        <option value="">-Pilih Tahun-</option>
                        @foreach ($years as $year)
                            <option value="{{ $year }}" {{ request('periode') == $year ? 'selected' : '' }}>
                                {{ $year }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <div class="col-auto">
                    <select name="kecamatan" id="kecamatan" class="form-control form-control-sm">
                        <option value="">-Pilih Kecamatan-</option>
                        @foreach ($kecamatans as $kecamatan)
                            <option value="{{ $kecamatan->id }}" {{ request('kecamatan') == $kecamatan->id ? 'selected' : '' }}>
                                {{ $kecamatan->kecamatan }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <div class="col-auto">
                    <select name="desa" id="desa" class="form-control form-control-sm">
                        <option value="">-Pilih Desa-</option>
                    </select>
                </div>

                <div class="col-auto">
                    <input type="search" name="search" id="search" class="form-control form-control-sm" placeholder="Cari Komoditi" value="{{ request('search') }}">
                </div>
                <div class="col-auto">
                    <button type="submit" class="btn btn-primary btn-sm">Filter</button>
                </div>
                <div class="col-auto">
                    <a href="{{ url('/olahdata') }}" class="btn btn-secondary btn-sm">Reset</a>
                </div>
            </div>
            <div class="mt-3">
                <p><strong>Kecamatan:</strong> {{ $currentKecamatan }} <strong>Desa:</strong> {{ $currentDesa }}</p>
            </div>
        </form>
        <div class="table-responsive">
            <table class="table mt-2 table-sm">
                <thead class="table-secondary">
                    <tr style="text-align: center;">
                        <th scope="col">No</th>
                        <th scope="col">Komoditi</th>
                        <th scope="col">Luas Tanaman Muda</th>
                        <th scope="col">Luas Tanaman Menghasilkan</th>
                        <th scope="col">Luas Tanaman Tua</th>
                        <th scope="col">Jumlah</th>
                        <th scope="col">Produksi(ton)</th>
                        <th scope="col">Rata Rata(Kg)</th>
                        <th scope="col">Petani</th>
                        <th scope="col">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($paginatedData as $index => $row)
                        <tr style="text-align: center;">
                            <th scope="row">{{ $index + 1 }}</th>
                            <td style="text-align:left">{{ $row->komoditi }}</td>
                            <td>{{ $row->luas_tanaman_muda }}</td>
                            <td>{{ $row->luas_tanaman_menghasilkan }}</td>
                            <td>{{ $row->luas_tanaman_tua }}</td>
                            <td>{{ $row->jumlah }}</td>
                            <td>{{ $row->produksi }}</td>
                            <td>{{ $row->rata_rata }}</td>
                            <td>{{ $row->petani }}</td>
                            <td class="text-nowrap">
                                <a href="/tampilkandata/{{ $row->id }}" class="btn btn-info btn-sm">Edit</a>
                                <form action="{{ route('hapusdata', $row->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Apakah Anda yakin ingin menghapus data ini?');">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>

            <div class="d-flex justify-content-left mt-3">
                {{ $paginatedData->links() }}
            </div>
        </div>

    </div>
</div>

<!-- Cetak PDF Modal -->
<div class="modal fade" id="cetakPdfModal" tabindex="-1" role="dialog" aria-labelledby="cetakPdfModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="cetakPdfModalLabel">Konfirmasi Cetak PDF</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="{{ route('cetakpdf') }}" method="GET">
        <div class="modal-body">
          <p>Apakah Anda yakin ingin mencetak PDF dengan data berikut?</p>
          <div class="form-group">
            <label for="modalPeriode">Tahun</label>
            <select name="periode" id="modalPeriode" class="form-control">
                <option value="">-Pilih Tahun-</option>
                @foreach ($years as $year)
                    <option value="{{ $year }}">{{ $year }}</option>
                @endforeach
            </select>
          </div>
          <div class="form-group">
            <label for="modalKecamatan">Kecamatan</label>
            <select name="kecamatan" id="modalKecamatan" class="form-control">
                <option value="">Pilih Kecamatan</option>
                @foreach ($kecamatans as $kec)
                    <option value="{{ $kec->id }}">{{ $kec->kecamatan }}</option>
                @endforeach
            </select>
          </div>
          <div class="form-group">
            <label for="modalDesa">Desa</label>
            <select name="desa" id="modalDesa" class="form-control">
                <option value="">-Pilih Desa-</option>
                @foreach ($desas as $desa)
                    <option value="{{ $desa->id }}">{{ $desa->desa }}</option>
                @endforeach
            </select>
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
          <button type="submit" class="btn btn-primary">Cetak</button>
        </div>
      </form>
    </div>
  </div>
</div>

<!-- Tambah Kecamatan -->
<div class="modal fade" id="TambahKecamatan" tabindex="-1" role="dialog" aria-labelledby="cetakPdfModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="cetakPdfModalLabel">Tambah Kecamatan</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="{{ route('tambahkecamatan') }}" method="POST">
        @csrf
        <div class="modal-body">
          <input class="form-control" type="text" name="kecamatan" placeholder="Tambah Kecamatan" aria-label="default input example">
        </div>
        <div class="modal-footer">
          <button type="submit" class="btn btn-primary">Simpan</button>
        </div>
      </form>
    </div>
  </div>
</div>

<!-- Tambah Desa -->
<div class="modal fade" id="TambahDesa" tabindex="-1" role="dialog" aria-labelledby="cetakPdfModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="cetakPdfModalLabel">Tambah Desa</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="{{ route('tambahdesa') }}" method="POST">
        @csrf
        <div class="modal-body">
          <div class="form-group">
            <select name="kecamatan_id" id="modalKecamatan" class="form-control">
                <option value="">Pilih Kecamatan</option>
                @foreach ($kecamatans as $kec)
                    <option value="{{ $kec->id }}">{{ $kec->kecamatan }}</option>
                @endforeach
            </select>
          </div>
          <div class="form-group">
            <input class="form-control" type="text" name="desa" placeholder="Tambah Desa" aria-label="default input example">
          </div>
        </div>
        <div class="modal-footer">
          <button type="submit" class="btn btn-primary">Simpan</button>
        </div>
      </form>
    </div>
  </div>
</div>


<!-- dropdown desa by kecamatan -->
<script>
    document.addEventListener('DOMContentLoaded', function() {
        var kecamatanSelect = document.getElementById('kecamatan');
        var desaSelect = document.getElementById('desa');

        // Function to populate desa options
        function populateDesaOptions(desas, selectedDesa) {
            desaSelect.innerHTML = '<option value="">-Pilih Desa-</option>'; // Reset pilihan desa
            desas.forEach(desa => {
                var option = document.createElement('option');
                option.value = desa.id;
                option.textContent = desa.desa;
                if (desa.id == selectedDesa) {
                    option.selected = true; // Set as selected if it matches
                }
                desaSelect.appendChild(option);
            });
        }

        // Handle kecamatan change event
        kecamatanSelect.addEventListener('change', function() {
            var kecamatanId = kecamatanSelect.value;

            if (kecamatanId) {
                fetch('/getDesas/' + kecamatanId)
                    .then(response => {
                        console.log('Fetch response received:', response); // Log response fetch
                        return response.json();
                    })
                    .then(data => {
                        var selectedDesa = '{{ request('desa') }}'; // Get selected desa from request
                        populateDesaOptions(data, selectedDesa); // Populate desa options
                    })
                    .catch(error => {
                        console.error('Error during fetch:', error); // Log jika ada kesalahan
                    });
            } else {
                desaSelect.innerHTML = '<option value="">-Pilih Desa-</option>';
            }
        });

        // On page load, if a kecamatan is selected, fetch and populate desa options
        var initialKecamatan = '{{ request('kecamatan') }}';
        var initialDesa = '{{ request('desa') }}';
        if (initialKecamatan) {
            fetch('/getDesas/' + initialKecamatan)
                .then(response => {
                    console.log('Fetch response received:', response); // Log response fetch
                    return response.json();
                })
                .then(data => {
                    populateDesaOptions(data, initialDesa); // Populate desa options
                })
                .catch(error => {
                    console.error('Error during fetch:', error); // Log jika ada kesalahan
                });
        }
    });
</script>

<!-- script drodown cetakpdf -->
<script>
    document.addEventListener('DOMContentLoaded',function(){
        var kecamatanSelect = document.getElementById('modalKecamatan');
        var desaSelect = document.getElementById('modalDesa');

        kecamatanSelect.addEventListener('change', function(){
            var kecamatanId = kecamatanSelect.value;
            // console.log('Kecamatan selected:', kecamatanId);

            if (kecamatanId) {
                fetch('/getDesas/'+ kecamatanId)
                .then(response => {
                    console.log('Fetch response received:', response); // Log respon fetch
                    return response.json();
                })
                .then(data => {
                    desaSelect.innerHTML = '<option value="">Pilih Desa</option>'; // Reset pilihan desa
                    data.forEach(desa => {
                        var option = document.createElement('option');
                        option.value = desa.id; // Asumsikan ada kunci 'id' untuk nilai option
                        option.textContent = desa.desa; // Asumsikan ada kunci 'namaDesa' untuk teks option
                        desaSelect.appendChild(option);
                    });
                })
                .catch(error => {
                    console.error('Error during fetch:', error); // Log jika ada kesalahan
                });

            } else {
                desaSelect.innerHTML = '<option value="">Pilih Desa</option>';
            }
        });
    });
</script>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        var successAlert = document.getElementById('success-alert');
        var warningAlert = document.getElementById('warning-alert');

        if (successAlert) {
            setTimeout(function() {
                successAlert.style.display = 'none';
            }, 3000); // Waktu dalam milidetik (3000 ms = 3 detik)
        }

        if (warningAlert) {
            setTimeout(function() {
                warningAlert.style.display = 'none';
            }, 3000); // Waktu dalam milidetik (3000 ms = 3 detik)
        }
    });
</script>


@endsection