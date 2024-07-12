<?php

namespace App\Http\Controllers;

use App\Models\BulananModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Auth;
use App\Models\HomeModel;   

class BulananController extends Controller
{
    public function create(Request $request)
    {
        $nama_gereja = $request->gereja->nama_gereja; 
        return view('admin.keuangan.kas.tambah_kas', compact('nama_gereja'));
    }

    public function view_bulanan(Request $request, $nama_gereja)
    {
        $gereja = $request->gereja;
        $bulanan = BulananModel::where('gereja_id', $gereja->id)->get();
        $data_home = HomeModel::where('gereja_id', $gereja->id)->first();
        return view('view.keuangan.bulanan', compact('bulanan','nama_gereja','data_home'));
    }

    public function listbulanan(Request $request)
    {
        $bulanan = BulananModel::where('gereja_id', Auth::user()->gereja_id)->get();
        $nama_gereja = $request->gereja->nama_gereja; 
        return view('admin.keuangan.kas.list_kas', compact('bulanan','nama_gereja'));
    }

    public function store(Request $request)
    {

        $request->validate([
            'bulan' => 'required|string|max:255',
            'jumlah' => 'required|string|max:255',
            'tahun' => 'required|string|max:255',
        ]);

        $bulanan = new BulananModel($request->all());
        $bulanan->gereja_id = Auth::user()->gereja->id;
        $bulanan->save();

        return redirect()->back()->with('success', 'Data berhasil ditambahkan');
    }
}
