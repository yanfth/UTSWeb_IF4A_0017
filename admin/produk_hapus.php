<?php
// =========================================================
// admin/produk_hapus.php
// Menghapus data produk berdasarkan id (DELETE)
// =========================================================
require_once "auth.php";
require_once "../config.php";

$id = $_GET['id'] ?? null;

if (!$id || !is_numeric($id)) {
    header("Location: produk_list.php?status=gagal");
    exit;
}

$stmt = mysqli_prepare($koneksi, "DELETE FROM produk WHERE id = ?");
mysqli_stmt_bind_param($stmt, "i", $id);

if (mysqli_stmt_execute($stmt)) {
    header("Location: produk_list.php?status=hapus_sukses");
} else {
    header("Location: produk_list.php?status=gagal");
}
mysqli_stmt_close($stmt);
exit;
