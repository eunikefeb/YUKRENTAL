<?php
$koneksi = mysqli_connect("localhost","root","","yukrental");
// cek koneksi
if (!$koneksi){
  die("Error koneksi: " . mysqli_connect_errno());
}
?>