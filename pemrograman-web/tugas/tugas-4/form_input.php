<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form Input Data</title>
    <link rel = "stylesheet" type="text/css" href = "form.css">
</head>
<body>
    <?php
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            // Proses input form
            $npm = $_POST['npm'];
            $nama = strtoupper($_POST['nama']);
            $alamat = strtoupper($_POST['alamat']);
            $tempat_lahir = $_POST['tempat_lahir'];
            $tanggal_lahir = $_POST['tanggal_lahir'];
            $jenis_kelamin = $_POST['jenis_kelamin'];
            $hobi = $_POST['hobi'];

            // Menampilkan hasil input dalam tabel
            echo "<div class='result-container'>";
            echo "<h1>Hasil Input Data</h1>";
            echo "<table>";
            echo "<tr><th>NPM</th><td>$npm</td></tr>";
            echo "<tr><th>Nama</th><td>$nama</td></tr>";
            echo "<tr><th>Alamat</th><td>$alamat</td></tr>";
            echo "<tr><th>Tempat Lahir</th><td>$tempat_lahir</td></tr>";
            echo "<tr><th>Tanggal Lahir</th><td>$tanggal_lahir</td></tr>";
            echo "<tr><th>Jenis Kelamin</th><td>$jenis_kelamin</td></tr>";
            echo "<tr><th>Hobi</th><td>$hobi</td></tr>";
            echo "</table>";
            echo "<a href='form_input.php'>Kembali ke Form</a>";
            echo "</div>";
        }
        else {
    ?>
        <div class = "container">
            <h1>Input Data Mahasiswa</h1>
            <form action="" method="POST">
                <label for="npm">NPM</label><br>
                <input type="text" id="npm" name="npm" required><br><br>

                <label for="nama">Nama</label><br>
                <input type="text" id="nama" name="nama" required><br><br>

                <label for="alamat">Alamat</label><br>
                <textarea id="alamat" name="alamat" required></textarea><br><br>

                <label for="tempat_lahir">Tempat Lahir</label><br>
                <input type="text" id="tempat_lahir" name="tempat_lahir" required><br><br>

                <label for="tanggal_lahir">Tanggal Lahir</label><br>
                <input type="date" id="tanggal_lahir" name="tanggal_lahir" required><br><br>

                <label for="jenis_kelamin">Jenis Kelamin</label><br>
                <input type="radio" id="laki_laki" name="jenis_kelamin" value="Laki-laki" required>
                <label for="laki_laki">Laki-laki</label><br>
                <input type="radio" id="perempuan" name="jenis_kelamin" value="Perempuan" required>
                <label for="perempuan">Perempuan</label><br><br>

                <label for="hobi">Hobi</label><br>
                <input type="text" id="hobi" name="hobi"><br><br>

                <input type="submit" value="Submit">
            </form>
    <?php
        }
    ?>
</body>
</html>
