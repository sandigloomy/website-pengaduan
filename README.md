
<a name="readme-top"></a>



<!-- PROJECT LOGO -->
<br />
<div align="center">
  <a href="https://github.com/othneildrew/Best-README-Template">
    <img src="assets/svg/favicon.svg" alt="Logo" width="80" height="80">
  </a>

  <h3 align="center">Pengaduan Masyarakat</h3>

  <p align="center">
    Project Pengaduan Masyarakat php native
  </p>
</div>



<!-- TABLE OF CONTENTS -->


<!-- ABOUT THE PROJECT -->
## Project

[![Product Name Screen Shot][product-screenshot]](https://example.com)

Project ini dengan Routing sederhana php menggunakan directory root utama folder, membuat project ini memakan waktu yang cukup lama hehe.

Kenapa membuatnya:
* Ujikom
* Memperdalam php walau masih native :D
* Untuk Portfolio :smile:

Ini menggunakan template bootstrap , untuk mengubah tampilan lihat pada documentasi bootstrap yang tersedia.

import sql `*.sql` untuk memulai.

<p align="right">(<a href="#readme-top">back to top</a>)</p>


### Built With

* [![Laravel][Laravel.com]][Laravel-url]
* [![Bootstrap][Bootstrap.com]][Bootstrap-url]
* [![JQuery][JQuery.com]][JQuery-url]

<p align="right">(<a href="#readme-top">back to top</a>)</p>



<!-- GETTING STARTED -->
## Getting Started

Untuk menggunakan project ini!

### Prerequisites

Import File sql ke phpmyadmin
* sql
  ```sh
  *sql
  ```

### Installation

Untuk menggunakan

1. Terminal / download zip
2. Clone the repo
   ```sh
   git clone https://github.com/sandikrxyzn/project-pengaduan.git
   ```
3. Ubah pada index.php bila ingin mengubah nama folder
   ```php
   $location = '/<folder_utama>';
   ```
4. ubah  `core/db.php`
   ```php
   $conn = mysqli_connect("<nama_localhost>", "root", "", "pengaduan_masyarakatt");
   ```

<p align="right">(<a href="#readme-top">back to top</a>)</p>


## Login 
* masyarakat
 ```php
   username: sandi.us passwors: us
 ```
* admin
 ```php
   username: admin passwors: admin
 ```
* petugas
 ```php
   username: petugas passwors: petugas
 ```
<p align="right">(<a href="#readme-top">back to top</a>)</p>

<!-- ROADMAP -->
## Roadmap

- [x] Login / Registrasi -> admin & masyarakat
- [x] Laporkan pengaduan
- [x] Verifikasi
- [x] Masyarakat melilihat pengaduan yang di kirimkan 
- [x] admin
    - [ ] table akun -> delete -> add
    - [ ] laporan


<p align="right">(<a href="#readme-top">back to top</a>)</p>



<!-- CONTACT -->
## Contact

Instagram - [@sandimlnfzn_](https://instagram.com/sandikrxyzn) - sandikrxyzn@example.com

Project Link: [https://github.com/sandikrxyzn/project-pengaduan/](https://github.com/sandikrxyzn/project-pengaduan)

<p align="right">(<a href="#readme-top">back to top</a>)</p>



<!-- MARKDOWN LINKS & IMAGES -->
[Laravel.com]: https://img.shields.io/badge/PHP-777BB4?style=for-the-badge&logo=php&logoColor=white
[Laravel-url]: https://laravel.com
[JQuery.com]: https://img.shields.io/badge/MySQL-005C84?style=for-the-badge&logo=mysql&logoColor=white
[JQuery-url]: https://jquery.com 
[Bootstrap.com]: https://img.shields.io/badge/Bootstrap-563D7C?style=for-the-badge&logo=bootstrap&logoColor=white
[Bootstrap-url]: https://getbootstrap.com
[product-screenshot]: images/enam.png
