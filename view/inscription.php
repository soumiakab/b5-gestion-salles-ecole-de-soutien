<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Bootstrap -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css" integrity="sha384-HSMxcRTRxnN+Bdg0JdbxYKrThecOKuH5zCYotlSAcp1+c8xmyTe9GYg1l9a69psu" crossorigin="anonymous">

  </head>
  <body>
<div class="container">

    <div class="jumbotron text-center text-white">
      <div class="row">
      <h1>Bienvenu A Excel</h1>
      </div>
       <div class="row">
        <em>Portail Administratif</em>
      </div>
    </div>
      <div class="well center-block text-center">
            <h3>inscription</h3>
	<form action="inscriptionConf" method="POST">
	<div class="form-group">
            <div class="input-group">
              <div class="input-group-addon">nom:</div>
            <input type="text"  name="nom" class="form-control" required>
            </div>
          </div>
		<div class="form-group">
            <div class="input-group">
              <div class="input-group-addon">prenom:</div>
            <input type="text"  name="prenom" class="form-control" required>
            </div>
          </div>
          <div class="form-group">
            <div class="input-group">
              <div class="input-group-addon">nom utilisateur:</div>
            <input type="text"  name="username" class="form-control" required>
            </div>
          </div>
		  <div class="form-group">
            <div class="input-group">
              <div class="input-group-addon">email:</div>
            <input type="email"  name="email" class="form-control" required>
            </div>
          </div>
		  <div class="form-group">
            <div class="input-group">
              <div class="input-group-addon">mot de passe:</div>
            <input type="password"  name="passw" class="form-control" required>
            </div>
          </div>
		  <div class="form-group">
            <div class="input-group">
			  <input type="radio" name="type" value="enseignant" checked hidden>
            </div>
          </div>
		  <div class="form-group">
            <div class="input-group">
              <div class="input-group-addon">matiere enseigner:</div>
			  <select class="form-control" name="matiere">
                    <option selected>Selectionner une metier:</option>

                    <?php foreach($mat as $row){?>
					  <option value="<?php echo $row['id']?>"><?php echo $row['libelle']?></option>
                      <?php }?>
					</select>
            </div>
          </div>
		  <div class="form-group">
            <button class="btn btn-primary" name="sub">S inscrire</button>
          </div>
          <div class="form-group">
          <a href="login">connexion</a>
          </div>
	</form>
    
      </div>

</div>
    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://code.jquery.com/jquery-1.12.4.min.js" integrity="sha384-nvAa0+6Qg9clwYCGGPpDQLVpLNn0fRaROjHqs13t4Ggj3Ez50XnGQqc/r8MhnRDZ" crossorigin="anonymous"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js" integrity="sha384-aJ21OjlMXNL5UyIl/XNwTMqvzeRMZH2w8c5cRVpzpU8Y5bApTppSuUkhZXN0VxHd" crossorigin="anonymous"></script>
  </body>
</html>