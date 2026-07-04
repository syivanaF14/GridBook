<?php
session_start();
if (!isset($_SESSION['login'])) {
    header("Location: login.php");
    exit;
}
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>About GridBook</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;700&display=swap" rel="stylesheet">
    <style>
        body { 
            font-family: 'Poppins', sans-serif; 
            background-color: #3498db; 
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0;
        }
        .box { 
            background: white; 
            color: #2c3e50; 
            padding: 50px; 
            border-radius: 30px; 
            max-width: 600px; 
            text-align: center;
            box-shadow: 0 20px 40px rgba(0,0,0,0.2);
        }
        h1 { margin-top: 0; color: #3498db; }
        p { line-height: 1.6; font-size: 1.1rem; }
        .creator { font-weight: bold; margin-top: 20px; color: #2c3e50; }
        .btn { 
            display: inline-block; 
            margin-top: 30px; 
            padding: 12px 30px; 
            background: #3498db; 
            color: white; 
            text-decoration: none; 
            border-radius: 10px; 
            font-weight: bold;
            transition: 0.3s;
        }
        .btn:hover { background: #2980b9; }
    </style>
</head>
<body>
    <div class="box">
        <h1>About GridBook</h1>
        <p>
            Aplikasi ini adalah Sistem Manajemen Data Buku Sederhana, 
            yang dirancang untuk menyediakan alat digital yang efisien dan terstruktur 
            bagi Administrator dalam mengelola inventaris data buku. 
            Sistem ini bertujuan untuk menggantikan pencatatan manual atau spreadsheet 
            dengan database terpusat.
        </p>
        <p class="creator">Created by: Syivana Nasywa Fadillah</p>
        <p class="creator">Nim 2350081005</p>
        <p class="creator">Kelas DSE-A</p>
        

        <a href="dashboard.php" class="btn">Back to Dashboard</a>
    </div>
</body>
</html>