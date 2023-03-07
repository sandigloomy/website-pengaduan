<?php

// $koneksi = mysqli_connect("localhost", "root", "", "pengaduan_masyarakat");

// require '../core/db.php';

// $id = $_GET['id'];

// // agar tidak bisa di inject
// $id = mysqli_real_escape_string($koneksi, $id);

// if (hapusPengaduan($id) > 0 ){
//     echo "<script>alert('berhasil di hapus');
//     document.location.href = '/sandi/admin/?us=pengaduan';
//     </script>";
// } else {
//     echo mysqli_error($koneksi);
// }
// fungsi hapus data

// percobaan ke dua
require '../core/db.php';

if (isset($_GET['table']) && isset($_GET['id']) && isset($_GET['key'])) {
    $table = $_GET['table'];
    $id = $_GET['id'];
    $key = $_GET['key'];
    
    deleteData($table,$key, $id);
} else {
    echo "Parameter tidak lengkap";
    
}
?>

