<?php
include 'koneksi.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Proses input data
    $judul = $koneksi->real_escape_string($_POST['judul']); // Sanitasi input
    $penulis = $koneksi->real_escape_string($_POST['penulis']);
    $tahun = $koneksi->real_escape_string($_POST['tahun_terbit']);

    $sql = "INSERT INTO buku (judul, penulis, tahun_terbit) VALUES ('$judul', '$penulis', '$tahun')";

    if ($koneksi->query($sql) === TRUE) {
        header("Location: index.php"); 
        exit();
    } else {
        echo "<p style='color:red;'>Error: " . $sql . "<br>" . $koneksi->error . "</p>";
    }
}
$koneksi->close();
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Tambah Buku Baru (CRUD: CREATE)</title>
    <link rel="stylesheet" href="style.css"> 
</head>
<body>
    <div class="container">
        <h2>➕ Tambah Buku Baru</h2>
        <div class="form-container">
            <form method="POST" action="">
                <div class="form-group">
                    <label for="judul">Judul:</label>
                    <input type="text" id="judul" name="judul" class="form-control" required>
                </div>
                
                <div class="form-group">
                    <label for="penulis">Penulis:</label>
                    <input type="text" id="penulis" name="penulis" class="form-control" required>
                </div>
                
                <div class="form-group">
                    <label for="tahun_terbit">Tahun Terbit:</label>
                    <input type="number" id="tahun_terbit" name="tahun_terbit" class="form-control" required min="1000" max="9999">
                </div>
                
                <button type="submit" class="btn btn-primary">Simpan Data</button>
                <a href="index.php" class="btn btn-back">Batal</a>
            </form>
        </div>
    </div>
</body>
</html>