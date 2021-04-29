
<div class="cont">
	<h1>Modifier groupe</h1>
	
	<form action="modifierGrp" method="POST">
		<input type="text" name="id" value="<?php echo $group['id'];  ?>" readonly><br>
		LIBELLE:<input type="text" name="libelle" value="<?php echo $group['libelle'];  ?>" required><br>
		EFECTIF:<input type="text" name="effectif" value="<?php echo $group['effectif'];  ?>" required><br>
		<button  name="modifier">Modifier</button>
	</form>

	</div>
