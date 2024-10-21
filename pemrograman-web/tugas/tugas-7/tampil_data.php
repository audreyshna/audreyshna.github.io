<?php
session_start();
include 'koneksi.php';

if (!isset($_SESSION['level'])) {
    header("Location: index.php"); // Redirect jika belum login
    exit();
}

// Ambil data dari database
$query = "SELECT * FROM identitas";
$result = $conn->query($query);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Tampil Data Identitas</title>
    <link rel="stylesheet" href="style.css"> <!-- Tambahkan link ke CSS -->
</head>
<body>
    <div class="container">
        <h2>Data Identitas</h2>
        <?php
        if ($result->num_rows > 0) {
            echo "<table>
                    <tr>
                        <th>NPM</th>
                        <th>Nama</th>
                        <th>Alamat</th>
                        <th>JK</th>
                        <th>Tanggal Lahir</th>
                        <th>Email</th>
                        <th>Actions</th>
                    </tr>";
            while ($row = $result->fetch_assoc()) {
                echo "<tr>
                        <td>{$row['npm']}</td>
                        <td>{$row['nama']}</td>
                        <td>{$row['alamat']}</td>
                        <td>{$row['jk']}</td>
                        <td>{$row['tgl_lhr']}</td>
                        <td>{$row['email']}</td>
                        <td>
                            <a href='update.php?npm={$row['npm']}'>Update</a> | 
                            <a href='hapus.php?npm={$row['npm']}'>Delete</a>
                        </td>
                      </tr>";
            }
            echo "</table>";
        } else {
            echo "<p>Tidak ada data.</p>";
        }
        ?>
    </div>
</body>
</html>
