<?php

namespace App\Http\Controllers;
use App\Models\Pendaftaran;
use Illuminate\Http\Request;

class PendaftaranController extends Controller
{
    public function pendaftaran(){

        $data = Pendaftaran::paginate(5);
        // dd($data);
        return view ('Admin.Pendaftaran.pendaftaran', compact('data'));
    }

    // public function index()
    // {
    //     return view('Home.index1');
    // }

    public function tambahdaftar(Request $request){
        // dd($request->all());
        Pendaftaran::create($request->all());
        return redirect()->route('form')->with('succes','BERHASIL DAFTAR ULANG');
    }

    public function insertdataform(Request $request){
        // dd($request->all());
        Pendaftaran::create($request->all());
        return redirect()->route('index')->with('succes','BERHASIL DAFTAR ULANG');
    }

    public function tampildaftar($id){
        $data = Pendaftaran::find($id);
        // dd($data); 
        return view('Admin.Pendaftaran.tampildaftar', compact('data'));   
    }

    public function deletedaftar($id){
        $data = Pendaftaran::find($id);
        $data->delete();
        return redirect()->route('pendaftaran')->with('succes','DATA BERHASIL DIHAPUS');
}
} 

