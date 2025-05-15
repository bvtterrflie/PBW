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
        input[type="number"] {
            width: 60px;
            padding: 5px;
        }
        button {
            padding: 5px 10px;
            margin-top: 10px;
        }
    </style>
</head>
<body>

<?php
// Data barang
$barang = [
    "nama" => "Keyboard",
    "harga" => 150000
];

// Pajak
define("PAJAK", 0.10);

// Default nilai
$jumlah_beli = 0;
$total_sebelum_pajak = 0;
$jumlah_pajak = 0;
$total_bayar = 0;

// Jika form disubmit
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $jumlah_beli = (int)$_POST["jumlah_beli"];
    $total_sebelum_pajak = $barang["harga"] * $jumlah_beli;
    $jumlah_pajak = $total_sebelum_pajak * PAJAK;
    $total_bayar = $total_sebelum_pajak + $jumlah_pajak;
}
?>

<div class="box">
    <h2><b>Perhitungan Total Pembelian (Dengan Array)</b></h2>
    <hr>
    <p>Nama Barang: <?= $barang["nama"] ?></p>
    <p>Harga Satuan: Rp <?= number_format($barang["harga"], 0, ',', '.') ?></p>

    <form method="post">
        <label for="jumlah_beli">Jumlah Beli:</label>
        <input type="number" name="jumlah_beli" id="jumlah_beli" min="1" value="<?= $jumlah_beli ?>" required>
        <br>
        <button type="submit">Hitung</button>
    </form>

    <?php if ($jumlah_beli > 0): ?>
        <p>Total Harga (Sebelum Pajak): Rp <?= number_format($total_sebelum_pajak, 0, ',', '.') ?></p>
        <p>Pajak (10%): Rp <?= number_format($jumlah_pajak, 0, ',', '.') ?></p>
        <p><b>Total Bayar: Rp <?= number_format($total_bayar, 0, ',', '.') ?></b></p>
    <?php endif; ?>
</div>

</body>
</html>