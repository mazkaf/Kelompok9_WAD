<?php

namespace App\Http\Controllers;

use App\Models\Pasien;
use Illuminate\Http\Request;

class PasienController extends Controller
{
    // Removed auth middleware to allow public access to CRUD

    /**
     * Display a listing of the pasien.
     */
    public function index()
    {
        $pasiens = Pasien::orderBy('created_at', 'desc')->paginate(10);
        return view('pasien.index', compact('pasiens'));
    }

    /**
     * Show the form for creating a new pasien.
     */
    public function create()
    {
        return view('pasien.create');
    }

    /**
     * Store a newly created pasien in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'nim' => 'required|string|max:50|unique:pasiens,nim',
            'nama' => 'required|string|max:255',
            'tanggal_lahir' => 'required|date',
            'no_telepon' => 'required|string|max:20',
            'jenis_kelamin' => 'required|in:Laki-laki,Perempuan',
        ]);

        Pasien::create($validated);

        return redirect()->route('pasien.index')->with('success', 'Data pasien berhasil ditambahkan.');
    }

    /**
     * Show the form for editing the specified pasien.
     */
    public function edit(Pasien $pasien)
    {
        return view('pasien.edit', compact('pasien'));
    }

    /**
     * Update the specified pasien in storage.
     */
    public function update(Request $request, Pasien $pasien)
    {
        $validated = $request->validate([
            'nim' => 'required|string|max:50|unique:pasiens,nim,' . $pasien->id,
            'nama' => 'required|string|max:255',
            'tanggal_lahir' => 'required|date',
            'no_telepon' => 'required|string|max:20',
            'jenis_kelamin' => 'required|in:Laki-laki,Perempuan',
        ]);

        $pasien->update($validated);

        return redirect()->route('pasien.index')->with('success', 'Data pasien berhasil diperbarui.');
    }

    /**
     * Remove the specified pasien from storage.
     */
    public function destroy(Pasien $pasien)
    {
        $pasien->delete();
        return redirect()->route('pasien.index')->with('success', 'Data pasien berhasil dihapus.');
    }
}

