@extends('layouts.main')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header d-flex justify-content-between align-items-center">
                        <h4>Daftar Mahasiswa</h4>
                        <a href="{{ route('mahasiswas.create') }}" class="btn btn-primary">Tambah Mahasiswa</a>
                    </div>

                    <div class="card-body">
                        @if (session('success'))
                            <div class="alert alert-success">
                                {{ session('success') }}
                            </div>
                        @endif

                        <div class="table-responsive">
                            <table class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Nama</th>
                                        <th>No BP</th>
                                        <th>Email</th>
                                        <th>No HP</th>
                                        <th>Jurusan</th>
                                        <th>Program Studi</th>
                                        <th>Tanggal Lahir</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse ($mahasiswas as $index => $mahasiswa)
                                        <tr>
                                            <td>{{ $index + 1 }}</td>
                                            <td>{{ $mahasiswa->nama }}</td>
                                            <td>{{ $mahasiswa->nobp }}</td>
                                            <td>{{ $mahasiswa->email }}</td>
                                            <td>{{ $mahasiswa->nohp }}</td>
                                            <td>{{ $mahasiswa->jurusan }}</td>
                                            <td>{{ $mahasiswa->prodi }}</td>
                                            <td>{{ $mahasiswa->tgllahir }}</td>
                                            <td>
                                                <div class="d-flex">
                                                    <a href="{{ route('mahasiswas.edit', $mahasiswa->id) }}"
                                                        class="btn btn-sm btn-warning me-2">Edit</a>
                                                    <form action="{{ route('mahasiswas.destroy', $mahasiswa->id) }}" method="POST"
                                                        onsubmit="return confirm('Apakah Anda yakin ingin menghapus data ini?')">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="btn btn-sm btn-danger">Hapus</button>
                                                    </form>
                                                </div>
                                            </td>
                                        </tr>
                                    @empty
                                        <tr>
                                            <td colspan="7" class="text-center">Tidak ada data mahasiswa</td>
                                        </tr>
                                    @endforelse
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection