<?php 
	include 'koneksi.php';
	$query = $db->query("SELECT * FROM user");
	while($list = $query->fetch_array()){
        $row    = array();
        $output = array();
        $row[]  = $list['id'];
        $row[]  = $list['username'];
        $row[]  = $list['password'];
        $data[] = $row;
        $output = array("data"=>$data);
	}

    echo json_encode($output);
?>