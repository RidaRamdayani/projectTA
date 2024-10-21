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

  <title>formulirpendaftaran</title>

  <!-- bootstrap core css -->
  <link rel="stylesheet" type="text/css" href="../../css/bootstrap.css" />
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
            <h1 class="text-center mb-4">Formulir Pendaftaran Peserta Didik Baru</h1>
              <div class="page-title d-flex justify-content-between">
                <div class="card">
                  <!-- Data Siswa -->
                  <div class="card-body">
                    <h2 class="text-center mb-4">Data Siswa</h2>
                      <form action="/insertdataform" method="POST" enctype="multipart/form-data">
                          @csrf
                          <div class="mb-3">
                              <label for="namasiswa" class="form-label">Nama Calon Siswa</label>
                              <input type="text" name="namasiswa" class="form-control" id="namasiswa">
                          </div>
                          <div class="mb-3">
                              <label for="tempatTanggalLahir" class="form-label">Tempat Tanggal Lahir</label>
                              <input type="text" name="tempatLahir" class="form-control" id="tempatTanggalLahir">
                              <input type="date" name="tanggalLahir" class="form-control mt-2" id="tanggalLahir">
                              <small id="tanggalLahirHelp" class="form-text text-muted">Di Bawah Umur 6 Tahun Tidak Dapat Mendaftar.</small>
                            </div>
                            
                            <script>
                              document.getElementById("tanggalLahir").addEventListener("change", function() {
                                var selectedDate = new Date(this.value);
                                var currentDate = new Date();
                                var minAllowedDate = new Date("2018-01-01"); // Tanggal minimum yang diizinkan
                            
                                if (selectedDate > currentDate) {
                                  alert("Tanggal lahir tidak bisa di masukkan!");
                                  this.value = ""; // Mengosongkan tanggal
                                } else if (selectedDate > minAllowedDate) {
                                  alert("Di Bawah Umur 6 Tahun Tidak Dapat Mendaftar.");
                                  this.value = ""; // Mengosongkan tanggal
                                }
                              });
                            </script>                           
                            <div class="mb-3">
                              <label for="agama" class="form-label">Agama</label>
                              <select class="form-select" name="agama" id="agama">
                                <option selected>Agama</option>
                                <option value="islam">Islam</option>
                                <option value="kristen">Kristen</option>
                                <option value="protestan">Protestan</option>
                                <option value="buddha">Buddha</option>
                              </select>
                            </div>
                            <div class="mb-3">
                              <label for="golonganDarah" class="form-label">Golongan Darah</label>
                              <select class="form-select" name="golonganDarah" id="golonganDarah">
                                <option selected>Darah</option>
                                <option value="A">A</option>
                                <option value="B">B</option>
                                <option value="O">O</option>
                                <option value="AB">AB</option>
                              </select>
                            </div>
                            <div class="mb-3">
                              <label for="anakKe" class="form-label">Anak Ke</label>
                              <select class="form-select" name="anakKe" id="anakKe">
                                <option selected>Anak</option>
                                <option value="1">1</option>
                                <option value="2">2</option>
                                <option value="3">3</option>
                                <option value="4">4</option>
                                <option value="5">5</option>
                              </select>
                              <label for="dari" class="form-label">Dari</label>
                              <select class="form-select" name="dari" id="dari">
                                <option selected>Dari</option> 
                                <option value="2">2 Bersaudara</option>
                                <option value="3">3 Bersaudara</option>
                                <option value="4">4 Bersaudara</option>
                                <option value="5">5 Bersaudara</option>
                              </select>
                            </div>
                            <div class="mb-3">
                              <label for="statusDalamKeluarga" class="form-label">Status Dalam Keluarga</label>
                              <select class="form-select" name="status" id="status">
                                <option selected>Status</option>
                                <option value="anakkandung">Anak Kandung</option>
                                <option value="anaktiri">Anak Tiri</option>
                                <option value="anakangkat">Anak Angkat</option>
                              </select>
                            </div>
                            <div class="mb-3">
                              <label for="alamat" class="form-label">Alamat </label>
                              <input type="text" name="alamat" class="form-control" id="alamat">
                              <div class="row">
                                <div class="col">  
                                  <select class="form-select" name="rt" id="rt">
                                    <option selected>RT</option>
                                    <option value="rt">1</option>
                                    <option value="rt">2</option>
                                    <option value="rt">3</option>
                                    <option value="rt">4</option>
                                    <option value="rt">5</option>
                                  </select>
                                </div>
                                <div class="col"> 
                                  <select class="form-select" name="rw" id="rw">
                                    <option selected>RW</option>
                                    <option value="rt">1</option>
                                    <option value="rt">2</option>
                                    <option value="rt">3</option>
                                    <option value="rt">4</option>
                                    <option value="rt">5</option>
                                  </select>
                                </div>
                              </div>
                            </div>
                            <div class="mb-3">
                              <label for="kewarganegaraan" class="form-label">Kewarganegaraan</label>
                              <select class="form-select" name="kewarganegaraan" id="kewarganegaraan">
                                <option selected>Kewarganegaraan</option>
                                <option value="wni">WNI</option>
                                <option value="wna">WNA</option>
                              </select>
                            {{-- </div> 
                      </form>
                  </div>
              </div>
          </div>
      </div>

                <!-- Data Orang Tua Siswa -->
                <div class="card">
                  <!-- Data Orang Tua Siswa -->
                  <div class="card-body">
                    <h3 class="text-center mb-4">Data Orang Tua Siswa</h3>
                      <form action="/insertdata" method="POST" enctype="multipart/form-data">
                          @csrf --}}
                          
                          <h3 class="text-center mb-4">Data Orang Tua Siswa</h3>

                          <div class="row mb-3">
                              <div class="col-md-6">
                                  <label for="namaAyah" class="form-label">Nama Ayah</label>
                                  <input type="text" name="namaAyah" class="form-control" id="namaAyah">
                              </div>
                              <div class="col-md-6">
                                  <label for="namaIbu" class="form-label">Nama Ibu</label>
                                  <input type="text" name="namaIbu" class="form-control" id="namaIbu">
                              </div>
                          </div>
                          <div class="mb-3">
                            <label for="alamat" class="form-label">Alamat Orang Tua</label>
                            <input type="text" name="alamat" class="form-control" id="alamat">
                            <div class="row">
                              <div class="col">  
                                <select class="form-select" name="rt" id="rt">
                                  <option selected>RT</option>
                                  <option value="rt">1</option>
                                  <option value="rt">2</option>
                                  <option value="rt">3</option>
                                  <option value="rt">4</option>
                                  <option value="rt">5</option>
                                </select>
                              </div>
                              <div class="col"> 
                                <select class="form-select" name="rw" id="rw">
                                  <option selected>RW</option>
                                  <option value="rt">1</option>
                                  <option value="rt">2</option>
                                  <option value="rt">3</option>
                                  <option value="rt">4</option>
                                  <option value="rt">5</option>
                                </select>
                              </div>
                            </div>
                          </div>
                          <div class="row mb-3">
                          <div class="col-md-6">
                            <label for="agama" class="form-label">Agama Ayah</label>
                            <select class="form-select" name="agama" id="agama">
                              <option value="agama">Agama</option>
                              <option value="islam">Islam</option>
                              <option value="kristen">Kristen</option>
                              <option value="protestan">Protestan</option>
                              <option value="buddha">Buddha</option>
                            </select>
                          </div>
                          <div class="col-md-6">
                            <label for="agama" class="form-label">Agama Ibu</label>
                            <select class="form-select" name="agama" id="agama">
                              <option value="agama">Agama</option>
                              <option value="islam">Islam</option>
                              <option value="kristen">Kristen</option>
                              <option value="protestan">Protestan</option>
                              <option value="buddha">Buddha</option>
                            </select>
                          </div>
                        </div>  
                        <div class="mb-3">
                          <label for="nomorTelepon" class="form-label">Nomor Telepon</label>
                          <input type="tel" name="nomorTelepon" class="form-control" id="nomorTelepon" placeholder="Contoh: 081234567890">
                        </div>
                          <div class="row mb-3">
                              <div class="col-md-6">
                                  <label for="pekerjaanAyah" class="form-label">Pekerjaan Ayah</label>
                                  <select class="form-select" name="pekerjaanayah" id="pekerjaanayah">
                                    <div class="col"> 
                                    <option selected>Pekerjaan</option>
                                    <option value="pegawaikantor">Pegawai kantor</option>
                                    <option value="petani">Petani</option>
                                    <option value="dokter">Dokter</option>
                                    <option value="pengusaha">Pengusaha</option>
                                    <option value="pns">PNS</option>
                                    <option value="pengacara">Pengacara</option>
                                    <option value="pilot">Pilot</option>
                                    <option value="polisi">Polisi</option>
                                    <option value="tni">TNI</option>
                                    <option value="petani">Petani</option>
                                    <option value="wiraswasta">Wiraswasta</option>
                                    <option value="lainnya">Lainnya</option>
                                  </select>
                              </div>
                              <div class="col-md-6">
                                  <label for="pekerjaanIbu" class="form-label">Pekerjaan Ibu</label>
                                  <select class="form-select" name="pekerjaanibu" id="pekerjaanibu">
                                    <div class="col"> 
                                    <option selected>Pekerjaan</option>
                                    <option value="iburumahtangga">Ibu Rumah Tangga</option>
                                    <option value="pegawaikantor">Pegawai kantor</option>
                                    <option value="petani">Petani</option>
                                    <option value="dokter">Dokter</option>
                                    <option value="pengusaha">Pengusaha</option>
                                    <option value="pns">PNS</option>
                                    <option value="pengacara">Pengacara</option>
                                    <option value="pilot">Pilot</option>
                                    <option value="polisi">Polisi</option>
                                    <option value="tni">TNI</option>
                                    <option value="petani">Petani</option>
                                    <option value="wiraswasta">Wiraswasta</option>
                                    <option value="lainnya">Lainnya</option>
                                  </select>
                              </div>
                          </div>
                          <div class="row mb-3">
                              <div class="col-md-6">
                                  <label for="pendidikanAyah" class="form-label">Pendidikan Ayah</label>
                                  <select class="form-select" name="pendidikanayah" id="pendidikanayah">
                                    <div class="col"> 
                                    <option selected>Pendidikan</option>
                                    <option value="tidaksekolah">Tidak Sekolah</option>
                                    <option value="tk">TK</option>
                                    <option value="sd">SD</option>
                                    <option value="smp">SMP</option>
                                    <option value="sma">SMA</option>
                                    <option value="smk">SMK</option>
                                    <option value="d1">D1</option>
                                    <option value="d2">D2</option>
                                    <option value="d3">D3</option>
                                    <option value="s1">S1</option>
                                    <option value="s2">S2</option>
                                    <option value="s3">S3</option>
                                    <option value="lainnya">Lainnya</option>
                                  </select> 
                                </div> 
                              <div class="col-md-6">
                                  <label for="pendidikanIbu" class="form-label">Pendidikan Ibu</label>
                                  <select class="form-select" name="pendidikanibu" id="pendidikanibu">
                                    <div class="col"> 
                                    <option selected>Pendidikan</option>
                                    <option value="tidaksekolah">Tidak Sekolah</option>
                                    <option value="tk">TK</option>
                                    <option value="sd">SD</option>
                                    <option value="smp">SMP</option>
                                    <option value="sma">SMA</option>
                                    <option value="smk">SMK</option>
                                    <option value="d1">D1</option>
                                    <option value="d2">D2</option>
                                    <option value="d3">D3</option>
                                    <option value="s1">S1</option>
                                    <option value="s2">S2</option>
                                    <option value="s3">S3</option>
                                    <option value="lainnya">Lainnya</option>
                                  </select>
                              </div>
                          </div>
                          <div class="mb-3">
                            <label for="penghasilanorangtua" class="form-label">Penghasilan Orang Tua</label>
                            <select class="form-select" name="penghasilanorangtua" id="penghasilanorangtua">
                              <option selected>Penghasilan</option>
                              <option value="rp1."> &lt; Rp.1.000.000 </option>
                              <option value="rp1.2">Rp.1.000.000 - Rp.2.000.000</option>
                              <option value="rp1.2">Rp.2.000.000 - Rp.3.000.000</option>
                              <option value="rp1.2">Rp.3.000.000 - Rp.4.000.000</option>
                              <option value="rp1.2">&gt; Rp.5.000.000</option>
                            </select>
                          </div>
                      {{-- </form>
                  </div>
              </div>
          </div>
      </div>
      
          <!-- Data data wali siswa -->
          <div class="page-title d-flex justify-content-between">
            <div class="card">
              <!-- Data Wali Siswa -->
              <div class="card-body">
                <h2 class="text-center mb-4">Data Wali Siswa</h2>
                  <form action="/insertdata" method="POST" enctype="multipart/form-data">
                      @csrf --}}
                      <h2 class="text-center mb-4">Data Wali Siswa</h2>
 
                      <div class="mb-3">
                          <label for="nama" class="form-label">Nama Wali</label>
                          <input type="text" name="nama" class="form-control" id="nama">
                      </div>                           
                        <div class="mb-3">
                          <label for="agama" class="form-label">Agama</label>
                          <select class="form-select" name="agama" id="agama">
                            <option value="islam">Islam</option>
                            <option value="kristen">Kristen</option>
                            <option value="protestan">Protestan</option>
                            <option value="buddha">Buddha</option>
                          </select>
                        </div>
                        <div class="mb-3">
                          <label for="alamat" class="form-label">Alamat </label>
                          <input type="text" name="alamat" class="form-control" id="alamat">
                          <div class="row">
                            <div class="col">  
                              <select class="form-select" name="rt" id="rt">
                                <option selected>RT</option>
                                <option value="rt">1</option>
                                <option value="rt">2</option>
                                <option value="rt">3</option>
                                <option value="rt">4</option>
                                <option value="rt">5</option>
                              </select>
                            </div>
                            <div class="col"> 
                              <select class="form-select" name="rw" id="rw">
                                <option selected>RW</option>
                                <option value="rt">1</option>
                                <option value="rt">2</option>
                                <option value="rt">3</option>
                                <option value="rt">4</option>
                                <option value="rt">5</option>
                              </select>
                            </div>
                          </div>
                        </div>
                        <div class="mb-3">
                          <label for="nomorTelepon" class="form-label">Nomor Telepon</label>
                          <input type="tel" name="nomorTelepon" class="form-control" id="nomorTelepon" placeholder="Contoh: 081234567890">
                        </div>
                        <div class="mb-3">
                          <label for="pekerjaanIbu" class="form-label">Pekerjaan Wali</label>
                          <select class="form-select" name="pekerjaanibu" id="pekerjaanibu">
                            <div class="col"> 
                            <option selected>Pekerjaan</option>
                            <option value="pegawaikantor">Pegawai kantor</option>
                            <option value="petani">Petani</option>
                            <option value="dokter">Dokter</option>
                            <option value="pengusaha">Pengusaha</option>
                            <option value="pns">PNS</option>
                            <option value="pengacara">Pengacara</option>
                            <option value="pilot">Pilot</option>
                            <option value="polisi">Polisi</option>
                            <option value="tni">TNI</option>
                            <option value="petani">Petani</option>
                            <option value="wiraswasta">Wiraswasta</option>
                            <option value="lainnya">Lainnya</option>
                          </select>
                        </div> 
                  {{-- </form>
              </div>
          </div>
      </div>
  </div>

        <!-- Informasi Khusus Siswa -->
          <div class="card">
            <!-- Informasi Khusus Siswa -->
            <div class="card-body">
              <h2 class="text-center mb-5">Informasi Khusus Siswa</h2>
                <form action="/insertdata" method="POST" enctype="multipart/form-data">
                    @csrf                           --}}
                    <h2 class="text-center mb-5">Informasi Khusus Siswa</h2>

                      <div class="mb-3">
                        <label for="agama" class="form-label">Jarak Rumah Ke Sekolah</label>
                        <select class="form-select" name="agama" id="agama">
                          <option selected>Jarak</option>
                          <option value="1km">&lt; 1 KiloMeter </option>
                          <option value="2km">2 KiloMeter - 3 KiloMeter</option>
                          <option value="3km">3 KiloMeter - 4 KiloMeter</option>
                          <option value="4km">&gt; 5 KiloMeter</option>
                        </select>
                      </div>
                      <div class="mb-3">
                        <label for="penyakit" class="form-label">Penyakit Yang Pernah Diderita </label>
                        <input type="text" name="penyakit" class="form-control" id="penyakit">
                      </div>
                      <div class="mb-3">
                        <label for="alergi" class="form-label"> Alergi Terhadap </label>
                        <input type="text" name="alergi" class="form-control" id="alergi">
                      </div>
                      <div class="mb-3">
                        <label for="pernahbelajar" class="form-label"> Pernah Belajar di PAUD/RA/TK </label>
                        <select class="form-select" name="pernahbelajar" id="pernahbelajar">
                          <option selected>Pernah Belajar</option>
                          <option value="pernah"> Pernah </option>
                          <option value="TidakPernah">Tidak Pernah</option>
                        </select>
                      </div>
                      <div class="mb-3">
                        <label for="tahunkelulusan" class="form-label"> Tahun Kelulusan </label>
                        <select class="form-select" name="tahunkelulusan" id="tahunkelulusan">
                          <option selected>Tahun Lulus</option>
                          <option value="2020"> 2020 </option>
                          <option value="2021">2022</option>
                          <option value="2022">2023</option> 
                        </select>
                      </div>
                      <div class="mb-3">
                        <label for="noijazah" class="form-label">No Ijazah</label>
                        <input type="text" name="noijazah" class="form-control" id="noijazah">
                      </div>
                      <div class="mb-3">
                        <label for="cita-cita" class="form-label">Cita - Cita</label>
                        <input type="text" name="cita-cita" class="form-control" id="cita-cita">
                      </div>      
                      <div class="mb-3">
                        <label for="hobyanak" class="form-label">Hoby Anak</label>
                        <input type="text" name="hobyanak" class="form-control" id="hobyanak">
                      </div> 
                      <div class="mb-3">
                        <label for="tahunkelulusan" class="form-label"> Apakah Termasuk Penerima Bantuan (KPS/KKS/PIP/BSM/PKH)</label> 
                        <div class="row">
                          <div class="col">  
                            <select class="form-select" name="tahunkelulusan" id="tahunkelulusan">
                              <option selected>Penerima Bantuan</option>
                              <option value="ya"> YA </option>
                              <option value="tidak">TIDAK</option>
                            </select>
                          </div>
                          <div class="col"> 
                            <input type="tel" name="nomorbantuan" class="form-control" id="nomorbantuan" placeholder="Nomor Bantuan"> 
                          </div>
                        </div>
                      </div>
                      <div class="mb-3">
                        <label for="makanan" class="form-label">Makanan Yang Tidak Disukai</label>
                        <input type="text" name="makanan" class="form-control" id="makanan">
                      </div> 
                </form>
            </div>
        </div>
    </div>
</div>
      <!-- Tombol Submit dan Kembali -->
      <div class="row justify-content-center mt-4">
          <div class="col-md-2">
              <form action="/insertdataform" method="POST" enctype="multipart/form-data">
                  @csrf
                  <button type="submit" class="btn btn-primary btn-block">Submit</button>
              </form>
          </div>
          <div class="col-md-2">
              <a href="index" class="btn btn-danger btn-block">Kembali</a>
          </div>
      </div>
  </div>

  <!-- Script JS dan CSS Bootstrap -->
  <script type="text/javascript" src="js/jquery-3.4.1.min.js"></script>
  <script type="text/javascript" src="js/bootstrap.js"></script>
</body>


</html>