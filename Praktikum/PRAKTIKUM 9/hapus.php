<?php
include 'koneksi_db.php';

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    // Hapus data berdasarkan ID
    $query = "DELETE FROM buku WHERE ID = $id";
    if (mysqli_query($conn, $query)) {
        header("Location: index.php?pesan=hapus_sukses");
    } else {
        echo "Gagal menghapus data: " . mysqli_error($conn);
    }
} else {
    echo "ID tidak ditemukan.";
}
?>