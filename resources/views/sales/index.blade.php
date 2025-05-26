<!DOCTYPE html>
<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <title>Daftar Penjualan Buku</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <style>
        .card {
            border-radius: 15px;
            border: none;
        }
        .card-header {
            border-radius: 15px 15px 0 0 !important;
            background: linear-gradient(135deg, #4e54c8, #8f94fb) !important;
        }
        .btn-primary {
            background: linear-gradient(135deg, #4e54c8, #8f94fb);
            border: none;
            transition: transform 0.3s ease;
        }
        .btn-primary:hover {
            transform: translateY(-2px);
            box-shadow: 0 5px 15px rgba(78, 84, 200, 0.4);
        }
        .table {
            border-radius: 10px;
            overflow: hidden;
        }
        .table-dark {
            background: linear-gradient(135deg, #2c3e50, #3498db);
        }
        .badge {
            padding: 8px 12px;
            border-radius: 8px;
        }
        .btn-danger {
            background: linear-gradient(135deg, #ff416c, #ff4b2b);
            border: none;
            transition: all 0.3s ease;
        }
        .btn-danger:hover {
            transform: scale(1.1);
        }
        tr {
            transition: all 0.3s ease;
        }
        tr:hover {
            transform: translateX(5px);
            background-color: rgba(78, 84, 200, 0.1) !important;
        }
    </style>
</head>

<body class="bg-light">
    <div class="container py-5">
        <div class="card shadow-lg">
            <div class="card-header text-white">
                <h2 class="mb-0"><i class="fas fa-book-open me-2"></i>Daftar Penjualan Buku</h2>
            </div>
            <div class="card-body">
                @if(session('success'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        <i class="fas fa-check-circle me-2"></i>{{ session('success') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @endif

                <div class="mb-4">
                    <a href="{{ route('sales.create') }}" class="btn btn-primary">
                        <i class="fas fa-plus me-2"></i>Tambah Penjualan Baru
                    </a>
                    <a href="{{ route('sales.reports.index') }}" class="btn btn-primary">
                        <i class="fas fa-chart-bar me-2"></i>Laporan Penjualan
                    </a>
                    <a href="{{ route('laporan.penjualan.pdf') }}" class="btn btn-primary">
                        <i class="fas fa-file-pdf me-2"></i> Cetak PDF penjualan
                    </a>
                    <a href="{{ route('laporan.penjualan.excel') }}" class="btn btn-primary">
                        <i class="fas fa-file-excel me-2"></i> Export Excel penjualan
                    </a>
                </div>

                <div class="table-responsive">
                    <table class="table table-hover table-striped">
                        <thead class="table-dark">
                            <tr>
                                <th>No</th>
                                <th>Buku</th>
                                <th>Jumlah</th>
                                <th>Total</th>
                                <th>Tanggal</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($sales as $index => $sale)
                                <tr>
                                    <td>{{ $sales->firstItem() + $index }}</td>
                                    <td><i class="fas fa-book me-2"></i>{{ $sale->book->title }}</td>
                                    <td><span class="badge bg-info">{{ $sale->quantity }}</span></td>
                                    <td><span class="text-success fw-bold">Rp {{ number_format($sale->total_price, 0) }}</span></td>
                                    <td><i class="far fa-calendar-alt me-2"></i>{{ $sale->created_at->format('d-m-Y H:i') }}</td>
                                    <td>
                                        <form action="{{ route('sales.destroy', $sale->id) }}" method="POST"
                                            onsubmit="return confirm('Yakin ingin menghapus?')" class="d-inline">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger btn-sm">
                                                <i class="fas fa-trash-alt"></i>
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="6" class="text-center py-4">
                                        <i class="fas fa-inbox fa-3x mb-3 text-muted"></i>
                                        <p class="text-muted">Belum ada data penjualan.</p>
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>

                <div class="mt-4">
                    {{ $sales->links() }}
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html></html>