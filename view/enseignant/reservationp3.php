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
    <div class="row">
    <div class="col-3">
    <div class="list-group">
        <a href="afficher" class="list-group-item list-group-item-action " aria-current="true">
           Mes Reservation
        </a>
        <a href="#" class="list-group-item list-group-item-action active">Reserver une salle</a>
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
		<div class="jumbotron">
			<form action="ajouterResrv" name="form" onsubmit="f()" method="post" >
            <div>
            <input type="text" name="date" value="<?php echo $date; ?>" hidden>
            <input type="text" name="groupe" value="<?php echo $groupe; ?>" hidden>
            <input type="text" name="dure" value="<?php echo $dure; ?>" hidden>
            </div>
			<div class="form-group">
          			<label>Salle:</label>
        			<select class="form-control" name="salle" require>
					  <option value="0" selected disabled>Selectionner une salle:</option>
                      <?php foreach($tab as $row){?>
					  <option value="<?php echo $row['id']?>"><?php echo $row['libelle']?></option>
					     <?php } ?>
                         <option value="<?php if(isset($_SESSION['id_sl_resr']) && !empty($_SESSION['id_sl_resr'])){ echo $_SESSION['id_sl_resr'] ;} ?>" <?php if(isset($_SESSION['id_sl_resr']) && !empty($_SESSION['id_sl_resr'])){ echo "selected";}else{echo "disabled='true'";} ?>><?php if(isset($_SESSION['id_sl_resr'])){ echo  $_SESSION['libelle_sl_resr'];}?></option>
					</select>
      			</div>
				  <div class="row">
      				 <div class="col align-self-end">
      					<button class="btn btn-primary" name="reserver">Reserver</button>
      					
      				 </div>
      			</div>
			</form>
		</div>
    </div>
    </div>
	</div>
<script>
function f(){
    var salle = document.form.salle.value;
    var sl = document.form.salle.length;
    if(salle=="0" && sl>1){
        event.preventDefault();
        alert("veuillez choisir");

    }
    if(sl==1){
        event.preventDefault();
        alert("aucune salle n est disponible veuillez changer la date ou l heur");
    }
}
</script>
  <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
   <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>
</html>