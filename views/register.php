<?php
session_start();




if (isset($_SESSION['is_logged_in']) && $_SESSION['is_logged_in']) {
  header("Location: valorant.php");
  exit;
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Register - Valorant Track</title>
  <link rel="stylesheet" href="../public/css/style.css" />
  <link rel="stylesheet" href="../public/css/index.css" />
  <script src="../public/js/script.js" defer></script>
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

  <h1>Daftar Akun</h1>

  <form id="userForm" method="POST" action="../process/process_user.php">
    <!-- Username -->
    <label>
      Username:
      <input type="text" name="username" id="username" required />
      <span id="usernameError" style="color: red; font-size: 12px"></span>
    </label>

    <!-- Email -->
    <label>
      Email:
      <input type="email" name="email" id="email" required />
      <span id="emailError" style="color: red; font-size: 12px"></span>
    </label>

    <!-- Password -->
    <label>
      Password:
      <input type="password" name="password" id="password" required />
      <span id="passwordError" style="color: red; font-size: 12px"></span>
    </label>

    <!-- Konfirmasi Password -->
    <label>
      Konfirmasi Password:
      <input type="password" name="confirm_password" id="confirm_password" required />
      <span id="confirmPasswordError" style="color: red; font-size: 12px"></span>
    </label>

    <!-- Terms and Conditions -->
    <div class="checkbox-label">
      <input type="checkbox" id="terms" /> Saya setuju dengan syarat dan
      ketentuan
    </div>

    <!-- Submit Button -->
    <button type="submit" class="sign-up-btn">Daftar</button>
  </form>

  <h2>Data Pengguna</h2>
  <table id="dataTable">
    <thead>
      <tr>
        <th>Nama</th>
        <th>Email</th>
      </tr>
    </thead>
    <tbody></tbody>
  </table>
</body>

</html>