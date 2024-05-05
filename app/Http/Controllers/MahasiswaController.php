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
}
