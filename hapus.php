<?php
include 'koneksi.php';
$id = $_GET['id'];
$conn->query("DELETE FROM pertandingan WHERE id=$id");
echo "<script>alert('Pertandingan dihapus!'); window.location='index.php';</script>";
?>
