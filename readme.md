# Simple Blog - Reloaded

Tugas 1 IF4033.

## System Requirements
1. MySQL (&ge; 5.5.x) atau MariaDB (&ge; 10.x)
2. PHP &ge; 5.5
3. Windows atau UNIX-like OS

## Quick Start (Development)
1. *Clone* repo ini
2. Ubah direktori ke tempat *clone*
3. Buat file `.env` yang berisi parameter-parameter berikut:

```
APP_DEBUG=true
APP_KEY=[32 random chars]

DB_HOST=[host database]
DB_PORT=[port database]
DB_DATABASE=[nama database]
DB_USERNAME=[nama username untuk database]
DB_PASSWORD=[password]
```

4. Jalankan `php -S localhost:8080 -t public`

## Deskripsi

Gunakan template ini untuk membuat sebuah blog sederhana dengan menggunakan bahasa pemrograman PHP.

## Spesifikasi

### List Post

List Post merupakan halaman awal blog yang berisi daftar post yang sudah pernah dibuat. Setiap item pada list post mengandung `Judul`, `Tanggal`, `Konten`. Terdapat juga menu untuk mengedit dan menghapus item post tersebut.

### Add Post

Add Post merupakan halaman untuk menambahkan post baru.  Post baru memiliki form untuk mengisi `Judul`, `Tanggal`, dan `Konten`. Lakukan **validasi** untuk tanggal dengan javascript agar tanggal yang dimasukkan lebih besar atau sama dengan tanggal saat menambahkan post baru tersebut.

### Edit Post

Mengedit post yang sudah pernah dibuat. Form yang ditampilkan sama seperti saat menambahkan form baru.

### Delete Post

Menghapus post yang sudah pernah dibuat. Lakukan **konfimasi** dengan javascript untuk konfirmasi pengguna terhadap penghapusan post tersebut. Keluarkan konfirmasi berisi pesan berikut

    Apakah Anda yakin menghapus post ini?

Jika pengguna memilih `yes` maka post terhapus, jika tidak maka post tidak jadi dihapus.

### View Post

Halaman View Post merupakan halaman untuk melihat suatu post. Pada halaman ini terdapat informasi `Judul`, `Tanggal`, dan `Konten`, serta **Komentar** (spesifikasi di bawah).

### Komentar

Komentar berisi daftar komentar yang ditulis untuk post tertentu. Form komentar terdiri dari `Nama`, `Email`, dan `Komentar`, simpan juga tanggal dibuatnya komentar tersebut. Setiap item pada list komentar berisi `Nama`, `Tanggal`, `Komentar`.

Lakukan **validasi** email pada form komentar dengan menggunakan javascript. Komentar dibuat dengan menggunakan AJAX. Pemanggilan AJAX dilakukan saat

- Load list komentar
- Menambahkan komentar baru

## Tools

Pembuatan blog ini tidak boleh menggunakan framework PHP dan framework javascript.

**Tidak boleh menggunakan jquery untuk ajax.**

## Pengamanan
* Untuk melakukan filtrasi HTML, gunakan fungsi`strip_tags()`. Walaupun demikian, fungsi ini hanya bisa mengamankan jika digunakan untuk melakukan filtrasi keseluruhan tag. Walaupun `strip_tags()` mendukung *whitelist*, [link ini](http://php.net/manual/en/function.strip-tags.php#118183) menyatakan bahwa fungsi ini lemah untuk mengamankan HTML secara keseluruhan.
* Jangan lupa untuk membubuhkan `APP_KEY` di `.env`


## Lisensi

&copy; 2016

Dosen: [Yudistira Dwi Wardhana](http://github.com/yudis)