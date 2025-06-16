<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Daftar Penjualan Buku</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <style>
        :root {
            --primary-gradient: linear-gradient(135deg, #6B73FF, #000DFF);
            --danger-gradient: linear-gradient(135deg, #FF512F, #DD2476);
        }
        body {
            background: #f8f9fa;
            font-family: 'Poppins', sans-serif;
        }
        .card {
            border-radius: 20px;
            box-shadow: 0 10px 30px rgba(0,0,0,0.1);
            overflow: hidden;
        }
        .card-header {
            background: var(--primary-gradient) !important;
            padding: 1.5rem;
        }
        .btn {
            border-radius: 10px;
            padding: 0.7rem 1.2rem;
            transition: all 0.3s ease;
        }
        .btn-primary {
            background: var(--primary-gradient);
            border: none;
        }
        .btn-primary:hover {
            transform: translateY(-3px);
            box-shadow: 0 5px 15px rgba(0,0,0,0.2);
        }
        .table {
            margin: 0;
        }
        .table thead th {
            background: var(--primary-gradient);
            color: white;
            font-weight: 500;
            border: none;
        }
        .badge {
            padding: 0.6rem 1rem;
            border-radius: 6px;
        }
        .action-btn {
            width: 35px;
            height: 35px;
            padding: 0;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            border-radius: 50%;
        }
        .empty-state {
            padding: 3rem;
            text-align: center;
        }
        .empty-state i {
            font-size: 4rem;
            color: #ccc;
        }
    </style>
</head>

<body>
    <div class="container py-5">
        <div class="card">
            <div class="card-header">
                <h2 class="text-white m-0 d-flex align-items-center">
                    <i class="fas fa-book-open me-3"></i>Daftar Penjualan Buku
                </h2>
            </div>
            <div class="card-body p-4">
                @if(session('success'))
                    <div class="alert alert-success d-flex align-items-center" role="alert">
                        <i class="fas fa-check-circle me-2"></i>
                        {{ session('success') }}
                    </div>
                @endif

                <div class="d-flex flex-wrap gap-2 mb-4">
                    <a href="{{ route('sales.create') }}" class="btn btn-primary">
                        <i class="fas fa-plus me-2"></i>Tambah
                    </a>
                    <a href="{{ route('sales.reports.index') }}" class="btn btn-primary">
                        <i class="fas fa-chart-bar me-2"></i>Laporan
                    </a>
                    <a href="{{ route('laporan.penjualan.pdf') }}" class="btn btn-primary">
                        <i class="fas fa-file-pdf me-2"></i>PDF
                    </a>
                    <a href="{{ route('laporan.penjualan.excel') }}" class="btn btn-primary">
                        <i class="fas fa-file-excel me-2"></i>Excel
                    </a>
                    <a href="{{ route('dashboard') }}" class="btn btn-primary">
                        <i class="fas fa-home me-2"></i>Beranda
                    </a>
                </div>

                <div class="table-responsive">
                    <table class="table">
                        <thead>
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
                                    <td>
                                        <div class="d-flex align-items-center">
                                            <i class="fas fa-book me-2 text-primary"></i>
                                            {{ $sale->book->title }}
                                        </div>
                                    </td>
                                    <td><span class="badge bg-info">{{ $sale->quantity }}</span></td>
                                    <td><span class="fw-bold text-success">Rp {{ number_format($sale->total_price, 0) }}</span></td>
                                    <td>
                                        <div class="d-flex align-items-center">
                                            <i class="far fa-calendar-alt me-2 text-muted"></i>
                                            {{ $sale->created_at->format('d-m-Y H:i') }}
                                        </div>
                                    </td>
                                    <td>
                                        <form action="{{ route('sales.destroy', $sale->id) }}" method="POST" 
                                            onsubmit="return confirm('Yakin ingin menghapus?')" class="d-inline">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger action-btn">
                                                <i class="fas fa-trash-alt"></i>
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="6">
                                        <div class="empty-state">
                                            <i class="fas fa-inbox mb-3"></i>
                                            <p class="text-muted m-0">Belum ada data penjualan</p>
                                        </div>
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
</html>