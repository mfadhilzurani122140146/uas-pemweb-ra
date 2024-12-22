<?php
session_start();

// Menambahkan Content Security Policy


// Jika pengguna sudah login, arahkan ke valorant.php
if (isset($_SESSION['is_logged_in']) && $_SESSION['is_logged_in']) {
  header("Location: ./views/valorant.php");
  exit;
}
?>

<!DOCTYPE html>
<html lang="id">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Valorant Web</title>
  <link rel="stylesheet" href="./public/css/index.css" />
  <script src="./public/js/script.js" defer></script>
</head>

<body>
  <header class="header">
    <div class="container">
      <a href="index.php">Valorant Website</a>
    </div>
  </header>

  <nav class="navigation">
    <ul>
      <?php if (!isset($_SESSION['is_logged_in']) || !$_SESSION['is_logged_in']): ?>
        <li><a href="./views/register.php">Daftar</a></li>
        <li><a href="./views/login.php">Masuk</a></li>
      <?php endif; ?>
      <li><a href="./views/valorant.php">Data Valorant</a></li>
    </ul>
  </nav>

  <main class="main-content">
    <section class="about">
      <h2>Tentang Valorant Web</h2>
      <p>
        Valorant Web adalah platform yang membantu pemain melacak statistik
        permainan, agen favorit, dan perkembangan peringkat mereka.
        Bergabunglah untuk menunjukkan kemampuan Anda dan terhubung dengan
        pemain lain!
      </p>
    </section>

    <section class="features">
      <h2>Fitur</h2>
      <ul>
        <li>Melacak statistik dan perkembangan pemain.</li>
        <li>Mendaftar akun untuk menyimpan data secara aman.</li>
      </ul>
    </section>

    <section class="get-started">
      <h2>Mulai Sekarang</h2>
      <p>
        Baik Anda pemain santai atau penggemar kompetitif, Valorant Web
        menawarkan berbagai alat untuk meningkatkan pengalaman bermain Anda.
      </p>
      <a href="register.html" class="cta-button">Daftar Sekarang</a>
    </section>
  </main>

  <footer class="footer">
    <p>&copy; 2024 Valorant Web. Semua hak dilindungi.</p>
  </footer>
</body>

</html>