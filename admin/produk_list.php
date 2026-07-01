<?php
// =========================================================
// admin/produk_list.php
// Menampilkan semua data produk (READ) + link ke
// tambah / edit / hapus
// =========================================================
require_once "auth.php";
require_once "../config.php";

$active = "produk";

$query = "SELECT * FROM produk ORDER BY id DESC";
$result = mysqli_query($koneksi, $query);
?>
<!doctype html>
<html lang="id">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Daftar Produk - Penyetan Bu Nur</title>
  <link rel="stylesheet" href="admin-style.css" />
</head>
<body>
  <div class="admin-layout">
    <?php include "sidebar.php"; ?>

    <div class="main-content">
      <div class="topbar">
        <h1>Daftar Produk</h1>
        <div class="admin-name">Halo, <strong><?= htmlspecialchars($_SESSION['admin_nama']) ?></strong></div>
      </div>

      <?php if (isset($_GET['status'])): ?>
        <?php if ($_GET['status'] === 'tambah_sukses'): ?>
          <div class="alert alert-success">Produk baru berhasil ditambahkan.</div>
        <?php elseif ($_GET['status'] === 'edit_sukses'): ?>
          <div class="alert alert-success">Produk berhasil diperbarui.</div>
        <?php elseif ($_GET['status'] === 'hapus_sukses'): ?>
          <div class="alert alert-success">Produk berhasil dihapus.</div>
        <?php elseif ($_GET['status'] === 'gagal'): ?>
          <div class="alert alert-error">Terjadi kesalahan, silakan coba lagi.</div>
        <?php endif; ?>
      <?php endif; ?>

      <div class="card">
        <div class="card-header">
          <h3 style="margin:0;">Semua Produk</h3>
          <a href="produk_tambah.php" class="btn">+ Tambah Produk</a>
        </div>

        <table>
          <thead>
            <tr>
              <th>#</th>
              <th>Nama Produk</th>
              <th>Kategori</th>
              <th>Harga</th>
              <th>Status</th>
              <th>Aksi</th>
            </tr>
          </thead>
          <tbody>
            <?php if (mysqli_num_rows($result) === 0): ?>
              <tr><td colspan="6">Belum ada data produk. Klik "Tambah Produk" untuk menambahkan.</td></tr>
            <?php else: ?>
              <?php $no = 1; while ($row = mysqli_fetch_assoc($result)): ?>
                <tr>
                  <td><?= $no++ ?></td>
                  <td><?= htmlspecialchars($row['nama_produk']) ?></td>
                  <td><?= htmlspecialchars($row['kategori']) ?></td>
                  <td>Rp <?= number_format($row['harga'], 0, ',', '.') ?></td>
                  <td>
                    <span class="badge <?= $row['status'] === 'Tersedia' ? 'badge-success' : 'badge-danger' ?>">
                      <?= htmlspecialchars($row['status']) ?>
                    </span>
                  </td>
                  <td class="action-links">
                    <a class="edit" href="produk_edit.php?id=<?= $row['id'] ?>">Edit</a>
                    <a class="delete" href="produk_hapus.php?id=<?= $row['id'] ?>"
                       onclick="return confirm('Yakin ingin menghapus produk \'<?= htmlspecialchars(addslashes($row['nama_produk'])) ?>\'?');">Hapus</a>
                  </td>
                </tr>
              <?php endwhile; ?>
            <?php endif; ?>
          </tbody>
        </table>
      </div>
    </div>
  </div>
</body>
</html>
