<?php

namespace App\Http\Controllers;

use App\Models\Gereja;
use Illuminate\Support\Facades\Hash;
use App\Models\Users;
use Illuminate\Http\Request;
use Laravel\Ui\Presets\React;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $nama_gereja = Gereja::first()->nama_gereja;
        $admin = Users::where('role', 'admin')->get(); 
        return view('admin.user.index', compact('admin','nama_gereja'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $nama_gereja = Gereja::first()->nama_gereja;
        $gereja = Gereja::all(); 
        return view('admin.user.create', compact('gereja','nama_gereja'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'username' => 'required|string|max:1024',
            'email' => 'required|string|max:1024',
            'password' => 'required|string|max:1024',
            'gereja_id' => 'required|string|max:1024'
        ]);

        $admin = new Users();
        $admin->name = $validatedData['name'];
        $admin->username = $validatedData['username'];
        $admin->email = $validatedData['email'];
        $admin->password = Hash::make($validatedData['password']);
        $admin->gereja_id = $validatedData['gereja_id'];
        $admin->role = 'admin';

        if ($admin->save()) {
            return redirect()->back()->with('success', 'Admin gereja berhasil disimpan.');
        } else {
            return redirect()->back()->withErrors(['error' => 'Gagal menyimpan data Admin Gereja.']);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Users $admin)
    {
        return view('admin.user.show', compact('admin'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($nama_gereja, $id)
    {
        $gereja = Gereja::all();
        $admin = Users::where('id',$id)->first();
        return view('admin.user.edit', compact('admin','gereja','nama_gereja'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'username' => 'required|string|max:1024',
            'email' => 'required|string|max:1024',
            'gereja_id' => 'required|string|max:1024'
        ]);

        

        $admin = Users::findOrFail($request->admin_id);
        $admin->name = $validatedData['name'];
        $admin->username = $validatedData['username'];
        $admin->email = $validatedData['email'];
        $admin->gereja_id = $validatedData['gereja_id'];

        if (!empty($validatedData['password'])) {
            $admin->password = Hash::make($validatedData['password']);
        }

        if ($admin->save()) {
            return redirect()->back()->with('success', 'Admin gereja berhasil diperbarui.');
        } else {
            return redirect()->back()->withErrors(['error' => 'Gagal memperbarui data Admin Gereja.']);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request)
    {
        $admin = Users::findOrFail($request->admin_id);
        if ($admin->delete()) {
            return redirect()->back()->with('success', 'Admin gereja berhasil dihapus.');
        } else {
            return redirect()->back()->withErrors(['error' => 'Gagal menghapus data Admin Gereja.']);
        }
    }
}
