<?php

namespace App\Http\Controllers;

use App\Imports\DesaImport;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class DesaController extends Controller
{
    public function import(Request $request)
    {
        $request->validate([
            'file' => 'required|mimes:xlsx',
        ]);

        Excel::import(new DesaImport, $request->file('file'));

        return back()->with('success', 'Data Desa berhasil diimport!');
    }
}
