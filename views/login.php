<?php
session_start();




if (isset($_SESSION['is_logged_in']) && $_SESSION['is_logged_in']) {
  header("Location: valorant.php");
  exit;
}
?>

<!DOCTYPE html>
<html lang="id">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Login - Valorant Web</title>
  <link rel="stylesheet" href="../public/css/style.css" />
  <link rel="stylesheet" href="../public/css/index.css" />
  <script src="../public/js/login.js" defer></script>
</head>

<body>
  <header class="header">
    <div class="container">
      <a href="../index.php">Valorant Website</a>
    </div>
  </header>

  <nav class="navigation">
    <ul>
      <li><a href="register.php">Daftar</a></li>
      <li><a href="login.php">Masuk</a></li>
      <li><a href="valorant.php">Data Valorant</a></li>
    </ul>
  </nav>

  <h1>Login Akun</h1>
  <form id="loginForm">
    <label>
      Email:
      <input type="email" name="email" id="email" required />
      <span id="emailError" style="color: red; font-size: 12px"></span>
    </label>
    <label>
      Password:
      <input type="password" name="password" id="password" required />
      <span id="passwordError" style="color: red; font-size: 12px"></span>
    </label>
    <button type="submit">Masuk</button>
  </form>
</body>

</html>