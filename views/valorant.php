<?php
include '../session/session.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Data Valorant</title>
  <link rel="stylesheet" href="../public/css/style.css" />
  <script src="../public/js/valorant.js" defer></script>
</head>

<body>
  <header>
    <p>Welcome, <strong><?php echo htmlspecialchars($_SESSION['user_name']); ?></strong>!</p>
    <p>IP Address: <strong><?php echo htmlspecialchars($_SESSION['ip_address']); ?></strong></p>
    <p>Browser: <strong><?php echo htmlspecialchars($_SESSION['browser']); ?></strong></p>
    <a href="../controllers/logout.php" class="logout-button">Logout</a>
  </header>

  <h1>Data Valorant</h1>

  <form id="valorantForm" method="POST">
    <label>
      Player Name:
      <input type="text" name="player_name" id="player_name" required />
    </label>
    <label>
      Rank:
      <input type="text" name="rank" id="rank" required />
    </label>
    <label>
      Favorite Agent:
      <input type="text" name="favorite_agent" id="favorite_agent" required />
    </label>
    <button type="submit" class="add-valorant-btn" disabled>Add Data</button>
  </form>

  <h2>Valorant Player Data</h2>
  <table id="valorantTable">
    <thead>
      <tr>
        <th>Player Name</th>
        <th>Rank</th>
        <th>Favorite Agent</th>
        <th>Created At</th>
        <th>Aksi</th>
      </tr>
    </thead>
    <tbody></tbody>
  </table>

  <h1>Kelola State dengan Cookie dan Browser Storage</h1>

  <div style="
  display: flex;
  justify-content: center;
  align-items: center;
  ">
  <a href="tes.html" style="
    text-decoration: none;
    color: white;
    background-color: #007bff;
    padding: 15px 30px;
    border-radius: 5px;
    font-size: 16px;
    font-weight: bold;
    transition: background-color 0.3s ease;
  ">
    Click Disini untuk Cookie & Browser Playground
  </a>
</div>
</body>

</html>