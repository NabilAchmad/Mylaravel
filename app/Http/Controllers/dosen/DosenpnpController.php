<?php

namespace App\Http\Controllers\dosen;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DosenpnpController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $dosens = DB::table('dosens')->get();
        return view('dosens.index', compact('dosens'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('dosens.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
            'nik' => 'required|string|max:255',
            'email' => 'required|string|email|unique:dosens,email',
            'nohp' => 'nullable|string|max:15',
            'alamat' => 'nullable|string|max:255',
            'keahlian' => 'required|string|max:255',
        ]);

        DB::table('dosens')->insert([
            'nama' => $request->nama,
            'nik' => $request->nik,
            'email' => $request->email,
            'nohp' => $request->nohp,
            'alamat' => $request->alamat,
            'keahlian' => $request->keahlian,
            'created_at' => now(),
            'updated_at' => now(), // diperbaiki dari 'update_at'
        ]);

        return redirect()->route('dosens.index')->with('success', 'Data Dosen berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        // Jika ingin ditampilkan detail dosen, tambahkan logic di sini
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $dosen = DB::table('dosens')->where('id', $id)->first();
        return view('dosens.edit', compact('dosen'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
            'nik' => 'required|string|max:255',
            'email' => 'required|string|email|unique:dosens,email,' . $id,
            'nohp' => 'nullable|string|max:15',
            'alamat' => 'nullable|string|max:255',
            'keahlian' => 'required|string|max:255',
        ]);

        DB::table('dosens')
            ->where('id', $id)
            ->update([
                'nama' => $request->nama,
                'nik' => $request->nik,
                'email' => $request->email,
                'nohp' => $request->nohp,
                'alamat' => $request->alamat,
                'keahlian' => $request->keahlian,
                'updated_at' => now()
            ]);

        return redirect()->route('dosens.index')->with('success', 'Data Dosen berhasil diperbarui');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        DB::table('dosens')->where('id', $id)->delete();
        return redirect()->route('dosens.index')->with('success', 'Data Dosen berhasil dihapus');
    }
}
