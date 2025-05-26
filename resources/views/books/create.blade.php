<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Buku Baru</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <style>
        .hover-lift:hover {
            transform: translateY(-3px);
            transition: transform 0.2s ease;
        }
        .hover-shadow:hover {
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }
        .focus-ring:focus {
            box-shadow: 0 0 0 0.25rem rgba(13, 110, 253, 0.25);
            border-color: #86b7fe;
        }
    </style>
</head>
<body class="bg-light">
    <form action="{{ route('books.store') }}" method="POST" class="container mt-4 p-4 bg-white rounded-lg shadow-lg border border-gray-200">
        @csrf
        <h2 class="text-center mb-4 text-primary font-weight-bold">📚 Tambah Buku Baru</h2>
        <div class="mb-3 hover-lift">
            <label class="form-label fw-bold text-dark">Judul Buku</label>
            <input type="text" name="title" class="form-control form-control-lg focus-ring" placeholder="Masukkan judul buku" required>
        </div>
        <div class="mb-3 hover-lift">
            <label class="form-label fw-bold text-dark">Penulis</label>
            <input type="text" name="author" class="form-control form-control-lg focus-ring" placeholder="Masukkan nama penulis" required>
        </div>
        <div class="mb-3 hover-lift">
            <label class="form-label fw-bold text-dark">Stok</label>
            <input type="number" name="stock" class="form-control form-control-lg focus-ring" placeholder="Masukkan jumlah stok" required>
        </div>
        <div class="mb-3 hover-lift">
            <label class="form-label fw-bold text-dark">Harga</label>
            <div class="input-group">
                <span class="input-group-text bg-primary text-white">Rp</span>
                <input type="number" step="0.01" name="price" class="form-control form-control-lg focus-ring" placeholder="Masukkan harga" required>
            </div>
        </div>
        <div class="mb-4 hover-lift">
            <label class="form-label fw-bold text-dark">Penerbit</label>
            <input type="text" name="published_by" class="form-control form-control-lg focus-ring" placeholder="Masukkan nama penerbit" required>
        </div>
        <div class="d-grid gap-2">
            <button type="submit" class="btn btn-primary btn-lg hover-shadow transition-all duration-200 ease-in-out transform hover:scale-105">
                <i class="fas fa-book-open me-2"></i>Terbitkan Buku
            </button>
        </div>
    </form>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>