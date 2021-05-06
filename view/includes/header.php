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
	<div class="container-fluid" id="wrapper">
		<div class="row">
			<nav class="sidebar col-xs-12 col-sm-4 col-lg-3 col-xl-2">
				<h1 class="site-title"><a href="#"><em class="fa fa-rocket"></em> Exel</a></h1>
													
				<a href="#menu-toggle" class="btn btn-default" id="menu-toggle"><em class="fa fa-bars"></em></a>
				<ul class="nav nav-pills flex-column sidebar-nav">
					<li class="nav-item"><a class="nav-link" href="http://localhost/brief5-exel-gestion-salles/salle/afficherS"><em class="fa fa-calendar-o"></em> Salles</a></li>
					<li class="nav-item"><a class="nav-link" href="http://localhost/brief5-exel-gestion-salles/groupe/afficherGrp"><em class="fa fa-bar-chart"></em> Groupes</a></li>
					<li class="nav-item"><a class="nav-link" href="http://localhost/brief5-exel-gestion-salles/matiere/afficherMat"><em class="fa fa-hand-o-up"></em> Matiere</a></li>
					<li class="nav-item"><a class="nav-link" href="#"><em class="fa fa-pencil-square-o"></em> Enseignants</a></li>
					<li class="nav-item"><a class="nav-link" href="#"><em class="fa fa-clone"></em> Demmande d ajout </a></li>
				</ul>
			</nav>
			<main class="col-xs-12 col-sm-8 col-lg-9 col-xl-10 pt-3 pl-4 ml-auto">
				<header class="page-header row justify-center">
					<div class="col-md-6 col-lg-8" >
						<h1 class="float-left text-center text-md-left">Espace Admin</h1>
					</div>
					<div class="dropdown user-dropdown col-md-6 col-lg-4 text-center text-md-right"><a class="btn btn-stripped dropdown-toggle" href="#" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
						<div class="username mt-1">
							<h4 class="mb-1"><?php if(isset($_SESSION['user_name'])){ echo $_SESSION['user_name'];}?></h4>
							<h6 class="text-muted"> Admin</h6>
						</div>
						</a>
						<div class="dropdown-menu dropdown-menu-right" style="margin-right: 1.5rem;" aria-labelledby="dropdownMenuLink">
						     <a class="dropdown-item" href="http://localhost/brief5-exel-gestion-salles/user/deconnecter"><em class="fa fa-power-off mr-1"></em> Se deconnecter</a></div>
					</div>
					<div class="clear"></div>
				</header>