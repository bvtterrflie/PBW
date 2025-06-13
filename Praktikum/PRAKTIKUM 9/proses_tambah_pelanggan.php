<?php
include 'koneksi_db.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nama = $_POST['nama'];
    $alamat = $_POST['alamat'];
    $email = $_POST['email'];
    $telepon = $_POST['telepon'];

    $sql = "INSERT INTO pelanggan (Nama, Alamat, Email, Telepon)
            VALUES ('$nama', '$alamat', '$email', '$telepon')";

    if ($conn->query($sql) === TRUE) {
        echo "<script>alert('Pelanggan berhasil ditambahkan!'); window.location.href='pelanggan.php';</script>";
    } else {
        echo "Gagal: " . $conn->error;
    }
}
?>