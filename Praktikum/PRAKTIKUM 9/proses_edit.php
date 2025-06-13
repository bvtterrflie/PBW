<?php
include 'koneksi_db.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id     = $_POST['id'];
    $judul  = $_POST['judul'];
    $penulis = $_POST['penulis'];
    $tahun  = $_POST['tahun_terbit'];
    $harga  = $_POST['harga'];
    $stok   = $_POST['stok'];

    $query = "UPDATE buku SET 
                Judul = '$judul',
                Penulis = '$penulis',
                Tahun_Terbit = '$tahun',
                Harga = '$harga',
                stok = '$stok'
                WHERE ID = $id";

    if (mysqli_query($conn, $query)) {
        header("Location: index.php");
        exit;
    } else {
        echo "Gagal mengedit buku: " . mysqli_error($conn);
    }
}
?>
