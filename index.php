<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css" integrity="sha384-zCbKRCUGaJDkqS1kPbPd7TveP5iyJE0EjAuZQTgFLD2ylzuqKfdKlfG/eSrtxUkn" crossorigin="anonymous">
</head>
<title>
    Daftar data</title>
<body>
    <nav class="navbar navbar-dark bg-dark">
            <span class="navbar-brand mb-0 h1">Tes Praktik Programmer</span>
        </div>
    </nav>
<div class="container">
    <br>
    <h4><center>DAFTAR DATA MAHASISWA</center></h4>
<?php

    include "tes.php";

    //Cek apakah ada kiriman form dari method post
    if (isset($_GET['id_mahasiswa'])) {
        $id_mahasiswa=htmlspecialchars($_GET["id_mahasiswa"]);

        $sql="delete from mahasiswa where id_mahasiswa='$id_mahasiswa' ";
        $hasil=mysqli_query($con,$sql);

        //Kondisi apakah berhasil atau tidak
            if ($hasil) {
                header("Location:index.php");

            }
            else {
                echo "<div class='alert alert-danger'> Data Gagal dihapus.</div>";

            }
        }
?>


     <tr class="table-danger">
            <br>
        <thead>
        <tr>
       <table class="my-3 table table-bordered">
            <tr class="table-primary">           
            <th>No</th>
            <th>Id Mahasiswa</th>
            <th>Nama</th>
            <th>nim</th>
            <th>Jurusan</th>
            <th>angkatan</th>
            <th colspan='2'>Aksi</th>

        </tr>
        </thead>

        <?php
        include "tes.php";
        $sql="select * from mahasiswa order by id_mahasiswa desc";

        $hasil=mysqli_query($con,$sql);
        $no=0;
        while ($data = mysqli_fetch_array($hasil)) {
            $no++;

            ?>
            <tbody>
            <tr>
                <td><?php echo $no;?></td>
                <td><?php echo $data["id_mahasiswa"]; ?></td>
                <td><?php echo $data["nama"];   ?></td>
                <td><?php echo $data["nim"];   ?></td>
                <td><?php echo $data["jurusan"];   ?></td>
                <td><?php echo $data["angkatan"];   ?></td>
                <td>
                    <a href="update.php?id_mahasiswa=<?php echo htmlspecialchars($data['id_mahasiswa']); ?>" class="btn btn-warning" role="button">Update</a>
                    <a href="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>?id_mahasiswa=<?php echo $data['id_mahasiswa']; ?>" class="btn btn-danger" role="button">Delete</a>
                </td>
            </tr>
            </tbody>
            <?php
        }
        ?>
    </table>
    <a href="create.php" class="btn btn-primary" role="button">Tambah Data</a>
</div>
</body>
</html>
