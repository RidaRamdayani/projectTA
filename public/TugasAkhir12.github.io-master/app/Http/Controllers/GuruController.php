<?php

namespace App\Http\Controllers;

use App\Models\Guru;
use Illuminate\Http\Request;

class GuruController extends Controller
{
    public function guru(){

        $data = Guru::paginate(5);
        return view ('Admin.profil.Guru',compact('data'));
    }
    public function tambahguru(){
        return view ('Admin.profil.tambahdata');
    }
    public function insertdataguru(Request $request){
        // dd($request->all());
        Guru::create($request->all());
        return redirect()->route('guru');
    }
    public function tampilkandata($id){
        $data = Guru::find($id);
        // dd($data); 
        return view('Admin.profil.tampildata', compact('data'));   
    }

    public function updatedata(Request $request, $id){
        $data = Guru::find($id);
        $data->update($request->all());
        return redirect()->route('guru');
    }

    public function delete($id){
        $data = Guru::find($id);
        $data->delete();
        return redirect()->route('guru');

    }
    
}
