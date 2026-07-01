<?php
?>
<div class="sidebar">
  <div class="brand">Penyetan Bu Nur<br><small style="color:#777; font-weight:400;">Admin Panel</small></div>
  <nav>
    <a href="dashboard.php" class="<?= ($active ?? '') === 'dashboard' ? 'active' : '' ?>">📊 Dashboard</a>
    <a href="produk_list.php" class="<?= ($active ?? '') === 'produk' ? 'active' : '' ?>">🍱 Daftar Produk</a>
    <a href="../index.php" target="_blank">🌐 Lihat Website</a>
    <a href="../logout.php" onclick="return confirm('Yakin ingin logout?');">🚪 Logout</a>
  </nav>
</div>