@extends('layouts.main')

@section('title', 'Daftar Dosen')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-3">
    <h1>Data Dosen</h1>
    <a href="{{ route('dosens.create') }}" class="btn btn-primary">Tambah Dosen</a>
</div>

@if(session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif

<div class="table-responsive">
    <table class="table table-bordered table-striped">
        <thead class="table-dark">
            <tr>
                <th>Nama</th>
                <th>NIK</th>
                <th>Email</th>
                <th>No HP</th>
                <th>Alamat</th>
                <th>Keahlian</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
        @foreach($dosens as $lecturer)
            <tr>
                <td>{{ $lecturer->nama }}</td>
                <td>{{ $lecturer->nik }}</td>
                <td>{{ $lecturer->email }}</td>
                <td>{{ $lecturer->nohp }}</td>
                <td>{{ $lecturer->alamat }}</td>
                <td>{{ $lecturer->keahlian }}</td>
                <td>
                    <a href="{{ route('dosens.edit', $lecturer->id) }}" class="btn btn-sm btn-info text-white">Edit</a>
                    <form action="{{ route('dosens.destroy', $lecturer->id) }}" method="POST" style="display:inline-block;" onsubmit="return confirm('Yakin ingin menghapus data ini?');">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-sm btn-danger">Hapus</button>
                    </form>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>
@endsection
