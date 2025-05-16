<?php

namespace App\Http\Controllers\dosen;

use App\Models\Dosen;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class DosenController extends Controller
{
    //
    public function index(){
        return 'menampilkan list dosen';
    }
    public function cekObjek(){
        return new Dosen();
        dd($dosen);
    }
    public function insert(){
        $dosen = new Dosen();
        $dosen->nama="Abdhu";
        $dosen->nik="010101011010";
        $dosen->email="abdhu@gmail.com";
        $dosen->nohp="2311083021";
        $dosen->alamat="Medan";
        $dosen->keahlian="Salto India";
        $dosen->save();
        dd($dosen);
    }

    public function massAssigment()  {
        $dosen1 = Dosen::create([
            'nama'=>"Nabil",
            'nik'=>"0101010110100",
            'email'=>"nabil@gmail.com",
            'nohp'=>"2311083022",
            'alamat'=>"Palembang",
            'keahlian'=>"Rendang",
        ]
        );
        dd($dosen1);
        $dosen2 = Dosen::create([
            'nama'=>"Rafi",
            'nik'=>"01010101101001",
            'email'=>"rafi@gmail.com",
            'nohp'=>"2311083023",
            'alamat'=>"Padang Panjang",
            'keahlian'=>"Dufan",
        ]
        );
        dd($dosen2);
    }

    public function update(){
        $dosen =Dosen::find(10);
        $dosen->keahlian="Data Analyst";
        $dosen->save();
        dd($dosen);
    }
    public function updateWhere(){
        $dosen =Dosen::find('nobp','0821131441')->first();
        $dosen->keahlian="AI";
        $dosen->save();
        dd($dosen);
    }
    public function massUpdate(){
        $dosen =Dosen::where('nohp','0821131441')->first()->update(

            [
                'alamat' => "Padang",
                'keahlian'=> "cloud platform",
            ]
        );
        dd($dosen);
    }

    public function delete()
   {
       $dosen = Dosen::find(22);
       $dosen->delete();
       dd($dosen);
   }
   public function destroy()
   {
       $dosen = Dosen::destroy([23]);
       dd($dosen);
   }


   public function massDelete()
   {
       $dosen = Dosen::where('keahlian', 'Data Analyst')->delete();
       dd($dosen);
   }
   public function all()
   {
       $dosen = Dosen::all();
       foreach ($dosen as $itemDosen) {
           echo $dosen[0]->id . '<br>';
           echo $dosen[0]->nama . '<br>';
           echo $dosen[0]->nik . '<br>';
           echo $dosen[0]->email . '<br>';
           echo $dosen[0]->nohp . '<br>';
           echo $dosen[0]->alamat;
           echo '<hr>';
           //dd ($itemDosen);
       }
   }
   public function allView()
   {
       $dosen = Dosen::all();
       return view('akademik.dosen', ['dsn' => $dosen]);
   }


   public function getWhere()
   {


       $dosen = Dosen::where('keahlian', 'Salto India')
           ->orderBy('nama', 'desc')
           ->get();
       return view('akademik.dosen', ['dsn' => $dosen]);
   }
   public function testWhere()
   {


       $dosen = Dosen::where('keahlian', 'Web Programming')
           ->orderBy('nik', 'asc')
           ->get();
       return view('akademik.dosen', ['dsn' => $dosen]);
   }

   public function first()
   {


       $dosen = Dosen::where('keahlian', 'Web Programming')->first();
       return view('akademik.dosen1', ['dosen' => $dosen]);
   }
   public function find()
   {


       $dosen = Dosen::find(15);
       return view('akademik.dosen1', ['dosen' => $dosen]);
   }
   public function latest()
   {


       $dosen = Dosen::latest()->get();
       return view('akademik.dosen', ['dosen' => $dosen]);
   }
   public function limit()
   {


       $dosen = Dosen::latest()->limit(2)->get();
       return view('akademik.dosen', ['dosen' => $dosen]);
   }
   public function skipTake()
   {


       $dosen = Dosen::orderBy("id")->skip(1)->take(4)->get();
       return view('akademik.dosen', ['dosen' => $dosen]);
   }
   public function softDelete(){
        Dosen::where('id','1')->delete();
        return "Data berhasil dihapus";
   }
   public function withTrashed(){
        $dosen = Dosen::withTrashed()->get();
        return view('akademik.dosen', ['dsn' => $dosen]);
   }
   public function restore(){
        $dosen = Dosen::withTrashed()->where('id','1')->restore();
        return "Data berhasil direstore";
   }
   public function forceDelete(){
        Dosen::where('id','1')->forceDelete();
        return "Data berhasil dihapus secara permanen";
   }

}
