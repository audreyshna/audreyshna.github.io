<?php
session_start();
include 'koneksi.php';

if (!isset($_SESSION['level'])) {
    header("Location: index.php"); // Redirect jika belum login
    exit();
}

// Cek apakah NPM diberikan
if (isset($_GET['npm'])) {
    $npm = $_GET['npm'];

    // Ambil data identitas berdasarkan NPM
    $stmt = $conn->prepare("SELECT * FROM identitas WHERE npm = ?");
    $stmt->bind_param("s", $npm);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        // Assign data ke variabel
        $nama = $row['nama'];
        $alamat = $row['alamat'];
        $jk = isset($row['jk']) ? $row['jk'] : '';
        $tgl_lhr = $row['tgl_lhr'];
        $email = $row['email'];
    } else {
        echo "Data tidak ditemukan.";
        exit();
    }
    $stmt->close();
} else {
    echo "NPM tidak diberikan.";
    exit();
}

// Proses data saat form disubmit
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $npm = $_POST['npm'];
    if (empty($npm)) {
        echo "NPM tidak diberikan.";
        exit();
    }
    
    // Ambil data dari form
    $nama = htmlspecialchars($_POST['nama'], ENT_QUOTES, 'UTF-8');
    $alamat = htmlspecialchars($_POST['alamat'], ENT_QUOTES, 'UTF-8');
    $jk = $_POST['jk'];
    $tgl_lhr = $_POST['tgl_lhr'];
    $email = htmlspecialchars($_POST['email'], ENT_QUOTES, 'UTF-8');

    // Lakukan update
    $stmt = $conn->prepare("UPDATE identitas SET nama=?, alamat=?, jk=?, tgl_lhr=?, email=? WHERE npm=?");
    $stmt->bind_param("ssssss", $nama, $alamat, $jk, $tgl_lhr, $email, $npm);
    $stmt->execute();

    if ($stmt->affected_rows > 0) {
        echo "Data berhasil diupdate.";
    } else {
        echo "Tidak ada perubahan data.";
    }

    $stmt->close();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Update Data</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <h2>Update Data Identitas</h2>
    <form method="post" action="update.php">
    <input type="hidden" name="npm" value="<?php echo htmlspecialchars($npm); ?>">
    <div>
        <label>Nama:</label>
        <input type="text" name="nama" value="<?php echo htmlspecialchars($nama); ?>" required>
    </div>
    <div>
        <label>Alamat:</label>
        <input type="text" name="alamat" value="<?php echo htmlspecialchars($alamat); ?>" required>
    </div>
    <div>
        <label>Jenis Kelamin:</label>
        <select name="jk" required>
            <option value="L" <?php if ($jk == 'L') echo 'selected'; ?>>Laki-laki</option>
            <option value="P" <?php if ($jk == 'P') echo 'selected'; ?>>Perempuan</option>
        </select>
    </div>
    <div>
        <label>Tanggal Lahir:</label>
        <input type="date" name="tgl_lhr" value="<?php echo $tgl_lhr; ?>" required>
    </div>
    <div>
        <label>Email:</label>
        <input type="email" name="email" value="<?php echo htmlspecialchars($email); ?>" required>
    </div>
    <button type="submit">Update</button>
</form>

</body>
</html>
