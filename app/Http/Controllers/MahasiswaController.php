<?php

namespace App\Http\Controllers;
use App\Models\Mahasiswa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class MahasiswaController extends Controller
{
    public function insertSql(){
        $query = DB::insert('insert into mahasiswas (nama, nobp, email, nohp, jurusan, created_at, updated_at, prodi, tgllahir) values ("Abdhu","2311083021", "dudukempit@gmail.com", "081367995046", "Teknologi Informasi", now(), now(), "RPL","2005-02-13")');
        return "Data berhasil ditambahkan";
    }

    public function insertPrepared()
    {
        $query = DB::insert('insert into mahasiswas (nama, nobp, email, nohp, jurusan, created_at, updated_at, prodi, tgllahir) values (?,?,?,?,?,?,?,?,?)',["Nabil","2311089999", "nabilkempit@gmail.com", "081367995045", "Teknologi Informasi", now(), now(), "RPL","2005-02-18"]);
        return "Data berhasil ditambahkan"; 
    }

    public function insertBinding()
    {
        $query = DB::insert('insert into mahasiswas (nama, nobp, email, nohp, jurusan, created_at, updated_at, prodi, tgllahir) values (:nama,:nobp,:email,:nohp,:jurusan,:created_at,:update_at,:prodi,:tgllahir)',[
            "nama"=>"Rafi",
            "nobp"=>"2311089998",
            "email"=>"rafikempit@gmail.com",
            "nohp"=>"081367995047",
            "jurusan"=> "Teknologi Informasi",
            "created_at"=> now(),
            "update_at"=> now(),
            "prodi"=>"RPL",
            "tgllahir"=>"2005-02-19"]);
        return "Data berhasil ditambahkan"; 
    }

    public function updateSql()
    {
        $query = DB::update("UPDATE mahasiswas SET jurusan ='sastra manajemen teknik balerina' WHERE nama=?",['Nabil']);
        return "berhasil update data mahasiswa";
    }
    public function deleteSql()
    {
        $query = DB::delete("DELETE FROM mahasiswas WHERE nama=?",['Nabil']);
        return "berhasil hapus data mahasiswa";
    }
    public function selectSql()
    {
        $query = DB::select("SELECT * FROM mahasiswas");
        dd($query);
    }
    public function selectTampil()
    {
        $query = DB::select("SELECT * FROM mahasiswas");
       echo ($query[0]->id). "<br/>";
       echo ($query[0]->nama). "<br/>";
       echo ($query[0]->nobp). "<br/>";
       echo ($query[0]->email). "<br/>";
       echo ($query[0]->nohp). "<br/>";
       echo ($query[0]->jurusan). "<br/>";
       echo ($query[0]->prodi). "<br/>";
       echo ($query[0]->tgllahir). "<br/>";
       
    }
    public function selectView()
    {
        $query = Mahasiswa::latest()->paginate(10);
        return view("akademik.mahasiswapnp",["mhs"=>$query]);
    }
    public function selectWhere()
    {
        $query = DB::select("SELECT * FROM mahasiswas WHERE prodi=? ORDER BY nobp ASC",["RPL"]);
        return view("akademik.mahasiswapnp",["mhs"=>$query]);
    }
    public function statement()
    {
        $query = DB::delete("TRUNCATE mahasiswas");
        return "Berhasil Menghapus Table Mahasiswa";
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        DB::listen(function($query){
        logger("Querry:". $query->sql." |binding".implode(",", $query->bindings));
        });
        //mengambil semua data mahasiswa
        $data =Mahasiswa::all();
        //dd($data);

        dump($data);
        return view("mahasiswa.index",compact("data"));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
