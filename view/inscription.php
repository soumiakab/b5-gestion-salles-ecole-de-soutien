<?php
if (isset($_POST['sub'])){

    $us=new UserController();
    $us->inscription();
}


?>




<div class="cont">
		<h1>inscription</h1>
	<form action="" method="POST">
		nom:<input type="text" name="nom" required><br>
		prenom:<input type="text" name="prenom" required><br>
		email:<input type="email" name="email" required/><br>
		mot de passe:<input type="password" name="passw" required/><br>
		type:<div>Enseignant<input type="radio" name="type" value="enseignant" checked> admin<input type="radio" name="type" value="admin"></div><br>

		<button  name="sub">Enregistrer</button>
		<a href="login">connexion</a>
	</form>

	</div>