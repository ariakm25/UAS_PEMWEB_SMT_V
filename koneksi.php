<?php
$koneksi = mysqli_connect("localhost", "root", "", "10518122_JADWAL");
if (!$koneksi) {
  die("Koneksi Database Gagal!");
}
