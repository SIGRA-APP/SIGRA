<?php

namespace App\Http\Controllers;

use App\Models\MingguanModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MingguanController extends Controller
{
    public function createmingguan()
    {
        return view('admin.keuangan.persembahan.tambah_keuangan');
    }

    public function view_mingguan(Request $request)
    {
        $gereja = $request->gereja;
        $mingguan = MingguanModel::where('gereja_id', $gereja->id)->get();
        return view('view.keuangan.mingguan', compact('mingguan'));
    }

    public function listmingguan()
    {

        $gereja = Auth::user()->gereja;
        $mingguan = MingguanModel::where('gereja_id', $gereja->id)->get();
        return view('admin.keuangan.persembahan.list_keuangan', compact('mingguan'));
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
    
        return redirect()->route('listmingguan')->with('success', 'Data berhasil ditambahkan');
    }
}
