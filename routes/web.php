<?php

use App\Http\Controllers\PenggunaController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\MahasiswaController;
use App\Http\Controllers\dosen\DosenController;
use App\Http\Controllers\dosen\DosenpnpController;
use App\Http\Controllers\dosen\DosentiController;
use App\Http\Controllers\MahasiswapnpController;
use App\Http\Controllers\TeknisiController;
use App\Http\Controllers\DashboardController;


//default routing
Route::get('/', function () {
    return view('welcome');
});




Route::get('/listmahasiswa', function () {
    $arrmhs = [
        'Nabil',
        'Achmad',
        'Khoir',
        'Hanifa'
    ];
    return view('akademik.mahasiswa', ['mhs' => $arrmhs]);
});


Route::view('/hello', 'hello', ['nama' => 'Nabil Achmad Khoir']);


Route::post('submit', function () {
    return 'form submitted!!';
});


Route::put('update/{id}', function ($id) {
    return 'update data for id:' . $id;
});


Route::delete('delete/{id}', function ($id) {
    return 'delete data for id:' . $id;
});






Route::get('/profile', function () {
    echo '<h1>Profile</h1>';
    return '<p> Jurusan teknologi informasi-Politeknik Negeri Padang</p>';
});


Route::get('mahasiswa/ti/latifa', function () {
    echo "<p style='font-size:40;color:orange'>Jurusan Teknologi Informasi";
    echo "<h1> Selamat Datang Nabil...</h1>";
    echo "<hr>";
    echo "<p> lorem .........................</p>";
});




Route::get('hitungusia/{nama}/{tahunlahir}', function ($nama, $tahun_lahir) {
    $usia = date('Y') - $tahun_lahir;
    return "<p>Hai <b>" . $nama . "</b><br> usia anda sekarang adalah <b>" . $usia . "</b> tahun.</p>";
});




Route::get('hitungusia/{nama?}/{tahunlahir?}', function ($nama = "tidak ada", $tahun_lahir = "2025") {
    $usia = date('Y') - $tahun_lahir;
    return "<p>Hai <b>" . $nama . "</b><br> usia anda sekarang adalah <b>" . $usia . "</b> tahun.</p>";
});


//route with regular expression
Route::get('user/{id}', function ($id) {
    return '<p> user admin memiliki id <b>' . $id . '</b></p>';
})->where('id', '[0-9]+');


//route redirect
Route::redirect('public', 'mahasiswa');


//route group
Route::prefix('login')->group(function () {
    route::get('mahasiswa', function () {
        return '<h2> login sebagai mahasiswa</h2>';
    });
    route::get('dosen', function () {
        return '<h2> login sebagai dosen</h2>';
    });
    route::get('admin', function () {
        return '<h2> login sebagai admin</h2>';
    });
});


//route fallback
Route::fallback(function () {
    return "<h2> Mohon maaf, halaman yang anda cari <b>tidak ditemukan</b>";
});

route::get("mahasiswalist", function () {
    $mhs1 = "Abdhu";
    $mhs2 = "Wayaw";
    $mhs3 = "Cibaduyut";

    return view('akademik.mahasiswalist', compact('mhs1', 'mhs2', 'mhs3'));
});

// if conditional
route::get("nilaimahasiswa", function () {
    $nama = "Nabil";
    $nim = "2311082032";
    $total_nilai = 90;

    return view('akademik.nilaimahasiswa', compact('nama', 'nim', 'total_nilai'));
});

// switch conditional
route::get("nilaimahasiswaswitch", function () {
    $nama = "Nabil";
    $nim = "2311082032";
    $total_nilai = 100;

    return view('akademik.nilaimahasiswaswitch', compact('nama', 'nim', 'total_nilai'));
});

// forloop
route::get("nilaimahasiswaforloop", function () {
    $nama = "Nabil";
    $nim = "2311082032";
    $total_nilai = 10;

    return view('akademik.nilaimahasiswaforloop', compact('nama', 'nim', 'total_nilai'));
});

// while loop
route::get("nilaimahasiswawhile", function () {
    $nama = "Nabil";
    $nim = "2311082032";
    $total_nilai = 2;

    return view('akademik.nilaimahasiswawhileloop', compact('nama', 'nim', 'total_nilai'));
});

// foreach loop
route::get("nilaimahasiswafore", function () {
    $nama = "Nabil";
    $nim = "2311082032";
    $total_nilai = [20, 30, 40, 50];

    return view('akademik.nilaimahasiswaforeach', compact('nama', 'nim', 'total_nilai'));
});

// forelse loop
route::get("nilaimahasiswaforel", function () {
    $nama = "Nabil";
    $nim = "2311082032";
    $total_nilai = [50, 70, 80, 100];

    return view('akademik.nilaimahasiswaforelse', compact('nama', 'nim', 'total_nilai'));
});

//continue
Route::get("nilaimahasiswacon", function () {
    $nama = "Nabil";
    $nim = "2311082032";
    $total_nilai = [20, 30, 50, 80];


    return view("akademik.nilaimahasiswacontinue", compact("nama", "nim", "total_nilai"));
});
//break
Route::get("nilaimahasiswabreak", function () {
    $nama = "Nabil";
    $nim = "2311082032";
    $total_nilai = [100, 80, 20, 30, 50, 80];


    return view("akademik.nilaimahasiswabreak", compact("nama", "nim", "total_nilai"));
});

// Mahasiswa
Route::get('/pnp/jurusan/ti/mahasiswa', function () {
    $arrmhs = ['Nabil', 'Abdhu', 'Rafi', 'DanTDM'];
    return view('akademik.mahasiswapnp', ['mhs' => $arrmhs]);
})->name('mahasiswa');

// Dosen
Route::get('/pnp/jurusan/ti/dosen', function () {
    $arrdsn = ['Dosen framework', 'Dosen mobile Programming', 'dosen IOT', 'dosen web programming'];
    return view('akademik.dosenpnp', ['dsn' => $arrdsn]);
})->name('dosen');

// prodi
Route::get('/pnp/{jurusan}/{prodi}', function ($jurusan, $prodi) {
    $data = [$jurusan, $prodi];
    return view('akademik.prodipnp')->with('data', $data);
})->name('prodi');

Route::get('teknisi', [TeknisiController::class, 'index']);
Route::get('teknisi/create', [TeknisiController::class, 'create']);
Route::post('teknisi', [TeknisiController::class, 'store']);
Route::get('teknisi/{id}', [TeknisiController::class, 'show']);
Route::get('teknisi/{id}/edit', [TeknisiController::class, 'edit']);
Route::put('teknisi/{id}', [TeknisiController::class, 'update']);
Route::delete('teknisi/{id}', [TeknisiController::class, 'destroy']);

Route::get('insert-sql', [MahasiswaController::class, 'insert_sql']);
Route::get('insert-prepared', [MahasiswaController::class, 'insert_prepared']);
Route::get('insert-binding', [MahasiswaController::class, 'insert_binding']);
Route::get('update', [MahasiswaController::class, 'update_sql']);
Route::get('delete', [MahasiswaController::class, 'delete_sql']);
Route::get('select', [MahasiswaController::class, 'select_sql']);
Route::get('select-tampil', [MahasiswaController::class, 'selectTampil']);
Route::get('select-view', [MahasiswaController::class, 'selectView']);
Route::get('select-where', [MahasiswaController::class, 'selectWhere']);
Route::get('statement', [MahasiswaController::class, 'statement']);

Route::get('dosen', [DosenpnpController::class, 'index'])->name('dosens.index');
Route::get('dosen/create', [DosenpnpController::class, 'create'])->name('dosens.create');
Route::post('dosen', [DosenpnpController::class, 'store'])->name('dosens.store');
Route::get('dosen/{id}/edit', [DosenpnpController::class, 'edit'])->name('dosens.edit');
Route::put('dosen/{id}', [DosenpnpController::class, 'update'])->name('dosens.update');
Route::delete('dosen/{id}', [DosenpnpController::class, 'destroy'])->name('dosens.destroy');

Route::get('dosenti', [DosentiController::class, 'index'])->name('dosensti.index');
Route::get('dosenti/create', [DosentiController::class, 'create'])->name('dosensti.create');
Route::post('dosenti', [DosentiController::class, 'store'])->name('dosensti.store');
Route::get('dosenti/{id}/edit', [DosentiController::class, 'edit'])->name('dosensti.edit');
Route::put('dosenti/{id}', [DosentiController::class, 'update'])->name('dosensti.update');
Route::delete('dosenti/{id}', [DosentiController::class, 'destroy'])->name('dosensti.destroy');

Route::get('mahasiswa', [MahasiswapnpController::class, 'index'])->name('mahasiswas.index');
Route::get('mahasiswa/create', [MahasiswapnpController::class, 'create'])->name('mahasiswas.create');
Route::post('mahasiswa', [MahasiswapnpController::class, 'store'])->name('mahasiswas.store');
Route::get('mahasiswa/{id}/edit', [MahasiswapnpController::class, 'edit'])->name('mahasiswas.edit');
Route::put('mahasiswa/{id}', [MahasiswapnpController::class, 'update'])->name('mahasiswas.update');
Route::delete('mahasiswa/{id}', [MahasiswapnpController::class, 'destroy'])->name('mahasiswas.destroy');

Route::get('cek-objek', [DosenController::class, 'cekObjek']);
Route::get('insert', [DosenController::class, 'insert']);
Route::get('mass-assignment', [DosenController::class, 'massAssignment']);
Route::get('updatedosen', [DosenController::class, 'update']);
Route::get('updatedosen-where', [DosenController::class, 'updateWhere']);
Route::get('mass-update', [DosenController::class, 'massUpdate']);
Route::get('deletedosen', [DosenController::class, 'delete']);
Route::get('destroydosen', [DosenController::class, 'destroy']);
Route::get('mass-delete', [DosenController::class, 'massDelete']);
Route::get('all', [DosenController::class, 'all']);
Route::get('all-view', [DosenController::class, 'allView']);
Route::get('get-where', [DosenController::class, 'getWhere']);
Route::get('test-where', [DosenController::class, 'testWhere']);
Route::get('first', [DosenController::class, 'first']);
Route::get('find', [DosenController::class, 'find']);
Route::get('latest', [DosenController::class, 'latest']);
Route::get('limit', [DosenController::class, 'limit']);
Route::get('skip-take', [DosenController::class, 'skipTake']);
Route::get('soft-delete', [DosenController::class, 'softDelete']);
Route::get('with-trashed', [DosenController::class, 'withTrashed']);
Route::get('restore', [DosenController::class, 'restore']);
Route::get('force-delete', [DosenController::class, 'forceDelete']);

Route::get('pengguna/create', [PenggunaController::class, 'create'])->name('penggunas.create');
Route::post('pengguna', [PenggunaController::class, 'store'])->name('penggunas.store');
Route::get('pengguna', [PenggunaController::class, 'index'])->name('penggunas.index');
Route::get('pengguna/{id}/edit', [PenggunaController::class, 'edit'])->name('penggunas.edit');
Route::put('pengguna/{id}', [PenggunaController::class, 'update'])->name('penggunas.update');
Route::delete('pengguna/{id}', [PenggunaController::class, 'destroy'])->name('penggunas.destroy');


// Route::get('pengguna/create', [PenggunaController::class, 'create'])
//     ->name('penggunas.create');
// Route::post('pengguna', [PenggunaController::class, 'store'])
//     ->name('penggunas.store');
// Route::get('pengguna', [PenggunaController::class, 'index'])
//     ->name('penggunas.index');
// Route::get('pengguna/{id}/edit', [PenggunaController::class, 'edit'])
//     ->name('penggunas.edit');
// Route::put('pengguna/{id}', [PenggunaController::class, 'update'])
//     ->name('penggunas.update');
// Route::delete('pengguna/{id}', [PenggunaController::class, 'destroy'])
//     ->name('penggunas.destroy');

Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

    Route::prefix('profile')->group(function(){
        Route::get('/', [ProfileController::class, 'edit'])->name('profile.edit');
        Route::patch('/', [ProfileController::class, 'update'])->name('profile.update');
        Route::delete('/', [ProfileController::class, 'destroy'])->name('profile.destroy');
    });

    // admin auth
    Route::middleware(['auth', 'admin'])->group(function(){
        Route::resource('penggunas', PenggunaController::class);
    });
});

// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth', 'verified'])->name('dashboard');


// Route::middleware('auth')->group(function () {
//     Route::resource('penggunas', PenggunaController::class);
//     Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
//     Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
//     Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
// });



require __DIR__ . '/auth.php';
