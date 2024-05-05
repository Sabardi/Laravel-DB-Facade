<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MahasiswaController;

route::get('/', [MahasiswaController::class, 'index']);

// daftar route dan method yang akan di gunakan sepanjang tutorial ini.

route::get('/insertsql', [MahasiswaController::class, 'insertsql']);
route::get('/insertTimestamp', [MahasiswaController::class, 'insertTimestamp']);
route::get('/insertPrepared', [MahasiswaController::class, 'insertPrepared']);
route::get('/insertBinding', [MahasiswaController::class, 'insertBinding']);
route::get('/update', [MahasiswaController::class, 'update']);
route::get('/delete', [MahasiswaController::class, 'delete']);
route::get('/select', [MahasiswaController::class, 'select']);
route::get('/selectTampil', [MahasiswaController::class, 'selectTampil']);
route::get('/selectView', [MahasiswaController::class, 'selectView']);
route::get('/selectWhere', [MahasiswaController::class, 'selectWhere']);
route::get('/statement', [MahasiswaController::class, 'statement']);

