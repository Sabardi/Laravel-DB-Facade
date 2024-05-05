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

1. menginput data(db:insert)
perintah nya di sql adalah insert into nama tabael where (isi tabel) values (nilai yang di kirimkan)
di controller di buat dengan

    public function insertsql(){
        $data = DB::insert("insert into mahasiswas(nim, nama,tanggal_lahir,ipk)
        values ('19003036','Sari Citra Lestari','2001-12-31',3.5)");
        dump($data);
    }

disini masih sama cara nya dengan menginput tanpa menggunakan framwork


nah perlu di ingat ya 
database nya itu harus di ingat ya kita perlu memanggil facade db nya agar bisa terjirim ke database;
 
akan tetapi 
data nya sudah terkirim tanpa kita perlu memanggil facade nya juga.
agar kita sama sama saja gpp lah di buat dulu

kita mencoba menggunakan route timestamps
agar tanggal nya ke input otomatis silahakan tambahkanya created_at dan updated_at

kemudian values nya di isi now(), now() saja. 

insertPrepared
Apa yang baru saja kita lakukan adalah menjalankan query "apa adanya". Supaya lebih aman,
query ini lebih baik ditulis dengan teknik prepared statement, dimana terdapat pemisahan
antara perintah SQL dengan data yang akan diinput. Terlebih data ini nantinya banyak berasal
dari inputan form yang sangat rawan diisi nilai-nilai aneh, termasuk resiko dari SQL Injection.
Untuk membuat prepared statement, caranya cukup mudah. Kita tetap tulis query seperti
biasa ke dalam method DB::insert(), tapi kali ini mengganti nilai data menjadi placeholder
dengan karakter tanda tanya " ? ". Kemudian input sebuah array di argument kedua method
DB::insert() untuk menggantikan placeholder tadi. 

public function insertPrepared(){
        $data = DB::insert("insert into mahasiswas(nim, nama,tanggal_lahir,ipk,created_at, updated_at)
        values (?,?,?,?,?,?)", ['000033','Sari Citra Lestari','2001-12-31',3.5,now(),now()]);
        dump($data);
    }

setiap tanda tanya mempunyai pasangan masing masing
