<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminController extends Controller
{
  public function indexadmin()
  {
    return view ('Admin.index');
  }

  public function index()
  {
    return view ('Home.index1');
  }

  public function kepalasekolah()
  {
    return view ('Admin.profil.kepalasekolah');
  }
  
  public function guru()
  {
    return view ('Admin.profil.guru');
  }


  public function siswa()
  {
    return view ('Admin.Lulus.siswa');
  }
  
}
