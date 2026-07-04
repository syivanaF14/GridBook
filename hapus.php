<?php
include 'koneksi.php';

// Ambil ID dari URL dan pastikan aman
$id = isset($_GET['id']) ? (int)$_GET['id'] : 0; 

if ($id > 0) {
    // Query DELETE
    $sql = "DELETE FROM buku WHERE id=$id";

    if ($koneksi->query($sql) === TRUE) {
        // Berhasil, redirect
        header("Location: index.php"); 
        exit();
    } else {
        // Gagal
        echo "Error deleting record: " . $koneksi->error;
    }
} else {
    // Jika ID tidak valid, redirect saja ke halaman utama
    header("Location: index.php"); 
}

$koneksi->close();
?>