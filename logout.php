<?php
// =========================================================
// logout.php
// Menghapus session admin lalu redirect ke halaman login
// =========================================================
session_start();
$_SESSION = [];
session_destroy();
header("Location: login.php");
exit;
