<?php
// =========================================================
// admin/dashboard.php
// Halaman utama admin setelah login
// =========================================================
require_once "auth.php";
require_once "../config.php";

$active = "dashboard";

// Statistik sederhana
$totalProduk = mysqli_fetch_assoc(mysqli_query($koneksi, "SELECT COUNT(*) AS total FROM produk"))['total'];
$totalTersedia = mysqli_fetch_assoc(mysqli_query($koneksi, "SELECT COUNT(*) AS total FROM produk WHERE status='Tersedia'"))['total'];
$totalHabis = mysqli_fetch_assoc(mysqli_query($koneksi, "SELECT COUNT(*) AS total FROM produk WHERE status='Habis'"))['total'];

// 5 produk terbaru
$produkTerbaru = mysqli_query($koneksi, "SELECT * FROM produk ORDER BY created_at DESC LIMIT 5");
?>
<!doctype html>
<html lang="id">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Dashboard Admin - Penyetan Bu Nur</title>
  <link rel="stylesheet" href="admin-style.css" />
</head>
<body>
  <div class="admin-layout">
    <?php include "sidebar.php"; ?>

    <div class="main-content">
      <div class="topbar">
        <h1>Dashboard</h1>
        <div class="admin-name">Halo, <strong><?= htmlspecialchars($_SESSION['admin_nama']) ?></strong></div>
      </div>

      <div class="stat-cards">
        <div class="stat-card">
          <h3><?= $totalProduk ?></h3>
          <p>Total Produk</p>
        </div>
        <div class="stat-card">
          <h3><?= $totalTersedia ?></h3>
          <p>Produk Tersedia</p>
        </div>
        <div class="stat-card">
          <h3><?= $totalHabis ?></h3>
          <p>Produk Habis</p>
        </div>
      </div>

      <div class="card">
        <div class="card-header">
          <h3 style="margin:0;">Produk Terbaru</h3>
          <a href="produk_list.php" class="btn btn-secondary">Lihat Semua</a>
        </div>
        <table>
          <thead>
            <tr>
              <th>Nama Produk</th>
              <th>Kategori</th>
              <th>Harga</th>
              <th>Status</th>
            </tr>
          </thead>
          <tbody>
            <?php if (mysqli_num_rows($produkTerbaru) === 0): ?>
              <tr><td colspan="4">Belum ada data produk.</td></tr>
            <?php else: ?>
              <?php while ($row = mysqli_fetch_assoc($produkTerbaru)): ?>
                <tr>
                  <td><?= htmlspecialchars($row['nama_produk']) ?></td>
                  <td><?= htmlspecialchars($row['kategori']) ?></td>
                  <td>Rp <?= number_format($row['harga'], 0, ',', '.') ?></td>
                  <td>
                    <span class="badge <?= $row['status'] === 'Tersedia' ? 'badge-success' : 'badge-danger' ?>">
                      <?= htmlspecialchars($row['status']) ?>
                    </span>
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
