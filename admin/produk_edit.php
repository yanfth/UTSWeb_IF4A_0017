<?php
// =========================================================
// admin/produk_edit.php
// Form untuk mengedit data produk yang sudah ada (UPDATE)
// =========================================================
require_once "auth.php";
require_once "../config.php";

$active = "produk";
$error = "";

$id = $_GET['id'] ?? $_POST['id'] ?? null;

if (!$id || !is_numeric($id)) {
    header("Location: produk_list.php?status=gagal");
    exit;
}

// Ambil data produk yang akan diedit
$stmt = mysqli_prepare($koneksi, "SELECT * FROM produk WHERE id = ?");
mysqli_stmt_bind_param($stmt, "i", $id);
mysqli_stmt_execute($stmt);
$produk = mysqli_fetch_assoc(mysqli_stmt_get_result($stmt));
mysqli_stmt_close($stmt);

if (!$produk) {
    header("Location: produk_list.php?status=gagal");
    exit;
}

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
            "UPDATE produk SET nama_produk = ?, kategori = ?, harga = ?, deskripsi = ?, status = ? WHERE id = ?"
        );
        mysqli_stmt_bind_param($stmt, "ssissi", $nama_produk, $kategori, $harga, $deskripsi, $status, $id);

        if (mysqli_stmt_execute($stmt)) {
            header("Location: produk_list.php?status=edit_sukses");
            exit;
        } else {
            $error = "Gagal memperbarui data: " . mysqli_error($koneksi);
        }
        mysqli_stmt_close($stmt);
    }

    // Supaya form tetap menampilkan input terbaru jika terjadi error
    $produk['nama_produk'] = $nama_produk;
    $produk['kategori'] = $kategori;
    $produk['harga'] = $harga;
    $produk['deskripsi'] = $deskripsi;
    $produk['status'] = $status;
}
?>
<!doctype html>
<html lang="id">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Edit Produk - Penyetan Bu Nur</title>
  <link rel="stylesheet" href="admin-style.css" />
</head>
<body>
  <div class="admin-layout">
    <?php include "sidebar.php"; ?>

    <div class="main-content">
      <div class="topbar">
        <h1>Edit Produk</h1>
        <div class="admin-name">Halo, <strong><?= htmlspecialchars($_SESSION['admin_nama']) ?></strong></div>
      </div>

      <div class="card" style="max-width:600px;">
        <?php if ($error): ?>
          <div class="alert alert-error"><?= htmlspecialchars($error) ?></div>
        <?php endif; ?>

        <form method="POST" action="produk_edit.php?id=<?= $produk['id'] ?>">
          <input type="hidden" name="id" value="<?= $produk['id'] ?>">

          <div class="form-row">
            <label for="nama_produk">Nama Produk</label>
            <input type="text" id="nama_produk" name="nama_produk" value="<?= htmlspecialchars($produk['nama_produk']) ?>" required>
          </div>

          <div class="form-row">
            <label for="kategori">Kategori</label>
            <select id="kategori" name="kategori">
              <option value="Makanan" <?= $produk['kategori'] === 'Makanan' ? 'selected' : '' ?>>Makanan</option>
              <option value="Minuman" <?= $produk['kategori'] === 'Minuman' ? 'selected' : '' ?>>Minuman</option>
              <option value="Paket Box" <?= $produk['kategori'] === 'Paket Box' ? 'selected' : '' ?>>Paket Box</option>
            </select>
          </div>

          <div class="form-row">
            <label for="harga">Harga (Rp)</label>
            <input type="number" id="harga" name="harga" value="<?= htmlspecialchars($produk['harga']) ?>" min="0" required>
          </div>

          <div class="form-row">
            <label for="deskripsi">Deskripsi</label>
            <textarea id="deskripsi" name="deskripsi" rows="3"><?= htmlspecialchars($produk['deskripsi']) ?></textarea>
          </div>

          <div class="form-row">
            <label for="status">Status</label>
            <select id="status" name="status">
              <option value="Tersedia" <?= $produk['status'] === 'Tersedia' ? 'selected' : '' ?>>Tersedia</option>
              <option value="Habis" <?= $produk['status'] === 'Habis' ? 'selected' : '' ?>>Habis</option>
            </select>
          </div>

          <div style="display:flex; gap:10px;">
            <button type="submit" class="btn">Simpan Perubahan</button>
            <a href="produk_list.php" class="btn btn-secondary">Batal</a>
          </div>
        </form>
      </div>
    </div>
  </div>
</body>
</html>
