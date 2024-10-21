<?php

namespace App\Http\Controllers;

use App\Imports\DesaImport;
use App\Models\LuasTanaman;
use App\Models\Desa;
use App\Models\Komoditi;
use App\Models\Produksi;
use App\Models\Petani;
use App\Models\Tahun;
use App\Models\Kecamatan;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Facades\Excel;
use Mpdf\Mpdf;
use Illuminate\Support\Facades\Cache;

class RekapController extends Controller
{
    public function index(Request $request)
    {
        $periode = $request->input('periode');
        $kecamatan = $request->input('kecamatan');
        $desa = $request->input('desa');
        $komoditiSearch = $request->input('search');

        $periodes = Tahun::all();
        $kecamatans = Kecamatan::all();
        $desas = Desa::all();
        //$desas = $kecamatan ? Desa::where('kecamatan_id', $kecamatan)->get(['id', 'desa']) : collect(); // Query untuk desa hanya berdasarkan kecamatan yang dipilih
        $komoditis = Komoditi::all();

        // Ekstrak tahun unik dari periode
        $years = $periodes->map(function($periode) {
            return Carbon::parse($periode->periode)->format('Y');
        })->unique();

        $luas_tanamans_query = LuasTanaman::with(['tahuns', 'kecamatans', 'desas', 'komoditis'])
            ->when($periode, function ($query, $periode) {
                return $query->whereHas('tahuns', function ($query) use ($periode) {
                    $query->whereYear('periode', $periode);
                });
            })
            ->when($kecamatan, function ($query, $kecamatan) {
                return $query->where('kecamatan_id', $kecamatan);
            })
            ->when($desa, function ($query, $desa) {
                return $query->where('desa_id', $desa);
            })
            ->when($komoditiSearch, function ($query, $komoditiSearch) {
                return $query->whereHas('komoditis', function ($query) use ($komoditiSearch) {
                    $query->where('komoditi', 'LIKE', '%' . $komoditiSearch . '%');
                });
            });

        $produksis_query = Produksi::with(['tahuns', 'kecamatans', 'desas', 'komoditis'])
            ->when($periode, function ($query, $periode) {
                return $query->whereHas('tahuns', function ($query) use ($periode) {
                    $query->whereYear('periode', $periode);
                });
            })
            ->when($kecamatan, function ($query, $kecamatan) {
                return $query->where('kecamatan_id', $kecamatan);
            })
            ->when($desa, function ($query, $desa) {
                return $query->where('desa_id', $desa);
            })
            ->when($komoditiSearch, function ($query, $komoditiSearch) {
                return $query->whereHas('komoditis', function ($query) use ($komoditiSearch) {
                    $query->where('komoditi', 'LIKE', '%' . $komoditiSearch . '%');
                });
            });

        $petanis_query = Petani::with(['tahuns', 'kecamatans', 'desas', 'komoditis'])
            ->when($periode, function ($query, $periode) {
                return $query->whereHas('tahuns', function ($query) use ($periode) {
                    $query->whereYear('periode', $periode);
                });
            })
            ->when($kecamatan, function ($query, $kecamatan) {
                return $query->where('kecamatan_id', $kecamatan);
            })
            ->when($desa, function ($query, $desa) {
                return $query->where('desa_id', $desa);
            })
            ->when($komoditiSearch, function ($query, $komoditiSearch) {
                return $query->whereHas('komoditis', function ($query) use ($komoditiSearch) {
                    $query->where('komoditi', 'LIKE', '%' . $komoditiSearch . '%');
                });
            });

        $luas_tanamans = $luas_tanamans_query->get();
        $produksis = $produksis_query->get();
        $petanis = $petanis_query->get();

        $data = collect();

        foreach ($luas_tanamans as $luas_tanaman) {
            $produksi = $produksis->where('periode_id', $luas_tanaman->periode_id)
                ->where('kecamatan_id', $luas_tanaman->kecamatan_id)
                ->where('desa_id', $luas_tanaman->desa_id)
                ->where('komoditi_id', $luas_tanaman->komoditi_id)
                ->first();
            $petani = $petanis->where('periode_id', $luas_tanaman->periode_id)
                ->where('kecamatan_id', $luas_tanaman->kecamatan_id)
                ->where('desa_id', $luas_tanaman->desa_id)
                ->where('komoditi_id', $luas_tanaman->komoditi_id)
                ->first();

            $data->push((object) [
                'periode' => $luas_tanaman->tahuns->periode ?? 'Tidak Tersedia',
                'kecamatan' => $luas_tanaman->kecamatans->kecamatan ?? 'Tidak Tersedia',
                'desa' => $luas_tanaman->desas->desa ?? 'Tidak Tersedia',
                'komoditi' => $luas_tanaman->komoditis->komoditi ?? 'Tidak Tersedia',
                'luas_tanaman_muda' => $luas_tanaman->luas_tanaman_muda ?? 'Tidak Tersedia',
                'luas_tanaman_menghasilkan' => $luas_tanaman->luas_tanaman_menghasilkan ?? 'Tidak Tersedia',
                'luas_tanaman_tua' => $luas_tanaman->luas_tanaman_tua ?? 'Tidak Tersedia',
                'jumlah' => $luas_tanaman->jumlah ?? 'Tidak Tersedia',
                'produksi' => $produksi->produksi ?? 'Tidak Tersedia',
                'rata_rata' => $produksi->rata_rata ?? 'Tidak Tersedia',
                'petani' => $petani->petani ?? 'Tidak Tersedia',
                'id' => $luas_tanaman->id
            ]);
        }

        $currentPage = LengthAwarePaginator::resolveCurrentPage();
        $perPage = 10;
        $currentItems = $data->slice(($currentPage - 1) * 10, 10)->all();
        $paginatedData = new LengthAwarePaginator($currentItems, $data->count(), $perPage, $currentPage, [
            'path' => LengthAwarePaginator::resolveCurrentPath(),
            'query' => $request->query()  // Menambahkan query string untuk mempertahankan filter
        ]);


        // Ambil kecamatan dan desa untuk halaman saat ini
        $currentKecamatan = $paginatedData->pluck('kecamatan')->unique()->implode(', ');
        $currentDesa = $paginatedData->pluck('desa')->unique()->implode(', ');

        return view('keloladata', compact('paginatedData', 'years', 'kecamatans', 'desas', 'komoditis', 'currentKecamatan', 'currentDesa'));
    }

    public function getDesasByKecamatan($kecamatan_id)
    {
        $desas = Desa::where('kecamatan_id', $kecamatan_id)->get();
        return $desas;
        return response()->json($desas);
    }



    public function tambahdata(){
        // Ambil data yang diperlukan untuk form tambah data
           $tahuns = Tahun::all();
           $kecamatans = Kecamatan::all();
           $desas = Desa::all();
           $komoditis = Komoditi::all();
           return view('tambahdata', compact('tahuns', 'kecamatans', 'desas', 'komoditis'));
   }
    public function tambahdesa(Request $request)
    {
         // Validasi data
    $request->validate([
        'kecamatan_id' => 'required|exists:kecamatans,id',
        'desa' => 'required|string|max:255',
    ]);

    // Simpan ke database
    Desa::create([
        'kecamatan_id' => $request->kecamatan_id,
        'desa' => $request->desa,
    ]);

    // Redirect setelah berhasil menyimpan
    return redirect()->back()->with('success', 'Desa berhasil ditambahkan!');
   }

   public function tambahkecamatan(Request $request)
    {
        // Validasi input
        $request->validate([
            'kecamatan' => 'required|string|max:255',
        ]);

        // Simpan data kecamatan
        Kecamatan::create([
            'kecamatan' => $request->kecamatan,
        ]);

        // Redirect ke halaman sebelumnya dengan pesan sukses
        return redirect()->back()->with('success', 'Kecamatan berhasil ditambahkan!');
    }

    public function insertdata(Request $request)
    {   
        $validatedData = $request->validate([
            'periode' => 'required|date',
            'kecamatan_id' => 'required|exists:kecamatans,id',
            'desa_id' => 'required|exists:desas,id',
            'komoditi_id' => 'required|exists:komoditis,id',
            'luas_tanaman_muda' => 'required|numeric',
            'luas_tanaman_menghasilkan' => 'required|numeric',
            'luas_tanaman_tua' => 'required|numeric',
            'produksi' => 'required|numeric',
            'petani' => 'required|numeric',
        ]);

        // Gunakan transaksi untuk memastikan atomicity
        DB::beginTransaction();

        try {
            // Ambil atau buat entri tahun berdasarkan periode
            $periode = Tahun::firstOrCreate(['periode' => $request->periode]);

            // Tambahkan periode_id ke data yang divalidasi
            $validatedData['periode_id'] = $periode->id;

            // Simpan data ke tabel luas_tanaman
            LuasTanaman::create([
                'periode_id' => $validatedData['periode_id'],
                'kecamatan_id' => $validatedData['kecamatan_id'],
                'desa_id' => $validatedData['desa_id'],
                'komoditi_id' => $validatedData['komoditi_id'],
                'luas_tanaman_muda' => $validatedData['luas_tanaman_muda'],
                'luas_tanaman_menghasilkan' => $validatedData['luas_tanaman_menghasilkan'],
                'luas_tanaman_tua' => $validatedData['luas_tanaman_tua'],
                'jumlah' => $validatedData['luas_tanaman_muda'] + $validatedData['luas_tanaman_menghasilkan'] + $validatedData['luas_tanaman_tua']
            ]);
            // Ambil nilai luas_tanaman_menghasilkan
            $luasTanamanMenghasilkan = $validatedData['luas_tanaman_menghasilkan'];

            // Hitung rata_rata berdasarkan produksi dan luas_tanaman_menghasilkan
            if ($luasTanamanMenghasilkan != 0) {
                $rata_rata = ($validatedData['produksi'] * 1000) / $luasTanamanMenghasilkan;
            } else {
                $rata_rata = 0;
            }

            // Simpan data ke tabel produksis
            Produksi::create([
                'periode_id' => $validatedData['periode_id'],
                'kecamatan_id' => $validatedData['kecamatan_id'],
                'desa_id' => $validatedData['desa_id'],
                'komoditi_id' => $validatedData['komoditi_id'],
                'produksi' => $validatedData['produksi'],
                'rata_rata' => $rata_rata,
            ]);
            // Simpan data ke tabel petani
            Petani::create([
                'periode_id' => $validatedData['periode_id'],
                'kecamatan_id' => $validatedData['kecamatan_id'],
                'desa_id' => $validatedData['desa_id'],
                'komoditi_id' => $validatedData['komoditi_id'],
                'petani' => $validatedData['petani'],
            ]);

            // Commit transaksi jika semua berjalan lancar
            DB::commit();

            // Redirect atau kembalikan respon yang sesuai
            return redirect()->route('olahdata')->with('success', 'Data berhasil disimpan.');
        } catch (\Exception $e) {
            // Rollback transaksi jika ada error
            DB::rollBack();
            return redirect()->back()->withErrors('Terjadi kesalahan saat menyimpan data.');
        }
    }

    public function tampilkandata($id)
    {
        $luasTanaman = LuasTanaman::with(['tahuns', 'kecamatans', 'desas', 'komoditis'])->findOrFail($id);
        
        $produksi = Produksi::where('periode_id', $luasTanaman->periode_id)
                            ->where('kecamatan_id', $luasTanaman->kecamatan_id)
                            ->where('desa_id', $luasTanaman->desa_id)
                            ->where('komoditi_id', $luasTanaman->komoditi_id)
                            ->first();

        $petani = Petani::where('periode_id', $luasTanaman->periode_id)
                        ->where('kecamatan_id', $luasTanaman->kecamatan_id)
                        ->where('desa_id', $luasTanaman->desa_id)
                        ->where('komoditi_id', $luasTanaman->komoditi_id)
                        ->first();

        $tahuns = Tahun::all();
        $kecamatans = Kecamatan::all();
        $desas = Desa::all();
        $komoditis = Komoditi::all();

        return view('tampildata', compact('luasTanaman', 'produksi', 'petani', 'tahuns', 'kecamatans', 'desas', 'komoditis'));
    }

    public function updatedata(Request $request, $id)
    {
        // Validasi data form
        $validatedData = $request->validate([
            'periode' => 'required|date',
            'kecamatan_id_luas' => 'required|exists:kecamatans,id',
            'desa_id_luas' => 'required|exists:desas,id',
            'komoditi_id_luas' => 'required|exists:komoditis,id',
            'luas_tanaman_muda' => 'required|numeric',
            'luas_tanaman_menghasilkan' => 'required|numeric',
            'luas_tanaman_tua' => 'required|numeric',
            'produksi' => 'required|numeric',
            'petani' => 'required|numeric',
            'produksi_id' => 'required|exists:produksis,id',
            'petani_id' => 'required|exists:petanis,id',
        ]);

        // Cari data tahun berdasarkan nilai periode baru
        $tahun = Tahun::where('periode', $validatedData['periode'])->first();
        
        // Jika tidak ada, buat record baru di tabel tahuns
        if (!$tahun) {
            $tahun = Tahun::create(['periode' => $validatedData['periode']]);
        }

        // Update data LuasTanaman
        $luasTanaman = LuasTanaman::findOrFail($id);
        $luasTanaman->update([
            'periode_id' => $tahun->id, // Update relasi ke periode_id baru
            'kecamatan_id' => $validatedData['kecamatan_id_luas'],
            'desa_id' => $validatedData['desa_id_luas'],
            'komoditi_id' => $validatedData['komoditi_id_luas'],
            'luas_tanaman_muda' => $validatedData['luas_tanaman_muda'],
            'luas_tanaman_menghasilkan' => $validatedData['luas_tanaman_menghasilkan'],
            'luas_tanaman_tua' => $validatedData['luas_tanaman_tua'],
            'jumlah' => $validatedData['luas_tanaman_muda'] + $validatedData['luas_tanaman_menghasilkan'] + $validatedData['luas_tanaman_tua']
        ]);

        // Hitung rata_rata berdasarkan produksi dan luas_tanaman_menghasilkan
        $rata_rata = ($validatedData['luas_tanaman_menghasilkan'] != 0) ?
            ($validatedData['produksi'] * 1000) / $validatedData['luas_tanaman_menghasilkan'] : 0;

        // Update data Produksi
        $produksi = Produksi::findOrFail($validatedData['produksi_id']);
        $produksi->update([
            'periode_id' => $tahun->id, // Update relasi ke periode_id baru
            'kecamatan_id' => $validatedData['kecamatan_id_luas'],
            'desa_id' => $validatedData['desa_id_luas'],
            'komoditi_id' => $validatedData['komoditi_id_luas'],
            'produksi' => $validatedData['produksi'],
            'rata_rata' => $rata_rata,
        ]);

        // Update data Petani
        $petani = Petani::findOrFail($validatedData['petani_id']);
        $petani->update([
            'periode_id' => $tahun->id, // Update relasi ke periode_id baru
            'kecamatan_id' => $validatedData['kecamatan_id_luas'],
            'desa_id' => $validatedData['desa_id_luas'],
            'komoditi_id' => $validatedData['komoditi_id_luas'],
            'petani' => $validatedData['petani'],
        ]);

        return redirect()->route('olahdata')->with('success', 'Data berhasil diperbarui.');
    }
    
    public function hapusdata($id)
    {
        DB::beginTransaction();

        try {
            // Ambil data LuasTanaman
            $luasTanaman = LuasTanaman::findOrFail($id);

            // Hapus data Produksi terkait
            $produksi = Produksi::where('kecamatan_id', $luasTanaman->kecamatan_id)
                ->where('desa_id', $luasTanaman->desa_id)
                ->where('komoditi_id', $luasTanaman->komoditi_id)
                ->where('periode_id', $luasTanaman->periode_id)
                ->first();
            if ($produksi) {
                $produksi->delete();
            }

            // Hapus data Petani terkait
            $petani = Petani::where('kecamatan_id', $luasTanaman->kecamatan_id)
                ->where('desa_id', $luasTanaman->desa_id)
                ->where('komoditi_id', $luasTanaman->komoditi_id)
                ->where('periode_id', $luasTanaman->periode_id)
                ->first();
            if ($petani) {
                $petani->delete();
            }

            // Hapus data LuasTanaman
            $luasTanaman->delete();

            // Hapus data Periode jika tidak ada lagi data LuasTanaman yang menggunakan periode ini
            $periode_id = $luasTanaman->periode_id;
            $otherLuasTanaman = LuasTanaman::where('periode_id', $periode_id)->exists();
            if (!$otherLuasTanaman) {
                $tahun = Tahun::find($periode_id);
                if ($tahun) {
                    $tahun->delete();
                }
            }

            // Commit transaksi jika semua berjalan lancar
            DB::commit();
            return redirect()->route('olahdata')->with('success', 'Data berhasil dihapus.');
        } catch (\Exception $e) {
            // Rollback transaksi jika ada error
            DB::rollBack();
            return redirect()->back()->withErrors('Terjadi kesalahan saat menghapus data.');
        }
    }

    public function cetakpdf(Request $request)
    {
        // Mengambil parameter dari request
        $periode = $request->input('periode');
        $kecamatanId = $request->input('kecamatan');
        $desaId = $request->input('desa');

        // Query untuk mengambil nama kecamatan dan desa berdasarkan ID
        $kecamatan = Kecamatan::find($kecamatanId);
        $desa = Desa::find($desaId);

        // Query untuk mengambil data berdasarkan filter
        $luas_tanamans_query = LuasTanaman::with(['tahuns', 'kecamatans', 'desas', 'komoditis'])
            ->when($periode, function ($query, $periode) {
                return $query->whereHas('tahuns', function ($query) use ($periode) {
                    $query->whereYear('periode', $periode);
                });
            })
            ->when($kecamatanId, function ($query, $kecamatanId) {
                return $query->where('kecamatan_id', $kecamatanId);
            })
            ->when($desaId, function ($query, $desaId) {
                return $query->where('desa_id', $desaId);
            });

        $produksis_query = Produksi::with(['tahuns', 'kecamatans', 'desas', 'komoditis'])
            ->when($periode, function ($query, $periode) {
                return $query->whereHas('tahuns', function ($query) use ($periode) {
                    $query->whereYear('periode', $periode);
                });
            })
            ->when($kecamatanId, function ($query, $kecamatanId) {
                return $query->where('kecamatan_id', $kecamatanId);
            })
            ->when($desaId, function ($query, $desaId) {
                return $query->where('desa_id', $desaId);
            });

        $petanis_query = Petani::with(['tahuns', 'kecamatans', 'desas', 'komoditis'])
            ->when($periode, function ($query, $periode) {
                return $query->whereHas('tahuns', function ($query) use ($periode) {
                    $query->whereYear('periode', $periode);
                });
            })
            ->when($kecamatanId, function ($query, $kecamatanId) {
                return $query->where('kecamatan_id', $kecamatanId);
            })
            ->when($desaId, function ($query, $desaId) {
                return $query->where('desa_id', $desaId);
            });

        $luas_tanamans = $luas_tanamans_query->get();
        $produksis = $produksis_query->get();
        $petanis = $petanis_query->get();

        $data = collect();

        foreach ($luas_tanamans as $luas_tanaman) {
            $produksi = $produksis->where('periode_id', $luas_tanaman->periode_id)
                                ->where('kecamatan_id', $luas_tanaman->kecamatan_id)
                                ->where('desa_id', $luas_tanaman->desa_id)
                                ->where('komoditi_id', $luas_tanaman->komoditi_id)
                                ->first();
            $petani = $petanis->where('periode_id', $luas_tanaman->periode_id)
                            ->where('kecamatan_id', $luas_tanaman->kecamatan_id)
                            ->where('desa_id', $luas_tanaman->desa_id)
                            ->where('komoditi_id', $luas_tanaman->komoditi_id)
                            ->first();

            $jumlah = ($luas_tanaman->luas_tanaman_muda ?? 0) +
                    ($luas_tanaman->luas_tanaman_menghasilkan ?? 0) +
                    ($luas_tanaman->luas_tanaman_tua ?? 0);

            $luas_tanaman_menghasilkan = $luas_tanaman->luas_tanaman_menghasilkan ?? 0;
            $rata_rata = $luas_tanaman_menghasilkan > 0 ? ($produksi->produksi ?? 0) * 1000 / $luas_tanaman_menghasilkan : 0;

            $data->push((object) [
                'periode' => $luas_tanaman->tahuns->periode ?? 'Tidak Tersedia',
                'kecamatan' => $luas_tanaman->kecamatans->kecamatan ?? 'Tidak Tersedia',
                'desa' => $luas_tanaman->desas->desa ?? 'Tidak Tersedia',
                'komoditi' => $luas_tanaman->komoditis->komoditi ?? 'Tidak Tersedia',
                'luas_tanaman_muda' => $luas_tanaman->luas_tanaman_muda ?? 'Tidak Tersedia',
                'luas_tanaman_menghasilkan' => $luas_tanaman->luas_tanaman_menghasilkan ?? 'Tidak Tersedia',
                'luas_tanaman_tua' => $luas_tanaman->luas_tanaman_tua ?? 'Tidak Tersedia',
                'jumlah' => $jumlah,
                'produksi' => $produksi->produksi ?? 'Tidak Tersedia',
                'rata_rata' => number_format($rata_rata, 2),
                'petani' => $petani->petani ?? 'Tidak Tersedia',
                'id' => $luas_tanaman->id
            ]);
        }

        view()->share('data', $data);

        // Load view PDF dan kirimkan data
        $pdf = new Mpdf();
        $pdf->WriteHTML(view('keloladata-pdf', compact('data', 'periode', 'kecamatan', 'desa'))->render());

        // Download PDF
        return $pdf->Output('data.pdf', 'D');
    }

    public function import(Request $request)
    {
        $request->validate([
            'file' => 'required|mimes:xlsx',
        ]);

        Excel::import(new DesaImport, $request->file('file'));

        return back()->with('success', 'Data Desa berhasil diimport!');;
    }
    //hubungi kami
    public function submit(Request $request)
    {
        // Validasi data form
        $validatedData = $request->validate([
            'name' => 'required|max:255',
            'email' => 'required|email',
            'kecamatan' => 'required|max:255',
            'desa' => 'required|max:255',
            'message' => 'required',
        ]);

        // Ambil data kontak yang ada di cache
        $contacts = Cache::get('contacts', []);

        // Tambahkan data kontak baru dengan timestamp
        $validatedData['timestamp'] = now();
        $contacts[] = $validatedData;

        // Simpan kembali ke cache dengan waktu kadaluarsa satu bulan
        Cache::put('contacts', $contacts, now()->addMonth());

        // Redirect dengan pesan sukses
        return redirect()->back()->with('success', 'Pesan Anda telah berhasil dikirim!');
    }


}



