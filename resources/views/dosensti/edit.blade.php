@extends('layouts.main')
@section('title')
Edit Dosen TI
@endsection
@section('content')
<h1>Edit Data Dosen TI</h1>
    
@if(session('error'))
    <p style="color: red;">{{ session('error') }}</p>
@endif

<form action="{{ route('dosensti.update', $dosen->id) }}" method="POST">
    @csrf
    @method('PUT')

    <label for="nama">Nama:</label>
    <input type="text" id="nama" name="nama" value="{{ $dosen->nama }}" required>
    <br>

    <label for="nik">Nik:</label>
    <input type="text" id="nik" name="nik" value="{{ $dosen->nik }}" required>
    <br>
    
    <label for="email">Email:</label>
    <input type="email" id="email" name="email" value="{{ $dosen->email }}" required>
    <br>

    <label for="nohp">No Hp:</label>
    <input type="text" id="nohp" name="nohp" value="{{ $dosen->nohp }}">
    <br>

    <label for="alamat">Alamat:</label>
    <input type="text" id="alamat" name="alamat" value="{{ $dosen->alamat }}">
    <br>

    <label for="keahlian">Bidang:</label>
    <input type="text" id="bidang" name="bidang" value="{{ $dosen->bidang }}" required>
    <br>

    <button type="submit">Simpan Perubahan</button>
</form>

<br>
<a href="{{ route('dosensti.index') }}">Kembali ke Daftar Dosen</a>
@endsection
 