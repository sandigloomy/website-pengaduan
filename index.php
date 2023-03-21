<?php

/**
 * LoadModule rewrite_module modules/mod_rewrite.so
 */
/*
    <Directory "/path/to/your/application">
    Options Indexes FollowSymLinks MultiViews
    AllowOverride All
    Order allow,deny
    Allow from all
    RewriteEngine On
    RewriteCond %{REQUEST_FILENAME} !-f
    RewriteRule ^(.*)$ index.php [QSA,L]
</Directory>
 */

/** Kode ini menugaskan nilai variabel $location = folder utama 
 * ke variabel $me. Nilai $location adalah '/sandi'. */
$location = '/sandi';
$me = $location;

/** ? Kode ini menetapkan nilai variabel global $_SERVER['REQUEST_URI']
 *  ke variabel $request. Variabel $_SERVER['REQUEST_URI'] 
 * berisi URI yang diberikan untuk mengakses halaman.
 **/
$request = $_SERVER['REQUEST_URI'];

/** $filePath adalah variabel yang diberi string kosong.
 *  Variabel ini akan digunakan untuk menyimpan jalur file. 
 * */
$filePath = '';

/** 
 * Kode ini adalah pernyataan switch yang memeriksa nilai variabel "$request". Bergantung pada nilai "$request"
 * path file yang berbeda diberikan ke variabel "$filePath".
 * Jika "$request" sama dengan penggabungan variabel "$me" dan "/", maka "$filePath" akan diberi nilai "community/home.php".
 * Jika "$request" sama dengan penggabungan variabel "$me" dan "/profile", maka "$filePath" akan diberi nilai "community/profile.php".
 * Jika "$request" sama dengan penggabungan variabel "$me" dan "/contact", maka "$filePath" akan diberi nilai "community/contact.php".
 * Dalam semua kasus lain, ketika tidak ada kondisi ini yang terpenuhi, maka "$filePath" akan diberi nilai "community/404.php". 
 */
switch ($request) {
    
        // Halaman Utama
    case $me . '/home':
        $filePath = 'masyarakat/home.php';
        break;

    case $me . '/':
        $filePath = 'masyarakat/anonim.php';
        break;

    case $me . '/anonimm':
        $filePath = 'masyarakat/pengaduan/anonim.php';
        break;

    case $me . '/pengaduan':
        $filePath = 'masyarakat/pengaduan/anonim.php';
        break;

    case $me . '/laporkan':
        $filePath = 'masyarakat/pengaduan/pengaduan.php';
        break;

    case $me . '/history':
        $filePath = 'masyarakat/views/table.php';
        break;


    case $me . '/user':
        $filePath = 'masyarakat/views/user.php';
        break;
    case $me . '/registrasi':
        $filePath = 'masyarakat/auth/registrasi.php';
        break;
    case $me . '/login':
        $filePath = 'masyarakat/auth/login.php';
        break;
    case $me . '/logout':
        $filePath = 'masyarakat/auth/logout.php';
        break;


        // Halaman Admin
    case $me . '/admin':
        $filePath = 'admin/home.php';
        break;
    case $me . '/admin/login':
        $filePath = 'admin/auth/login.php';
        break;
    case $me . '/admin/logout':
        $filePath = 'admin/auth/logout.php';
        break;
    case $me . '/admin/registrasi':
        $filePath = 'admin/auth/registrasi.php';
        break;

        // Petugas
    case $me . '/petugas':
        $filePath = 'petugas/home.php';
        break;
    case $me . '/petugas/logout':
        $filePath = 'admin/auth/logout.php';
        break;

    case $me . '/anonim':
        $filePath = 'anonim/home.php';
        break;

        // default 404
    default:
        http_response_code(404);
        $filePath = '404.php';
        break;
}

// require semua file dengan variable $filepath
require $filePath;
