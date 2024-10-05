<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tugas Implementasi CRUD - 140810230026</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        .container {
            width: 80%;
            background-color: white;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        table, th, td {
            border: 1px solid #ddd;
        }

        th, td {
            padding: 10px;
            text-align: left;
        }

        th {
            background-color: #f2f2f2;
            text-align: center;
        }

        form {
            margin-bottom: 20px;
        }

        input[type="text"], input[type="date"], input[type="email"] {
            width: calc(100% - 20px);
            padding: 10px;
            margin: 5px 0;
            box-sizing: border-box;
            border: 1px solid #ddd;
            border-radius: 4px;
        }

        button.btn {
            padding: 10px 15px;
            background-color: #5cb85c;
            color: white;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            margin-top: 10px;
        }

        button.btn:hover {
            background-color: #4cae4c;
        }

    </style>
</head>
<body>
    <div class="container">
        <h2>Data Mahasiswa</h2>

        <form action="insertData.php" method="POST">
            <input type="text" name="npm" placeholder="NPM" required>
            <input type="text" name="nama" placeholder="Nama" required>
            <input type="text" name="alamat" placeholder="Alamat" required>
            <input type="text" name="tgl_lhr" id="tgl_lhr" placeholder="Tanggal Lahir (YYYY-MM-DD)" required>
            <input type="text" name="jk" placeholder="Jenis Kelamin (L/P)" required>
            <input type="email" name="email" placeholder="Email" required>
            <button type="submit" class="btn">Insert</button>
        </form>

        <table>
            <thead>
                <tr>
                    <th>NPM</th>
                    <th>Nama</th>
                    <th>Alamat</th>
                    <th>Tanggal Lahir</th>
                    <th>Jenis Kelamin</th>
                    <th>Email</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php
                include 'displayData.php';
                ?>
            </tbody>
        </table>
    </div>

    <script>
        const dateInput = document.getElementById('tgl_lhr');

        dateInput.addEventListener('focus', function() {
            this.type = 'date';
        });

        // When it loses focus and is empty, set type back to text to show the placeholder again
        dateInput.addEventListener('blur', function() {
            if (this.value === '') {
                this.type = 'text';
            }
        });
    </script>
</body>
</html>
