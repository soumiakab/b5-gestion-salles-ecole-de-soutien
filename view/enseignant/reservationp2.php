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
			<form action="filterSalle" name="form" onsubmit="f()" method="post" >
            <div>
            <input type="text" name="groupe" value="<?php echo $groupe; ?>" hidden>
            <input type="text" name="date" value="<?php echo $date; ?>" hidden></div>
			<div class="form-group">
          			<label>Dure:</label>
        			<select class="form-control" name="dure" >
					  <option value="0" selected>Selectionner la dure du seance:</option>
					  <option value="08:00-10:00" <?php if(in_array("08:00-10:00",$dures)){echo "disabled";} ?>>08:00-10:00</option>
					  <option value="10:00-12:00" <?php if(in_array("10:00-12:00",$dures)){echo "disabled";} ?>>10:00-12:00</option>
					  <option value="12:00-14:00" <?php if(in_array("12:00-14:00",$dures)){echo "disabled";} ?>>12:00-14:00</option>
					  <option value="14:00-16:00" <?php if(in_array("14:00-16:00",$dures)){echo "disabled";} ?>>14:00-16:00</option>
					  <option value="16:00-18:00" <?php if(in_array("16:00-18:00",$dures)){echo "disabled";} ?>>16:00-18:00</option>
					</select>
      			</div>
                <button name="submitD">ok</button>
			</form>
		</div>
    </div>
    </div>
	</div>
    <script>
        function f(){
            var dure = document.form.dure.value;
            if(dure == "0"){
                event.preventDefault();
                alert("veuillez choisir");

            }
        }
</script>
  <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
   <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>
</html>