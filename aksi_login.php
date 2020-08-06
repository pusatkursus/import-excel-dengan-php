<?php 
ob_start();
include 'koneksi.php';
$user = $_POST['username'];
$pass = md5($_POST['password']);
$sql = "SELECT * FROM user WHERE username='$user' AND password='$pass'";
// echo $sql;
// exit();
$cek = $db->query($sql);
//jika username dan password sesuai dengan di tabel user maka
if ($cek->num_rows > 0) {
	//berikan tanda pengenal pada user yang login
	session_start();
	$row = $cek->fetch_array();
	//tanda pengenal login
	$_SESSION['login'] =1;
	$_SESSION['username'] = $row['username'];
	header('location:index.php');

}else{
	//jika username dan password tidak sesuai, maka kembalikan kehalaman login
	header('location:login.php');

}
?>