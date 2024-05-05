<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MahasiswaController;

route::get('/', [MahasiswaController::class, 'index']);
