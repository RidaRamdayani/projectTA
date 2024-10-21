@extends('layout.admin')

@section('content')
<body>
    
<h1 class="text-center mb-4">Tambah Data Desa</h1>

<div class="container">
    <div class="row justify-content-center">
        <div class="col-10">
            <div class="card">
                <div class="card-body">
                    <h2>Tambah Desa</h2>
                    <form action="{{ route('insertdata') }}" method="POST">
                        @csrf
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="periode">Periode</label>
                                    <input type="date" name="periode" id="periode" class="form-control">
                                </div>

                                <div class="form-group">
                                    <label for="kecamatan_id">Kecamatan</label>
                                    <select name="kecamatan_id" id="kecamatan_id" class="form-control">
                                        @foreach($kecamatans as $kecamatan)
                                            <option value="{{ $kecamatan->id }}">{{ $kecamatan->kecamatan }}</option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="form-group">
                                    <label for="desa_id">Desa</label>
                                    <select name="desa_id" id="desa_id" class="form-control">
                                        @foreach($desas as $desa)
                                            <option value="{{ $desa->id }}">{{ $desa->desa }}</option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="form-group">
                                    <label for="komoditi_id">Komoditi</label>
                                    <select name="komoditi_id" id="komoditi_id" class="form-control">
                                        @foreach($komoditis as $komoditi)
                                            <option value="{{ $komoditi->id }}">{{ $komoditi->komoditi }}</option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="form-group">
                                    <label for="luas_tanaman_muda">Luas Tanaman Muda</label>
                                    <input type="number" name="luas_tanaman_muda" id="luas_tanaman_muda" class="form-control" required>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="luas_tanaman_menghasilkan">Luas Tanaman Menghasilkan</label>
                                    <input type="number" name="luas_tanaman_menghasilkan" id="luas_tanaman_menghasilkan" class="form-control" required>
                                </div>

                                <div class="form-group">
                                    <label for="luas_tanaman_tua">Luas Tanaman Tua</label>
                                    <input type="number" name="luas_tanaman_tua" id="luas_tanaman_tua" class="form-control" required>
                                </div>

                                <div class="form-group">
                                    <label for="produksi">Produksi</label>
                                    <input type="number" name="produksi" id="produksi" class="form-control" required>
                                </div>

                                <div class="form-group">
                                    <label for="petani">Petani</label>
                                    <input type="number" name="petani" id="petani" class="form-control" required>
                                </div>
                            </div>
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
        var kecamatanSelect = document.getElementById('kecamatan_id');
        var desaSelect = document.getElementById('desa_id');

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
<!--   <script>
    document.addEventListener('DOMContentLoaded', function() {
        const kecamatanSelect = document.getElementById('kecamatan_id');
        const desaSelect = document.getElementById('desa_id');
        
        kecamatanSelect.addEventListener('change', function() {
            const kecamatanId = this.value;
            
            if (kecamatanId) {
                fetch(`/getDesas/${kecamatanId}`)
                    .then(response => response.json())
                    .then(data => {
                        desaSelect.innerHTML = '<option value="">Pilih Desa</option>';
                        data.forEach(desa => {
                            desaSelect.innerHTML += `<option value="${desa.id}">${desa.desa}</option>`;
                        });
                    });
            } else {
                desaSelect.innerHTML = '<option value="">Pilih Desa</option>';
            }
        });
    });
</script> -->


    <!-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <script>
    document.getElementById('kecamatan').addEventListener('change', function() {
        var kecamatan = this.value;
        var desaDropdown = document.getElementById('desa');
        // Bersihkan dropdown desa
        desaDropdown.innerHTML = '<option selected disabled>Pilih desa</option>';
        // Tambahkan opsi desa sesuai kecamatan yang dipilih
        if (kecamatan === 'Batu Ampar') {
            desaDropdown.innerHTML += '<option value="Tanjung Harapan">Tanjung Harapan</option>' +
                                      '<option value="Sungai Jawi">Sungai Jawi</option>'+                                    
                                      '<option value="Sungai Besar">Sungai Besar</option>'+
                                      '<option value="Ambarawa">Ambarawa</option>'+
                                      '<option value="Tasikmalaya">Tasikmalaya</option>'+
                                      '<option value="Padang Tikar 1">Padang Tikar 1</option>'+
                                      '<option value="Padang Tikar 2">Padang Tikar 2</option>'+
                                      '<option value="Medan Mas">Medan Mas</option>'+
                                      '<option value="Nipah Panjang">Nipah Panjang</option>'+
                                      '<option value="Teluk Nibung">Teluk Nibung</option>'+
                                      '<option value="Batu Ampar">Batu Ampar</option>'+
                                      '<option value="Sungai Kerawang">Sungai Kerawang</option>'+
                                      '<option value="Sumber Agung">Sumber Agung</option>'+
                                      '<option value="Muara Tiga">Muara Tiga</option>'+
                                      '<option value="Tanjung Beringin">Tanjung Beringin</option>';
        } else if (kecamatan === 'Kuala Mandor B') {
            desaDropdown.innerHTML += '<option value="Kuala Mandor A">Kuala Mandor A</option>' +
                                      '<option value="Kuala Mandor B">Kuala Mandor B</option>'+
                                      '<option value="Sungai Enau">Desa Retok</option>'+
                                      '<option value="Kubu Padi">Kubu Padi</option>';
        }
        // Tambahkan opsi desa untuk kecamatan lainnya di sini
    });
    </script> -->
</body>
@endsection
