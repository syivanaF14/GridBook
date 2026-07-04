<?php
include 'koneksi.php';

// Ambil ID dari URL
$id = isset($_GET['id']) ? (int)$_GET['id'] : 0;

if ($id === 0) {
    die("ID buku tidak valid.");
}

// 1. Ambil data lama
$sql_show = "SELECT * FROM buku WHERE id=$id";
$result_show = $koneksi->query($sql_show);

if ($result_show->num_rows === 0) {
    die("Data buku tidak ditemukan.");
}

$data = $result_show->fetch_assoc();

// 2. Logika menyimpan perubahan (Update)
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $judul = $koneksi->real_escape_string($_POST['judul']);
    $penulis = $koneksi->real_escape_string($_POST['penulis']);
    $tahun = $koneksi->real_escape_string($_POST['tahun_terbit']);

    $sql_update = "UPDATE buku SET judul='$judul', penulis='$penulis', tahun_terbit='$tahun' WHERE id=$id";

    if ($koneksi->query($sql_update) === TRUE) {
        header("Location: index.php");
        exit();
    } else {
        echo "<p style='color:red;'>Error updating record: " . $koneksi->error . "</p>";
    }
}
$koneksi->close();
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Edit Buku (CRUD: UPDATE)</title>
    <link rel="stylesheet" href="style.css"> 
</head>
<body>
    <div class="container">
        <h2>✏️ Edit Buku: <?php echo htmlspecialchars($data['judul']); ?></h2>
        <div class="form-container">
            <form method="POST" action="">
                <div class="form-group">
                    <label for="judul">Judul:</label>
                    <input type="text" id="judul" name="judul" class="form-control" value="<?php echo htmlspecialchars($data['judul']); ?>" required>
                </div>
                
                <div class="form-group">
                    <label for="penulis">Penulis:</label>
                    <input type="text" id="penulis" name="penulis" class="form-control" value="<?php echo htmlspecialchars($data['penulis']); ?>" required>
                </div>
                
                <div class="form-group">
                    <label for="tahun_terbit">Tahun Terbit:</label>
                    <input type="number" id="tahun_terbit" name="tahun_terbit" class="form-control" value="<?php echo $data['tahun_terbit']; ?>" required min="1000" max="9999">
                </div>
                
                <button type="submit" class="btn btn-edit">Update Data</button>
                <a href="index.php" class="btn btn-back">Batal</a>
            </form>
        </div>
    </div>
</body>
</html>