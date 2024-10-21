<?php

namespace App\Http\Controllers;

use App\Models\Lulus;
use Illuminate\Http\Request;



class LulusController extends Controller
{
    public function siswa(){
        $data = Lulus::paginate(5);
        // dd($data);
        return view ('Admin.Lulus.lulus',compact('data'));
    }

    public function tambahsiswa(){
        return view ('Admin.Lulus.tambahdatasiswa');
    }

    public function insertdatasiswa(Request $request){
        // dd($request->all());
        Lulus::create($request->all());
        return redirect()->route('siswa');
    }
    public function tampilkandatasiswa($id){
        $data = Lulus::find($id);
        // dd($data); 
        return view('Admin.Lulus.tampildatasiswa', compact('data'));   
    }
    public function updatedatasiswa(Request $request, $id){
        $data = Lulus::find($id);
        $data->update($request->all());
        return redirect()->route('siswa');

    }
    public function deletedatasiswa($id){
        $data = Lulus::find($id);
        $data->delete();
        return redirect()->route('siswa')->with('succes','DATA BERHASIL DIHAPUS');
    }
    

}

