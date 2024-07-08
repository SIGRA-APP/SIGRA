<?php

namespace App\Http\Controllers;

use App\Models\SejarahModel;
use Illuminate\Http\Request;
use App\Models\HomeModel;
use Illuminate\Support\Facades\Auth;

class SejarahController extends Controller
{
    public function view(Request $request)
    {
        $gereja = $request->gereja;
        $data_home = HomeModel::where('gereja_id', $gereja->id)->first();
        $nama_gereja = $gereja->nama_gereja;
        $sejarah = SejarahModel::where('gereja_id', $gereja->id)->first();
        return view('admin.gereja.sejarah.add', compact('nama_gereja', 'data_home','sejarah'));
    }

    public function store(Request $request)
    {
        // Validasi request
        $validatedData = $request->validate([
            'gambar_gereja' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:22048',
            'tanggal_dibuat' => 'required|date',
            'judul' => 'required|string|max:255',
            'kapan_didirikan' => 'required|date',
            'pendiri' => 'required|string|max:255',
            'lokasi' => 'required|string|max:255',
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

        $gerejaId = Auth::user()->gereja->id;
        $namaGereja = Auth::user()->gereja->nama_gereja;

        $validatedData['nama_gereja'] = $namaGereja;


        // Update or create SejarahModel instance
        SejarahModel::updateOrCreate(
            ['gereja_id' => $gerejaId],
            $validatedData
        );

        return redirect()->back()->with('success', 'Data sejarah gereja berhasil disimpan.');
    }




    public function sejarah(Request $request)
    {
        $gereja = $request->gereja;
        $sejarah = SejarahModel::where('gereja_id', $gereja->id)->get();
        $data_home = HomeModel::where('gereja_id', $gereja->id)->first();
        $nama_gereja = $gereja->nama_gereja;
        return view('view.sejarah.sejarah', compact('sejarah', 'nama_gereja', 'data_home'));
    }
}
