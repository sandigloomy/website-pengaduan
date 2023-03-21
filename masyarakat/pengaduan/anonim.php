<?php

require 'core/db.php';

// ! upload gambar / file
function uploadgambar()
{

    $nameFile = $_FILES['foto']['name'];
    $sizeFile = $_FILES['foto']['size'];
    $error = $_FILES['foto']['error'];
    $tmpName = $_FILES['foto']['tmp_name'];

    // cek apakah gambar yang upload sesuai
    if ($error === 4) {
        echo "<script>alert('Plih Gambar');
    document.location.href = 'pengaduan';  
    </script>";
        return false;
    }

    $ekstensiGambarValid = ['jpg', 'jpeg', 'png'];
    $ekstensiGambar = explode('.', $nameFile);
    $ekstensiGambar = strtolower(end($ekstensiGambar));

    if (!in_array($ekstensiGambar, $ekstensiGambarValid)) {
        echo "<script>alert('Upload Gambar Bukan yang lain');
    document.location.href = 'pengaduan';     
    </script>";
        return false;
    }

    if ($sizeFile > 1000000) {
        echo "<script>alert('Ukuran File Terlalu Besar');
    document.location.href = 'pengaduan';      
    </script>";
        return false;
    }


    // Lolos Pengecekan

    // buat nama baru
    $nameFileBaru = uniqid();
    $nameFileBaru .= '.';
    $nameFileBaru .= $ekstensiGambar;

    move_uploaded_file($tmpName, 'uploads/images/' . $nameFileBaru);

    return $nameFileBaru;
}



$nik = "1050242712960001";

$judul = 'Pengaduan🚀';

require 'templates/header.php';
?>
<nav class="layout-navbar container-xxl navbar navbar-expand-xl  align-items-center bg-navbar-theme" id="layout-navbar">
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
            <li class="nav-item">
                <a class="nav-link navbar-brand" aria-current="page" href="/sandi">Home</a>
            </li>
        </ul>
        <!-- User -->
    </div>
    <!-- /user -->
</nav>


<div class="content-wrapper">
    <div class="container-xxl flex-grow-1 container-p-y">
        <?php
        if (isset($_POST['submit'])) {
            var_dump($_POST);
            $date = date('Y-m-d');
            $nik = '1050242712960001';
            $lapor = $_POST['lapor'];
            $judul = $_POST['judul'];
            $status = 0;

            if (empty($nik)) {
                $errors[] =  "<div class='alert alert-danger alert-dismissible' role='alert'>
               Masukan Nik Anda ..
               <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
           </div>";
                return false;
            }
            $gambar = uploadgambar();

            if (!$gambar) {
                return false;
            }

            // insert data
            $query = "INSERT INTO pengaduan 
           VALUES
           ('','$date','$nik', '$lapor','$gambar','$status','$judul')";
            if (mysqli_query($conn, $query)) {
                echo "<div class='alert alert-primary alert-dismissible' role='alert'>
               Laporan Berhasil Dikirim..
               <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
           </div>
                           
           <script>
               setTimeout(function () {
                   window.location.href = '/sandi/pengaduan';              
               }, 2000); 
           </script>";
            } else {
                echo "<div class='alert alert-danger alert-dismissible' role='alert'>
               Laporan Gagal Dikirim..
               <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
           </div>";
            }
        }
        ?>

        <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Home /</span> Pengaduan
        </h4>
        <form class="mb-4" action="" method="POST" enctype="multipart/form-data">
            <?php require 'error.php' ?>
            <div class="row">
                <div class="col-md-6">
                    <div class="card mb-4">

                        <h5 class="card-header">Selamat Datang
                            <img src="assets/svg/logo.svg" alt="" class="w-px-15 h-auto rounded-circle">
                        </h5>
                        <div class="card-body">
                            <div>
                                <label for="defaultFormControlInput" class="form-label">Nik
                                </label>

                                <input minlength="16" type="text" class="form-control" id="defaultFormControlInput" value="1050242712960001" aria-describedby="defaultFormControlHelp" name="nik" readonly />

                                <div id="defaultFormControlHelp" class="form-text" name="nik">
                                    Nik Anonim
                                </div><br>
                                <div class="mb-3 row">
                                    <!-- <label for="html5-date-input" class="form-label">Tanggal</label> -->

                                    <!-- Tempat Upload Files / gambar -->
                                    <div class=" mb-3">
                                        <div class="col-md-15"><br>
                                            <label for="formFile" class="form-label">Masukan Bukti</label>
                                            <input class="form-control" type="file" id="formFile" name="foto" />
                                            <div id="formFile" class="form-text" name="nik">
                                                Masukan Foto Anda Max 3 mb, png , jpg
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="card mb-4">
                        <h5 class="card-header">Masukan Pengaduan Anda</h5>
                        <div class="card-body">
                            <label for="defaultFormControlInput" class="form-label">Judul laporan
                            </label>
                            <input type="text" class="form-control" id="defaultFormControlInput" placeholder="judul laporan" aria-describedby="defaultFormControlHelp" name="judul" />
                            <div id="defaultFormControlHelp" class="form-text" name="nik">
                                Nik Anonim
                            </div>
                            <textarea class="form-control" aria-label="With textarea" name="lapor"></textarea><br>
                            <button class="btn btn-danger" name="submit">Kirim</button>
                        </div>
                    </div>
                </div>
            </div>
        </form>
        <!-- / Content -->
    </div>
</div>
</div>
</div>
</div>

<!-- Footer -->
<?php

require 'templates/footer.php';
