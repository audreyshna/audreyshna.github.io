<?php
session_start();
include('koneksi.php');

if ($_SESSION['level'] != "2") {
    header('Location: index.php');
    exit;
}

if (isset($_GET['npm'])) {
    $npm = $_GET['npm'];
    $result = mysqli_query($conn, "SELECT * FROM identitas WHERE npm = '$npm'");
    $user = mysqli_fetch_assoc($result);

    if (!$user) {
        echo "User tidak ditemukan!";
        exit;
    }
} else {
    echo "NPM salah!";
    exit;
}

if (isset($_POST['update']) && $_SESSION['level'] == '2') {
    $npm = $_POST['npm'];
    $nama = $_POST['nama'];
    $alamat = $_POST['alamat'];
    $jk = $_POST['jk'];
    $tgl_lhr = $_POST['tgl_lhr'];
    $email = $_POST['email'];

    $updateQuery = "UPDATE identitas SET nama = '$nama', alamat = '$alamat', jk = '$jk', tgl_lhr = '$tgl_lhr', email = '$email' WHERE npm = '$npm'";
    mysqli_query($conn, $updateQuery);
    header('Location: tampil_data.php');
    exit;
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Edit Data Mahasiswa</title>
    <link rel="stylesheet" href="vendor/bootstrap/css/bootstrap.min.css">
</head>
<body>
<div class="container">
    <h2>Edit Data Mahasiswa</h2>
    <form action="edit.php?npm=<?= $npm ?>" method="post">
        <div class="form-group">
            <label>NPM:</label>
            <input type="text" name="npm" class="form-control" value="<?= $user['npm'] ?>" readonly>
        </div>
        <div class="form-group">
            <label>Nama:</label>
            <input type="text" name="nama" class="form-control" value="<?= $user['nama'] ?>">
        </div>
        <div class="form-group">
            <label>Alamat:</label>
            <textarea name="alamat" class="form-control"><?= $user['alamat'] ?></textarea>
        </div>
        <div class="form-group">
            <label>Jenis Kelamin:</label>
            <select name="jk" class="form-control">
                <option value="L" <?= $user['jk'] == 'L' ? 'selected' : '' ?>>Laki-laki</option>
                <option value="P" <?= $user['jk'] == 'P' ? 'selected' : '' ?>>Perempuan</option>
            </select>
        </div>
        <div class="form-group">
            <label>Tanggal Lahir:</label>
            <input type="date" name="tgl_lhr" class="form-control" value="<?= $user['tgl_lhr'] ?>">
        </div>
        <div class="form-group">
            <label>Email:</label>
            <input type="email" name="email" class="form-control" value="<?= $user['email'] ?>">
        </div>
        <button type="submit" name="update" class="btn btn-primary">Update</button>
    </form>
</div>
</body>
</html>
