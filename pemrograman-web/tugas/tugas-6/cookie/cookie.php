<?php
session_start();

if(!isset($_COOKIE['nama_user'])) {
    setcookie('nama_user', 'Audrey Shaina', time() + (86400 * 30), "/'");
}
?>

<!DOCTYPE html>
<html lang= "en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Halaman Web dengan Cookies</title>
    <style>
        /* Styling untuk halaman web */
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f9;
            margin: 0;
            padding: 0;
        }

        .container {
            max-width: 800px;
            margin: 50px auto;
            padding: 20px;
            background-color: #fff;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            border-radius: 10px;
            text-align: center;
        }

        h1 {
            color: #333;
            text-align: center;
        }

        p {
            color: #555;
            font-size: 1.2em;
            text-align: center;
        }

        .cookie-message {
            padding: 20px;
            margin-top: 20px;
            text-align: center;
            background-color: #eafaf1;
            border: 1px solid #b7dfc1;
            border-radius: 5px;
            font-weight: bold;
        }

        .footer {
            margin-top: 30px;
            text-align: center;
            color: #aaa;
            font-size: 0.9em;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Selamat Datang di Halaman Web Cookies</h1>
        <?php
        echo "Cookie ".$_COOKIE['nama_user'] . " telah diatur!";
        ?>
        <div class="cookie-message">
            <?php
            if (isset($_COOKIE['nama_user'])) {
                echo "Halo, " .$_COOKIE['nama_user'] . "! Selamat datang kembali!";
            }
            else {
                echo "Halo, pengunjung baru! Cookie telah dibuat untuk Anda.";
            }
            ?>
        </div>
    </div>
    <div class="footer">
            <p>&copy; 2024 Halaman Web Cookies Audrey - 140810230026</p>
    </div>
</body>
</html>