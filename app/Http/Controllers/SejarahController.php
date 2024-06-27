<?php

namespace App\Http\Controllers;

use App\Models\SejarahModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SejarahController extends Controller
{
    public function view(Request $request)
    {
        $nama_gereja = $request->gereja->nama_gereja; 
        return view('admin.gereja.sejarah.add',compact('nama_gereja'));
    }

    public function store(Request $request)
{
    // Validasi request
    $validatedData = $request->validate([
        'gambar_gereja' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:22048',
        'tanggal_dibuat' => 'required|date',
        'judul' => 'required|string|max:255',
        'nama_gereja' => 'required|string|max:255',
        'kapan_didirikan' => 'required|date',
        'pendiri' => 'required|string|max:255',
        'lokasi' => 'required|string|max:255',
        'kutipan' => 'nullable|string|max:1024',
        'description' => 'nullable|string',
    ]);

    // Handle file upload
    if ($request->hasFile('gambar_gereja')) {
        $image = $request->file('gambar_gereja');
        $imageName = time() . '.' . $image->getClientOriginalExtension();
        // Pastikan direktori penyimpanan telah ada dan benar
        $imagePath = $image->storeAs('uploads', $imageName, 'public');
        $validatedData['gambar_gereja'] = $imagePath;
    }

    // Buat instance model SejarahModel
    $sejarah = new SejarahModel();

    // Set nilai atribut model dari data yang divalidasi
    $sejarah->gambar_gereja = $validatedData['gambar_gereja'];
    $sejarah->tanggal_dibuat = $validatedData['tanggal_dibuat'];
    $sejarah->judul = $validatedData['judul'];
    $sejarah->nama_gereja = $validatedData['nama_gereja'];
    $sejarah->kapan_didirikan = $validatedData['kapan_didirikan'];
    $sejarah->pendiri = $validatedData['pendiri'];
    $sejarah->lokasi = $validatedData['lokasi'];
    $sejarah->kutipan = $validatedData['kutipan'];
    $sejarah->description = $validatedData['description'];
    $sejarah->gereja_id = Auth::user()->gereja->id;

    // Simpan data ke dalam database
    if ($sejarah->save()) {
        // Jika berhasil disimpan, berikan pesan sukses
        return redirect()->back()->with('success', 'Data sejarah gereja berhasil disimpan.');
    } else {
        // Jika gagal disimpan, berikan pesan error
        return redirect()->back()->withErrors(['error' => 'Gagal menyimpan data sejarah gereja.']);
    }
}



    public function sejarah(Request $request)
    {
        $gereja = $request->gereja;
        $sejarah = SejarahModel::where('gereja_id', $gereja->id)->get();
        $nama_gereja = $gereja->nama_gereja; 
        return view('view.sejarah.sejarah', compact('sejarah','nama_gereja'));
    }
}
