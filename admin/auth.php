<?php
// =========================================================
// admin/auth.php
// Wajib di-include paling atas di setiap halaman admin
// untuk memastikan hanya admin yang sudah login bisa akses.
// =========================================================

session_start();

if (!isset($_SESSION['admin_id'])) {
    header("Location: ../login.php");
    exit;
}
