<?php 
session_start(); //aktifkan pemeriksaan session
session_destroy(); //kosongkan semua tanda pengenal session
header('location:login.php'); //redirect ke halaman login
?>