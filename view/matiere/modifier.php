
<div class="cont">
	<h1>Modifier matiere</h1>
	
	<form action="modifierMat" method="POST">
		<input type="text" name="id" value="<?php echo $matr['id'];  ?>" readonly><br>
		LIBELLE:<input type="text" name="libelle" value="<?php echo $matr['libelle'];  ?>" required><br>
		<button  name="modifier">Modifier</button>
	</form>

	</div>
