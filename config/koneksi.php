<?php

$servername = "localhost";
$database = "uinsi_2441919010";
$username = "root";
$password = "";

// buat koneksi database
$conn = mysqli_connect($servername,$username,$password,$database);

// cek koneksi

if (!$conn) {
    die("koneksi gagal".mysqli_connect_error());
}

?>