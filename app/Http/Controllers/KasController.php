<?php

namespace App\Http\Controllers;

use App\Models\KasModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;


class KasController extends Controller
{
    public function kas() {

        return view ('admin.keuangan.kas.list_kas');
    }

    public function edit_kas($id) {
        $aruskas = KasModel::findOrFail($id);
        return view ('admin.keuangan.kas.edit_kas', compact('aruskas'));
    }

    public function tambah_kas() {
        return view ('admin.keuangan.kas.tambah_kas');
    }

    public function laporan_kas() {
        $data = KasModel::all();

        return view ('laporan.kas', compact('data'));
    }

    public function kas_detail($id) {

        $detail = KasModel::find($id);

        return view('laporan.kas_single', compact('detail'));

    }

    public function insert_kas(Request $request){
        // Validasi request
        $validatedData = $request->validate([
            'judul' => 'required|string|max:255',
            'periode' => 'required|string|max:255',
            'tanggal_mulai' => 'required|date',
            'tanggal_akhir' => 'required|date',
            'total' => 'required|string|max:50',
            'image_file' => 'nullable|image|max:2048', // Optionally add image validation rules
            'detail_kas' => 'nullable|string',
        ]);


            // Simpan data ke dalam database
            $kas = new KasModel();
            $kas->judul = $validatedData['judul'];
            $kas->periode = $validatedData['periode'];
            $kas->created_at = $validatedData['tanggal_mulai'];
            $kas->updated_at = $validatedData['tanggal_akhir'];
            $kas->total = $validatedData['total'];
            $kas->detail_kas = $validatedData['detail_kas'];
            $kas->gereja_id = Auth::user()->gereja->id;

            // Handle file upload jika ada
            if ($request->hasFile('image_file')) {
                $image_file = $request->file('image_file');
                $gambarPath = $image_file->store('public/images'); // Simpan gambar ke storage
                $kas->image_file = Storage::url($gambarPath);
            }

        $kas->save();

        // Redirect ke halaman yang sesuai atau tampilkan pesan sukses
        return redirect()->route('listmingguan')->with('success', 'Warta berhasil ditambahkan');
    }

}
