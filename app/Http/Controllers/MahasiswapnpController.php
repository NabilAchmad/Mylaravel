<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class MahasiswapnpController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $mahasiswas = DB::table('mahasiswas')->get();
        return view('mahasiswas/index', compact('mahasiswas'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('mahasiswas.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $request->validate([
            'nama'=> 'required|string|max:255',
            'nobp'=> 'required|string|max:10',
            'email'=> 'required|email|unique:mahasiswas',
            'nohp'=> 'nullable|string|max:12',
            'jurusan'=> 'required|string|max:255',
            'prodi'=> 'required|string|max:255',
            'tgllahir'=> 'nullable|date'
        ]);
        DB::table('mahasiswas')->insert([
            'nama'=> $request->nama,
            'nobp'=> $request->nobp,
            'email'=> $request->email,
            'nohp'=> $request->nohp,
            'jurusan'=> $request->jurusan,
            'prodi'=> $request->prodi,
            'tgllahir'=> $request->tgllahir,
            'created_at'=> now(),
            'updated_at'=> now()
        
        ]);
        return redirect()->route('mahasiswas.index')->with('success','Data mahasiswa berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
        $mahasiswa = DB::table('mahasiswas')->where('id', $id)->first();
        return view('mahasiswas.edit', compact('mahasiswa'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
        $request->validate([
            'nama'=> 'required|string|max:255',
            'nobp'=> 'required|string|max:10',
            'email'=> 'required|email|unique:mahasiswas,email,' . $id,
            'nohp'=> 'nullable|string|max:12',
            'jurusan'=> 'required|string|max:255',
            'prodi'=> 'required|string|max:255',
            'tgllahir'=> 'nullable|date'
        ]);
        DB::table('mahasiswas')
        ->where('id', $id)
        ->update([
            'nama'=> $request->nama,
            'nobp'=> $request->nobp,
            'email'=> $request->email,
            'nohp'=> $request->nohp,
            'jurusan'=> $request->jurusan,
            'prodi'=> $request->prodi,
            'tgllahir'=> $request->tgllahir,
            'created_at'=> now(),
            'updated_at'=> now()
        
        ]);
        return redirect()->route('mahasiswas.index')->with('success','Data mahasiswa berhasil diperbarui');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
        DB::table('mahasiswas')->where('id', $id)->delete();
        return redirect()->route('mahasiswas.index')->with('success','Data mahasiswa berhasil dihapus');
    }
}