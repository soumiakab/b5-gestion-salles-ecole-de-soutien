<?php  include_once __DIR__.'/../includes/header.php';?>
<div class="cont">
	<h1>Modifier groupe</h1>
	
	<form action="modifiers" method="POST">
    <div class="card-block">
        <div class="row">
            <div class="col-lg-4 col-sm-4">
                <div class="input-group mb-3">
                    <div class="input-group-prepend">
                        <span class="input-group-text" id="basic-addon1">id</span>
                    </div>
                    <input type="text" class="form-control" name="id" value="<?php echo $sal['id'];  ?>"  placeholder="id???" aria-label="id" aria-describedby="basic-addon1" required><br>
                </div>
            </div>
           <div class="col-lg-4 col-sm-4">
                <div class="input-group mb-3">
                    <div class="input-group-prepend">
                        <span class="input-group-text" id="basic-addon1">Libelle</span>
                    </div>
                    <input type="text" class="form-control" name="libelle" value="<?php echo $sal['libelle'];  ?>"  placeholder="Libelle???" aria-label="Libelle" aria-describedby="basic-addon1" required><br>
                </div>
            </div>

            <div class="col-lg-4 col-sm-4">
                <div class="input-group mb-3">
                    <div class="input-group-prepend">
                        <span class="input-group-text" id="basic-addon1">Capacite</span>
                    </div>
                    <input type="text" class="form-control" name="capacite" value="<?php echo $sal['capacite'];  ?>"  placeholder="capacite???" aria-label="capacite" aria-describedby="basic-addon1" required><br>
                </div>
            </div>

            </div>
		<button  name="modifier">Modifier</button>
    </div>
    </form>

	</div>
    <?php  include_once __DIR__.'/../includes/footer.php';?>