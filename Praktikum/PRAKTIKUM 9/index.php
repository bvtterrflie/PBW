<?php
include 'koneksi_db.php';

// Ambil data pencarian
$search_judul = isset($_GET['judul']) ? $_GET['judul'] : '';
$search_tahun = isset($_GET['tahun_terbit']) ? $_GET['tahun_terbit'] : '';

// Query
$query = "SELECT * FROM buku WHERE 1=1";
if (!empty($search_judul)) {
    $query .= " AND Judul LIKE '%$search_judul%'";
}
if (!empty($search_tahun)) {
    $query .= " AND Tahun_Terbit = '$search_tahun'";
}

$result = mysqli_query($conn, $query);
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Buku</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <?php include 'nav.php'; ?>
    <div class="container mt-5">
        <h2 class="mb-4">Daftar Buku</h2>

        <!-- Form Pencarian -->
        <form method="get" class="row g-3 mb-4">
            <div class="col-md-5">
                <label for="judul" class="form-label">Cari Berdasarkan Judul</label>
                <input type="text" class="form-control" id="judul" name="judul" placeholder="Masukkan judul buku" value="<?= htmlspecialchars($search_judul); ?>">
            </div>
            <div class="col-md-3">
                <label for="tahun_terbit" class="form-label">Cari Berdasarkan Tahun Terbit</label>
                <input type="number" class="form-control" id="tahun_terbit" name="tahun_terbit" placeholder="Masukkan tahun terbit" value="<?= htmlspecialchars($search_tahun); ?>">
            </div>
            <div class="col-md-2 align-self-end">
                <button type="submit" class="btn btn-primary">Cari</button>
            </div>
        </form>

        <!-- Tabel Buku -->
        <table class="table table-striped table-bordered">
            <thead class="table-dark">
                <tr>
                    <th>ID</th>
                    <th>Judul</th>
                    <th>Penulis</th>
                    <th>Tahun Terbit</th>
                    <th>Harga</th>
                    <th>Stok</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php if (mysqli_num_rows($result) > 0): ?>
                    <?php while ($row = mysqli_fetch_assoc($result)): ?>
                        <tr>
                            <td><?= $row['ID'] ?></td>
                            <td><?= htmlspecialchars($row['Judul']) ?></td>
                            <td><?= htmlspecialchars($row['Penulis']) ?></td>
                            <td><?= $row['Tahun_Terbit'] ?></td>
                            <td><?= number_format($row['Harga'], 2, ',', '.') ?></td>
                            <td><?= $row['stok'] ?></td>
                            <td>
                                <button class="btn btn-warning btn-sm" data-bs-toggle="modal" data-bs-target="#editModal<?= $row['ID'] ?>">Edit</button>
                                <a href="hapus.php?id=<?= $row['ID'] ?>" class="btn btn-danger btn-sm" onclick="return confirm('Yakin ingin menghapus buku ini?')">Hapus</a>
                            </td>
                        </tr>

                        <!-- Modal Edit -->
                        <div class="modal fade" id="editModal<?= $row['ID'] ?>" tabindex="-1" aria-labelledby="editModalLabel<?= $row['ID'] ?>" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                            <form method="post" action="proses_edit.php">
                                <div class="modal-header">
                                <h5 class="modal-title" id="editModalLabel<?= $row['ID'] ?>">Edit Buku</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                <input type="hidden" name="id" value="<?= $row['ID'] ?>">
                                <div class="mb-3">
                                    <label class="form-label">Judul</label>
                                    <input type="text" name="judul" class="form-control" value="<?= htmlspecialchars($row['Judul']) ?>" required>
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Penulis</label>
                                    <input type="text" name="penulis" class="form-control" value="<?= htmlspecialchars($row['Penulis']) ?>" required>
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Tahun Terbit</label>
                                    <input type="number" name="tahun_terbit" class="form-control" value="<?= $row['Tahun_Terbit'] ?>" required>
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Harga</label>
                                    <input type="number" name="harga" class="form-control" value="<?= $row['Harga'] ?>" required>
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Stok</label>
                                    <input type="number" name="stok" class="form-control" value="<?= $row['stok'] ?>" required>
                                </div>
                                </div>
                                <div class="modal-footer">
                                <button type="submit" class="btn btn-success">Simpan Perubahan</button>
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                                </div>
                            </form>
                            </div>
                        </div>
                        </div>
                    <?php endwhile; ?>
                <?php else: ?>
                    <tr>
                        <td colspan="7" class="text-center">Tidak ada data ditemukan.</td>
                    </tr>
                <?php endif; ?>
            </tbody>
        </table>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
