<?php

namespace App\Http\Controllers;

use App\Models\Gereja;
use Illuminate\Http\Request;

class GerejaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $gereja = Gereja::all(); 
        return view('admin.info-gereja.index', compact('gereja'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.info-gereja.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'nama_gereja' => 'required|string|max:255',
            'kutipan' => 'required|string|max:1024',
            'online' => 'required|string|max:1024',
            'sesi' => 'required|string|max:1024',
            'kontak' => 'required|string|max:1024',
        ]);

        $info = new Gereja();
        $info->nama_gereja = $validatedData['nama_gereja'];
        $info->kutipan = $validatedData['kutipan'];
        $info->online = $validatedData['online'];
        $info->sesi = $validatedData['sesi'];
        $info->kontak = $validatedData['kontak'];

        if ($info->save()) {
            return redirect()->route('info.index')->with('success', 'Data informasi gereja berhasil disimpan.');
        } else {
            return redirect()->route('info.create')->withErrors(['error' => 'Gagal menyimpan data informasi gereja.']);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Gereja $gereja)
    {
        return view('admin.info-gereja.show', compact('gereja'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $gereja = Gereja::findOrFail($id);
        return view('admin.info-gereja.edit', compact('gereja'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'nama_gereja' => 'required|string|max:255',
            'kutipan' => 'required|string|max:1024',
            'online' => 'required|string|max:1024',
            'sesi' => 'required|string|max:1024',
            'kontak' => 'required|string|max:1024',
        ]);

        $info = Gereja::findOrFail($id);
        $info->nama_gereja = $validatedData['nama_gereja'];
        $info->kutipan = $validatedData['kutipan'];
        $info->online = $validatedData['online'];
        $info->sesi = $validatedData['sesi'];
        $info->kontak = $validatedData['kontak'];

        if ($info->save()) {
            return redirect()->route('info.index')->with('success', 'Data informasi gereja berhasil diperbarui.');
        } else {
            return redirect()->route('info.edit', $id)->withErrors(['error' => 'Gagal memperbarui data informasi gereja.']);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $info = Gereja::findOrFail($id);

        if ($info->delete()) {
            return redirect()->route('info.index')->with('success', 'Data informasi gereja berhasil dihapus.');
        } else {
            return redirect()->route('info.index')->withErrors(['error' => 'Gagal menghapus data informasi gereja.']);
        }
    }
}
