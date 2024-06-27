<?php

namespace App\Http\Controllers;

use App\Models\KeuanganModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class KeuanganController extends Controller
{
    public function tambah_keuangan()
    {
        return view('admin.keuangan.persembahan.tambah_keuangan');
    }


    public function laporan()
    {
        return view('laporan/persembahan');
    }



    public function insert_keuangan(Request $request)
    {
        // Validasi request
        $validatedData = $request->validate([
            'judul' => 'required|string|max:255',
            'minggu' => 'required|string|max:255',
            'tanggal' => 'required|date',
            'total' => 'required|string|max:50',
            'image_file' => 'nullable|image|max:2048', // Optionally add image validation rules
            'detail_persembahan' => 'nullable|string',
        ]);

        // Simpan data ke dalam database
        $keuangan = new KeuanganModel();
        $keuangan->judul = $validatedData['judul'];
        $keuangan->minggu = $validatedData['minggu'];
        $keuangan->created_at = $validatedData['tanggal']; // Gunakan tanggal yang disediakan oleh pengguna
        $keuangan->total = $validatedData['total'];
        $keuangan->detail_persembahan = $validatedData['detail_persembahan'];
        $keuangan->gereja_id = Auth::user()->gereja->id;;

        // Handle file upload jika ada
        if ($request->hasFile('image_file')) {
            $image = $request->file('image_file');
            $imageName = time() . '.' . $image->extension();
            $image->move(public_path('uploads/keuangan'), $imageName);
            $keuangan->image_file = 'uploads/keuangan/' . $imageName;
        }

        $keuangan->save();

        // Redirect ke halaman yang sesuai atau tampilkan pesan sukses
        return redirect()->route('listbulanan')->with('success', 'Data berhasil disimpan.');
    }


    public function edit_keuangan($id)
    {
        $data['getRecord'] = KeuanganModel::getSingle($id);

        return view('admin.keuangan.persembahan.edit_keuangan', $data);
    }

    public function update_keuangan($id, Request $request)
    {
        // Validasi request
        $validatedData = $request->validate([
            'judul' => 'required|string|max:255',
            'minggu' => 'required|string|max:255',
            'tanggal' => 'required|date',
            'total' => 'required|string|max:50',
            'image_file' => 'nullable|image|max:2048', // Optionally add image validation rules
            'detail_persembahan' => 'nullable|string',
        ]);

        // Simpan data ke dalam database
        $keuangan = $data['getRecord'] = KeuanganModel::getSingle($id);
        $keuangan->judul = $validatedData['judul'];
        $keuangan->minggu = $validatedData['minggu'];
        $keuangan->created_at = $validatedData['tanggal']; // Gunakan tanggal yang disediakan oleh pengguna
        $keuangan->total = $validatedData['total'];
        $keuangan->detail_persembahan = $validatedData['detail_persembahan'];

        // Handle file upload jika ada
        if ($request->hasFile('image_file')) {
            $image = $request->file('image_file');
            $imageName = time() . '.' . $image->extension();
            $image->move(public_path('uploads/keuangan'), $imageName);
            $keuangan->image_file = 'uploads/keuangan/' . $imageName;
        }

        $keuangan->save();

        // Redirect ke halaman yang sesuai atau tampilkan pesan sukses
        return redirect('keuangan/persembahan/list_keuangan')->with('success', 'Data berhasil disimpan.');
    }


    public function hapus_keuangan($id)
    {
        $save = KeuanganModel::getSingle($id);
        $save->is_delete = 1;
        $save->save();

        return redirect()->route('listbulanan')->with('Sukses', 'Data berhasil dihapus');
    }


    public function landing()
    {
        return view('admin.keuangan.landing');
    }
}
