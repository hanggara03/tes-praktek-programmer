<!DOCTYPE html>
<html>
<head>
    <title>Form Data Mahasiswa</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css" integrity="sha384-zCbKRCUGaJDkqS1kPbPd7TveP5iyJE0EjAuZQTgFLD2ylzuqKfdKlfG/eSrtxUkn" crossorigin="anonymous">
</head>
<body>
<div class="container">
    <?php
    //Include file koneksi, untuk koneksikan ke database
    include "tes.php";

    //Fungsi untuk mencegah inputan karakter yang tidak sesuai
    function input($data) {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }
    //Cek apakah ada kiriman form dari method post
    if ($_SERVER["REQUEST_METHOD"] == "POST") {

        $id_mahasiswa=input($_POST["id_mahasiswa"]);
        $nama=input($_POST["nama"]);
        $nim=input($_POST["nim"]);
        $jurusan=input($_POST["jurusan"]);
        $angkatan=input($_POST["angkatan"]);

        //Query input menginput data kedalam tabel anggota
        $sql="insert into mahasiswa (id_mahasiswa,nama,nim,jurusan,angkatan) values
		('$id_mahasiswa','$nama','$nim','$jurusan','$angkatan')";

        //Mengeksekusi/menjalankan query diatas
        $hasil=mysqli_query($con,$sql);

        //Kondisi apakah berhasil atau tidak dalam mengeksekusi query diatas
        if ($hasil) {
            header("Location:index.php");
        }
        else {
            echo "<div class='alert alert-danger'> Data Gagal disimpan.</div>";

        }

    }
    ?>
    <h2>Input Data</h2>


    <form action="<?php echo $_SERVER["PHP_SELF"];?>" method="post">
        <div class="form-group">
            <label>ID Mahasiswa:</label>
            <input type="text" name="id_mahasiswa" class="form-control" placeholder="Masukan ID Mahasiswa" required />

        </div>
        <div class="form-group">
            <label>Nama:</label>
            <input type="text" name="nama" class="form-control" placeholder="Masukan Nama Mahasiswa" required/>
        </div>
       <div class="form-group">
            <label>NIM:</label>
            <input type="text" name="nim" class="form-control" placeholder="Masukan NIM Mahasiswa" required/>
        </div>
                </p>
        <div class="form-group">
            <label>Jurusan:</label>
            <input type="text" name="jurusan" class="form-control" placeholder="Masukan Jurusan" required/>
        </div>
        <div class="form-group">
            <label>Angkatan:</label>
            <input type="text" name="angkatan" class="form-control" placeholder="Masukan Angkatan" required/>
        </div>   

        <button type="submit" name="submit" class="btn btn-primary">Submit</button>
    </form>
</div>
</body>
</html>