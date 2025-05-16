<?php

use App\Http\Controllers\MahasiswaController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\dosen\DosenController;
use App\Http\Controllers\dosen\DosenpnpController;
use App\Http\Controllers\dosen\DosentiController;
use App\Http\Controllers\MahasiswapnpController;
use App\Http\Controllers\PenggunaController;
use App\Http\Controllers\TeknisiController;
use Illuminate\Routing\Router;

// Default routing
Route::get('/home', function () {
    return "<div style='text-align:center; font-family:Arial, sans-serif;'>
                <h1 style='color:#2c3e50;'>Halaman Utama</h1>
                <p style='font-size:18px; color:#34495e;'>Selamat datang di halaman utama!</p>
            </div>";
})->name('home');

Route::get('/profile', function () {
    return view('profile');
})->name('profile');

Route::get('/', function () {
    return view('welcome');
});

Route::get('/mahasiswa',[MahasiswaController::class,'index']);

Route::get('/listmahasiswa',function(){
$arrmhs= [
    'abdhu',
    'nabil',
    'dimas',
    'rafi'
];
return view('akademik.mahasiswa',['mhs'=>$arrmhs]);
});



Route::view('/hello','hello', ['nama'=>'abdhu']);
















Route::post('submit', function () {
    return "<div style='text-align:center; font-size:20px; color:green;'>
                <h2>Form Submitted!</h2>
            </div>";
});

Route::put('update/{id}', function ($id) {
    return "<div style='text-align:center; font-size:20px; color:blue;'>
                <h2>Update Data</h2>
                <p>Update data untuk ID: <b>$id</b></p>
            </div>";
});

Route::delete('delete/{id}', function ($id) {
    return "<div style='text-align:center; font-size:20px; color:red;'>
                <h2>Delete Data</h2>
                <p>Data dengan ID: <b>$id</b> telah dihapus.</p>
            </div>";
});

Route::get('/profile', function () {
    return "<div style='text-align:center; font-family:Arial, sans-serif;'>
                <h1 style='color:#2c3e50;'>Profile</h1>
                <p style='font-size:18px; color:#34495e;'>Jurusan Teknologi Informasi - Politeknik Negeri Padang</p>
                <p>Selamat datang di halaman profil kami!</p>
                <p>Kami berkomitmen untuk memberikan pendidikan berkualitas di bidang teknologi informasi.</p>
            </div>";
});

Route::get('mahasiswa/ti/Abdhu', function () {
    return "<div style='text-align:center; font-family:Arial, sans-serif;'>
                <p style='font-size:40px; color:orange;'>Jurusan Teknologi Informasi</p>
                <h1 style='color:#2c3e50;'>Selamat Datang Abdhu...</h1>
                <hr>
                <p style='font-size:18px;'>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque vitae justo et eros ultrices suscipit.</p>
                <p>Semoga sukses dalam perjalanan akademikmu!</p>
            </div>";
});

// Route with parameter
Route::get('mahasiswa/{nama}', function ($nama) {
    return "<div style='text-align:center; font-size:20px;'>
                <p>Nama mahasiswa RPL: <b>$nama</b></p>
            </div>";
});

Route::get('hitungusia/{nama}/{tahunlahir}', function ($nama, $tahun_lahir) {
    $usia = date('Y') - $tahun_lahir;
    return "<div style='text-align:center; font-size:20px;'>
                <p>Hai <b>$nama</b><br>Usia anda sekarang adalah <b>$usia</b> tahun.</p>
            </div>";
});

// Route with optional parameter
// Route::get('mahasiswa/{nama?}', function ($nama = 'M Abdhu Syukra') {
//     return "<div style='text-align:center; font-size:20px;'>
//                 <p>Nama mahasiswa RPL: <b>$nama</b></p>
//             </div>";
// });

Route::get('hitungusia/{nama?}/{tahunlahir?}', function ($nama = "M Abdhu Syukra", $tahun_lahir = "2005") {
    $usia = date('Y') - $tahun_lahir;
    return "<div style='text-align:center; font-size:20px;'>
                <p>Hai <b>$nama</b><br>Usia anda sekarang adalah <b>$usia</b> tahun.</p>
            </div>";
});

// Route with regular expression
Route::get('user/{id}', function ($id) {
    return "<div style='text-align:center; font-size:20px;'>
                <p>User admin memiliki ID: <b>$id</b></p>
            </div>";
})->where('id', '[0-9]+');

// Route redirect
Route::redirect('public', 'mahasiswa');

// Route group
Route::prefix('login')->group(function () {
    Route::get('mahasiswa', function () {
        return "<div style='text-align:center; font-size:20px; color:#2980b9;'>
                    <h2>Login sebagai mahasiswa</h2>
                </div>";
    });
    Route::get('dosen', function () {
        return "<div style='text-align:center; font-size:20px; color:#27ae60;'>
                    <h2>Login sebagai dosen</h2>
                </div>";
    });
    Route::get('admin', function () {
        return "<div style='text-align:center; font-size:20px; color:#c0392b;'>
                    <h2>Login sebagai admin</h2>
                </div>";
    });
});

// Route fallback
Route::fallback(function () {
    return "<div style='text-align:center; font-size:20px; color:red;'>
                <h2>Mohon maaf, halaman yang anda cari <b>tidak ditemukan</b></h2>
            </div>";
});

Route::get("listmahasiswa", function(){
    $mhs1 = "abdhu";
    $mhs2 = "nabil";
    $mhs3 = "dimas";
    

    return view("akademik.mahasiswalist", compact ("mhs1","mhs2","mhs3"));

});

Route::get("nilaimahasiswa", function(){
    $nama = "abdhu";
    $nim = 2311083021;
    $total_nilai = 90;
    

    return view("akademik.nilaimahasiswa", compact ("nama","nim","total_nilai"));

});
//switch
Route::get("nilaimahasiswaswitch", function(){
    $nama = "abdhu";
    $nim = 2311083021;
    $total_nilai = 90;
    

    return view("akademik.nilaimahasiswaswitch", compact ("nama","nim","total_nilai"));

});
//forloop
Route::get("nilaimahasiswaforloop", function(){
    $nama = "abdhu";
    $nim = 2311083021;
    $total_nilai = 90;
    

    return view("akademik.nilaimahasiswaforloop", compact ("nama","nim","total_nilai"));

});
//while
Route::get("nilaimahasiswawhileloop", function(){
    $nama = "abdhu";
    $nim = 2311083021;
    $total_nilai = 90;
    

    return view("akademik.nilaimahasiswawhileloop", compact ("nama","nim","total_nilai"));

});
//foreach
Route::get("nilaimahasiswaforeach", function(){
    $nama = "abdhu";
    $nim = 2311083021;
    $total_nilai = [20,30,50,80];
    

    return view("akademik.nilaimahasiswaforeach", compact ("nama","nim","total_nilai"));

});
//forelse
Route::get("nilaimahasiswaforelse", function(){
    $nama = "abdhu";
    $nim = 2311083021;
    $total_nilai = [20,30,50,80];
    

    return view("akademik.nilaimahasiswaforelse", compact ("nama","nim","total_nilai"));

});
//continue
Route::get("nilaimahasiswacontinue", function(){
    $nama = "abdhu";
    $nim = 2311083021;
    $total_nilai = [20,30,50,80];
    

    return view("akademik.nilaimahasiswacontinue", compact ("nama","nim","total_nilai"));

});
//break
Route::get("nilaimahasiswabreak", function(){
    $nama = "abdhu";
    $nim = 2311083021;
    $total_nilai = [100,80,20,30,50,80];
    

    return view("akademik.nilaimahasiswabreak", compact ("nama","nim","total_nilai"));

});

// //mahasigma
// Route::get('/pnp/jurusan/ti/mahasiswa', function (){
//     $arrMhs = ['abdhu','agel','nabil','rafi','dimas','RRQ'];
//     return view('akademik.mahasiswapnp',['mhs'=>$arrMhs]);
// })->name('mahasiswa');

// //dosen
// Route::get('/pnp/jurusan/ti/dosen', function (){
//     $arrDsn = ['Dosen web framework','Dosen microservices','Dosen mobile programming','Dosen web programing','Dosen multimedia','RRQ'];
//     return view('akademik.dosenpnp',['dsn'=>$arrDsn]);
// })->name('dosen');

//prodi
Route::get('/pnp/{jurusan}/{prodi}', function ($jurusan,$prodi){
    $data=[$jurusan,$prodi];
    return view('akademik.prodipnp')->with('data',$data);
})->name('proditi');

Route::get('dosen',[DosenController::class,'index']);
Route::get('teknisi',[TeknisiController::class,'index']);
Route::get('teknisi/create',[TeknisiController::class,'create']);
Route::post('teknisi',[TeknisiController::class,'store']);
Route::get('teknisi/{id}',[TeknisiController::class,'show']);
Route::get('teknisi/{id}/edit',[TeknisiController::class,'edit']);
Route::put('teknisi/{id}',[TeknisiController::class,'update']);
Route::delete('teknisi/{id}',[TeknisiController::class,'destroy']);

Route::get('insert-sql', [MahasiswaController::class,'insertSql']);
Route::get('insert-prepared', [MahasiswaController::class,'insertPrepared']);
Route::get('insert-binding', [MahasiswaController::class,'insertBinding']);
Route::get('update', [MahasiswaController::class,'updateSql']);
Route::get('delete', [MahasiswaController::class,'deleteSql']);
Route::get('select', [MahasiswaController::class,'selectSql']);
Route::get('select-tampil', [MahasiswaController::class,'selectTampil']);
Route::get('select-view', [MahasiswaController::class,'selectView']);
Route::get('select-where', [MahasiswaController::class,'selectWhere']);
Route::get('statement', [MahasiswaController::class,'statement']);


Route::get('dosen', [DosenpnpController::class,'index'])->name('dosens.index');
Route::get('dosen/create', [DosenpnpController::class,'create'])->name('dosens.create');
Route::post('dosen', [DosenpnpController::class,'store'])->name('dosens.store');
Route::get('dosen/{id}/edit', [DosenpnpController::class,'edit'])->name('dosens.edit');
Route::put('dosen/{id}', [DosenpnpController::class,'update'])->name('dosens.update');
Route::delete('dosen/{id}', [DosenpnpController::class,'destroy'])->name('dosens.destroy');

Route::get('mahasiswas', [MahasiswapnpController::class,'index'])->name('mahasiswas.index');
Route::get('mahasiswas/create', [MahasiswapnpController::class,'create'])->name('mahasiswas.create');
Route::post('mahasiswas', [MahasiswapnpController::class,'store'])->name('mahasiswas.store');
Route::get('mahasiswas/{id}/edit', [MahasiswapnpController::class,'edit'])->name('mahasiswas.edit');
Route::put('mahasiswas/{id}', [MahasiswapnpController::class,'update'])->name('mahasiswas.update');
Route::delete('mahasiswa/{id}', [MahasiswapnpController::class,'destroy'])->name('mahasiswas.destroy');

Route::get('cek-objek',[DosenController::class,'cekObjek']);
Route::get('insert',[DosenController::class,'insert']);
Route::get('mass-assignment',[DosenController::class,'massAssignment']);
Route::get('updatedosen',[DosenController::class,'update']);
Route::get('updatedosen-where',[DosenController::class,'updateWhere']);
Route::get('mass-update',[DosenController::class,'massUpdate']);
Route::get('deletedosen',[DosenController::class,'delete']);
Route::get('destroydosen',[DosenController::class,'destroy']);
Route::get('mass-delete',[DosenController::class,'massDelete']);
Route::get('all',[DosenController::class,'all']);
Route::get('all-view',[DosenController::class,'allView']);
Route::get('get-where',[DosenController::class,'getWhere']);
Route::get('test-where',[DosenController::class,'testWhere']);
Route::get('first',[DosenController::class,'first']);
Route::get('find',[DosenController::class,'find']);
Route::get('latest',[DosenController::class,'latest']);
Route::get('limit',[DosenController::class,'limit']);
Route::get('skip-take',[DosenController::class,'skipTake']);
Route::get('soft-delete',[DosenController::class,'softDelete']);
Route::get('with-trashed',[DosenController::class,'withTrashed']);
Route::get('restore',[DosenController::class,'restore']);
Route::get('force-delete',[DosenController::class,'forceDelete']);

//ORM
Route::get('dosenti', [DosentiController::class,'index'])->name('dosensti.index');
Route::get('dosenti/create', [DosentiController::class,'create'])->name('dosensti.create');
Route::post('dosenti', [DosentiController::class,'store'])->name('dosensti.store');
Route::get('dosenti/{id}/edit', [DosentiController::class,'edit'])->name('dosensti.edit');
Route::put('dosenti/{id}', [DosentiController::class,'update'])->name('dosensti.update');
Route::delete('dosenti/{id}', [DosentiController::class,'destroy'])->name('dosensti.destroy');

Route::get('pengguna/create',[PenggunaController::class,'create'])->name('penggunas.create');
Route::post('pengguna',[PenggunaController::class,'store'])->name('penggunas.store');
Route::get('pengguna',[PenggunaController::class,'index'])->name('penggunas.index');
Route::get('pengguna/{id}/edit',[PenggunaController::class,'edit'])->name('penggunas.edit');
Route::put('pengguna/{id}',[PenggunaController::class,'update'])->name('penggunas.update');
Route::delete('pengguna/{id}',[PenggunaController::class,'destroy'])->name('penggunas.destroy');