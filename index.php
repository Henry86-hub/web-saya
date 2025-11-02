<?php include 'koneksi.php'; ?>
<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Hasil Pertandingan</title>
<style>
  body {
    background-color: #0f172a;
    color: white;
    font-family: 'Poppins', sans-serif;
    padding: 40px;
  }
  h1 {
    text-align: center;
    margin-bottom: 30px;
  }
  .match-card {
    background-color: #1e293b;
    border-radius: 12px;
    padding: 15px 25px;
    margin: 10px auto;
    width: 600px;
    display: flex;
    align-items: center;
    justify-content: space-between;
    box-shadow: 0 3px 10px rgba(0,0,0,0.4);
  }
  .team {
    display: flex;
    align-items: center;
    gap: 10px;
  }
  .team img {
    width: 28px;
    height: 28px;
  }
  .score-box {
    display: flex;
    gap: 6px;
    background-color: #334155;
    border-radius: 8px;
    padding: 4px 10px;
  }
  .score {
    background-color: #0f172a;
    border-radius: 6px;
    padding: 4px 8px;
    font-weight: bold;
  }
  .btn {
    background: #ef4444;
    border: none;
    padding: 5px 10px;
    border-radius: 6px;
    color: white;
    cursor: pointer;
    margin-left: 10px;
  }
  .btn-edit {
    background: #3b82f6;
  }
  a.add {
    display: block;
    margin: 20px auto;
    text-align: center;
    color: #60a5fa;
    text-decoration: none;
    font-weight: 600;
  }
</style>
</head>
<body>

<h1>⚽ Hasil Pertandingan</h1>
<a href="tambah.php" class="add">+ Tambah Pertandingan Baru</a>

<?php
$result = $conn->query("SELECT * FROM pertandingan ORDER BY id DESC");
while ($row = $result->fetch_assoc()) {
  echo "
  <div class='match-card'>
    <div class='team'>
      <span>{$row['tim_a']}</span>
      <img src='uploads/{$row['logo_a']}'>
    </div>
    <div class='score-box'>
      <span class='score'>{$row['skor_a']}</span>
      <span class='score'>{$row['skor_b']}</span>
    </div>
    <div class='team'>
      <img src='uploads/{$row['logo_b']}'>
      <span>{$row['tim_b']}</span>
    </div>
    <div>
      <a href='edit.php?id={$row['id']}' class='btn btn-edit'>Edit</a>
      <a href='hapus.php?id={$row['id']}' class='btn' onclick='return confirm(\"Hapus pertandingan ini?\")'>Hapus</a>
    </div>
  </div>";
}
?>
</body>
</html>
