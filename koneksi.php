<?php 
$db = new mysqli('localhost','root','','latihan');
if ($db) {
	# code...
}else{
	echo "Connection Failed";
}
?>