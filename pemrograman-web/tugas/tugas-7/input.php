<?php
session_start();
include 'koneksi.php';

if (!isset($_SESSION['level'])) {
    header("Location: index.php"); // Redirect jika belum login
    exit();
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $npm = htmlspecialchars($_POST['npm'], ENT_QUOTES, 'UTF-8');
    $nama = htmlspecialchars($_POST['nama'], ENT_QUOTES, 'UTF-8');
    $alamat = htmlspecialchars($_POST['alamat'], ENT_QUOTES, 'UTF-8');
    $jk = $_POST['jk'];
    $tgl_lhr = $_POST['tgl_lhr'];
    $email = htmlspecialchars($_POST['email'], ENT_QUOTES, 'UTF-8');

    $stmt = $conn->prepare("INSERT INTO identitas (npm, nama, alamat, jk, tgl_lhr, email) VALUES (?, ?, ?, ?, ?, ?)");
    $stmt->bind_param("ssssss", $npm, $nama, $alamat, $jk, $tgl_lhr, $email);

    if ($stmt->execute()) {
        header("Location: tampil_data.php"); // Redirect ke tampil_data.php setelah sukses
        exit();
    } else {
        echo "Error: " . $stmt->error;
    }

    $stmt->close();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Update Data</title>
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
            <select name="jk">
                <option value="L" <?php if ($jk == 'L') echo 'selected'; ?>>Laki-laki</option>
                <option value="P" <?php if ($jk == 'P') echo 'selected'; ?>>Perempuan</option>
            </select>
        </div>
        <div>
            <label>Tanggal Lahir:</label>
            <input type="date" name="tgl_lhr" value="<?php echo htmlspecialchars($tgl_lhr); ?>" required>
        </div>
        <div>
            <label>Email:</label>
            <input type="email" name="email" value="<?php echo htmlspecialchars($email); ?>" required>
        </div>
        <button type="submit">Update</button>
    </form>
</body>
</html>