<?php

namespace App\Http\Controllers;

use App\Models\Gereja;
use App\Models\Warta;
use App\Models\WartaModel;
use App\Models\HomeModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;


class WartaController extends Controller
{
    public function warta()
    {
        $gereja = Auth::user()->gereja;
        $wartas = WartaModel::where('gereja_id', $gereja->id)->get();
        $nama_gereja = $gereja->nama_gereja; 
        return view('admin.warta.list_warta', compact('wartas','nama_gereja'));
    }

    public function view_warta(Request $request)
    {
        $gereja = $request->gereja;
        $warta = WartaModel::where('gereja_id', $gereja->id)->get();
        $nama_gereja = $gereja->nama_gereja; 
        $data_home = HomeModel::where('gereja_id', $gereja->id)->first();
        return view('view.postingan.warta', compact('warta', 'nama_gereja','data_home'));
    }

    public function listWarta(Request $request)
    {
        $nama_gereja = $request->gereja->nama_gereja; 
        return view('admin.warta.list_warta', compact('nama_gereja'));
    }

    public function tambah_warta(Request $request)
    {
        $nama_gereja = $request->gereja->nama_gereja; 
        return view('admin.warta.tambah_warta', compact('nama_gereja'));
    }

    public function simpan_warta(Request $request)
    {
        $validatedData = $request->validate([
            'judul' => 'required',
            'deskripsi' => 'required',
            'gambar_option' => 'required|in:default,custom',
            'gambar' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'tanggal' => 'required|date',
            'pengkotbah_pagi' => 'nullable|string',
            'liturgis_pagi' => 'nullable|string',
            'singers_pagi' => 'nullable|string',
            'pemusik_pagi' => 'nullable|string',
            'tamborin_pagi' => 'nullable|string',
            'penyambut_jemaat_pagi' => 'nullable|string',
            'operator_camera_pagi' => 'nullable|string',
            'operator_computer_pagi' => 'nullable|string',
            'operator_sound_pagi' => 'nullable|string',
            'pengkotbah_siang' => 'nullable|string',
            'liturgis_siang' => 'nullable|string',
            'singers_siang' => 'nullable|string',
            'pemusik_siang' => 'nullable|string',
            'tamborin_siang' => 'nullable|string',
            'penyambut_jemaat_siang' => 'nullable|string',
            'operator_camera_siang' => 'nullable|string',
            'operator_computer_siang' => 'nullable|string',
            'operator_sound_siang' => 'nullable|string',
            'tata_ibadah' => 'nullable|string',
            'laporan_persembahan' => 'nullable|string',
            'laporan_perpuluhan' => 'nullable|string',
        ]);
    
        $warta = new WartaModel();
        $warta->judul = $validatedData['judul'];
        $warta->deskripsi = $validatedData['deskripsi'];
        $warta->tanggal = $validatedData['tanggal'];
        $warta->pengkotbah_pagi = $validatedData['pengkotbah_pagi'];
        $warta->liturgis_pagi = $validatedData['liturgis_pagi'];
        $warta->singers_pagi = $validatedData['singers_pagi'];
        $warta->pemusik_pagi = $validatedData['pemusik_pagi'];
        $warta->tamborin_pagi = $validatedData['tamborin_pagi'];
        $warta->penyambut_jemaat_pagi = $validatedData['penyambut_jemaat_pagi'];
        $warta->operator_camera_pagi = $validatedData['operator_camera_pagi'];
        $warta->operator_computer_pagi = $validatedData['operator_computer_pagi'];
        $warta->operator_sound_pagi = $validatedData['operator_sound_pagi'];
        $warta->pengkotbah_siang = $validatedData['pengkotbah_siang'];
        $warta->liturgis_siang = $validatedData['liturgis_siang'];
        $warta->singers_siang = $validatedData['singers_siang'];
        $warta->pemusik_siang = $validatedData['pemusik_siang'];
        $warta->tamborin_siang = $validatedData['tamborin_siang'];
        $warta->penyambut_jemaat_siang = $validatedData['penyambut_jemaat_siang'];
        $warta->operator_camera_siang = $validatedData['operator_camera_siang'];
        $warta->operator_computer_siang = $validatedData['operator_computer_siang'];
        $warta->operator_sound_siang = $validatedData['operator_sound_siang'];
        $warta->tata_ibadah = $validatedData['tata_ibadah'];
        $warta->laporan_persembahan = $validatedData['laporan_persembahan'];
        $warta->laporan_perpuluhan = $validatedData['laporan_perpuluhan'];
        $warta->gereja_id = Auth::user()->gereja->id;

    
        if ($validatedData['gambar_option'] == 'custom' && $request->hasFile('gambar')) {
            $image = $request->file('gambar');
            $imageName = time() . '.' . $image->extension();
            $imagePath = $image->storeAs('uploads', $imageName, 'public');
            $image->move(public_path('uploads'), $imageName);
            $warta->gambar = $imagePath;
        } else {
            $warta->gambar = 'admin/default.jpg';
        }
    
        $warta->save();
    
        return redirect()->back()->with('success', 'Warta berhasil ditambahkan');
    }
    

    public function warta_single(Request $request, $nama_gereja, $id)
    {
        $gereja = $request->gereja;
        $wartas = WartaModel::where('id',$id)->get();
        $nama_gereja = $gereja->nama_gereja;
        $data_home = HomeModel::where('gereja_id', $gereja->id)->first();
        return view('view.postingan.warta_single', compact('wartas', 'nama_gereja','data_home'));
    }
}
