<html>
<head>
<title>Form Login Pusat Kursus</title>
<!-- Bootstrap CSS -->
    <link href="//netdna.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="login.css">
</head>
<body>

<div class="container" style="margin-top: 100px;">
    <div class="row">
        <div class="col-md-4 col-md-offset-4">
            <div class="panel panel-primary">
                  <div class="panel-heading">
                        <h3 class="panel-title text-center">Panel Login</h3>
                  </div>
                  <div class="panel-body">
                        <form action="aksi_login.php" method="POST" role="form">
                           
                        
                            <div class="form-group">
                                <label for="">Username</label>
                                <input type="text" name="username" class="form-control" id="username" placeholder="username">
                            </div>
                        
                            <div class="form-group">
                                <label for="">Password</label>
                                <input type="password" name="password" class="form-control" id="password" placeholder="Password">
                            </div>
                        
                            <button type="submit" class="btn btn-block btn-primary">Login</button>
                        </form>
                  </div>
            </div>
        </div>
    </div>
</div>
   

    <!-- jQuery -->
    <script src="//code.jquery.com/jquery.js"></script>
    <!-- Bootstrap JavaScript -->
    <script src="//netdna.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
</body>
</html>