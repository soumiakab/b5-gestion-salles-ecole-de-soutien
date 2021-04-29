<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<meta name="description" content="">
	<meta name="author" content="">
	<link rel="icon" href="images/favicon.ico">
	<title>Exel-gestion</title>

    <!-- Bootstrap core CSS -->
    <link href="http://localhost/brief5-exel-gestion-salles/dist/css/bootstrap.min.css" rel="stylesheet">
    
    <!-- Icons -->
    <link href="http://localhost/brief5-exel-gestion-salles/css/font-awesome.css" rel="stylesheet">
    
    <!-- Custom styles for this template -->
    <link href="http://localhost/brief5-exel-gestion-salles/css/style.css" rel="stylesheet">
    
</head>
<body>


<div class=" h-100 d-flex justify-content-center align-items-center">
					<div class="col-md-8 offset-md-2"> 
								<div class="card text-center bg-default col-sm-12 h-100 d-table">
									<div class="card-header">
										<ul class="nav nav-tabs card-header-tabs">
											<li class="nav-item"><a class="nav-link active" href="#">Login</a></li>
											<li class="nav-item"><a class="nav-link" href="#">Inscription</a></li>
										</ul>
									</div>
									<div class="card-block">
									<form action="connection" method="POST">
										email:<input type="text" name="email"/><br>
										passw:<input type="password" name="passw"/><br>
										<label><?php if( isset( $_SESSION["login_erreur"])) { echo $_SESSION["login_erreur"];}?> </label><br>



										<button  name="connection">connection</button>
									</form>
										
									</div>
							</div>
</div>
</div>
    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js" integrity="sha384-b/U6ypiBEHpOf/4+1nzFpr53nxSS+GLCkfwBdFNTxtclqqenISfwAzpKaMNFNmj4" crossorigin="anonymous"></script>
    <script src="http://localhost/brief5-exel-gestion-salles/dist/js/bootstrap.min.js"></script>
    
    <script src="http://localhost/brief5-exel-gestion-salles/js/chart.min.js"></script>
    <script src="http://localhost/brief5-exel-gestion-salles/js/chart-data.js"></script>
    <script src="http://localhost/brief5-exel-gestion-salles/js/easypiechart.js"></script>
    <script src="http://localhost/brief5-exel-gestion-salles/js/easypiechart-data.js"></script>
    <script src="http://localhost/brief5-exel-gestion-salles/js/bootstrap-datepicker.js"></script>
    <script src="http://localhost/brief5-exel-gestion-salles/js/custom.js"></script>
   
    
    <script src="https://cdnjs.cloudflare.com/ajax/libs/tether/1.4.0/js/tether.min.js" integrity="sha384-DztdAPBWPRXSA/3eYEEUWrWCy7G5KFbe8fFjk5JAIxUYHKkDx6Qin1DkWx51bBrb" crossorigin="anonymous"></script>
    
	</body>
</html>