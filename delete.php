<?php
include("./koneksi.php");

$get_kode_jadwal = $_GET['kode_jadwal'];
$query_delete_jadwal = "DELETE FROM Jadwal WHERE KodeJadwal = '$get_kode_jadwal'";
$execute_query_delete_jadwal = mysqli_query($koneksi, $query_delete_jadwal);

if ($execute_query_delete_jadwal) {
  echo "<script>alert('Data Jadwal Berhasil Dihapus!')</script>";
  echo "<script>window.location = 'index.php'</script>";
} else {
  echo "<script>alert('Data Gagal Dihapus!')</script>";
  echo "<script>window.location = 'index.php'</script>";
}
