<?php

namespace App\Http\Controllers;

use App\Models\BulananModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class BulananController extends Controller
{
    public function create()
    {
        return view('admin.keuangan.kas.tambah_kas');
    }

    public function view_bulanan()
    {
        $bulanan = BulananModel::all();
        return view('view.keuangan.bulanan', compact('bulanan'));
    }

    public function listbulanan()
    {
        $bulanan = BulananModel::all();
        return view('admin.keuangan.kas.list_kas', compact('bulanan'));
    }

    public function store(Request $request)
    {
        Log::info('Store method called'); // Log ini untuk memastikan method store dipanggil

        $request->validate([
            'bulan' => 'required|string|max:255',
            'jumlah' => 'required|string|max:255',
        ]);

        Log::info('Validation passed'); // Log ini untuk memastikan validasi lulus

        $data = $request->all();
        Log::info('Data to be saved: ', $data); // Log ini untuk melihat data yang akan disimpan

        BulananModel::create($data);

        Log::info('Data saved successfully'); // Log ini untuk memastikan data berhasil disimpan

        return redirect()->route('listbulanan')->with('success', 'Data berhasil ditambahkan');
    }
}
