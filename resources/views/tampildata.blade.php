@extends('layout.admin')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-8">
            <div class="card">
                <div class="card-body">
                    <h2>Edit Data</h2>
                    <form action="{{ route('updatedata', $luasTanaman->id) }}" method="POST">
                        @csrf
                        @method('PUT')

                        <!-- Hidden Inputs for IDs -->
                        <input type="hidden" name="produksi_id" value="{{ $produksi->id }}">
                        <input type="hidden" name="petani_id" value="{{ $petani->id }}">

                        <div class="form-group">
                            <label for="periode">Periode</label>
                            <input type="date" name="periode" id="periode" class="form-control" value="{{ $luasTanaman->tahuns->periode }}" required>
                        </div>

                        <div class="form-group">
                            <label for="kecamatan_luas">Kecamatan</label>
                            <select name="kecamatan_id_luas" id="kecamatan_luas" class="form-control">
                                @foreach($kecamatans as $kecamatan)
                                    <option value="{{ $kecamatan->id }}" {{ $luasTanaman->kecamatan_id == $kecamatan->id ? 'selected' : '' }}>{{ $kecamatan->kecamatan }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="desa_luas">Desa</label>
                            <select name="desa_id_luas" id="desa_luas" class="form-control">
                                @foreach($desas as $desa)
                                    <option value="{{ $desa->id }}" {{ $luasTanaman->desa_id == $desa->id ? 'selected' : '' }}>{{ $desa->desa }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="komoditi_luas">Komoditi</label>
                            <select name="komoditi_id_luas" id="komoditi_luas" class="form-control">
                                @foreach($komoditis as $komoditi)
                                    <option value="{{ $komoditi->id }}" {{ $luasTanaman->komoditi_id == $komoditi->id ? 'selected' : '' }}>{{ $komoditi->komoditi }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="luas_tanaman_muda">Luas Tanaman Muda</label>
                            <input type="number" name="luas_tanaman_muda" id="luas_tanaman_muda" class="form-control" value="{{ $luasTanaman->luas_tanaman_muda }}" required>
                        </div>

                        <div class="form-group">
                            <label for="luas_tanaman_menghasilkan">Luas Tanaman Menghasilkan</label>
                            <input type="number" name="luas_tanaman_menghasilkan" id="luas_tanaman_menghasilkan" class="form-control" value="{{ $luasTanaman->luas_tanaman_menghasilkan }}" required>
                        </div>

                        <div class="form-group">
                            <label for="luas_tanaman_tua">Luas Tanaman Tua</label>
                            <input type="number" name="luas_tanaman_tua" id="luas_tanaman_tua" class="form-control" value="{{ $luasTanaman->luas_tanaman_tua }}" required>
                        </div>

                        <div class="form-group">
                            <label for="produksi">Produksi</label>
                            <input type="number" name="produksi" id="produksi" class="form-control" value="{{ $produksi ? $produksi->produksi : '' }}" required>
                        </div>

                        <div class="form-group">
                            <label for="petani">Petani</label>
                            <input type="number" name="petani" id="petani" class="form-control" value="{{ $petani ? $petani->petani : '' }}" required>
                        </div>

                        <button type="submit" class="btn btn-primary">Simpan</button>
                        <a href="{{ route('olahdata') }}" class="btn btn-secondary">Kembali</a>
                    </form>

                </div>
            </div>
        </div>
    </div>
</div>

<script>
    document.addEventListener('DOMContentLoaded',function(){
        var kecamatanSelect = document.getElementById('kecamatan_luas');
        var desaSelect = document.getElementById('desa_luas');

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
<!-- <script>
    document.addEventListener('DOMContentLoaded', function() {
        document.getElementById('periode').addEventListener('change', function() {
            const selectedDate = this.value;
            fetch(`/get-periode/${selectedDate}`)
                .then(response => response.json())
                .then(data => {
                    document.getElementById('periode-display').textContent = data.periode;
                });
        });
    });
</script> -->
@endsection
