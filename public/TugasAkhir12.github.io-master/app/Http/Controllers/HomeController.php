<?php

namespace App\Http\Controllers;

use App\Models\Galeri;
use Illuminate\Http\Request;
use App\Models\Lulus;
use App\Models\Guru;
use App\Models\Kepalasekolah;

class HomeController extends Controller
{
    public function index()
    {
        return view('Home.index1');
    }

    public function profil()
    {
        return view('Home.profil');
    }
    public function tampilguru()
    {
        $data = Guru::paginate(5); // Mengambil semua data dari database
        return view('Home.tampilguru', compact('data'));

    }
    public function form()
    {
        return view('Home.form');
    }

    public function kepsek()
    {
        $data = Kepalasekolah::get();
        return view('Home.kepsek',compact('data'));
    }

    public function daftarulang()
    {
        return view('Home.daftarulang');
    }

    public function keterangan()
    {
        $data = Lulus::paginate(5); // Mengambil semua data dari database
        return view('Home.keterangan', compact('data'));

    }
    public function prestasi()
    {
        return view('Home.prestasi');
    }

    public function tampilppdb()
    {
        $lulus = Lulus::all(); // Mengambil semua data dari database
        return view('Home.ppdb', compact('data'));
    }
    
    public function galery()
    {
        $data = Galeri::get();
        return view('Home.galery',compact('data'));
    }

    public function saran()
    {
        return view('Home.saran');
    }
    public function visimisi()
    {
        return view('Home.visimisi');
    }
}
