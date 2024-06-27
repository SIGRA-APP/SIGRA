<?php

namespace App\Http\Controllers;

use App\Models\HomeModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Menampilkan halaman formulir.
     *
     * @return \Illuminate\View\View
     */
    public function view_home(Request $request)
    {
        
        try {
            $gereja = $request->gereja;
            $data_home = HomeModel::where('gereja_id',$gereja->id);
            $nama_gereja = $gereja->nama_gereja; 
            return view('view.home.home', compact('data_home', 'nama_gereja'));
        } catch (\Illuminate\Database\Eloquent\ModelNotFoundException $e) {
            return redirect()->route('error.page')->with('error', 'Home data not found');
        }
    }

    public function index(Request $request)
    {
        $nama_gereja = $request->gereja->nama_gereja; 
        return view('admin.home.tambah_home', compact('nama_gereja'));
    }

    /**
     * Menyimpan data yang diinput ke dalam tabel "church_info".
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
        // Validasi request
        $request->validate([
            'jam_mulai_pagi' => 'required',
            'jam_selesai_pagi' => 'required',
            'jam_mulai_siang' => 'required',
            'jam_selesai_siang' => 'required',
            'youtube' => 'required',
            'link' => 'required|url',
            'kartu_keluarga' => 'required|string',
            'total_jemaat' => 'required|integer',
            'total_bph' => 'required|integer',
            'total_pendeta' => 'required|integer',
            'no_telp' => 'required',
            'email' => 'required|email',
        ]);

        $home = new HomeModel($request->all());
        $home->gereja_id = Auth::user()->gereja->id;
        $home->save();

        return redirect()->back()->with('success', 'Data berhasil disimpan.');
    }
}
