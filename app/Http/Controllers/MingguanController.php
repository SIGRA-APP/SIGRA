<?php

namespace App\Http\Controllers;

use App\Models\MingguanModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MingguanController extends Controller
{
    public function createmingguan(Request $request)
    {
        $nama_gereja = $request->gereja->nama_gereja; 
        return view('admin.keuangan.persembahan.tambah_keuangan',compact('nama_gereja'));
    }

    public function view_mingguan(Request $request)
    {
        $gereja = $request->gereja;
        $mingguan = MingguanModel::where('gereja_id', $gereja->id)->get();
        $nama_gereja = $gereja->nama_gereja; 
        return view('view.keuangan.mingguan', compact('mingguan','nama_gereja'));
    }

    public function listmingguan(Request $request)
    {

        $gereja = Auth::user()->gereja;
        $mingguan = MingguanModel::where('gereja_id', $gereja->id)->get();
        $nama_gereja = $request->gereja->nama_gereja; 
        return view('admin.keuangan.persembahan.list_keuangan', compact('mingguan','nama_gereja'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_minggu' => 'required|string|max:255',
            'tanggal' => 'required|date',
            'jumlah' => 'required|string|max:100',
        ]);
    
        $mingguan = new MingguanModel($request->all());
        $mingguan->gereja_id = Auth::user()->gereja->id;
        $mingguan->save();
    
        return redirect()->back()->with('success', 'Data berhasil ditambahkan');
    }
}
