<!-- Add Bootstrap CSS and JS -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <form action="{{ route('sales.store') }}" method="POST" class="p-4 bg-white rounded-lg shadow-lg hover:shadow-xl transition-shadow duration-300">
                @csrf
                <h3 class="text-center mb-4 text-primary fw-bold">Form Pembelian Buku</h3>
                
                <div class="mb-4">
                    <label for="book_id" class="form-label fw-semibold">
                        <i class="fas fa-book me-2"></i>Pilih Buku
                    </label>
                    <select name="book_id" id="book_id" class="form-select form-select-lg shadow-sm">
                        @foreach($books as $book)
                            <option value="{{ $book->id }}">{{ $book->title }}</option>
                        @endforeach
                    </select>
                </div>
                
                <div class="mb-4">
                    <label for="quantity" class="form-label fw-semibold">
                        <i class="fas fa-sort-numeric-up me-2"></i>Jumlah
                    </label>
                    <input type="number" name="quantity" id="quantity" class="form-control form-control-lg shadow-sm" placeholder="Masukkan jumlah buku">
                </div>
                
                <div class="mb-4">
                    <label for="sold_to" class="form-label fw-semibold">
                        <i class="fas fa-user me-2"></i>Pembeli
                    </label>
                    <input type="text" name="sold_to" id="sold_to" class="form-control form-control-lg shadow-sm" placeholder="Masukkan nama pembeli">
                </div>
                
                <div class="d-grid gap-2">
                    <button type="submit" class="btn btn-primary btn-lg fw-bold" id="submitBtn">
                        <i class="fas fa-shopping-cart me-2"></i>Beli Sekarang
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Add Font Awesome -->
<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">

<!-- Add Custom CSS -->
<style>
    .form-control:focus, .form-select:focus {
        border-color: #0d6efd;
        box-shadow: 0 0 0 0.25rem rgba(13, 110, 253, 0.25);
    }
    
    .btn-primary:hover {
        transform: translateY(-2px);
        transition: all 0.3s ease;
    }
    
    .form-control, .form-select, .btn {
        border-radius: 10px;
    }
</style>