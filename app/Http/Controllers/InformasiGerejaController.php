<?php

namespace App\Http\Controllers;

use App\Models\BPHModel;
use App\Models\PendetaModel;
use App\Models\Gereja;
use App\Models\HomeModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;


class InformasiGerejaController extends Controller
{

    public function add(Request $request)
    {
        $nama_gereja = $request->gereja->nama_gereja; 
        return view('admin.gereja.sejarah.add',compact('nama_gereja'));
    }

    public function add_bph(Request $request)
    {
        $nama_gereja = $request->gereja->nama_gereja; 
        return view('admin.gereja.bph.add',compact('nama_gereja'));
    }

    public function add_pendeta(Request $request)
    {
        $nama_gereja = $request->gereja->nama_gereja; 
        return view('admin.gereja.pendeta.add',compact('nama_gereja'));
    }

    public function list_bph(Request $request)
    {
        $bphs = BPHModel::where('gereja_id', Auth::user()->gereja_id)->get();
        $nama_gereja = $request->gereja->nama_gereja; 
        return view('admin.gereja.bph.list', compact('bphs','nama_gereja'));
    }

    public function list_pendeta(Request $request)
    {
        $pendeta = PendetaModel::where('gereja_id', Auth::user()->gereja_id)->get();
        $nama_gereja = $request->gereja->nama_gereja; 
        return view('admin.gereja.pendeta.list', compact('pendeta','nama_gereja'));
    }

    public function overview_bph(Request $request)
    {
        $nama_gereja = $request->gereja->nama_gereja; 
        return view('gereja.bph',compact('nama_gereja'));
    }



    public function post_bph(Request $request)
    {
        $validatedData = $request->validate([
            'nama' => 'required|string',
            'jabatan' => 'required|string',
            'gambar' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'deskripsi_singkat' => 'nullable|string',
        ]);

        $bph = new BPHModel();
        $bph->nama = $validatedData['nama'];
        $bph->jabatan = $validatedData['jabatan'];
        $bph->deskripsi_singkat = $validatedData['deskripsi_singkat'];
        $bph->gereja_id = Auth::user()->gereja->id;

        // Upload gambar jika ada
        if ($request->hasFile('gambar')) {
            $gambar = $request->file('gambar');
            $gambarName = time() . '.' . $gambar->extension(); // Simpan gambar ke storage

            // Simpan path gambar ke dalam database
            $gambarPath = $gambar->storeAs('uploads', $gambarName, 'public'); 
            $gambar->move(public_path('uploads'), $gambarName);
            $bph->gambar = $gambarPath;
        }

        $bph->save();

        // Redirect ke halaman yang sesuai setelah data disimpan
        return redirect()->back()->with('success', 'BPH telah berhasil diunggah!');
    }

    public function view_bph(Request $request)
    {
        $gereja =  $request->gereja;
        $data_bph = BPHModel::where('gereja_id', $gereja->id)->get();
        $data_home = HomeModel::where('gereja_id', $gereja->id)->first();
        $nama_gereja = $gereja->nama_gereja; 
        return view('view.bph.bph', compact('data_bph','data_home', 'nama_gereja')); // Kirimkan data BPH ke view
    }

    public function view_gembala(Request $request)
    {
        $gereja = $request->gereja;
        $data_gembala = PendetaModel::where('gereja_id', $gereja->id)->get();
        $data_home = HomeModel::where('gereja_id', $gereja->id)->first();
        $nama_gereja = $gereja->nama_gereja; 
        return view('view.bph.gembala', compact('data_gembala','nama_gereja','data_home')); // Kirimkan data BPH ke view
    }


    public function store_pendeta(Request $request)
    {
        $validatedData = $request->validate([
            'nama_pendeta' => 'required|string',
            'jabatan' => 'required|string',
            'gambar' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'deskripsi_singkat' => 'nullable|string',
        ]);

        $pendeta = new PendetaModel();
        $pendeta->nama_pendeta = $validatedData['nama_pendeta'];
        $pendeta->jabatan = $validatedData['jabatan'];
        $pendeta->deskripsi_singkat = $validatedData['deskripsi_singkat'];
        $pendeta->gereja_id = Auth::user()->gereja->id;

        // Upload gambar jika ada
        if ($request->hasFile('gambar')) {
            $gambar = $request->file('gambar');
            $gambarName = time() . '.' . $gambar->extension(); // Simpan gambar ke storage

            // Simpan path gambar ke dalam database
            $gambarPath = $gambar->storeAs('uploads', $gambarName, 'public'); 
            $gambar->move(public_path('uploads'), $gambarName);
            $pendeta->gambar = $gambarPath;
        }

        $pendeta->save();
        

        // Redirect ke halaman yang sesuai setelah data disimpan
        return redirect()->back()->with('success', 'Pendeta telah berhasil diunggah!');
    }



}
