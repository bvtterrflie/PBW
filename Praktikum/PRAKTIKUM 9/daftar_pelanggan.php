<?php include 'koneksi_db.php'; ?>
<!DOCTYPE html>
<html>
<head>
    <title>Daftar Pelanggan</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<?php include 'navbar.php'; ?>

<div class="container mt-4">
    <h2>Daftar Pelanggan</h2>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nama</th>
                <th>Alamat</th>
                <th>Email</th>
                <th>Telepon</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $result = $conn->query("SELECT * FROM Pelanggan");
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
