<?php
include 'connect.php';

mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $npm = $_POST['npm'];
    $nama = $_POST['nama'];
    $alamat = $_POST['alamat'];
    $tgl_lhr = $_POST['tgl_lhr'];
    $jk = $_POST['jk'];
    $email = $_POST['email'];

    
    if (!empty($npm) && !empty($nama) && !empty($alamat) && !empty($tgl_lhr) && !empty($jk) && !empty($email)) {
        $stmt = $conn->prepare("INSERT INTO identitas (npm, nama, alamat, tgl_lhr, jk, email) VALUES (?, ?, ?, ?, ?, ?)");
        $stmt->bind_param("ssssss", $npm, $nama, $alamat, $tgl_lhr, $jk, $email);

        if ($stmt->execute()) {
            echo "Data berhasil ditambahkan!";
            header('Location: index.php');
            exit();
        }
        else {
            echo "Error: " . $stmt->error; 
        }
        $stmt->close();
    }
    else {
        echo "Semua field harus diisi!";
    }
}

$conn->close();
?>
    