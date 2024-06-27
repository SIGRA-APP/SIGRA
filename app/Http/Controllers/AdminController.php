<?php

namespace App\Http\Controllers;

use App\Models\Gereja;
use Illuminate\Support\Facades\Hash;
use App\Models\Users;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $admin = Users::where('role', 'admin')->get(); 
        return view('admin.user.index', compact('admin'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $gereja = Gereja::all(); 
        return view('admin.user.create', compact('gereja'));
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
            return redirect()->route('list-admin.index')->with('success', 'Admin gereja berhasil disimpan.');
        } else {
            return redirect()->route('list-admin.create')->withErrors(['error' => 'Gagal menyimpan data Admin Gereja.']);
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
    public function edit($id)
    {
        $gereja = Gereja::all(); 
        $admin = Users::findOrFail($id);
        return view('admin.user.edit', compact('admin','gereja'));
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

        $admin = Users::findOrFail($id);
        $admin->name = $validatedData['name'];
        $admin->username = $validatedData['username'];
        $admin->email = $validatedData['email'];
        $admin->gereja_id = $validatedData['gereja_id'];

        if (!empty($validatedData['password'])) {
            $admin->password = Hash::make($validatedData['password']);
        }

        if ($admin->save()) {
            return redirect()->route('list-admin.index')->with('success', 'Admin gereja berhasil diperbarui.');
        } else {
            return redirect()->route('list-admin.edit', $admin->id)->withErrors(['error' => 'Gagal memperbarui data Admin Gereja.']);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Users $admin)
    {
        if ($admin->delete()) {
            return redirect()->route('list-admin.index')->with('success', 'Admin gereja berhasil dihapus.');
        } else {
            return redirect()->route('list-admin.index')->withErrors(['error' => 'Gagal menghapus data Admin Gereja.']);
        }
    }
}
