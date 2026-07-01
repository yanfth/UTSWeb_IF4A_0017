<?php
require_once "config.php";

$result = mysqli_query($koneksi, "SELECT * FROM produk WHERE status = 'Tersedia' ORDER BY id DESC");
$produk_list = [];
while ($row = mysqli_fetch_assoc($result)) {
    $produk_list[] = $row;
}
mysqli_close($koneksi);
?>
<!doctype html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link rel="stylesheet" href="style.css" />
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous" />
  <link href="https://cdn.jsdelivr.net/npm/aos@2.3.4/dist/aos.css" rel="stylesheet" />
  <title>Penyetan Bu Nur</title>
  <style>
    .menu-card {
      background: #2b2b2b;
      border-radius: 14px;
      padding: 20px;
      border: 1px solid #333;
      height: 100%;
      display: flex;
      flex-direction: column;
      gap: 10px;
      transition: transform 0.2s, border-color 0.2s;
    }

    .menu-card:hover {
      transform: translateY(-4px);
      border-color: #22c55e;
    }

    .menu-badge-kategori {
      display: inline-block;
      background: #1a1a1a;
      color: #22c55e;
      font-size: 0.72rem;
      font-weight: 600;
      padding: 3px 10px;
      border-radius: 50px;
      border: 1px solid #22c55e;
      width: fit-content;
    }

    .menu-card h6 {
      color: #ffffff;
      font-weight: 700;
      font-size: 0.95rem;
      margin: 0;
    }

    .menu-card p.desc {
      color: #aaa;
      font-size: 0.82rem;
      line-height: 1.6;
      margin: 0;
      flex: 1;
    }

    .menu-card .harga {
      color: #22c55e;
      font-weight: 700;
      font-size: 1.05rem;
    }

    .menu-card .btn-pesan {
      display: inline-block;
      padding: 7px 16px;
      background: #22c55e;
      color: #1a1a1a;
      border-radius: 8px;
      font-size: 0.8rem;
      font-weight: 600;
      text-decoration: none;
      text-align: center;
      margin-top: 4px;
      transition: background 0.2s;
    }

    .menu-card .btn-pesan:hover {
      background: #1aa34d;
      color: #1a1a1a;
    }

    .empty-menu {
      color: #666;
      text-align: center;
      padding: 48px 0;
      width: 100%;
    }

    .empty-menu span {
      font-size: 2.5rem;
      display: block;
      margin-bottom: 10px;
    }
  </style>
</head>

<body>

  <nav class="navbar navbar-expand-lg navbar-floating sticky-top" data-bs-theme="dark">
    <div class="d-flex w-100 align-items-center">
      <ul class="navbar-nav d-flex flex-row gap-3" style="padding-left: 20px;">
        <li class="nav-item"><a class="nav-link" href="#About">About</a></li>
        <li class="nav-item"><a class="nav-link" href="#Services">Services</a></li>
        <li class="nav-item"><a class="nav-link" href="#Order">Order</a></li>
      </ul>
      <a class="navbar-brand" href="#hero">Penyetan Bu Nur</a>
      <ul class="navbar-nav d-flex flex-row gap-3 ms-auto" style="padding-right: 20px;">
        <li class="nav-item"><a class="nav-link" href="#Testimonial">Testimonials</a></li>
        <li class="nav-item"><a class="nav-link" href="#FAQ">FAQ</a></li>
        <li class="nav-item"><a class="nav-link" href="#Contact">Contact</a></li>
      </ul>
    </div>
  </nav>

  <!-- HERO -->
  <section id="hero">
    <div class="container">
      <div class="row align-items-center">
        <div class="col-lg-5 d-flex justify-content-center" data-aos="fade-right">
          <div class="hero-img-wrapper">
            <img src="images/Logo.png" alt="Foto Rumah Makan Penyetan Bu Nur"
              style="width: 100%; height: 100%; object-fit: cover; object-position: center; display: block; max-width: 280px; max-height: 280px;" />
          </div>
        </div>
        <div class="col-lg-7 mt-4 mt-lg-0" data-aos="fade-left" data-aos-delay="200">
          <span class="badge-label">Lamongan, Sugio Asli</span>
          <h1 class="hero-title mt-3">
            Rumah Makan <br />
            <span style="color: #22c55e">Penyetan Bu Nur</span>
          </h1>
          <p class="hero-subtitle">Cita Rasa Otentik, Harga Bersahabat</p>
          <p class="hero-desc">
            Nikmati hidangan penyetan khas Lamongan yang lezat dan menggugah
            selera. Dibuat dengan bumbu pilihan dan resep turun-temurun.
          </p>
          <div class="hero-btn">
            <a href="#Order" class="btn btn-order">Pesan Sekarang</a>
            <a href="#Order" class="btn btn-menu">Lihat Menu</a>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- ABOUT -->
  <section id="About" style="background-color: #1a1a1a; padding: 80px 0;">
    <div class="container">
      <div class="row align-items-center">
        <div class="col-lg-6 text-white" data-aos="fade-right">
          <span
            style="background-color: #22c55e; color: #1a1a1a; padding: 6px 20px; border-radius: 50px; font-size: 0.9rem; font-weight: 500;">Tentang
            Kami</span>
          <h2 style="font-size: 2.5rem; font-weight: 700; margin-top: 16px;">
            Kenapa Harus <br />
            <span style="color: #22c55e;">Penyetan Bu Nur?</span>
          </h2>
          <p style="color: #aaa; margin-top: 16px; line-height: 1.8;">
            rumah makan penyetan yang berdiri sejak tahun 1999, telah menyajikan hidangan khas Lamongan dengan
            cita rasa otentik yang tidak pernah berubah. Setiap hidangan dibuat dengan bahan-bahan segar pilihan
            dan bumbu rahasia Tradisional.
          </p>
          <p style="color: #aaa; line-height: 1.8;">
            Dengan pengalaman lebih dari 20 years, kami berkomitmen untuk selalu memberikan pelayanan terbaik
            dan makanan yang lezat untuk setiap pelanggan setia kami.
          </p>
          <div class="row mt-4">
            <div class="col-4 text-center" data-aos="zoom-in" data-aos-delay="100">
              <h3 style="color: #22c55e; font-size: 2rem; font-weight: 700;">20+</h3>
              <p style="color: #aaa; font-size: 0.85rem;">Tahun Berpengalaman</p>
            </div>
            <div class="col-4 text-center" data-aos="zoom-in" data-aos-delay="200">
              <h3 style="color: #22c55e; font-size: 2rem; font-weight: 700;">500+</h3>
              <p style="color: #aaa; font-size: 0.85rem;">Pelanggan Per Hari</p>
            </div>
            <div class="col-4 text-center" data-aos="zoom-in" data-aos-delay="300">
              <h3 style="color: #22c55e; font-size: 2rem; font-weight: 700;">2</h3>
              <p style="color: #aaa; font-size: 0.85rem;">Cabang Aktif</p>
            </div>
          </div>
        </div>

        <div class="col-lg-6 mt-5 mt-lg-0" data-aos="fade-left" data-aos-delay="200">
          <div style="background-color: #2b2b2b; border-radius: 16px; padding: 32px;">
            <div style="display: flex; align-items: flex-start; gap: 16px; margin-bottom: 24px;">
              <div
                style="background-color: #22c55e; border-radius: 12px; width: 48px; height: 48px; display: flex; align-items: center; justify-content: center; flex-shrink: 0;">
                <img src="images/flowbite_bowl-food-solid.png" alt="Menu Beragam"
                  style="width: 24px; height: 24px; object-fit: contain;" />
              </div>
              <div>
                <h5 style="color: white; font-weight: 600; margin: 0;">Menu Beragam</h5>
                <p style="color: #aaa; margin: 6px 0 0; font-size: 0.9rem;">Tersedia berbagai pilihan lauk penyetan
                  mulai dari ayam, lele, tempe, tahu, and masih banyak lagi.</p>
              </div>
            </div>
            <div style="display: flex; align-items: flex-start; gap: 16px; margin-bottom: 24px;">
              <div
                style="background-color: #22c55e; border-radius: 12px; width: 48px; height: 48px; display: flex; align-items: center; justify-content: center; flex-shrink: 0;">
                <img src="images/Check.png" alt="Bahan Segar" style="width: 24px; height: 24px; object-fit: contain;" />
              </div>
              <div>
                <h5 style="color: white; font-weight: 600; margin: 0;">Bahan Segar</h5>
                <p style="color: #aaa; margin: 6px 0 0; font-size: 0.9rem;">Semua bahan dipilih langsung setiap hari
                  untuk memastikan kesegaran dan kualitas terbaik.</p>
              </div>
            </div>
            <div style="display: flex; align-items: flex-start; gap: 16px;">
              <div
                style="background-color: #22c55e; border-radius: 12px; width: 48px; height: 48px; display: flex; align-items: center; justify-content: center; flex-shrink: 0;">
                <img src="images/Money.png" alt="Harga Terjangkau"
                  style="width: 24px; height: 24px; object-fit: contain;" />
              </div>
              <div>
                <h5 style="color: white; font-weight: 600; margin: 0;">Harga Terjangkau</h5>
                <p style="color: #aaa; margin: 6px 0 0; font-size: 0.9rem;">Menikmati makanan lezat tidak harus mahal.
                  Kami hadir dengan harga yang ramah di kantong.</p>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- SERVICES -->
  <section id="Services" style="background-color: #ffffff; padding: 80px 0;">
    <div class="container">
      <div class="text-center mb-5" data-aos="fade-up">
        <span
          style="background-color: #22c55e; color: #1a1a1a; padding: 6px 20px; border-radius: 50px; font-size: 0.9rem; font-weight: 500;">Layanan
          Kami</span>
        <h2 style="font-size: 2.5rem; font-weight: 700; margin-top: 16px; color: #1a1a1a;">
          Apa yang Kami <span style="color: #22c55e;">Tawarkan?</span>
        </h2>
        <p style="color: #777; max-width: 500px; margin: 12px auto 0;">
          Kami menyediakan berbagai layanan untuk memastikan pengalaman makan yang menyenangkan bagi setiap pelanggan.
        </p>
      </div>
      <div class="row g-4 justify-content-center">
        <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="100">
          <div
            style="background-color: #f9f9f9; border-radius: 16px; padding: 32px; height: 100%; border: 1px solid #eee;">
            <div
              style="background-color: #22c55e; border-radius: 12px; width: 52px; height: 52px; display: flex; align-items: center; justify-content: center; margin-bottom: 20px;">
              <img src="images/Plate.png" alt="Makan di Tempat"
                style="width: 26px; height: 26px; object-fit: contain;" />
            </div>
            <h5 style="font-weight: 700; color: #1a1a1a;">Makan di Tempat</h5>
            <p style="color: #777; font-size: 0.9rem; line-height: 1.8; margin-top: 10px;">
              Nikmati hidangan penyetan langsung di tempat kami dengan suasana yang nyaman dan bersih.
            </p>
          </div>
        </div>
        <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="200">
          <div
            style="background-color: #1a1a1a; border-radius: 16px; padding: 32px; height: 100%; border: 1px solid #2b2b2b;">
            <div
              style="background-color: #22c55e; border-radius: 12px; width: 52px; height: 52px; display: flex; align-items: center; justify-content: center; margin-bottom: 20px;">
              <img src="images/material-symbols_motorcycle-rounded.png" alt="Pesan Antar"
                style="width: 26px; height: 26px; object-fit: contain;" />
            </div>
            <h5 style="font-weight: 700; color: #ffffff;">Pesan Antar</h5>
            <p style="color: #aaa; font-size: 0.9rem; line-height: 1.8; margin-top: 10px;">
              Tidak sempat keluar? Kami melayani pesan antar ke lokasi kamu via WhatsApp.
            </p>
            <span
              style="background-color: #22c55e; color: #1a1a1a; padding: 4px 14px; border-radius: 50px; font-size: 0.8rem; font-weight: 600;">Populer</span>
          </div>
        </div>
        <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="300">
          <div
            style="background-color: #f9f9f9; border-radius: 16px; padding: 32px; height: 100%; border: 1px solid #eee;">
            <div
              style="background-color: #22c55e; border-radius: 12px; width: 52px; height: 52px; display: flex; align-items: center; justify-content: center; margin-bottom: 20px;">
              <img src="images/Party.png" alt="Catering Acara"
                style="width: 26px; height: 26px; object-fit: contain;" />
            </div>
            <h5 style="font-weight: 700; color: #1a1a1a;">Catering Acara</h5>
            <p style="color: #777; font-size: 0.9rem; line-height: 1.8; margin-top: 10px;">
              Kami melayani catering untuk berbagai acara dengan harga yang terjangkau.
            </p>
          </div>
        </div>
        <div class="col-lg-3 col-md-5" data-aos="fade-up" data-aos-delay="100">
          <div
            style="background-color: #f9f9f9; border-radius: 16px; padding: 32px; height: 100%; border: 1px solid #eee;">
            <div
              style="background-color: #22c55e; border-radius: 12px; width: 52px; height: 52px; display: flex; align-items: center; justify-content: center; margin-bottom: 20px;">
              <img src="images/Box.png" alt="Paket Nasi Box" style="width: 26px; height: 26px; object-fit: contain;" />
            </div>
            <h5 style="font-weight: 700; color: #1a1a1a;">Paket Nasi Box</h5>
            <p style="color: #777; font-size: 0.9rem; line-height: 1.8; margin-top: 10px;">
              Tersedia paket nasi box dengan berbagai pilihan lauk, cocok untuk pesanan dalam jumlah banyak.
            </p>
          </div>
        </div>
        <div class="col-lg-3 col-md-5" data-aos="fade-up" data-aos-delay="200">
          <div
            style="background-color: #f9f9f9; border-radius: 16px; padding: 32px; height: 100%; border: 1px solid #eee;">
            <div
              style="background-color: #22c55e; border-radius: 12px; width: 52px; height: 52px; display: flex; align-items: center; justify-content: center; margin-bottom: 20px;">
              <img src="images/Phone.png" alt="Order via WhatsApp"
                style="width: 26px; height: 26px; object-fit: contain;" />
            </div>
            <h5 style="font-weight: 700; color: #1a1a1a;">Order via WhatsApp</h5>
            <p style="color: #777; font-size: 0.9rem; line-height: 1.8; margin-top: 10px;">
              Pesan dengan mudah langsung melalui WhatsApp kami. Respon cepat dan proses simpel.
            </p>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- TESTIMONIAL -->
  <section id="Testimonial" style="background-color: #1a1a1a; padding: 80px 0;">
    <div class="container">
      <div class="text-center mb-5" data-aos="fade-up">
        <span
          style="background-color: #22c55e; color: #1a1a1a; padding: 6px 20px; border-radius: 50px; font-size: 0.9rem; font-weight: 500;">Testimoni</span>
        <h2 style="font-size: 2.5rem; font-weight: 700; margin-top: 16px; color: #ffffff;">
          Apa Kata <span style="color: #22c55e;">Pelanggan Kami?</span>
        </h2>
        <p style="color: #aaa; max-width: 500px; margin: 12px auto 0;">
          Ribuan pelanggan sudah mempercayai Penyetan Bu Nur sebagai pilihan makan favorit mereka.
        </p>
      </div>
      <div class="row align-items-center" data-aos="fade-up" data-aos-delay="100">
        <div class="col-lg-4 mb-5 mb-lg-0">
          <div style="background-color: #2b2b2b; border-radius: 20px; padding: 36px; text-align: center;">
            <h1 style="font-size: 5rem; font-weight: 700; color: #ffffff; margin: 0;">4.9</h1>
            <div style="color: #22c55e; font-size: 1.6rem; margin: 8px 0;">★★★★★</div>
            <p style="color: #aaa; font-size: 0.9rem; margin-bottom: 28px;">Berdasarkan 1.200+ ulasan</p>
            <div style="text-align: left;">
              <div style="display: flex; align-items: center; gap: 10px; margin-bottom: 10px;">
                <span style="color: #aaa; font-size: 0.85rem; width: 20px;">5★</span>
                <div style="flex: 1; background-color: #3a3a3a; border-radius: 50px; height: 8px;">
                  <div style="width: 85%; background-color: #22c55e; border-radius: 50px; height: 8px;"></div>
                </div>
                <span style="color: #aaa; font-size: 0.85rem; width: 30px;">85%</span>
              </div>
              <div style="display: flex; align-items: center; gap: 10px; margin-bottom: 10px;">
                <span style="color: #aaa; font-size: 0.85rem; width: 20px;">4★</span>
                <div style="flex: 1; background-color: #3a3a3a; border-radius: 50px; height: 8px;">
                  <div style="width: 10%; background-color: #22c55e; border-radius: 50px; height: 8px;"></div>
                </div>
                <span style="color: #aaa; font-size: 0.85rem; width: 30px;">10%</span>
              </div>
              <div style="display: flex; align-items: center; gap: 10px; margin-bottom: 10px;">
                <span style="color: #aaa; font-size: 0.85rem; width: 20px;">3★</span>
                <div style="flex: 1; background-color: #3a3a3a; border-radius: 50px; height: 8px;">
                  <div style="width: 3%; background-color: #22c55e; border-radius: 50px; height: 8px;"></div>
                </div>
                <span style="color: #aaa; font-size: 0.85rem; width: 30px;">3%</span>
              </div>
              <div style="display: flex; align-items: center; gap: 10px; margin-bottom: 10px;">
                <span style="color: #aaa; font-size: 0.85rem; width: 20px;">2★</span>
                <div style="flex: 1; background-color: #3a3a3a; border-radius: 50px; height: 8px;">
                  <div style="width: 1%; background-color: #22c55e; border-radius: 50px; height: 8px;"></div>
                </div>
                <span style="color: #aaa; font-size: 0.85rem; width: 30px;">1%</span>
              </div>
              <div style="display: flex; align-items: center; gap: 10px;">
                <span style="color: #aaa; font-size: 0.85rem; width: 20px;">1★</span>
                <div style="flex: 1; background-color: #3a3a3a; border-radius: 50px; height: 8px;">
                  <div style="width: 1%; background-color: #22c55e; border-radius: 50px; height: 8px;"></div>
                </div>
                <span style="color: #aaa; font-size: 0.85rem; width: 30px;">1%</span>
              </div>
            </div>
          </div>
        </div>
        <div class="col-lg-8">
          <div id="testimonialCarousel" class="carousel slide" data-bs-ride="carousel">
            <div class="carousel-inner">
              <div class="carousel-item active">
                <div class="row g-3">
                  <div class="col-md-6">
                    <div style="background-color: #2b2b2b; border-radius: 16px; padding: 24px; height: 100%;">
                      <div style="color: #22c55e; font-size: 1.1rem; margin-bottom: 8px;">★★★★★</div>
                      <p style="color: #ddd; font-size: 0.9rem; line-height: 1.7; margin-bottom: 16px;">"Penyetannya
                        enak banget! Sambelnya mantap, tidak terlalu pedas tapi rasanya nendang. Harganya juga sangat
                        terjangkau. Pasti balik lagi!"</p>
                      <div style="display: flex; align-items: center; gap: 10px;">
                        <div
                          style="width: 38px; height: 38px; border-radius: 50%; background-color: #22c55e; display: flex; align-items: center; justify-content: center; font-weight: 700; color: #1a1a1a; font-size: 0.9rem;">
                          AS</div>
                        <div>
                          <p style="color: #fff; font-weight: 600; margin: 0; font-size: 0.9rem;">Agus Santoso</p>
                          <p style="color: #aaa; margin: 0; font-size: 0.8rem;">Pelanggan Setia</p>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div style="background-color: #2b2b2b; border-radius: 16px; padding: 24px; height: 100%;">
                      <div style="color: #22c55e; font-size: 1.1rem; margin-bottom: 8px;">★★★★★</div>
                      <p style="color: #ddd; font-size: 0.9rem; line-height: 1.7; margin-bottom: 16px;">"Sudah langganan
                        lebih dari 5 tahun. Rasa tidak pernah berubah, selalu konsisten enak. Porsinya juga besar, cocok
                        buat makan siang bareng keluarga."</p>
                      <div style="display: flex; align-items: center; gap: 10px;">
                        <div
                          style="width: 38px; height: 38px; border-radius: 50%; background-color: #22c55e; display: flex; align-items: center; justify-content: center; font-weight: 700; color: #1a1a1a; font-size: 0.9rem;">
                          SR</div>
                        <div>
                          <p style="color: #fff; font-weight: 600; margin: 0; font-size: 0.9rem;">Sari Rahayu</p>
                          <p style="color: #aaa; margin: 0; font-size: 0.8rem;">Pelanggan Setia</p>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="carousel-item">
                <div class="row g-3">
                  <div class="col-md-6">
                    <div style="background-color: #2b2b2b; border-radius: 16px; padding: 24px; height: 100%;">
                      <div style="color: #22c55e; font-size: 1.1rem; margin-bottom: 8px;">★★★★★</div>
                      <p style="color: #ddd; font-size: 0.9rem; line-height: 1.7; margin-bottom: 16px;">"Pesan antar
                        sangat cepat dan makanannya masih panas waktu sampai. Packagingnya rapi. Recommended banget buat
                        yang mau order dari rumah!"</p>
                      <div style="display: flex; align-items: center; gap: 10px;">
                        <div
                          style="width: 38px; height: 38px; border-radius: 50%; background-color: #22c55e; display: flex; align-items: center; justify-content: center; font-weight: 700; color: #1a1a1a; font-size: 0.9rem;">
                          BW</div>
                        <div>
                          <p style="color: #fff; font-weight: 600; margin: 0; font-size: 0.9rem;">Budi Wicaksono</p>
                          <p style="color: #aaa; margin: 0; font-size: 0.8rem;">Pelanggan Baru</p>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div style="background-color: #2b2b2b; border-radius: 16px; padding: 24px; height: 100%;">
                      <div style="color: #22c55e; font-size: 1.1rem; margin-bottom: 8px;">★★★★☆</div>
                      <p style="color: #ddd; font-size: 0.9rem; line-height: 1.7; margin-bottom: 16px;">"Catering untuk
                        acara arisan keluarga besar sangat memuaskan. Semua tamu suka, banyak yang nanya pesan dimana.
                        Terima kasih Bu Nur!"</p>
                      <div style="display: flex; align-items: center; gap: 10px;">
                        <div
                          style="width: 38px; height: 38px; border-radius: 50%; background-color: #22c55e; display: flex; align-items: center; justify-content: center; font-weight: 700; color: #1a1a1a; font-size: 0.9rem;">
                          DL</div>
                        <div>
                          <p style="color: #fff; font-weight: 600; margin: 0; font-size: 0.9rem;">Dewi Lestari</p>
                          <p style="color: #aaa; margin: 0; font-size: 0.8rem;">Pelanggan Catering</p>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="carousel-item">
                <div class="row g-3">
                  <div class="col-md-6">
                    <div style="background-color: #2b2b2b; border-radius: 16px; padding: 24px; height: 100%;">
                      <div style="color: #22c55e; font-size: 1.1rem; margin-bottom: 8px;">★★★★★</div>
                      <p style="color: #ddd; font-size: 0.9rem; line-height: 1.7; margin-bottom: 16px;">"Lele gorengnya
                        crispy banget di luar tapi tetap juicy di dalam. Sambel terasi Bu Nur memang tidak ada
                        tandingannya. Wajib coba!"</p>
                      <div style="display: flex; align-items: center; gap: 10px;">
                        <div
                          style="width: 38px; height: 38px; border-radius: 50%; background-color: #22c55e; display: flex; align-items: center; justify-content: center; font-weight: 700; color: #1a1a1a; font-size: 0.9rem;">
                          RP</div>
                        <div>
                          <p style="color: #fff; font-weight: 600; margin: 0; font-size: 0.9rem;">Rizky Pratama</p>
                          <p style="color: #aaa; margin: 0; font-size: 0.8rem;">Food Blogger</p>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div style="background-color: #2b2b2b; border-radius: 16px; padding: 24px; height: 100%;">
                      <div style="color: #22c55e; font-size: 1.1rem; margin-bottom: 8px;">★★★★★</div>
                      <p style="color: #ddd; font-size: 0.9rem; line-height: 1.7; margin-bottom: 16px;">"Sudah coba
                        banyak warung penyetan, tapi Bu Nur tetap juara. Tempe dan tahunya juga enak banget. Harga
                        sangat bersahabat untuk kantong mahasiswa!"</p>
                      <div style="display: flex; align-items: center; gap: 10px;">
                        <div
                          style="width: 38px; height: 38px; border-radius: 50%; background-color: #22c55e; display: flex; align-items: center; justify-content: center; font-weight: 700; color: #1a1a1a; font-size: 0.9rem;">
                          NA</div>
                        <div>
                          <p style="color: #fff; font-weight: 600; margin: 0; font-size: 0.9rem;">Nurul Aini</p>
                          <p style="color: #aaa; margin: 0; font-size: 0.8rem;">Mahasiswa</p>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- CONTACT -->
  <section id="Contact" style="background-color: #f9f9f9; padding: 80px 0;">
    <div class="container">
      <div class="text-center mb-5" data-aos="fade-up">
        <span
          style="background-color: #22c55e; color: #1a1a1a; padding: 6px 20px; border-radius: 50px; font-size: 0.9rem; font-weight: 500;">Lokasi
          & Kontak</span>
        <h2 style="font-size: 2.5rem; font-weight: 700; margin-top: 16px; color: #1a1a1a;">Hubungi <span
            style="color: #22c55e;">Kami</span></h2>
      </div>
      <div class="row g-4">
        <div class="col-lg-5" data-aos="fade-right">
          <div style="background: #1a1a1a; color: white; padding: 40px; border-radius: 20px; height: 100%;">
            <h4 style="font-weight: 700; margin-bottom: 24px;">Warung Utama</h4>
            <p
              style="color: #aaa; font-size: 0.95rem; line-height: 1.7; display: flex; align-items: center; gap: 10px;">
              <img src="images/material-symbols_motorcycle-rounded.png" alt="Lokasi"
                style="width: 18px; height: 18px; object-fit: contain;" />
              Jl. Sugio - Lamongan No. 12, Lamongan, Jawa Timur
            </p>
            <p
              style="color: #aaa; font-size: 0.95rem; margin-top: 16px; display: flex; align-items: center; gap: 10px;">
              <img src="images/Check.png" alt="Jam Buka" style="width: 18px; height: 18px; object-fit: contain;" />
              Buka Jam: 10:00 - 22:00 WIB
            </p>
          </div>
        </div>
        <div class="col-lg-7" data-aos="fade-left" data-aos-delay="200">
          <div style="background: white; border: 1px solid #eee; padding: 40px; border-radius: 20px;">
            <form id="contact-form">
              <div class="mb-3">
                <input type="text" id="form-nama" class="form-control form-style" placeholder="Nama Anda" required
                  style="border-radius:10px; padding: 12px;">
              </div>
              <div class="mb-3">
                <textarea id="form-pesan" class="form-control form-style" rows="4"
                  placeholder="Tulis kritik, saran, atau pertanyaan katering Anda..." required
                  style="border-radius:10px; padding: 12px;"></textarea>
              </div>
              <button type="submit" class="btn btn-order w-100 py-3">Kirim Pesan Sekarang</button>
            </form>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- ====== ORDER — DINAMIS DARI DATABASE ====== -->
  <section id="Order" style="background-color: #1a1a1a; padding: 80px 0;">
    <div class="container">
      <div class="text-center mb-5" data-aos="fade-up">
        <span
          style="background-color: #22c55e; color: #1a1a1a; padding: 6px 20px; border-radius: 50px; font-size: 0.9rem; font-weight: 500;">Menu
          Kami</span>
        <h2 style="font-size: 2.5rem; font-weight: 700; margin-top: 16px; color: #fff;">
          Pilihan <span style="color: #22c55e;">Menu Tersedia</span>
        </h2>
        <p style="color: #aaa; max-width: 500px; margin: 12px auto 0;">
          Semua menu di bawah ini siap dipesan. Pesan langsung via WhatsApp kami.
        </p>
      </div>

      <div class="row g-3" data-aos="fade-up" data-aos-delay="100">
        <?php if (empty($produk_list)): ?>
        <div class="empty-menu">
          <span>🍽️</span>
          <p style="color: #666; font-size: 0.95rem;">Belum ada menu yang tersedia saat ini.<br>Silakan cek kembali
            nanti.</p>
        </div>
        <?php else: ?>
        <?php foreach ($produk_list as $i => $p):
            $delay = ($i % 4 + 1) * 100;
          ?>
        <div class="col-lg-3 col-md-4 col-sm-6" data-aos="fade-up" data-aos-delay="<?= $delay ?>">
          <div class="menu-card">
            <div
              style="width:40px; height:40px; background:#22c55e; border-radius:10px; display:flex; align-items:center; justify-content:center; font-size:1.2rem;">
              <?php
                    $icon = '🍱';
                    if ($p['kategori'] === 'Minuman') $icon = '🥤';
                    elseif ($p['kategori'] === 'Makanan') $icon = '🍛';
                    echo $icon;
                  ?>
            </div>
            <div class="menu-badge-kategori">
              <?= htmlspecialchars($p['kategori']) ?>
            </div>
            <h6>
              <?= htmlspecialchars($p['nama_produk']) ?>
            </h6>
            <p class="desc">
              <?= htmlspecialchars($p['deskripsi'] ?: 'Hidangan lezat khas Penyetan Bu Nur.') ?>
            </p>
            <div class="harga">Rp
              <?= number_format($p['harga'], 0, ',', '.') ?>
            </div>
            <a href="https://wa.me/6281234567890?text=Halo+Bu+Nur,+saya+ingin+memesan+<?= urlencode($p['nama_produk']) ?>"
              target="_blank" class="btn-pesan">🛒 Pesan via WA</a>
          </div>
        </div>
        <?php endforeach; ?>
        <?php endif; ?>
      </div>
    </div>
  </section>

  <!-- FAQ -->
  <section id="FAQ" style="background-color: #ffffff; padding: 80px 0;">
    <div class="container" style="max-width: 800px;">
      <div class="text-center mb-5" data-aos="fade-up">
        <span
          style="background-color: #22c55e; color: #1a1a1a; padding: 6px 20px; border-radius: 50px; font-size: 0.9rem; font-weight: 500;">Pertanyaan</span>
        <h2 style="font-size: 2.5rem; font-weight: 700; margin-top: 16px; color: #1a1a1a;">Sering <span
            style="color: #22c55e;">Ditanyakan</span></h2>
      </div>
      <div class="d-flex flex-column gap-3">
        <div class="faq-item" data-aos="fade-up" data-aos-delay="100">
          <div class="faq-header d-flex justify-content-between align-items-center"
            style="cursor: pointer; padding: 20px; background: #f9f9f9; border-radius: 12px;">
            <h6 style="margin: 0; font-weight: 600; color: #1a1a1a;">Apakah sambal di Bu Nur selalu fresh?</h6>
            <img src="images/Add.png" alt="Toggle" class="faq-icon"
              style="width: 16px; height: 16px; object-fit: contain; transition: transform 0.3s;" />
          </div>
          <div class="faq-body"
            style="display: none; padding: 20px; color: #666; font-size: 0.95rem; line-height: 1.6;">
            Ya tentu saja! Sambal di Penyetan Bu Nur diulek secara mendadak langsung ketika Anda memesan demi menjaga
            cita rasa pedas yang otentik dan kesegaran maksimal.
          </div>
        </div>
        <div class="faq-item" data-aos="fade-up" data-aos-delay="200">
          <div class="faq-header d-flex justify-content-between align-items-center"
            style="cursor: pointer; padding: 20px; background: #f9f9f9; border-radius: 12px;">
            <h6 style="margin: 0; font-weight: 600; color: #1a1a1a;">Apakah melayani pesanan katering partai besar?</h6>
            <img src="images/Add.png" alt="Toggle" class="faq-icon"
              style="width: 16px; height: 16px; object-fit: contain; transition: transform 0.3s;" />
          </div>
          <div class="faq-body"
            style="display: none; padding: 20px; color: #666; font-size: 0.95rem; line-height: 1.6;">
            Kami melayani katering nasi box untuk berbagai event seperti arisan, syukuran, pernikahan, hingga rapat
            kantor. Silakan hubungi admin kami minimal H-2 acara.
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- FOOTER -->
  <footer style="background-color: #1a1a1a; color: #ffffff; padding: 60px 0 20px; border-top: 1px solid #2b2b2b;">
    <div class="container">
      <div class="row g-4">
        <div class="col-lg-4 col-md-6">
          <div class="d-flex align-items-center gap-3 mb-3">
            <img src="images/Logo.png" alt="Logo Bu Nur" style="width: 50px; height: 50px; object-fit: contain;" />
            <h4 style="font-weight: 700; margin: 0; color: #22c55e;">Penyetan Bu Nur</h4>
          </div>
          <p style="color: #aaa; font-size: 0.9rem; line-height: 1.7; max-width: 300px;">
            Menyajikan hidangan penyetan khas Lamongan dengan cita rasa otentik sejak tahun 1999.
          </p>
        </div>
        <div class="col-lg-4 col-md-6">
          <h5 style="font-weight: 600; margin-bottom: 20px; color: #ffffff;">Navigasi</h5>
          <ul class="list-unstyled d-flex flex-column gap-2" style="margin: 0; padding: 0;">
            <li><a href="#hero" class="footer-link">Beranda</a></li>
            <li><a href="#About" class="footer-link">Tentang Kami</a></li>
            <li><a href="#Services" class="footer-link">Layanan</a></li>
            <li><a href="#Testimonial" class="footer-link">Testimoni</a></li>
            <li><a href="#Contact" class="footer-link">Kontak</a></li>
          </ul>
        </div>
        <div class="col-lg-4 col-md-12">
          <h5 style="font-weight: 600; margin-bottom: 20px; color: #ffffff;">Jam Operasional</h5>
          <ul class="list-unstyled d-flex flex-column gap-2" style="color: #aaa; font-size: 0.9rem;">
            <li class="d-flex justify-content-between"><span>Senin - Jumat:</span> <span style="color: #fff;">10:00 -
                22:00 WIB</span></li>
            <li class="d-flex justify-content-between"><span>Sabtu - Minggu:</span> <span
                style="color: #22c55e; font-weight: 500;">10:00 - 23:00 WIB</span></li>
            <li class="border-top border-secondary my-2" style="opacity: 0.2;"></li>
            <li><span style="color: #22c55e;">✔</span> Menerima pesanan dine-in, takeaway, & katering skala besar.</li>
          </ul>
        </div>
      </div>
      <hr style="border-color: #333; margin: 40px 0 20px;">
      <div class="row">
        <div class="col-md-6 text-center text-md-start">
          <p style="color: #777; font-size: 0.85rem; margin: 0;">&copy; 2026 Rumah Makan Penyetan Bu Nur. All rights
            reserved.</p>
        </div>
        <div class="col-md-6 text-center text-md-end mt-2 mt-md-0">
          <p style="color: #777; font-size: 0.85rem; margin: 0;">Designed with <span style="color: #22c55e;">❤</span>
            for Informatics Project.</p>
        </div>
      </div>
    </div>
  </footer>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-YvpcrYf0tY3lHB60NNkmXc4s9bIOgUxi8T/jzmFxFTXz/kMEQqNOhRCGqgnLFiKCChM"
    crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/aos@2.3.4/dist/aos.js"></script>
  <script>
    AOS.init({ duration: 800, once: true });
  </script>
  <script src="script.js"></script>
</body>

</html>