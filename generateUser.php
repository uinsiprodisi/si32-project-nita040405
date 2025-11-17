<?php
include 'config/koneksi.php';

$username = "admin";
$email = "admin@admin.com";
$password = password_hash("123456", PASSWORD_DEFAULT);
$nama_lengkap = "Administrator Website";

$query = "
           INSERT INTO users (username, email, password, nama_lengkap)
           VALUES ('$username', '$email', '$password', '$nama_lengkap')
           ";

if(mysqli_query($conn, $query)){
    echo "akun berhasil terbuat!";
} else{
    echo "gagal membuat akun: ", mysqli_error($conn);
}

?>