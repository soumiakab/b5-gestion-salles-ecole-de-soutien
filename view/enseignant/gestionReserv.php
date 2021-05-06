<!DOCTYPE html>
<html>
<head>
	   <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
	<title>reserv</title>
</head>
<body>
	<div class="container-fluid">
    <div class="row" style="margin-top:20px;">
    <div class="col-3">
    <div class="list-group" style="margin-top:20px;">
        <a href="#" class="list-group-item list-group-item-action active" aria-current="true">
           Mes Reservation
        </a>
        <a href="reserver" class="list-group-item list-group-item-action">Reserver une salle</a>
        <a href="#" class="list-group-item list-group-item-action">Mon compte</a>
    </div>
    </div>
    <div class="col-8">
    <div class="row justify-content-end">
			<div class="dropdown">
				  <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
				  <?php if(isset($_SESSION['user_name'])){ echo $_SESSION['user_name'];}?>
				  </button>
				  <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
				  <a class="dropdown-item" href="http://localhost/brief5-exel-gestion-salles/user/deconnecter">Deconnecter</a>
				  </div>
			</div>
		</div><br><br>
		<h2>Mes reservations</h2>
		<table class="table">
  		<thead>
    <tr>
      <th scope="col">id</th>
      <th scope="col">date</th>
      <th scope="col">dure</th>
      <th scope="col">ensg</th>
      <th scope="col">groupe</th>
      <th scope="col">salle</th>
      <th scope="col">action</th>
    </tr>
  </thead>
  <tbody>
  <?php foreach($tabc as $row){?>
    <tr>
      <th scope="row"><?php echo $row['id_cours']?></th>
      <td><?php echo $row['date']?></td>
      <td><?php echo $row['dure']?></td>
      <td><?php echo $row['id_ens']?></td>
      <td><?php echo $row['libelleG']?></td>
      <td><?php echo $row['libelleS']?></td>
      <td><a  href="http://localhost/brief5-exel-gestion-salles/enseignant/supprimerReserv/<?php echo $row['id_cours']?>" >supprimer</a><a  href="http://localhost/brief5-exel-gestion-salles/enseignant/modifierReserv/<?php echo $row['id_cours']?>" >modifier</a></td>
    </tr>
   <?php } ?>
  </tbody>
</table>
	
    </div>
	<div class="col-1"></div>
    </div>
	</div>

</script>
  <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
   <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>
</html>