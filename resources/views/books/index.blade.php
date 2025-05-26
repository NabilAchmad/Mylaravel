<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Daftar Buku</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <style>
        .card {
            border: none;
            border-radius: 15px;
            box-shadow: 0 0.5rem 1rem rgba(0, 0, 0, 0.15);
            transition: transform 0.3s ease;
        }
        .card:hover {
            transform: translateY(-5px);
        }
        .card-header {
            border-radius: 15px 15px 0 0 !important;
            background: linear-gradient(45deg, #4e73df, #224abe);
        }
        .table-hover tbody tr:hover {
            background-color: rgba(78, 115, 223, 0.1);
            transition: all 0.3s ease;
        }
        .btn-action {
            padding: 0.4rem 0.75rem;
            margin: 0 0.2rem;
            border-radius: 8px;
            transition: all 0.3s ease;
        }
        .btn-action:hover {
            transform: translateY(-2px);
        }
        .badge {
            padding: 0.5rem 0.8rem;
            border-radius: 8px;
        }
        .alert {
            border-radius: 10px;
            border: none;
        }
        .pagination {
            gap: 5px;
        }
        .page-item .page-link {
            border-radius: 8px;
            border: none;
            color: #4e73df;
        }
        .page-item.active .page-link {
            background: linear-gradient(45deg, #4e73df, #224abe);
        }
        .empty-state {
            padding: 3rem;
            color: #6c757d;
        }
        .empty-state i {
            color: #4e73df;
        }
        .btn-light {
            background: rgba(255, 255, 255, 0.1);
            border: 1px solid rgba(255, 255, 255, 0.2);
            backdrop-filter: blur(5px);
        }
        .btn-light:hover {
            background: rgba(255, 255, 255, 0.2);
        }
        body {
            background: #f8f9fc;
        }
    </style>
</head>

<body>
    <div class="container py-5">
        <div class="card">
            <div class="card-header text-white d-flex justify-content-between align-items-center py-3">
                <h2 class="h4 mb-0 fw-bold"><i class="fas fa-book me-2"></i>Daftar Buku</h2>
                <a href="{{ route('books.create') }}" class="btn btn-light">
                    <i class="fas fa-plus me-2"></i>Tambah Buku Baru
                </a>
                <a href="{{ route('publishing.reports.index') }}" class="btn btn-light">
                    <i class="fas fa-file-pdf me-2"></i>Laporan publishing
                </a>
                <a href="{{ route('laporan.penerbitan.pdf') }}" class="btn btn-light">
                    <i class="fas fa-file-pdf me-2"></i> Cetak PDF penerbitan
                </a>
                <a href="{{ route('laporan.penerbitan.excel') }}" class="btn btn-light">
                    <i class="fas fa-file-excel me-2"></i> Cetak Excel penerbitan
                </a>
            </div>
            <div class="card-body p-4">
                @if(session('success'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        <i class="fas fa-check-circle me-2"></i>{{ session('success') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @endif

                <div class="table-responsive">
                    <table class="table table-hover align-middle">
                        <thead>
                            <tr class="bg-light">
                                <th class="py-3">No</th>
                                <th class="py-3">Judul</th>
                                <th class="py-3">Penulis</th>
                                <th class="py-3">Stok</th>
                                <th class="py-3">Harga</th>
                                <th class="py-3">Diterbitkan</th>
                                <th class="py-3">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($books as $index => $book)
                                <tr>
                                    <td>{{ $books->firstItem() + $index }}</td>
                                    <td class="fw-bold">{{ $book->title }}</td>
                                    <td>{{ $book->author }}</td>
                                    <td>
                                        <span class="badge bg-{{ $book->stock > 0 ? 'success' : 'danger' }}">
                                            {{ $book->stock }}
                                        </span>
                                    </td>
                                    <td class="fw-bold">Rp {{ number_format($book->price, 0) }}</td>
                                    <td>{{ $book->created_at->format('d-m-Y') }}</td>
                                    <td>
                                        <div class="btn-group" role="group">
                                            <a href="{{ route('books.edit', $book->id) }}" class="btn btn-warning btn-action">
                                                <i class="fas fa-edit"></i>
                                            </a>
                                            <form action="{{ route('books.destroy', $book->id) }}" method="POST" class="d-inline">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger btn-action" 
                                                        onclick="return confirm('Yakin hapus buku ini?')">
                                                    <i class="fas fa-trash"></i>
                                                </button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="7">
                                        <div class="empty-state text-center">
                                            <i class="fas fa-book-open fa-4x mb-3"></i>
                                            <h5 class="mb-3">Belum ada buku yang diterbitkan</h5>
                                            <p class="text-muted mb-0">Mulai tambahkan buku pertama Anda sekarang!</p>
                                        </div>
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>

                <div class="d-flex justify-content-end mt-4">
                    {{ $books->links() }}
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>