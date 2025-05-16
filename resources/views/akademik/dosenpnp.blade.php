@extends('layouts.main')
@section('title', 'Daftar Dosen')


@section('content')
    <h1>Daftar Dosen Jurusan TI</h1>
    <ol>
        @forelse ($dsn as $namadosen)
            <li>{{$namadosen}}</li>
        @empty
        <div class="alert alert-warning d-inlne-block">
            Data dosen tidak ada. Silahkan isi array data dosen!
        </div>        
        @endforelse
    </ol>
@endsection
