<?php

namespace App\Http\Controllers;

use App\Models\BPHModel;
use App\Models\PendetaModel;
use App\Models\Gereja;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;


class InformasiGerejaController extends Controller
{

   

    public function add()
    {
        return view('admin.gereja.sejarah.add');
    }

    public function add_bph()
    {
        return view('admin.gereja.bph.add');
    }

    public function add_pendeta()
    {
        return view('admin.gereja.pendeta.add');
    }

    public function list_bph()
    {
        $bphs = BPHModel::where('gereja_id', Auth::user()->gereja_id)->get();
        return view('admin.gereja.bph.list', compact('bphs'));
    }

    public function list_pendeta()
    {
        $pendeta = PendetaModel::where('gereja_id', Auth::user()->gereja_id)->get();
        return view('admin.gereja.pendeta.list', compact('pendeta'));
    }

    public function overview_bph()
    {
        return view('gereja.bph');
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
            $gambarPath = $gambar->store('public/images'); // Simpan gambar ke storage

            // Simpan path gambar ke dalam database
            $bph->gambar = Storage::url($gambarPath);
        }

        $bph->save();

        // Redirect ke halaman yang sesuai setelah data disimpan
        return redirect()->route('bph.list')->with('success', 'BPH telah berhasil diunggah!');
    }

    public function view_bph(Request $request)
    {
        $gereja =  $request->gereja;
        $data_bph = BPHModel::where('gereja_id', $gereja->id)->get();
        return view('view.bph.bph', compact('data_bph')); // Kirimkan data BPH ke view
    }

    public function view_gembala(Request $request)
    {
        $gereja = $request->gereja;
        $data_gembala = PendetaModel::where('gereja_id', $gereja->id)->get();
        return view('view.bph.gembala', compact('data_gembala')); // Kirimkan data BPH ke view
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
            $gambarPath = $gambar->store('public/images'); // Simpan gambar ke storage

            // Simpan path gambar ke dalam database
            $pendeta->gambar = Storage::url($gambarPath);
        }

        $pendeta->save();

        // Redirect ke halaman yang sesuai setelah data disimpan
        return redirect()->route('pendeta.list')->with('success', 'Pendeta telah berhasil diunggah!');
    }



}
