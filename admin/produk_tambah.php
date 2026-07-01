<?php
// =========================================================
// admin/produk_tambah.php
// Form untuk menambah data produk baru (CREATE)
// =========================================================
require_once "auth.php";
require_once "../config.php";

$active = "produk";
$error = "";

// Nilai default supaya form tidak kosong ulang jika ada error
$nama_produk = "";
$kategori = "Makanan";
$harga = "";
$deskripsi = "";
$status = "Tersedia";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nama_produk = trim($_POST['nama_produk'] ?? '');
    $kategori    = trim($_POST['kategori'] ?? '');
    $harga       = trim($_POST['harga'] ?? '');
    $deskripsi   = trim($_POST['deskripsi'] ?? '');
    $status      = $_POST['status'] ?? 'Tersedia';

    if ($nama_produk === '' || $kategori === '' || $harga === '') {
        $error = "Nama produk, kategori, dan harga wajib diisi.";
    } elseif (!is_numeric($harga) || $harga < 0) {
        $error = "Harga harus berupa angka positif.";
    } else {
        $stmt = mysqli_prepare(
            $koneksi,
            "INSERT INTO produk (nama_produk, kategori, harga, deskripsi, status) VALUES (?, ?, ?, ?, ?)"
        );
        mysqli_stmt_bind_param($stmt, "ssiss", $nama_produk, $kategori, $harga, $deskripsi, $status);

        if (mysqli_stmt_execute($stmt)) {
            header("Location: produk_list.php?status=tambah_sukses");
            exit;
        } else {
            $error = "Gagal menyimpan data: " . mysqli_error($koneksi);
        }
        mysqli_stmt_close($stmt);
    }
}
?>
<!doctype html>
<html lang="id">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Tambah Produk - Penyetan Bu Nur</title>
  <link rel="stylesheet" href="admin-style.css" />
</head>
<body>
  <div class="admin-layout">
    <?php include "sidebar.php"; ?>

    <div class="main-content">
      <div class="topbar">
        <h1>Tambah Produk</h1>
        <div class="admin-name">Halo, <strong><?= htmlspecialchars($_SESSION['admin_nama']) ?></strong></div>
      </div>

      <div class="card" style="max-width:600px;">
        <?php if ($error): ?>
          <div class="alert alert-error"><?= htmlspecialchars($error) ?></div>
        <?php endif; ?>

        <form method="POST" action="produk_tambah.php">
          <div class="form-row">
            <label for="nama_produk">Nama Produk</label>
            <input type="text" id="nama_produk" name="nama_produk" value="<?= htmlspecialchars($nama_produk) ?>" placeholder="Contoh: Paket Ayam Penyet" required>
          </div>

          <div class="form-row">
            <label for="kategori">Kategori</label>
            <select id="kategori" name="kategori">
              <option value="Makanan" <?= $kategori === 'Makanan' ? 'selected' : '' ?>>Makanan</option>
              <option value="Minuman" <?= $kategori === 'Minuman' ? 'selected' : '' ?>>Minuman</option>
              <option value="Paket Box" <?= $kategori === 'Paket Box' ? 'selected' : '' ?>>Paket Box</option>
            </select>
          </div>

          <div class="form-row">
            <label for="harga">Harga (Rp)</label>
            <input type="number" id="harga" name="harga" value="<?= htmlspecialchars($harga) ?>" placeholder="20000" min="0" required>
          </div>

          <div class="form-row">
            <label for="deskripsi">Deskripsi</label>
            <textarea id="deskripsi" name="deskripsi" rows="3" placeholder="Deskripsi singkat produk"><?= htmlspecialchars($deskripsi) ?></textarea>
          </div>

          <div class="form-row">
            <label for="status">Status</label>
            <select id="status" name="status">
              <option value="Tersedia" <?= $status === 'Tersedia' ? 'selected' : '' ?>>Tersedia</option>
              <option value="Habis" <?= $status === 'Habis' ? 'selected' : '' ?>>Habis</option>
            </select>
          </div>

          <div style="display:flex; gap:10px;">
            <button type="submit" class="btn">Simpan Produk</button>
            <a href="produk_list.php" class="btn btn-secondary">Batal</a>
          </div>
        </form>
      </div>
    </div>
  </div>
</body>
</html>
