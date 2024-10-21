<?php

namespace App\Http\Controllers;

use App\Models\Notifikasi;
use Illuminate\Http\Request;

class NotifikasiController extends Controller
{
    // Menampilkan form hubungi kami
    public function hubungikami()
    {
        return view('pengguna.hubungikami');
    }

    // Menampilkan semua notifikasi (aduan)
    public function index()
    {
        $contacts = Notifikasi::all();
        return view('notification', compact('contacts'));
    }

    // Menyimpan data dari form hubungi kami
    public function store(Request $request)
    {
        // Validasi input
        $request->validate([
            'nama' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'kecamatan' => 'required|string|max:255',
            'desa' => 'required|string|max:255',
            'pelayanan' => 'required|string|max:255',
            'pesan' => 'required|string',
        ]);

        // Menyimpan data ke database
        Notifikasi::create([
            'nama' => $request->input('nama'),
            'email' => $request->input('email'),
            'kecamatan' => $request->input('kecamatan'),
            'desa' => $request->input('desa'),
            'pelayanan' => $request->input('pelayanan'),
            'pesan' => $request->input('pesan'),
        ]);

        // Redirect dengan pesan sukses
        return redirect()->back()->with('success', 'Pesan Anda berhasil terkirim!');
    }

    // Menandai notifikasi sebagai sudah direspon
    public function markAsResponded($id)
    {
        $notification = Notifikasi::find($id);
        if ($notification) {
            $notification->status_respon = true; // Menandai sebagai direspon
            $notification->save();
            return redirect()->route('notification.notifikasi')->with('success', 'Aduan telah ditandai sebagai sudah direspon.');
        }
        return redirect()->route('notification.notifikasi')->with('error', 'Aduan tidak ditemukan.');
    }
}
