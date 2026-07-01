<?php
// =========================================================
// login.php
// Halaman login untuk admin
// =========================================================
session_start();
require_once "config.php";

// Jika sudah login, langsung ke dashboard
if (isset($_SESSION['admin_id'])) {
    header("Location: admin/dashboard.php");
    exit;
}

$error = "";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = trim($_POST['username'] ?? '');
    $password = $_POST['password'] ?? '';

    if ($username === '' || $password === '') {
        $error = "Username dan password wajib diisi.";
    } else {
        // Gunakan prepared statement supaya aman dari SQL Injection
        $stmt = mysqli_prepare($koneksi, "SELECT id, username, password, nama_lengkap FROM admin WHERE username = ?");
        mysqli_stmt_bind_param($stmt, "s", $username);
        mysqli_stmt_execute($stmt);
        $result = mysqli_stmt_get_result($stmt);
        $admin = mysqli_fetch_assoc($result);

        if ($admin && password_verify($password, $admin['password'])) {
            $_SESSION['admin_id'] = $admin['id'];
            $_SESSION['admin_username'] = $admin['username'];
            $_SESSION['admin_nama'] = $admin['nama_lengkap'];

            header("Location: admin/dashboard.php");
            exit;
        } else {
            $error = "Username atau password salah.";
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
  <title>Login Admin - Penyetan Bu Nur</title>
  <link rel="stylesheet" href="admin/admin-style.css" />
</head>
<body>
  <div class="login-wrapper">
    <div class="login-box">
      <h2>Penyetan Bu Nur</h2>
      <p class="subtitle">Login untuk mengelola konten website</p>

      <?php if ($error): ?>
        <div class="alert alert-error"><?= htmlspecialchars($error) ?></div>
      <?php endif; ?>

      <form method="POST" action="login.php">
        <div class="form-group">
          <label for="username">Username</label>
          <input type="text" id="username" name="username" class="form-control" placeholder="Masukkan username" required autofocus>
        </div>
        <div class="form-group">
          <label for="password">Password</label>
          <input type="password" id="password" name="password" class="form-control" placeholder="Masukkan password" required>
        </div>
        <button type="submit" class="btn btn-block">Login</button>
      </form>
    </div>
  </div>
</body>
</html>
