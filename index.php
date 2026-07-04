<?php
session_start();
if (!isset($_SESSION['login'])) {
    header("Location: login.php");
    exit;
}
include 'koneksi.php'; 
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Daftar Buku (CRUD: READ)</title>
    <link rel="stylesheet" href="style.css"> 
</head>
<body>
    <div class="container">
        <h1>📚 Manajemen Data Buku</h1>
        <p><a href="tambah.php" class="btn btn-primary">➕ Tambah Buku Baru</a></p>
        
        <table class="data-table">
            <thead>
                <tr>
                    <th width="5%">No</th>
                    <th width="40%">Judul</th>
                    <th width="25%">Penulis</th>
                    <th width="15%">Tahun Terbit</th>
                    <th width="15%">Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $sql = "SELECT * FROM buku ORDER BY id DESC";
                $result = $koneksi->query($sql);

                if ($result->num_rows > 0) {
                    $no = 1;
                    while($row = $result->fetch_assoc()) {
                        echo "<tr>";
                        echo "<td>" . $no++ . "</td>";
                        echo "<td>" . htmlspecialchars($row['judul']) . "</td>";
                        echo "<td>" . htmlspecialchars($row['penulis']) . "</td>";
                        echo "<td>" . $row['tahun_terbit'] . "</td>";
                        echo "<td>";
                        echo "<a href='edit.php?id=" . $row['id'] . "' class='btn btn-edit'>Edit</a>";
                        echo "<a href='hapus.php?id=" . $row['id'] . "' class='btn btn-delete' onclick=\"return confirm('Yakin ingin menghapus?')\">Hapus</a>";
                        echo "</td>";
                        echo "</tr>";
                    }
                } else {
                    echo "<tr><td colspan='5'>Tidak ada data buku yang tersedia.</td></tr>";
                }
                $koneksi->close();
                ?>
            </tbody>
        </table>

        <div style="text-align: right; margin-top: 20px;">
            <a href="logout.php" class="btn btn-delete">Logout</a>
        </div>
    </div>

    <a href="dashboard.php" style="
        position: fixed; 
        bottom: 30px; 
        left: 30px; 
        background-color: #3498db; 
        color: white; 
        padding: 12px 25px; 
        text-decoration: none; 
        border-radius: 10px; 
        font-family: 'Segoe UI', sans-serif;
        font-weight: bold;
        box-shadow: 0 4px 6px rgba(0,0,0,0.1);
        transition: 0.3s;
        z-index: 1000;
    ">⬅ Back to Dashboard</a>

</body>
</html>