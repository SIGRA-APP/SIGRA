<?php

namespace App\Http\Controllers;

use App\Models\AyatHarianModel;
use App\Models\Gereja;
use Illuminate\Http\Request;
use Carbon\Carbon;
use App\Models\HomeModel;
use Illuminate\Support\Facades\Auth;

class ayatController extends Controller
{

    public function list_ayat(Request $request)
    {
        $nama_gereja = $request->gereja->nama_gereja; 
        $ayat = AyatHarianModel::where('gereja_id', Auth::user()->gereja_id)->get();
        return view('admin.ayat_harian.list_ayat', compact('ayat','nama_gereja'));
    }

    public function view_ayat(Request $request)
    {
        $gereja = $request->gereja;
        // Mengambil semua data ayat
        $ayat = AyatHarianModel::where('gereja_id', $gereja->id)->get();
        $data_home = HomeModel::where('gereja_id', $gereja->id)->first();
        $nama_gereja = $gereja->nama_gereja; 
        // Mengirim data ayat ke view
        return view('view.postingan.ayat',compact('ayat','nama_gereja','data_home'));
    }


    public function edit_ayat(Request $request)
    {
        $nama_gereja = $request->gereja->nama_gereja; 
        return view('admin.ayat_harian.edit_ayat', compact('nama_gereja'));
    }

    public function tambah_ayat(Request $request)
    {
        $nama_gereja = $request->gereja->nama_gereja; 
        return view('admin.ayat_harian.tambah_ayat',compact('nama_gereja'));
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
            $originalName = time() . '.' . $gambar->extension(); // Mendapatkan nama asli file
            $gambarPath = $gambar->storeAs('uploads', $originalName, 'public'); // Menyimpan file dengan nama asli
            $gambar->move(public_path('uploads'), $originalName);
        }

        // Konversi format tanggal
        $tanggal = Carbon::parse($validatedData['created_at'])->format('Y-m-d H:i:s');

        // Simpan data ke database
        $ayat = new AyatHarianModel([
            'Ayat' => $validatedData['Ayat'],
            'Tema' => $validatedData['Tema'],
            'tanggal' => $tanggal, // Gunakan format tanggal yang benar
            'gambar' => $gambarPath, // Gunakan nama file yang disimpan
            'Detail' => $validatedData['Detail'],
            'gereja_id' => Auth::user()->gereja->id
        ]);

        $ayat->save();

        // Redirect atau tindakan lain setelah berhasil upload
        return redirect()->back()->with('success', 'Ayat telah berhasil diunggah!');
    }


    public function ayat_single(Request $request, $nama_gereja,  $id)
    {
        $gereja =  $request->gereja;
        $ayats = AyatHarianModel::where('id',$id)->get();
        $data_home = HomeModel::where('gereja_id', $gereja->id)->first();
        return view('view.postingan.ayat_single', compact('ayats','nama_gereja','data_home'));
    }

}
