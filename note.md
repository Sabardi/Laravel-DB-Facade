DB Facade di

note: projek nya usahakan yang baru

DB Facade adalah sebuah fitur yang memungkinkan pengguna untuk menjalankan kueri SQL secara langsung menggunakan sintaksis baku SQL, tanpa harus melalui proses abstraksi objek seperti yang dilakukan oleh ORM seperti Eloquent.
atau lebih tepat nya lapisan abstraksi yang menyediakan cara mudah untuk berinteraksi dengan database Anda.

untuk mempelajari ini tahap pertama kita lakukan adalah

membuat migration dan controller
disini kita menggunakan contoh sebelum nya yaitu tabel mahasiswas
inputkan perintah ini
php artisan make:migration create_mahasiswas_table --create=mahasiswas
selanjutnya di isi menggunakan tabel yang sudah kita buat sebelum nya

$table->char('nim',8)->unique();
$table->string('nama');
$table->date('tanggal_lahir');
$table->decimal('ipk',3,2)->default(1.00);

selanjutnya kita jalankan migra
tionn nya dengan perintah
php artisan migrate

selanjutnya kita membuat controller nya dengan perintah
php artisan make:controller MahasiswaController

dan jangan lupa juga di buatkan routes nya.
route::get('/', [MahasiswaController::class, 'index']);

nah disi kita akan menambah beberapa route lagi
agar percobaan semua yang mau kita lakukan di database berjalan dengan lancar

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
