<!DOCTYPE html>
<html>
<head>
    <style>
    #customers {
      font-family: Arial, Helvetica, sans-serif;
      border-collapse: collapse;
      width: 100%;
    }

    #customers td, #customers th {
      border: 1px solid #ddd;
      padding: 8px;
    }

    #customers tr:nth-child(even){background-color: #f2f2f2;}

    #customers tr:hover {background-color: #ddd;}

    #customers th {
      padding-top: 12px;
      padding-bottom: 12px;
      text-align: left;
      background-color: #04AA6D;
      color: white;
    }

    .container {
      width: 100%;
      margin: 0 auto;
    }

    .title {
      text-align: center;
      margin-bottom: 20px;
    }

    .info {
      margin-bottom: 20px;
    }
    </style>
</head>
<body>
    <div class="container">
        <div class="title">
            <h1>Data Perkebunan</h1>
        </div>
        <div class="info">
            @if($periode || $kecamatan || $desa)
                <p>
                    @if($periode) Tahun: {{ $periode }} @endif
                    @if($kecamatan) Kecamatan: {{ $kecamatan->kecamatan ?? 'Tidak Tersedia' }} @endif
                    @if($desa) Desa: {{ $desa->desa ?? 'Tidak Tersedia' }} @endif
                </p>
            @endif
        </div>
        <table id="customers">
            <thead>
                <tr>
                    <th>Komoditi</th>
                    <th>Luas Tanaman Muda</th>
                    <th>Luas Tanaman Menghasilkan</th>
                    <th>Luas Tanaman Tua</th>
                    <th>Jumlah</th>
                    <th>Produksi(Ton)</th>
                    <th>Rata Rata(Kg)</th>
                    <th>Petani</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($data as $row)
                <tr>
                    <td>{{ $row->komoditi }}</td>
                    <td>{{ $row->luas_tanaman_muda }}</td>
                    <td>{{ $row->luas_tanaman_menghasilkan }}</td>
                    <td>{{ $row->luas_tanaman_tua }}</td>
                    <td>{{ $row->jumlah }}</td>
                    <td>{{ $row->produksi }}</td>
                    <td>{{ $row->rata_rata }}</td>
                    <td>{{ $row->petani }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</body>
</html>
