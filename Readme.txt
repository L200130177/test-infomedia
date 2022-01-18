setalah download, buka folder database, di folder tersebut ada file infomedia.sql
silakan buat database dengan nama infomedia kemudian import file tersebut kedalam database
Pertama letakkan folder project ke localhost masing - masing
setting file config ada codeigniter yang terletak di folder project - aplication - config -config.php
ubah "$config['base_url'] = 'http://localhost:8080/infomedia/';" sesuai localhost dan nama folder project
masih di folder yang sama sekarang cari file database.php
ubah settingan 
'hostname' => 'localhost:3307' pada "localhost:3307" ubah sesuai letak localhost masing - masing
'username' => 'root' ubah sesuai username yang digunakan
'password' => '' ubah sesuai password masing - masing
'database' => 'infomoedia' tidak perlu diubah apabila sudah membuat database bernama infomedia dan sudah mengimport file database yang saya berikan.

buka aplikasi dengan mengetikkan url sesuai localhost masing - masing
setelah aplikasi terbuka user akan diarahkan ke haaman login
ketika belum login user tidak akan bisa mengakses halaman lain selain login
untuk mencoba rest api silakan kunjungi halaman user
disana saya telah membuat API untuk method GET, POST, PUT, dan DELETE
untuk data entry dan modifikasi data silakan akses menu user, role, ataupun privilege, di halaman tersebut saya sudah membuat proses CRUD
untuk proses report dan filter selection silakan akses menu user