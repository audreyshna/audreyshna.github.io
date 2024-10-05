<?php
include 'connect.php';

if (isset($_GET['npm'])) {
    $npm = $_GET['npm'];

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $nama = $_POST['nama'];
        $alamat = $_POST['alamat'];
        $tgl_lhr = $_POST['tgl_lhr'];
        $jk = $_POST['jk'];
        $email = $_POST['email'];

        $sql = "UPDATE identitas SET nama='$nama', alamat='$alamat', tgl_lhr='$tgl_lhr', jk='$jk', email='$email' WHERE npm='$npm'";

        if ($conn->query($sql) === TRUE) {
            header('Location: index.php');
        } else {
            echo "Error updating record: " . $conn->error;
        }
    }

    $sql = "SELECT * FROM identitas WHERE npm='$npm'";
    $result = $conn->query($sql);
    $row = $result->fetch_assoc();
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Update Mahasiswa</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f0f4f8;
            margin: 0;
            padding: 20px;
        }

        .container {
            max-width: 500px;
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            margin: 0 auto;
        }

        h2 {
            text-align: center;
            margin-bottom: 20px;
        }

        form {
            display: flex;
            flex-direction: column;
        }

        label {
            margin-bottom: 5px;
            font-weight: bold;
        }

        input[type="text"],
        input[type="date"],
        input[type="email"] {
            padding: 10px;
            margin-bottom: 15px;
            border: 1px solid #ccc;
            border-radius: 4px;
        }

        button {
            padding: 10px;
            background-color: #007bff;
            color: white;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }

        button:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>Update Data Mahasiswa</h2>
        <form method="POST">
            <label>Nama:</label>
            <input type="text" name="nama" value="<?php echo $row['nama']; ?>" required>

            <label>Alamat:</label>
            <input type="text" name="alamat" value="<?php echo $row['alamat']; ?>" required>

            <label>Tanggal Lahir:</label>
            <input type="date" name="tgl_lhr" value="<?php echo $row['tgl_lhr']; ?>" required>

            <label>Jenis Kelamin:</label>
            <input type="text" name="jk" value="<?php echo $row['jk']; ?>" required>

            <label>Email:</label>
            <input type="email" name="email" value="<?php echo $row['email']; ?>" required>

            <button type="submit">Update</button>
        </form>
    </div>
</body>
</html>