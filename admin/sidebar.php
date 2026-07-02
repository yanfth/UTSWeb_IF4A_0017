<?php
?>
<div class="sidebar">
  <div class="brand">Penyetan Bu Nur<br><small style="color:#777; font-weight:400;">Admin Panel</small></div>
  <nav>
    <a href="dashboard.php" class="<?= ($active ?? '') === 'dashboard' ? 'active' : '' ?>"><img
        src="../images/Dashboard.png" alt="Dashboard" style="width:24px; vertical-align:middle; margin-right:8px;">
      Dashboard</a>
    <a href="produk_list.php" class="<?= ($active ?? '') === 'produk' ? 'active' : '' ?>"><img
        src="../images/Daftar.png" alt="Daftar Produk" style="width:24px; vertical-align:middle; margin-right:8px;">
      Daftar Produk</a>
    <a href="../index.php" target="_blank"><img src="../images/Website.png" alt="Lihat Website"
        style="width:24px; vertical-align:middle; margin-right:8px;"> Lihat Website</a>
    <a href="../logout.php" onclick="return confirm('Yakin ingin logout?');"><img src="../images/Logout.png"
        alt="Logout" style="width:24px; vertical-align:middle; margin-right:8px;"> Logout</a>
  </nav>
</div>