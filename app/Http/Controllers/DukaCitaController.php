<?php

namespace App\Http\Controllers;

use App\Models\DukaCitaModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class DukaCitaController extends Controller
{
    public function berita()
    {
        return view('admin.berita.dukacita.list_berita');
    }

    public function edit_berita($id)
    {
        $duka_cita = DukaCitaModel::findOrFail($id);

        return view('admin.berita.dukacita.edit_berita', compact('duka_cita'));
    }

    public function tambah_berita()
    {
        return view('admin.berita.dukacita.tambah_berita');
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
        $duka_cita = new DukaCitaModel();
        $duka_cita->judul = $validatedData['judul'];
        $duka_cita->deskripsi = $validatedData['deskripsi'];
        $duka_cita->created_at = $validatedData['tanggal']; // Gunakan tanggal yang disediakan oleh pengguna
        $duka_cita->detail_berita = $validatedData['detail_berita'];

        // Handle file upload jika ada
        if ($request->hasFile('image_file')) {
            $image = $request->file('image_file');
            $imageName = time() . '.' . $image->extension();
            $image->move(public_path('uploads/berita'), $imageName);
            $duka_cita->image_file = 'uploads/berita/' . $imageName;
        }

        $duka_cita->save();

        // Redirect ke halaman yang sesuai atau tampilkan pesan sukses
        return redirect('berita/dukacita/list_berita')->with('success', 'Data berhasil disimpan.');
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

        $duka_cita = DukaCitaModel::findOrFail($id);

        // Update data arus berita dengan data baru
        $duka_cita->judul = $validatedData['judul'];
        $duka_cita->deskripsi = $validatedData['deskripsi'];
        $duka_cita->created_at = $validatedData['tanggal']; // Gunakan tanggal yang disediakan oleh pengguna
        $duka_cita->detail_berita = $validatedData['detail_berita'];

        // Handle file upload jika ada
        if ($request->hasFile('image_file')) {
            // Hapus gambar lama jika ada
            if ($duka_cita->image_file) {
                // Hapus gambar lama dengan menggunakan fungsi unlink
                unlink(public_path($duka_cita->image_file));
            }
            // Upload gambar baru
            $image = $request->file('image_file');
            $imageName = time() . '.' . $image->extension();
            $image->move(public_path('uploads/berita'), $imageName);
            $duka_cita->image_file = 'uploads/berita/' . $imageName;
        }

        // Simpan perubahan
        $duka_cita->save();

        // Redirect ke halaman yang sesuai atau tampilkan pesan sukses
        return redirect('berita/dukacita/list_berita')->with('success', 'Data berhasil diperbarui.');
    }

    public function destroy_berita($id)
    {
        $duka_cita = DukaCitaModel::findOrFail($id);

        // Hapus gambar terkait jika ada
        if ($duka_cita->image_file) {
            Storage::delete($duka_cita->image_file);
        }

        $duka_cita->delete();

        // Redirect ke halaman yang sesuai atau tampilkan pesan sukses
        return redirect('berita/dukacita/list_berita')->with('success', 'Data berhasil dihapus.');
    }

}
