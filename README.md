# Tugas Lab 11 Web (Praktikum 11)
## Profil
| # | Biodata |
| -------- | --- |
| **Nama** | Reza Riyaldi Irawan |
| **NIM** | 312010284 |
| **Kelas** | TI.20.A.2 |
| **Mata Kuliah** | Pemrograman Web |

## Langkah 1 `Installasi`
1. Pergi ke `C:/xampp/php/` dan buka file `php.ini`.
2. Aktifkan beberapa ekstensi seperti berikut.

![konfig ini](img/ss_config.png)

3. Install Codeigniter 4 melalui composer di terminal dengan mengetikan perintah.

```
composer create-project codeigniter4/appstarter ci4
```

4. Kemudian ubah file `env` menjadi `.env`, lalu ubah seperti berikut.

![env](img/ss_env.png)

5. Jalankan projek dengan klik [http://localhost/lab11_php_ci/ci4/public](http://localhost/lab11_php_ci/ci4/public)

![](img/ss_landing1.png)
   
6. Atau menggunakan `php spark` diterminal, dengan mengetikan.

```
php spark serve
```
7. Hasilnya akan seperti berikut.

![spark](img/ss_run_spark.png)

8. Buka [http://localhost:8080](http://localhost:8080), maka hasilnya akan seperti berikut.

![](img/ss_landing2.png)

Maka instalasi telah berhasil.

## Langkah 1 `Membuat Route Baru`
1. Tambahkan kode berikut pada `Routes.php` di `app/Config/`.

```php
$routes->get('/about', 'Page::about');
$routes->get('/contact', 'Page::contact');
$routes->get('/faqs', 'Page::faqs');
```

2. Untuk mengetahui route sudah benar atau belum buka cli, lalu ketik

```
php spark routes
```

3. Maka hasilnya akan seperti berikut.

![routes](img/ss_routes.png)

4. Lalu kita dapat mengakses routes tersebut dibrowser, misalnya [http://localhost:8080/faqs](http://localhost:8080/faqs).

5. Maka hasilnya akan seperti berikut.

![Not found](img/ss_not_found1.png)

## Langkah 2 `Membuat Controller`
Contoh diatas menghasil `404 - Not Found` dikarenakan route tersebut mengarah ke _controller_ `Page` dengan method `faqs`, namun tidak ada. Selanjut kita akan membuat satu *Controller*.

1. Buat file baru dengan nama `Page.php` didalam `app/Controller/`.
2. Tambahkan kode berikut.

```php
<?php

namespace App\Controllers;

class Page extends BaseController
{
    public function about()
    {
        echo "Ini halaman About";
    }

    public function contact()
    {
        echo "Ini halaman Contact";
    }

    public function faqs()
    {
        echo "Ini halaman Faqs";
    }

}
```
3. Maka hasilnya akan seperti berikut.

![Controller](img/ss_controller1.png)

## Langkah 3 `Membuat View`
1. Buat file baru dengan nama `about.php` didalam `app/views/`.
2. Tambahkan kode berikut.

```php
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $title ?></title>
</head>
<body>
    <h1><?= $title ?></h1>
    <hr>
    <p><?= $content ?></p>
</body>
</html>
```

3. Kemudian pada *Controller* Page, ubah method `about` menjadi seperti berikut.

```php
public function about()
{
    $data = [
        'title' => "Halaman About",
        'content' => "Selamat datang dihalaman about"
    ];

    return view('about', $data);
}
```

4. Maka hasilnya seperti berikut.

![about](img/ss_about.png)

## Langkah 4 `Menambahkan assets`
1. Buat folder didalam direktori public dengan nama `css` dan `js`.
2. Kemudian tambahkan file style kedalam folder tersebut.
3. Lalu hubungkan dengan kode berikut.

```php
<head>
    ...
    <link rel="stylesheet" href="<?= base_url('css/bootstrap.min.css') ?>">
</head>
<body>
    ...
    <script src="<?= base_url('js/bootstrap.min.js') ?>"></script>
</body>
```
4. Maka hasilnya akan seperti berikut.

![assets](img/ss_assets.png)

## Langkah 5 `Templating`
1. Buat folder dengan nama `template` di direktori `Views`.
2. Didalam folder `template` buat file dengan nama `_header.php` dan `_footer.php`.
3. Pada `_header.php` isi dengan kode berikut.

```php
<?php

use CodeIgniter\Config\Services;

$request = Services::request();
?>

<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="<?= base_url('css/bootstrap.min.css') ?>">

    <!-- My CSS -->
    <link rel="stylesheet" href="<?= base_url('css/style.css') ?>">

    <title>CI4 | <?= $title ?></title>
</head>

<body>
    <div class="container shadow p-0">
        <div class="judul p-3">
            <h2 style="color: rgb(206, 206, 206);">Layout Sederhana</h2>
        </div>

        <nav class="navbar navbar-expand-lg navbar-dark p-0" style="background-color: purple;">
            <div class="container p-0">
                <button class="navbar-toggler ms-auto m-1" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav">
                        <li class="nav-item">
                            <a class="nav-link <?= $request->uri->getSegment(1) == '' ? 'active' : '' ?>" href="<?= base_url() ?>">Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link <?= $request->uri->getSegment(1) == 'article' ? 'active' : '' ?>" href="<?= base_url('article') ?>">Artikel</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link <?= $request->uri->getSegment(1) == 'about' ? 'active' : '' ?>" href="<?= base_url('about') ?>">About</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link <?= $request->uri->getSegment(1) == 'contact' ? 'active' : '' ?>" href="<?= base_url('contact') ?>">Kontak</a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>


        <div class="row m-0 my-4">
            <div class="col-md-9">
                <div class="banner py-5 text-center">
```

4. Pada `_footer.php` tambahkan kode berikut.

```html
</div>

</div>
<div class="col-md-3">
    <!-- Widget 1 -->
    <div class="card border-0 mb-3">
        <div class="card-header text-center fw-bolder" style="background-color: purple; color: white;">
            Widget Header
        </div>
        <ul class="list-group list-group-flush" style="border: 1px solid purple;">
            <li class="list-group-item">Widget Link</li>
            <li class="list-group-item">Widget Link</li>
            <li class="list-group-item">Widget Link</li>
            <li class="list-group-item">Widget Link</li>
        </ul>
    </div>

    <!-- Widget 2 -->
    <div class="card border-0">
        <div class="card-header text-center fw-bolder" style="background-color: purple; color: white;">
            Widget Text
        </div>
        <ul class="list-group list-group-flush" style="border: 1px solid purple;">
            <li class="list-group-item">
                Lorem ipsum dolor sit amet consectetur adipisicing elit. Qui neque, architecto aliquam atque
            </li>
        </ul>
    </div>
</div>
</div>


<footer class="bg-dark text-white p-3 text-center">
    <p class="m-0">&copy; 2022 - Universitas Pelita Bangsa @ Reza Riyaldi</p>
</footer>
</div>



<script src="js/bootstrap.min.js"></script>
</body>

</html>
```

5. Pada file `about.php` ubah kodenya menjadi berikut.

```php
<?= $this->include('template/_header'); ?>

<h1 class="fw-light"><?= $title ?></h1>
<img src="<?= base_url('img/me-square.png') ?>" alt="" class="rounded-circle border border-5 border-primary mb-2" width="150px">
<p><?= $content ?></p>
<a href="#" class="btn" style="background-color: purple; color: white;">Learn More</a>

<?= $this->include('template/_footer'); ?>
```

6. Pada file `style.css` menjadi berikut.

```css
html, body {
    height: 100vh;
    display: flex;
    justify-content: center;
    align-items: center;
}

/* Navigasi */
ul li a {
    padding: 10px 20px !important;
}

a.active, a.nav-link:hover {
    background-color: #fa11c0;
}


/* Banner */
.banner {
    padding-left: 20px;
    padding-right: 20px;
    background-color: rgb(245, 245, 245);
}

.banner h1 {
    font-size: 50px;
}
```

7. Maka hasilnya akan seperti berikut.

![result](img/ss_result-pratice.png)

## Pertanyaan dan Tugas
Lengkapi kode program untuk menu lainnya yang ada pada Controller Page, sehingga
semua link pada navigasi header dapat menampilkan tampilan dengan layout yang
sama.

1. Buat 3 file di dalam direktori `Views` dengan nama:
   + home.php
   + article.php
   + contact.php
2. Ubah `Routes` untuk url root mengarah ke controller `Page`, seperti berikut.
```php
// $routes->get('/', 'Home::index'); Sebelum
$routes->get('/', 'Page::index'); // Sesudah
```
3. `home.php`.
+ Views

```php
<?= $this->include('template/_header'); ?>

<h1 class="fw-light"><?= $title ?></h1>
<p><?= $content ?></p>

<?= $this->include('template/_footer'); ?>
```

+ Controller method `index()`.

```php
public function index()
{
    $data = [
        'title' => 'Home',
        'content' => 'Selamat datang di halaman Home'
    ];

    return view('home', $data);
}
```

+ Maka hasilnya akan seperti berikut.
![Result Home](img/ss_result-home.png)

4. `article.php`.
+ Views
```php
<?= $this->include('template/_header'); ?>

<h1 class="fw-light"><?= $title ?></h1>
<p><?= $content ?></p>

<?= $this->include('template/_footer'); ?>
```

+ Controller method `article()`
```php
public function article()
{
    $data = [
        'title' => 'Article',
        'content' => 'Ini adalah halaman article, banyak hal yang bisa diambil dan dipelajari didalam halaman ini. Enjoy'
    ];

    return view('article', $data);
}
```

+ Maka hasilnya akan seperti berikut.
![article](img/ss_result-article.png)


5. `contact.php`
+ Views

```php
<?= $this->include('template/_header'); ?>

<h1 class="fw-light"><?= $title ?></h1>

<form action="" class="text-start">
    <div class="mb-2">
        <label for="" class="form-label">Email</label>
        <input type="email" class="form-control">
    </div>

    <div class="mb-2">
        <label for="" class="form-label">Subject</label>
        <input type="text" class="form-control">
    </div>

    <div class="mb-2">
        <label for="" class="form-label">Message</label>
        <textarea name="" class="form-control" id="" cols="10" rows="3"></textarea>
    </div>

    <button class="btn btn-primary">Send</button>
</form>

<?= $this->include('template/_footer'); ?>
```

+ Controller pada method `contact()`

```php
public function contact()
{
    $data = [
        'title' => "Contact"
    ];
    return view('contact', $data);
}
```

+ Maka hasilnya akan seperti berikut.
![contact](img/ss_result-contact.png)

# Tugas Lab 11 Web (Praktikum 12 `CRUD`)
## Langkah 1 `Membuat DB`
1. Buat database baru dengan nama `lab_ci4` dengan query berikut.

```SQL
CREATE DATABASE lab_ci4;
```
2. Membuat Table baru dengan nama `artikel` dengan query berikut.

```SQL
CREATE TABLE artikel {
    id INT(11) auto_increment,
    judul VARCHAR(200) NOT NULL,
    isi TEXT,
    gambar VARCHAR(200),
    status TINYINT(1) DEFAULT 0,
    slug VARCHAR(200),
    PRIMARY KEY(id)
}
```
## Langkah 2 `Konfigurasi koneksi database`
1. Buka file `.env`, lalu edit seperti berikut.

![db](img/ss_env-db.png)

## Langkah 3 `Membuat Model`
1. Buat file baru dengan nama `ArtikelModel.php` pada direktori `app/Models`.
2. Tambahkan kode berikut.

```php
<?php
namespace App\Models;
use CodeIgniter\Model;

class ArtikelModel extends Model {
    protected $table = 'artikel';
    protected $primary = 'id';
    protected $setAutoIncrement = TRUE;
    protected $allowFields = ['judul', 'isi', 'status', 'slug', 'gambar'];
}
```

## Langkah 4 `Membuat Controller`
1. Buat file baru dengan nama `Artikel.php` pada direktori `app/Controller`.
2. Tambahkan kode berikut.

```php
<?php
namespace App\Controllers;

use App\Models\ArtikelModel;
use CodeIgniter\Controller;

class Artikel extends Controller {
    public function index()
    {
        $title = 'Daftar Artikel';
        $model = new ArtikelModel();
        $artikel = $model->findAll();

        return view('artikel/home', compact('title', 'artikel'));
    }
}
```

## Langkah 5 `Membuat View`
1. Buat file baru dengan nama `home.php` pada direktori `app/Views/artikel`.
2. Tambahkan kode berikut.

```php
<?= $this->include('template/_header.php'); ?>

<h1 class="display-4">Artikel</h1>

<?php if ($artikels) : foreach ($artikels as $artikel) : ?>
        <div class="card">
            <div class="card-header">
                <h2><a href="<?= base_url('artikel/') . $artikel['slug'] ?>"><?= $artikel['judul'] ?></a></h2>
            </div>

            <div class="card-body">
                <p><?= substr($artikel['isi'], 0, 200) ?></p>
            </div>
        </div>
    <?php endforeach;
else : ?>
<div class="card">
    <div class="card-body">Belum ada data</div>
</div>
<?php endif; ?>

<?= $this->include('template/_footer.php'); ?>
```

3. Maka hasilnya akan seperti berikut.

![read-0](img/ss_read-0.png)

4. Karena datanya belum ada, kita tambah data dengan menjalan query berikut diphpmyadmin.

```SQL
INSERT INTO artikel (judul, isi, slug) VALUE
('Artikel pertama', 'Lorem Ipsum adalah contoh teks atau dummy dalam industri
percetakan dan penataan huruf atau typesetting. Lorem Ipsum telah menjadi
standar contoh teks sejak tahun 1500an, saat seorang tukang cetak yang tidak
dikenal mengambil sebuah kumpulan teks dan mengacaknya untuk menjadi sebuah
buku contoh huruf.', 'artikel-pertama'),
('Artikel kedua', 'Tidak seperti anggapan banyak orang, Lorem Ipsum bukanlah
teks-teks yang diacak. Ia berakar dari sebuah naskah sastra latin klasik dari
era 45 sebelum masehi, hingga bisa dipastikan usianya telah mencapai lebih
dari 2000 tahun.', 'artikel-kedua');
```

5. Maka hasilnya seperti berikut.

![read-1](img/ss_read-1.png)

## Langkah 6 `Detail View`
1. Tambahkan method baru dengan nama `detail_artikel($slug)` pada Controller `Artikel.php`.
2. Maka kodenya seperti berikut.

```php
public function detail_artikel($slug)
{
    $model = new ArtikelModel();
    $artikel = $model->where([
        'slug' => $slug
    ])->first();

    if (!$artikel) {
        throw PageNotFoundException::forPageNotFound();
    }
    $title = $artikel['judul'];

    return view('artikel/detail_artikel', compact('title', 'artikel'));
}
```

3. Tambahkan Routes baru dengan kode seperti berikut.

```php
$routes->get('/artikel/(:any)', 'Artikel::detail_artikel/$1');
```

4. Buat file baru dengan nama `detail_artikel.php` didalam direktori `app/Views/artikel`.
5. Tambahkan kode berikut.

```php
<?= $this->include('template/_header.php'); ?>

<h1 class="display-4" style="font-size: 36px;">Detail <?= $artikel['judul'] ?></h1>

<div class="card my-3">
    <div class="card-header">
        <h4><?= $artikel['judul'] ?></h4>
    </div>

    <div class="card-body">
        <!-- <img src="<?= base_url() . '/gambar/' . $artikel['gambar'] ?>" alt="<?= $artikel['judul'] ?>"> -->
        <p><?= $artikel['isi'] ?></p>
    </div>

    <div class="card-footer text-center">
        <?= $artikel['date_created'] ?>
    </div>
</div>

<?= $this->include('template/_footer.php'); ?>
```

6. Maka hasilnya sebagai berikut.

![detail artikel](img/ss_detail-artikel.png)

## Langkah 7 `Membuat Menu Admin`