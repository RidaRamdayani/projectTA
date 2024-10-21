<?php

namespace App\Http\Controllers;
use App\Models\Kepalasekolah;
use Illuminate\Http\Request;

class KepalasekolahController extends Controller
{
 
    

    public function kepalasekolah(){

        $data = Kepalasekolah::paginate(5);
        return view ('Admin.profil.kepalasekolah',compact('data'));
    }
    public function tambahkepsek(){
        return view ('Admin.profil.tambahkepsek');
    }
    public function insertdatakepsek(Request $request)
    {
        $data = Kepalasekolah::create($request->all());
        if($request->hasFile('foto')){
            $request->file('foto')->move('Fotokepsek/', $request->file('foto')->getClientOriginalName());
            $data-> foto = $request->file('foto')->getClientOriginalName();
            $data->save();
        }
        return redirect('kepalasekolah'); 
    }
    
    public function deletekepsek($id){
        $data = Kepalasekolah::find($id);
        $data->delete();
        return redirect('kepalasekolah');

    }
 
    
 }
    
