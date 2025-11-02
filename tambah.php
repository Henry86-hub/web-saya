<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Tambah Pertandingan</title>
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
  .form-container {
    background-color: #1e293b;
    padding: 30px;
    border-radius: 12px;
    width: 400px;
    box-shadow: 0 4px 15px rgba(0,0,0,0.4);
  }
  h2 {
    text-align: center;
    color: #60a5fa;
  }
  label {
    display: block;
    margin-top: 15px;
    font-weight: 500;
  }
  input[type=text],
  input[type=number],
  input[type=file] {
    width: 100%;
    padding: 8px;
    margin-top: 5px;
    border: none;
    border-radius: 8px;
    background-color: #334155;
    color: white;
  }
  button {
    margin-top: 20px;
    width: 100%;
    padding: 10px;
    border: none;
    border-radius: 8px;
    background-color: #3b82f6;
    color: white;
    font-weight: bold;
    cursor: pointer;
  }
  button:hover {
    background-color: #2563eb;
  }
  a {
    color: #93c5fd;
    text-decoration: none;
    display: block;
    text-align: center;
    margin-top: 15px;
  }
</style>
</head>
<body>
<div class="form-container">
  <h2>Tambah Pertandingan</h2>
  <form action="tambah.php" method="post" enctype="multipart/form-data">
    <label>Tim A</label>
    <input type="text" name="tim_a" required>

    <label>Logo A</label>
    <input type="file" name="logo_a" required>

    <label>Tim B</label>
    <input type="text" name="tim_b" required>

    <label>Logo B</label>
    <input type="file" name="logo_b" required>

    <label>Skor A</label>
    <input type="number" name="skor_a" min="0" required>

    <label>Skor B</label>
    <input type="number" name="skor_b" min="0" required>

    <button type="submit" name="simpan">Simpan</button>
  </form>
  <a href="index.php">← Kembali ke daftar pertandingan</a>
</div>

<?php
include 'koneksi.php';

if (isset($_POST['simpan'])) {
  $tim_a = $_POST['tim_a'];
  $tim_b = $_POST['tim_b'];
  $skor_a = $_POST['skor_a'];
  $skor_b = $_POST['skor_b'];

  $logo_a = $_FILES['logo_a']['name'];
  $logo_b = $_FILES['logo_b']['name'];

  move_uploaded_file($_FILES['logo_a']['tmp_name'], "uploads/" . $logo_a);
  move_uploaded_file($_FILES['logo_b']['tmp_name'], "uploads/" . $logo_b);

  $sql = "INSERT INTO pertandingan (tim_a, logo_a, tim_b, logo_b, skor_a, skor_b)
          VALUES ('$tim_a', '$logo_a', '$tim_b', '$logo_b', '$skor_a', '$skor_b')";
  $conn->query($sql);

  echo "<script>alert('Data berhasil disimpan'); window.location='index.php';</script>";
}
?>
</body>
</html>
