<!DOCTYPE html>
<html>
<head>
    <title>Form Data Mahasiswa</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css" integrity="sha384-zCbKRCUGaJDkqS1kPbPd7TveP5iyJE0EjAuZQTgFLD2ylzuqKfdKlfG/eSrtxUkn" crossorigin="anonymous">
</head>
<body>
<div class="container">
    <?php
    // Include file koneksi, untuk menghubungkan ke database
    include "tes.php"; // Assuming this file contains your database connection

    // Function to sanitize input
    function input($data) {
        return htmlspecialchars(trim($data));
    }

    // Check if ID Mahasiswa is provided via GET
    if (isset($_GET['id_mahasiswa'])) {
        $id_mahasiswa = input($_GET["id_mahasiswa"]);

        // Fetch data of the specified Mahasiswa
        $sql = "SELECT * FROM mahasiswa WHERE id_mahasiswa = $id_mahasiswa";
        $hasil = mysqli_query($con, $sql);
        $data = mysqli_fetch_assoc($hasil);
    }

    // Check if form is submitted via POST
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Sanitize form inputs
        $id_mahasiswa = input($_POST["id_mahasiswa"]);
        $nama = input($_POST["nama"]);
        $nim = input($_POST["nim"]);
        $jurusan = input($_POST["jurusan"]);
        $angkatan = input($_POST["angkatan"]);

        // Update data in the 'mahasiswa' table
        $sql = "UPDATE mahasiswa 
                SET 
                    nama = '$nama',
                    nim = '$nim',
                    jurusan = '$jurusan',
                    angkatan = '$angkatan'
                WHERE id_mahasiswa = $id_mahasiswa";

        // Execute the update query
        $hasil = mysqli_query($con, $sql);

        // Check if update was successful
        if ($hasil) {
            header("Location: index.php"); // Redirect to index page after successful update
            exit(); // Stop further execution
        } else {
            echo "<div class='alert alert-danger'>Data gagal disimpan.</div>";
        }
    }
    ?>

    <h2>Update Data Mahasiswa</h2>

    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
        <div class="form-group">
            <label>ID Mahasiswa:</label>
            <input type="text" name="id_mahasiswa" class="form-control" value="<?php echo $data['id_mahasiswa']; ?>" required />
        </div>
        <div class="form-group">
            <label>Nama:</label>
            <input type="text" name="nama" class="form-control" value="<?php echo $data['nama']; ?>" required />
        </div>
        <div class="form-group">
            <label>NIM:</label>
            <input type="text" name="nim" class="form-control" value="<?php echo $data['nim']; ?>" required />
        </div>
        <div class="form-group">
            <label>Jurusan:</label>
            <input type="text" name="jurusan" class="form-control" value="<?php echo $data['jurusan']; ?>" required />
        </div>
        <div class="form-group">
            <label>Angkatan:</label>
            <input type="text" name="angkatan" class="form-control" value="<?php echo $data['angkatan']; ?>" required />
        </div>

        <button type="submit" name="submit" class="btn btn-primary">Submit</button>
    </form>
</div>
</body>
</html>
