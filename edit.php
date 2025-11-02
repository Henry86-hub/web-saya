<?php
include 'koneksi.php';
$id = $_GET['id'];
$data = $conn->query("SELECT * FROM pertandingan WHERE id=$id")->fetch_assoc();

if (isset($_POST['update'])) {
  $skor_a = $_POST['skor_a'];
  $skor_b = $_POST['skor_b'];
  $conn->query("UPDATE pertandingan SET skor_a='$skor_a', skor_b='$skor_b' WHERE id=$id");
  echo "<script>alert('Skor diperbarui!'); window.location='index.php';</script>";
}
?>
<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8">
<title>Edit Skor</title>
<style>
  body {
    background-color: #0f172a;
    color: white;
    font-family: 'Poppins', sans-serif;
    display: flex;
    justify-content: center;
    align-items: center;
    height: 100vh;
  }
  .form {
    background-color: #1e293b;
    padding: 30px;
    border-radius: 12px;
    width: 400px;
    box-shadow: 0 4px 15px rgba(0,0,0,0.4);
  }
  input[type=number] {
    width: 100%;
    padding: 10px;
    border: none;
    border-radius: 8px;
    margin-top: 10px;
    background-color: #334155;
    color: white;
  }
  button {
    margin-top: 15px;
    width: 100%;
    padding: 10px;
    background-color: #3b82f6;
    color: white;
    border: none;
    border-radius: 8px;
  }
</style>
</head>
<body>
<div class="form">
  <h2>Edit Skor</h2>
  <form method="post">
    <label>Skor A (<?= $data['tim_a'] ?>)</label>
    <input type="number" name="skor_a" value="<?= $data['skor_a'] ?>">

    <label>Skor B (<?= $data['tim_b'] ?>)</label>
    <input type="number" name="skor_b" value="<?= $data['skor_b'] ?>">

    <button type="submit" name="update">Update</button>
  </form>
</div>
</body>
</html>
