<?php include 'koneksi_db.php'; ?>
<!DOCTYPE html>
<html>
<head>
    <title>Daftar Pelanggan</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container mt-4">
    <h2>Daftar Pelanggan</h2>
    <a href="tambah_pelanggan.php" class="btn btn-primary mb-3">+ Tambah Pelanggan</a>
    <a href="index.php" class="btn btn-secondary mb-3">Kembali ke Buku</a>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>ID</th><th>Nama</th><th>Alamat</th><th>Email</th><th>Telepon</th>
            </tr>
        </thead>
        <tbody>
        <?php
        $result = $conn->query("SELECT * FROM pelanggan");
        while ($row = $result->fetch_assoc()) {
            echo "<tr>
                <td>{$row['ID']}</td>
                <td>{$row['Nama']}</td>
                <td>{$row['Alamat']}</td>
                <td>{$row['Email']}</td>
                <td>{$row['Telepon']}</td>
            </tr>";
        }
        ?>
        </tbody>
    </table>
</div>
</body>
</html>