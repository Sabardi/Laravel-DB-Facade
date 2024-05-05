<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class MahasiswaController extends Controller
{
    //
    public function index(){
        return "berhasil di proses";
    }

    public function insertsql(){
        $data = DB::insert("insert into mahasiswas(nim, nama,tanggal_lahir,ipk)
        values ('000033','Sari Citra Lestari','2001-12-31',3.5)");
        dump($data);
    }

    public function insertTimestamp(){
        $data = DB::insert("insert into mahasiswas(nim, nama,tanggal_lahir,ipk,created_at, updated_at)
        values ('000033','Sari Citra Lestari','2001-12-31',3.5,now(),now())");
        dump($data);
    }

    public function insertPrepared(){
        $data = DB::insert("insert into mahasiswas(nim, nama,tanggal_lahir,ipk,created_at, updated_at)
        values (?,?,?,?,?,?)", ['0111111','Sari Citra Lestari','2001-12-31',3.5,now(),now()]);
        dump($data);
    }

    public function insertBinding(){
        $data = DB::insert("insert into mahasiswas(nim, nama,tanggal_lahir,ipk,created_at, updated_at)
        values (:nim,:nama,:tanggal_lahir,:ipk,:created_at,:updated_at)", [
            'nim' => '01011a1',
            'nama' => 'Sari Citra Lestari',
            'tanggal_lahir' => '2001-12-31',
            'ipk' => 3.5,
            'created_at' => now(),
            'updated_at' => now()
        ]);
        dump($data);
    }

    public function update(){
        $data = DB::update(
            "update mahasiswas set created_at = now(), updated_at = now()
            where id = 1"
        );
    }

    public function delete(){
        $data = DB::delete(
            "delete from mahasiswas where id = 7"
        );
        dump($data);
    }

    public function select(){
        $result = DB::select("SELECT * FROM mahasiswas");
        dump($result);
    }

    public function selectTampil(){
        $result = DB::select("SELECT * FROM mahasiswas");
        return view('tampil',  ['mahasiswas' => $result]);
    }

    public function selectView(){
        $result = DB::select("SELECT * FROM mahasiswas");
        return view('tampil',  ['mahasiswas' => $result]);
    }

    public function selectWhere(){
        $result = DB::select("SELECT * FROM mahasiswas WHERE ipk > ? ORDER BY nama ASC", [3]);
        return view('tampil',  ['mahasiswas' => $result]);
    }
}
