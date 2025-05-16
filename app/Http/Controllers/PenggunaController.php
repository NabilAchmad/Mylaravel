<?php

namespace App\Http\Controllers;

use App\Http\Requests\StorePenggunaRequest;
use App\Http\Requests\UpdatePenggunaRequest;
use App\Models\Pengguna;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class PenggunaController extends Controller
{
    //
    public function index()  {
        $penggunas = Pengguna::latest()->paginate(2);
        return view('penggunas.index',compact('penggunas'));
    }
    public function create()  {
        // $request->validate([
        //     'name'=>'required|string|max:100',
        //     'email'=>'required|email|unique:penggunas',
        //     'password'=>'required|min:6|confirmed',
        //     'phone'=>'nullable|digits_between:9,13',
        // ]);
        return view('penggunas.create');
    }
    public function store(StorePenggunaRequest $request)  {
        
        //simpan data ke database
        // Pengguna::create([
        //     'name'=>$request->name,
        //     'email'=>$request->email,
        //     'password'=>Hash::make($request->password),
        //     'phone'=>$request->phone,
        // ]);
        $data = $request->validated();
        $data ['password'] = Hash::make($data['password']);
        if ($request->hasFile('file_upload')){
            $file = $request->file('file_upload');
            $filename = time().'_'.$file->getClientOriginalName();
            $path = $file->storeAs('uploads',$filename,'public');
            $data['file_upload'] = $path;
        }   
        Pengguna::create($data);

        return redirect()->route('penggunas.index')->with('success','Pengguna Berhasil Ditambahkan');
    }

    public function edit($id){
        $pengguna = Pengguna::findOrFail($id);
        return view('penggunas.edit',compact('pengguna'));
    }

    public function update(UpdatePenggunaRequest $request ,$id){
        //cara 1
        // $request->validate([          
        //         'name'=>'required|string|max:100',
        //         'email'=>'required|email|unique:penggunas',
        //         'phone'=>'nullable|digits_between:9,13',
        // ]);
        // $pengguna = Pengguna::findOrFail($id);
        // $pengguna->update([
        //     'name'=>$request->name,
        //     'email'=>$request->email,
        //     'phone'=>$request->phone,
        // ]);
        $pengguna = Pengguna::findOrFail($id);
        $data = $request->validated();
        if ($request->hasFile('file_upload')){
            //hapus file lama
            if ($pengguna->file_upload && Storage::disk('public')->exists($pengguna->file_upload)) {
                Storage::disk('public/')->delete('public/'.$pengguna->file_upload);
                }
    //upload file baru 
            $file = $request->file('file_upload');
            $filename = time().'_'.$file->getClientOriginalName();
            $path = $file->storeAs('uploads',$filename,'public');
            $data['file_upload'] = $path;
        } 
        $pengguna->update($data);
        return redirect()->route('pengguna.index')->with('success',);
    }
}
