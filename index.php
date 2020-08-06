<?php
ob_start();
session_start(); //aktifkan pemeriksaan session 
if (empty($_SESSION['username'])) { 
	//cek apakah user yang mengakses halaman ini sudah mendapatkan session pengenal sewaktu login
	header('location:login.php'); //jika tidak, arahkan untuk login
}
?>
<!DOCTYPE html>
<html lang="id">
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>Administrator</title>
		<link href="//netdna.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css" rel="stylesheet">
		<link href="//cdn.datatables.net/1.10.21/css/jquery.dataTables.min.css" rel="stylesheet">

	</head>
	<body>
		<div class="container">
			<nav class="navbar navbar-default" role="navigation">
				<!-- Brand and toggle get grouped for better mobile display -->
				<div class="navbar-header">
					<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
						<span class="sr-only">Toggle navigation</span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
					</button>
					<a class="navbar-brand" href="#">Home</a>
				</div>
			
				<div class="collapse navbar-collapse navbar-ex1-collapse">
					<ul class="nav navbar-nav navbar-right">
						<li class="dropdown">
							<a href="#" class="dropdown-toggle" data-toggle="dropdown">Action <b class="caret"></b></a>
							<ul class="dropdown-menu">
								<li><a href="#">Profil</a></li>
								<li><a href="logout.php">Logout</a></li>
							</ul>
						</li>
					</ul>
				</div><!-- /.navbar-collapse -->
			</nav>
			<div class="panel panel-primary">
				  <div class="panel-heading">
						<h3 class="panel-title">Administrator Panel</h3>
				  </div>
				  <div class="panel-body">
				  		<!-- jika session pengenal ada tampilkan -->
						Selamat Datang <?php echo $_SESSION['username']; ?><hr>
						<a href="pdf.php" class="btn btn-warning">Cetak PDF</a>
						<a href="excel.php" class="btn btn-warning">Download Excel</a>
						<form action="import-excel.php" method="POST" enctype="multipart/form-data" >
			                <table class="table">
			                    <tr>
			                        <td width="25%">Pilih File</td>
			                        <td width="75%"><input type="file" name="file_excel" maxlength="255"/></td>
			                    </tr>
			                    <tr>
			                        <td><a href="example.xls" class="btn btn-info">Download Template</a> </td>
			                        <td>
			                            <button class="btn btn-success" type="submit" name="upload" value="upload">Import</button>
			                        </td>
			                    </tr>
			                    <tr>
			                        <td></td>
			                        <td></td>
			                    </tr>
			                </table>
			                <br />
			                
			            </form>
						<br>
						<table id="myTable" class="display" style="width:100%">
					        <thead>
					            <tr>
					                <th>No</th>
					                <th>Username</th>
					                <th>Password</th>
					            </tr>
					        </thead>
					        <tbody>
					            <?php 
					            	include 'koneksi.php';
					            	$no=1;
					            	foreach ($db->query("SELECT * FROM user") as $list) {
					            		echo "<tr>
								                <td>$no</td>
								                <td>$list[username]</td>
								                <td>$list[password]</td>
								            </tr>";
								    $no++;
					            	}
					            ?>
					        </tbody>
					    </table>
				  </div>
			</div>
		</div>
		
		<!-- jQuery -->
		<script src="//code.jquery.com/jquery.js"></script>
		<script src="//cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script>
		<!-- Bootstrap JavaScript -->
		<script src="//netdna.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
		<script>
			$(document).ready( function () {
			    $('#myTable').DataTable();
			} );
		</script>
	</body>
</html>