<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>About Page</title>
  <link rel="stylesheet" href="/assets/style/about.css">
</head>

<body>
  <!-- Memanggil navbar -->
  <?php include __DIR__ . "/../layout/navbar.php"; ?>

  <!-- Top Section -->
  <div class="top">
    <div class="about-header">
      <hr class="line1">
      <span class="black-text">Tentang Kami</span>
      <hr class="line1">
      <span class="Angkringan-Sakinih">Angkringan Sedulur</span><br>
    </div>

    <p class="p1">
    Nikmati hangatnya kebersamaan di Angkringan Sedulur, tempat di mana cita rasa tradisional bertemu suasana santai. Kami menghadirkan beragam pilihan kuliner khas angkringan, mulai dari nasi kucing, sate-satean, hingga aneka gorengan, semua dengan harga ramah di kantong. Sempurna untuk menemani waktu bersantai bersama teman dan keluarga, dalam suasana akrab layaknya saudara.
    </p>
  </div>

  <img src="/assets/img/icon-about-angkringan.png" alt="angkringan">
  <!-- Icon Section -->
  <section class="icon-section">
    <div class="icon-card">
      <img src="/assets/img/icon-about-coffeandwedang.png" alt="Coffee and Wedang">
    </div>
    <div class="icon-card">
      <img src="/assets/img/icon-about-menu-spesial.png" alt="Menu spesial">

    </div>
    <div class="icon-card">
      <img src="/assets/img/icon-about-fast-food.png" alt="Fast Food">

    </div>
    <div class="icon-card">
      <img src="/assets/img/icon-about-special-price.png" alt="Spesial Price">
    </div>
  </section>

  <!-- Mid Section -->
  <div class="story-container">
    <div class="image-section">
      <img src="/assets/img/icon-angkringan2.png" alt="angkringan2">
      <img src="/assets/img/vektor.png" alt="vektor">
    </div>
    <div class="text1">
      <h2 class="left"><i>The Story</i></h2>
      <p class="left2">
      Terinspirasi dari semangat kebersamaan dan tradisi nongkrong sederhana, kami menghadirkan Angkringan Sedulur dengan konsep modern yang tetap ramah di kantong. Mengusung nama "Sedulur," yang berarti "saudara," kami ingin menciptakan tempat di mana setiap orang bisa berkumpul, berbagi cerita, dan menikmati sajian tradisional dengan rasa hangat kekeluargaan.
      </p>
      <h2 class="center"><i>2025</i></h2>
      <p class="center2">
      Angkringan Sedulur lahir pada tahun 2025 dari semangat kebersamaan sekelompok mahasiswa Universitas Telkom Purwokerto yang ingin menciptakan tempat nongkrong sederhana namun penuh makna. Dengan mengusung nilai persaudaraan, Angkringan Sedulur hadir sebagai ruang berkumpul yang hangat, menghadirkan cita rasa tradisional dengan sentuhan modern yang tetap ramah di kantong.
      </p>
    </div>
  </div>

  <!-- team -->
  <section class="team-section">
    <div class="team-title">
      <hr class="line2">
      <span>TEAM</span>
      <hr class="line2">
    </div>

    <h1 class="koki">Temui Koki Profesional Kami</h1>
    <div class="team-container">
      <div class="team-card">
        <img src="/assets/img/chef1.png" alt="Chef Junaidi">
        <h3>Chef Juna</h3>
        <p>Assistant Chef</p>
      </div>
      <div class="team-card">
        <img src="/assets/img/chef2.png" alt="Chef Riniti">
        <h3>Chef Renatha</h3>
        <p>Assistant Chef</p>
      </div>
      <div class="team-card">
        <img src="/assets/img/chef3.png" alt="Chef Arnoldi">
        <h3>Chef Arnold</h3>
        <p>Master Chef</p>
      </div>
    </div>
  </section>

  <section class="our-work-section">
    <div class="team-title">
      <hr class="line3">
      <span>GALERY</span>
      <hr class="line3">
    </div>
    <h2>Apa yang Kami Buat</h2>
    <p>Kami sangat menerima kritik dan saran dari para pelanggan.<br> Silahkan tinggalkan kritik atau saran untuk kami.</p>
    <div class="work-image">
      <img src="/assets/img/icon-about-galery.png" alt="Apa yang Kami Buat">
    </div>
  </section>

  <?php include __DIR__ . "/../layout/footer.html"; ?>
</body>

</html>