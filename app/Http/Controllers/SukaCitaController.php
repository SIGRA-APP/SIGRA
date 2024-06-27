<?php

namespace App\Http\Controllers;

use App\Models\SukaCitaModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;

class SukaCitaController extends Controller
{
    public function berita()
    {
        return view('admin.berita.sukacita.list_berita');
    }

    public function edit_berita($id)
    {
        $suka_cita = SukaCitaModel::findOrFail($id);

        return view('admin.berita.sukacita.edit_berita', compact('suka_cita'));
    }

    public function tambah_berita()
    {
        return view('admin.berita.sukacita.tambah_berita');
    }

    public function insert_berita(Request $request)
    {
        // Validasi request
        $validatedData = $request->validate([
            'judul' => 'required|string|max:255',
            'deskripsi' => 'required|string|max:255',
            'tanggal' => 'required|date',
            'image_file' => 'nullable|image|max:2048',
            'detail_berita' => 'nullable|string',
        ]);

        // Simpan data ke dalam database
        $suka_cita = new SukaCitaModel();
        $suka_cita->judul = $validatedData['judul'];
        $suka_cita->deskripsi = $validatedData['deskripsi'];
        $suka_cita->created_at = $validatedData['tanggal']; // Gunakan tanggal yang disediakan oleh pengguna
        $suka_cita->detail_berita = $validatedData['detail_berita'];

        // Handle file upload jika ada
        if ($request->hasFile('image_file')) {
            $image = $request->file('image_file');
            $imageName = time() . '.' . $image->extension();
            $image->move(public_path('uploads/berita'), $imageName);
            $suka_cita->image_file = 'uploads/berita/' . $imageName;
        }

        $suka_cita->save();

        // Redirect ke halaman yang sesuai atau tampilkan pesan sukses
        return redirect('berita/sukacita/list_berita')->with('success', 'Data berhasil disimpan.');
    }

    public function update_berita(Request $request, $id)
    {
        // Validasi request
        $validatedData = $request->validate([
            'judul' => 'required|string|max:255',
            'deskripsi' => 'required|string|max:255',
            'tanggal' => 'required|date',
            'image_file' => 'nullable|image|max:2048',
            'detail_berita' => 'nullable|string',
        ]);

        $suka_cita = SukaCitaModel::findOrFail($id);

        // Update data arus berita dengan data baru
        $suka_cita->judul = $validatedData['judul'];
        $suka_cita->deskripsi = $validatedData['deskripsi'];
        $suka_cita->created_at = $validatedData['tanggal']; // Gunakan tanggal yang disediakan oleh pengguna
        $suka_cita->detail_berita = $validatedData['detail_berita'];

        // Handle file upload jika ada
        if ($request->hasFile('image_file')) {
            // Hapus gambar lama jika ada
            if ($suka_cita->image_file) {
                // Hapus gambar lama dengan menggunakan fungsi unlink
                unlink(public_path($suka_cita->image_file));
            }
            // Upload gambar baru
            $image = $request->file('image_file');
            $imageName = time() . '.' . $image->extension();
            $image->move(public_path('uploads/berita'), $imageName);
            $suka_cita->image_file = 'uploads/berita/' . $imageName;
        }

        // Simpan perubahan
        $suka_cita->save();

        // Redirect ke halaman yang sesuai atau tampilkan pesan sukses
        return redirect('berita/sukacita/list_berita')->with('success', 'Data berhasil diperbarui.');
    }

    public function destroy_berita($id)
    {
        $suka_cita = SukaCitaModel::findOrFail($id);

        // Hapus gambar terkait jika ada
        if ($suka_cita->image_file) {
            Storage::delete($suka_cita->image_file);
        }

        $suka_cita->delete();

        // Redirect ke halaman yang sesuai atau tampilkan pesan sukses
        return redirect('berita/sukacita/list_berita')->with('success', 'Data berhasil dihapus.');
    }

}
