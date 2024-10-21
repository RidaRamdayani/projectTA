<?php

namespace App\Http\Controllers;
use App\Models\Daftarulang;
use Illuminate\Http\Request;

class DaftarulangController extends Controller
{
    public function dafulang(){

        $data = daftarulang::paginate(5);
        // dd($data);
        return view ('Admin.Daftarulang.daftarulang', compact('data'));
    }

    public function index()
    {
        return view('Home.index1');
    }

    public function tambahdaftarulang(Request $request){
        // dd($request->all());
        daftarulang::create($request->all());
        return redirect()->route('daftarulang')->with('succes','BERHASIL DAFTAR ULANG');
    }

    public function insertdata(Request $request){
        // dd($request->all());
        daftarulang::create($request->all());
        return redirect()->route('index')->with('succes','BERHASIL DAFTAR ULANG');
    }

    public function deletedafulang($id){
        $data = daftarulang::find($id);
        $data->delete();
        return redirect()->route('dafulang')->with('succes','DATA BERHASIL DIHAPUS');
}
}