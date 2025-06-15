<?php

namespace App\Http\Controllers;

use App\Models\Pasien;
use App\Models\Dokter; // Import Dokter model
use Illuminate\Http\Request;

class PasienController extends Controller
{
    public function index()
    {
        $pasiens = Pasien::with('dokter')->orderBy('created_at', 'desc')->paginate(10); // Fetch patients with their associated doctors
        return view('pasien.index', compact('pasiens'));
    }

    public function create()
    {
        $dokters = Dokter::all(); // Get all doctors
        return view('pasien.create', compact('dokters'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'nim' => 'required|string|max:50|unique:pasiens,nim',
            'nama' => 'required|string|max:255',
            'tanggal_lahir' => 'required|date',
            'no_telepon' => 'required|string|max:20',
            'jenis_kelamin' => 'required|in:Laki-laki,Perempuan',
            'dokter_id' => 'nullable|exists:dokters,id', // Validate dokter_id
        ]);

        Pasien::create($validated);

        return redirect()->route('pasien.index')->with('success', 'Data pasien berhasil ditambahkan.');
    }

    public function edit(Pasien $pasien)
    {
        $dokters = Dokter::all(); // Get all doctors
        return view('pasien.edit', compact('pasien', 'dokters'));
    }

    public function update(Request $request, Pasien $pasien)
    {
        $validated = $request->validate([
            'nim' => 'required|string|max:50|unique:pasiens,nim,' . $pasien->id,
            'nama' => 'required|string|max:255',
            'no_telepon' => 'required|string|max:20',
            'jenis_kelamin' => 'required|in:Laki-laki,Perempuan',
            'dokter_id' => 'nullable|exists:dokters,id', // Validate dokter_id
        ]);

        $pasien->update($validated);

        return redirect()->route('pasien.index')->with('success', 'Data pasien berhasil diperbarui.');
    }
}
