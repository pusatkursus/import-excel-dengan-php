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

						<table id="myTable" class="display" style="width:100%">
					        <thead>
					            <tr>
					                <th>No</th>
					                <th>Username</th>
					                <th>Password</th>
					            </tr>
					        </thead>
					        <tbody>
					           
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
		<script type="text/javascript">
			//https://jsfiddle.net/1aw5cL4g/
			$(document).ready(function() {
		    	//load dari database
		    	var table = $('#myTable').DataTable( {
				    ajax: "data_json.php",

				});   
			    
			});
		</script>
	</body>
</html>

<?php
include 'MPDF57/mpdf.php';
$out = ob_get_contents();
ob_end_clean();
$mpdf = new mPDF('c','A4','P');
$css = "htmltopdf/MPDF57/mpdf.css";
// tentukan ukuran halaman dengan ukuran - Contoh 190mm lebar x 236mm tinggi
/*$mpdf=new mPDF('utf-8', array(216,160));*/
$mpdf->SetDisplayMode('fullpage');
//$stylesheet = file_get_contents($css);
$mpdf->WriteHTML($stylesheet,1);
$mpdf->WriteHTML($out);
$mpdf->Output();
?>