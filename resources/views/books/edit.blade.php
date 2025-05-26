<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Update Buku</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.2/font/bootstrap-icons.css">
</head>
<body class="bg-gradient min-vh-100 d-flex align-items-center">
    <div class="container py-5">
        <div class="row justify-content-center">
            <div class="col-lg-8 col-md-10 col-sm-12">
                <div class="card shadow-lg rounded-4 border-0">
                    <div class="card-header bg-primary bg-gradient text-white rounded-top-4 position-relative">
                        <h2 class="mb-0 fw-bold py-3 text-center">
                            <i class="bi bi-book-half fs-3 me-2"></i>
                            Edit Buku: {{ $book->title }}
                        </h2>
                    </div>
                    <div class="card-body p-4">
                        @if ($errors->any())
                            <div class="alert alert-danger rounded-4 border-0 shadow-sm">
                                <ul class="mb-0">
                                    @foreach ($errors->all() as $err)
                                        <li>{{ $err }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif

                        <form action="{{ route('books.update', $book->id) }}" method="POST" class="needs-validation" novalidate>
                            @csrf
                            @method('PUT')

                            <div class="mb-4 input-group-glow">
                                <label class="form-label fw-bold fs-5 text-primary">
                                    <i class="bi bi-pencil-square"></i> Judul Buku
                                </label>
                                <input type="text" class="form-control form-control-lg shadow-sm rounded-4 border-primary" name="title" value="{{ old('title', $book->title) }}" required>
                            </div>

                            <div class="mb-4 input-group-glow">
                                <label class="form-label fw-bold fs-5 text-primary">
                                    <i class="bi bi-person-badge"></i> Penulis
                                </label>
                                <input type="text" class="form-control form-control-lg shadow-sm rounded-4 border-primary" name="author" value="{{ old('author', $book->author) }}" required>
                            </div>

                            <div class="mb-4 input-group-glow">
                                <label class="form-label fw-bold fs-5 text-primary">
                                    <i class="bi bi-box-seam"></i> Stok
                                </label>
                                <input type="number" class="form-control form-control-lg shadow-sm rounded-4 border-primary" name="stock" value="{{ old('stock', $book->stock) }}" required min="0">
                            </div>

                            <div class="mb-4 input-group-glow">
                                <label class="form-label fw-bold fs-5 text-primary">
                                    <i class="bi bi-currency-dollar"></i> Harga (Rp)
                                </label>
                                <div class="input-group input-group-lg">
                                    <span class="input-group-text rounded-start-4 bg-primary text-white">Rp</span>
                                    <input type="number" step="0.01" class="form-control shadow-sm rounded-end-4 border-primary" name="price" value="{{ old('price', $book->price) }}" required min="0">
                                </div>
                            </div>

                            <div class="d-grid gap-3 mt-5">
                                <button type="submit" class="btn btn-primary btn-lg shadow-lg rounded-4 py-3">
                                    <i class="bi bi-save2 me-2"></i> Simpan Perubahan
                                </button>
                                <a href="{{ route('books.index') }}" class="btn btn-outline-primary btn-lg shadow rounded-4 py-3">
                                    <i class="bi bi-arrow-left-circle me-2"></i> Kembali ke Daftar Buku
                                </a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <style>
        .bg-gradient {
            background: linear-gradient(135deg, #6a11cb 0%, #2575fc 100%);
        }
        .input-group-glow:hover .form-control {
            box-shadow: 0 0 15px rgba(13, 110, 253, 0.5);
            transition: all 0.3s ease;
        }
        .form-control:focus {
            border-color: #0d6efd;
            box-shadow: 0 0 15px rgba(13, 110, 253, 0.5);
        }
        .rounded-4 {
            border-radius: 1rem !important;
        }
        .input-group-text {
            border: 1px solid #0d6efd;
        }
        .card {
            backdrop-filter: blur(10px);
            background: rgba(255, 255, 255, 0.95);
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
        }
        .btn-outline-primary:hover {
            background-color: #0d6efd;
            color: white;
            transform: translateY(-2px);
            transition: all 0.3s ease;
        }
        .btn-primary:hover {
            transform: translateY(-2px);
            box-shadow: 0 5px 15px rgba(13, 110, 253, 0.4) !important;
            transition: all 0.3s ease;
        }
        .form-control {
            transition: all 0.3s ease;
        }
        .card-header {
            border-bottom: none;
        }
        @media (max-width: 768px) {
            .card-header h2 {
                font-size: 1.5rem;
            }
            .form-label {
                font-size: 1rem !important;
            }
        }
    </style>
    <script>
        (function () {
            'use strict'
            var forms = document.querySelectorAll('.needs-validation')
            Array.prototype.slice.call(forms).forEach(function (form) {
                form.addEventListener('submit', function (event) {
                    if (!form.checkValidity()) {
                        event.preventDefault()
                        event.stopPropagation()
                    }
                    form.classList.add('was-validated')
                }, false)
            })
        })()
    </script>
</body>
</html>