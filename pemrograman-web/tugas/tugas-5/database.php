<?php
include 'connect.php';

$sql = "CREATE DATABASE mhs";
if($conn->query($sql) === TRUE){
    echo "Database berhasil dibuat atau sudah ada";
} else{
    echo "Error membuat database:" . $conn->error;
}
$conn->select_db("mhs");

$sql = "CREATE TABLE IF NOT EXISTS identitas (
    npm VARCHAR(12) PRIMARY KEY,
    nama VARCHAR(40),
    alamat VARCHAR(100),
    tgl_lhr DATE,
    jk CHAR(1),
    email VARCHAR(50)
)";

if ($conn->query($sql) === TRUE) {
    echo "Tabel 'identitas' berhasil dibuat atau sudah ada.<br>";
} else {
    echo "Error membuat tabel: " . $conn->error;
}

$conn->close();
?>