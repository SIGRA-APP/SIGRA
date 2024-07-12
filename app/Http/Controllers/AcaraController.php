<?php

namespace App\Http\Controllers;

use App\Models\UpcomingModel;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use App\Models\HomeModel;

class AcaraController extends Controller
{
    public function upcoming(Request $request)
    {
        $nama_gereja = $request->gereja->nama_gereja; 
        return view('acara.upcoming',compact('nama_gereja'));
    }

    public function view_upcoming(Request $request)
    {
        $gereja = $request->gereja;
        $upcoming = UpcomingModel::where('gereja_id', $gereja->id)->get();
        $nama_gereja = $gereja->nama_gereja; 
        $data_home = HomeModel::where('gereja_id', $gereja->id)->first();
        return view('view.acara.akan_datang', compact('upcoming', 'nama_gereja', 'data_home')); // Kirimkan data BPH ke view
    }

    //untuk view tambah upcoming
    public function tambah_upcoming(Request $request)
    {
        $nama_gereja = $request->gereja->nama_gereja; 
        return view('admin.acara.upcoming.tambah_acara',compact('nama_gereja'));
    }

    public function listupcoming(Request $request)
    {
        $upcomingEvents = UpcomingModel::where('gereja_id', Auth::user()->gereja_id)->get();
        $nama_gereja = $request->gereja->nama_gereja; 
        return view('admin.acara.upcoming.list_acara', compact('upcomingEvents','nama_gereja'));
    }

    //masukkan data ke database
    public function insert_upcoming(Request $request)
    {
        // Validasi data yang diterima dari form
        $request->validate([
            'judul' => 'required',
            'hari' => 'required',
            'tanggal' => 'required|date', // Sesuaikan dengan kebutuhan validasi
            'waktu' => 'required',
            'lokasi' => 'required',
            'gambar' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'detail_kegiatan' => 'required',
        ]);

        // Jika ada file gambar yang diunggah, simpan dan atur nama gambar
        if ($request->hasFile('gambar')) {
            $image = $request->file('gambar');
            $imageName = time() . '.' . $image->extension();
            // Simpan gambar ke dalam penyimpanan (storage)
            $imageName = $image->storeAs('uploads', $imageName, 'public');
            $image->move(public_path('uploads'), $imageName);
        }

        // Buat data acara baru
        $acara = new UpcomingModel([
            'judul' => $request->input('judul'),
            'hari' => $request->input('hari'),
            'tanggal' => $request->input('tanggal'),
            'waktu' => $request->input('waktu'),
            'lokasi' => $request->input('lokasi'),
            'gambar' => $imageName ?? null, // Simpan nama gambar yang sudah di-generate jika ada, jika tidak, gunakan null
            'detail_kegiatan' => $request->input('detail_kegiatan'),
            'gereja_id' => Auth::user()->gereja_id
        ]);

        // Simpan data acara ke database
        $acara->save();

        // Redirect dengan pesan sukses
        return redirect()->back()->with('success', 'Upcoming berhasil ditambahkan!');
    }

    public function update_upcoming(Request $request, $id)
    {
        // Validasi data yang diterima dari form
        $request->validate([
            'judul' => 'required',
            'deskripsi' => 'required',
            'tanggal_waktu' => 'required|date_format:Y-m-d\TH:i',
            'gambar' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'detail_kegiatan' => 'required',
        ]);

        // Mengambil data acara berdasarkan ID
        $acara = new UpcomingModel();

        // Mengupdate data acara dengan data yang diterima dari form
        $acara->judul = $request->judul;
        $acara->deskripsi = $request->deskripsi;
        $acara->tanggal_waktu = $request->tanggal_waktu;
        $acara->detail_kegiatan = $request->detail_kegiatan;

        // Jika ada file gambar yang diunggah, simpan gambar baru
        if ($request->hasFile('gambar')) {
            $image = $request->file('gambar');
            $imageName = time() . '.' . $image->extension();
            $imagePath = $image->storeAs('uploads', $imageName, 'public');
            $acara->gambar = $imagePath;  // Update property 'gambar' of the model.
            $image->move(public_path('uploads'), $imageName);
        }

        // Simpan perubahan ke dalam database
        $acara->save();

        // Redirect dengan pesan sukses
        return redirect()->back()->with('success', 'Acara berhasil diperbarui!');
    }


    public function destroy_upcoming($id)
    {
        // Cari data acara berdasarkan ID
        $acara = UpcomingModel::findOrFail($id);

        // Hapus gambar terkait dari penyimpanan jika ada
        if (file_exists(public_path('images/' . $acara->gambar))) {
            unlink(public_path('images/' . $acara->gambar));
        }

        // Hapus data acara dari database
        $acara->delete();

        // Redirect dengan pesan sukses
        return redirect()->route('acara.upcoming.list_acara')->with('success', 'Acara berhasil dihapus!');
    }

    public function akan_datang_single(Request $request, $nama_gereja, $id)
    {
        $gereja =  $request->gereja;
        $upcomings = UpcomingModel::where('id', $id)->get();
        $data_home = HomeModel::where('gereja_id', $gereja->id)->first();
        return view('view.acara.akan_datang_single', compact('upcomings','nama_gereja','data_home'));
    }
}


