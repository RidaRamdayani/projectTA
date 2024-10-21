<?php

namespace App\Http\Controllers;
use App\Models\Galeri;
use Illuminate\Http\Request;

class GaleriController extends Controller
{
    public function galeri()
    {
        $data = Galeri::paginate(5);
        return view('Admin.Datamaster.galerysiswa' ,compact('data'));
    }

    public function tambahgaleri(){
        return view ('Admin.Datamaster.tambahgaleri');
    }
    public function insertgaleri(Request $request)
    {
        $data = Galeri::create($request->all());
        if($request->hasFile('foto')){
            $request->file('foto')->move('Galerisiswa/', $request->file('foto')->getClientOriginalName());
            $data-> foto = $request->file('foto')->getClientOriginalName();
            $data->save();
        }
        return redirect('galeri'); 
    }
    public function deletegaleri($id){
        $data =Galeri::find($id);
        $data->delete();
        return redirect('galeri');

    }
}
