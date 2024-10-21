<?php
session_start();
include 'koneksi.php';

if (!isset($_SESSION['level'])) {
    header("Location: index.php"); // Redirect jika belum login
    exit();
}

if (isset($_GET['npm'])) {
    $npm = $_GET['npm'];
    
    $stmt = $conn->prepare("DELETE FROM identitas WHERE npm=?");
    $stmt->bind_param("s", $npm);
    $stmt->execute();

    if ($stmt->affected_rows > 0) {
        header("Location: tampil_data.php"); // Redirect ke tampil_data.php setelah sukses
        exit();
    } else {
        echo "Error: Tidak dapat menghapus data.";
    }

    $stmt->close();
}
?>
