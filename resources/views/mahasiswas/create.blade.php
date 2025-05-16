@extends('layouts.main')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header d-flex justify-content-between align-items-center">
                        <h4>Tambah Mahasiswa</h4>
                        <a href="{{ route('mahasiswas.index') }}" class="btn btn-secondary">Kembali</a>
                    </div>

                    <div class="card-body">
                        @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul class="mb-0">
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif

                        <form action="{{ route('mahasiswas.store') }}" method="POST">
                            @csrf
                            <div class="mb-3">
                                <label for="nama" class="form-label">Nama Mahasiswa <span
                                        class="text-danger">*</span></label>
                                <input type="text" class="form-control @error('nama') is-invalid @enderror"
                                    id="nama" name="nama" value="{{ old('nama') }}" required>
                                @error('nama')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="nobp" class="form-label">No. BP <span class="text-danger">*</span></label>
                                <input type="text" class="form-control @error('nobp') is-invalid @enderror" id="nobp"
                                    name="nobp" value="{{ old('nobp') }}" required>
                                @error('nobp')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="email" class="form-label">Email <span class="text-danger">*</span></label>
                                <input type="email" class="form-control @error('email') is-invalid @enderror"
                                    id="email" name="email" value="{{ old('email') }}" required>
                                @error('email')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="nohp" class="form-label">No. HP</label>
                                <input type="text" class="form-control @error('nohp') is-invalid @enderror"
                                    id="nohp" name="nohp" value="{{ old('nohp') }}">
                                @error('nohp')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="jurusan" class="form-label">Jurusan <span class="text-danger">*</span></label>
                                <input type="text" class="form-control @error('jurusan') is-invalid @enderror"
                                    id="jurusan" name="jurusan" value="{{ old('jurusan') }}" required>
                                @error('jurusan')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="prodi" class="form-label">Program Studi <span class="text-danger">*</span></label>
                                <input type="text" class="form-control @error('prodi') is-invalid @enderror"
                                    id="prodi" name="prodi" value="{{ old('prodi') }}" required>
                                @error('prodi')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="tgllahir" class="form-label">Tanggal Lahir <span class="text-danger">*</span></label>
                                <input type="date" class="form-control @error('tgllahir') is-invalid @enderror"
                                    id="tgllahir" name="tgllahir" value="{{ old('tgllahir') }}" required>
                                @error('tgllahir')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="d-grid">
                                <button type="submit" class="btn btn-primary">Simpan</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection