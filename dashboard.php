<?php
session_start();
if (!isset($_SESSION['login'])) {
    header("Location: login.php");
    exit;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>GridBook Dashboard</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@700;800&display=swap" rel="stylesheet">
    <style>
        body { 
            margin: 0; 
            padding: 0; 
            font-family: 'Poppins', sans-serif; 
            background-color: #3498db; 
            min-height: 100vh;
            display: flex;
            flex-direction: column;
            align-items: center;
        }
        .header {
            padding: 60px 20px;
            color: white;
            text-align: center;
        }
        .header h1 { 
            font-size: 4rem; 
            margin: 0; 
            line-height: 1.1;
        }
        .menu-container {
            display: flex;
            gap: 40px;
            padding: 20px;
            justify-content: center;
            flex-wrap: wrap;
        }
        .card {
            background: white;
            padding: 40px;
            border-radius: 25px;
            text-align: center;
            text-decoration: none;
            color: #2c3e50;
            width: 200px;
            box-shadow: 0 15px 35px rgba(0,0,0,0.2);
            transition: all 0.4s ease;
        }
        .card:hover {
            transform: translateY(-10px);
            box-shadow: 0 25px 50px rgba(0,0,0,0.3);
        }
        .card h2 { font-size: 3rem; margin-bottom: 10px; }
        .card p { font-weight: 800; font-size: 1.2rem; margin: 0; }
    </style>
</head>
<body>

    <div class="header">
        <h1>Selamat Datang <br>GridBook</h1>
    </div>

    <div class="menu-container">
        <a href="index.php" class="card">
            <h2>📚</h2>
            <p>Book<br>Management</p>
        </a>

        <a href="about.php" class="card">
            <h2>ℹ️</h2>
            <p>About<br>Application</p>
        </a>

        <a href="logout.php" class="card" style="color: #e74c3c;">
            <h2>🚪</h2>
            <p>System<br>Logout</p>
        </a>
    </div>

</body>
</html>