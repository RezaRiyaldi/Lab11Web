# Tugas Lab 6 Web
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