<!DOCTYPE html>
<html>
<head>
    <title>Perhitungan Total Pembelian (Dengan Array)</title>
    <style>
        .box {
            border: 1px solid black;
            padding: 15px;
            width: fit-content;
            font-family: Arial, sans-serif;
        }
        h2 {
            margin: 0;
        }
    </style>
</head>
<body>

<?php
// Data barang menggunakan array
$barang = [
    "nama" => "Keyboard",
    "harga" => 150000
];

// Jumlah beli disimpan dalam variabel
$jumlah_beli = 2;

// Pajak sebagai konstanta (10%)
define("PAJAK", 0.10);

// Perhitungan
$total_sebelum_pajak = $barang["harga"] * $jumlah_beli;
$jumlah_pajak = $total_sebelum_pajak * PAJAK;
$total_bayar = $total_sebelum_pajak + $jumlah_pajak;
?>

<div class="box">
    <h2><b>Perhitungan Total Pembelian (Dengan Array)</b></h2>
    <hr>
    <p>Nama Barang: <?= $barang["nama"] ?></p>
    <p>Harga Satuan: Rp <?= number_format($barang["harga"], 0, ',', '.') ?></p>
    <p>Jumlah Beli: <?= $jumlah_beli ?></p>
    <p>Total Harga (Sebelum Pajak): Rp <?= number_format($total_sebelum_pajak, 0, ',', '.') ?></p>
    <p>Pajak (10%): Rp <?= number_format($jumlah_pajak, 0, ',', '.') ?></p>
    <p><b>Total Bayar: Rp <?= number_format($total_bayar, 0, ',', '.') ?></b></p>
</div>

</body>
</html>