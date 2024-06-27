<?php

namespace App\Http\Controllers;

use App\Models\AyatHarianModel;
use App\Models\Gereja;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;

class ayatController extends Controller
{

    public function list_ayat()
    {
        $ayat = AyatHarianModel::where('gereja_id', Auth::user()->gereja_id)->get();
        return view('admin.ayat_harian.list_ayat', compact('ayat'));
    }

    public function view_ayat(Request $request)
    {
        $gereja = $request->gereja;
        // Mengambil semua data ayat
        $ayat = AyatHarianModel::where('gereja_id', $gereja->id)->get();
        // Mengirim data ayat ke view
        return view('view.postingan.ayat',compact('ayat'));
    }


    public function edit_ayat()
    {
        return view('admin.ayat_harian.edit_ayat');
    }

    public function tambah_ayat()
    {
        return view('admin.ayat_harian.tambah_ayat');
    }

    public function uploadAyat(Request $request)
    {
        // Validasi input
        $validatedData = $request->validate([
            'Ayat' => 'required',
            'Tema' => 'required',
            'gambar' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048', // Validasi untuk gambar
            'created_at' => 'required|date', // Tambahkan validasi untuk tanggal
            'Detail' => 'required'
        ]);

        // Proses upload gambar
        if ($request->hasFile('gambar')) {
            $gambar = $request->file('gambar');
            $originalName = $gambar->getClientOriginalName(); // Mendapatkan nama asli file
            $gambarPath = $gambar->storeAs('public/images', $originalName); // Menyimpan file dengan nama asli
            $namaFile = basename($gambarPath); // Mendapatkan nama file saja dari path
        }

        // Konversi format tanggal
        $tanggal = Carbon::parse($validatedData['created_at'])->format('Y-m-d H:i:s');

        // Simpan data ke database
        $ayat = new AyatHarianModel([
            'Ayat' => $validatedData['Ayat'],
            'Tema' => $validatedData['Tema'],
            'tanggal' => $tanggal, // Gunakan format tanggal yang benar
            'gambar' => $namaFile, // Gunakan nama file yang disimpan
            'Detail' => $validatedData['Detail'],
            'gereja_id' => Auth::user()->gereja->id
        ]);

        $ayat->save();

        // Redirect atau tindakan lain setelah berhasil upload
        return redirect()->route('list_ayat')->with('success', 'Ayat telah berhasil diunggah!');
    }


    public function ayat_single(Request $request)
    {
        $gereja =  $request->gereja;
        $ayats = AyatHarianModel::where('gereja_id',$gereja->id)->get();
        return view('view.postingan.ayat_single', compact('ayats'));
    }

}
