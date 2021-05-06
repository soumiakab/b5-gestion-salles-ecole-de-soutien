<?php


$dures = [];
function listDure($date,$grpid,$ens) {
	global $dures;
	$dures = [];
	$dure=new Reservation();
	$dures=$dure->filtreD($grpid,$date,$ens);
	die("trty");
}

if(isset($_POST['date'])){
	die("yes");
	listDure($_POST['date'],$_POST['groupe'],1);
}

?>


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
	<div class="container">
		<br>
		<div class="row justify-content-end">
			<div class="dropdown">
				  <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
				    user name
				  </button>
				  <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
				    <a class="dropdown-item" href="#">Deconnecter</a>
				  </div>
			</div>
		</div><br><br>
		<div class="jumbotron">
			<iframe name="frame" style="display:none;"></iframe>
			<form action="ajouterResrv" method="post" target="frame">
				<div class="form-group">
          			<label>Groupe:</label>
        			<select class="form-control" name="groupe">
                    <option selected>Selectionner un groupe:</option>

                    <?php foreach($tabg as $row){?>
					  <option value="<?php echo $row['id']?>"><?php echo $row['libelle']?></option>
                      <?php }?>
					</select>
      			</div>
				<div class="form-group">
          			<label>Date:</label>
        			 <input type="date" class="form-control" name="date" onchange="this.form.submit()">
					 <a  href="http://localhost/brief5-exel-gestion-salles/enseignant/filterDure" id="link" hidden></a>
      			</div>
      			<div class="form-group">
          			<label>Dure:</label>
        			<select class="form-control" name="dure">
					  <option selected>Selectionner la dure du seance:</option>
					  <option value="08:00-10:00" <?php if(in_array("08:00-10:00",$dures)){echo "disabled";} ?> >08:00-10:00</option>
					  <option value="10:00-12:00">10:00-12:00</option>
					  <option value="12:00-14:00">12:00-14:00</option>
					  <option value="14:00-16:00">14:00-16:00</option>
					  <option value="16:00-18:00">16:00-18:00</option>
					</select>
      			</div>
				<div class="form-group">
          			<label>Salle:</label>
        			<select class="form-control" name="salle">
					  <option selected>Selectionner une salle:</option>
                      <?php foreach($tab as $row){?>
					  <option value="<?php echo $row['id']?>"><?php echo $row['libelle']?></option>
					     <?php } ?>
					</select>
      			</div>
				  <div class="row">
      				 <div class="col align-self-end">
      					<button class="btn btn-primary" name="reserver">Reserver</button>
      					
      				 </div>
      			</div>
			</form>
		</div>
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
    </tr>
   <?php } ?>
  </tbody>
</table>
	</div>



<script>

function f(){
	var a=document.querySelector("#link");
	a.click();
}

</script>
  <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
   <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>
</html>