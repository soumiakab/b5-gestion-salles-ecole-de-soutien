<?php  include_once __DIR__.'/../includes/header.php';?>


<div>
    <form method="post" action="ajouterGrp" id="form">
    <div class="card-block">
        <h3 class="card-title">Ajouter Groupe(s)</h3>
        <div class="row">
            <div class="col-lg-3 col-sm-4">
                <div class="input-group mb-3">
                    <div class="input-group-prepend">
                        <span class="input-group-text" id="basic-addon1">Libelle</span>
                    </div>
                    <input type="text" id="libelle" class="form-control" name="libelleg0" placeholder="Libelle???" aria-label="Libelle" aria-describedby="basic-addon1">
                </div>
            </div>
            <div class="col-lg-3 col-sm-4">
                <div class="input-group mb-3">
                    <div class="input-group-prepend">
                        <span class="input-group-text">Effectif</span>
                    </div>
                    <input type="text" class="form-control" id="effectif" placeholder="Effectif??" aria-label="Effectif" name="effectifg0">
                    
                </div>
            </div>
            <div class="col-lg-3 col-sm-4">
                <div class="input-group mb-3">
                    
                    <input type="submit" class="form-control" value="ajouter">
                    
                </div>
            </div>
            <div class="col-lg-3 col-sm-4">
                <div class="input-group mb-3">
                    
                <button type="button" class="btn-circle" onclick="add()">+</button>                  
                </div>
            </div>
           
        </div>
    </div>
    </form>
    <table class="table">
  <thead>
    <tr>
      <th scope="col">id</th>
      <th scope="col">libelle</th>
      <th scope="col">effectif</th>
      <th scope="col">action</th>
    </tr>
  </thead>
  <tbody>
<?php foreach($tab as $row){?>
    <tr>
      <td><?php echo $row['id']?></td>
      <td><?php echo $row['libelle']?></td>
      <td><?php echo $row['effectif']?></td>
      <td>
        <!-- Call to action buttons -->
        <ul class="list-inline m-0">
            <li class="list-inline-item">
            <form action="amodf" method="post">
                 <input type="hidden" value="<?php echo $row['id'] ?>" name="id">
                <button class="btn btn-success btn-sm rounded-0" type="submit" data-toggle="tooltip" data-placement="top" title="Edit" name="edit"><i class="fa fa-edit"></i></button>
            </form>
            </li>
            <li class="list-inline-item">
            <form action="supprimer" method="post">
                <input type="hidden" value="<?php echo $row['id'] ?>" name="idg">
                <button class="btn btn-danger btn-sm rounded-0" type="submit" data-toggle="tooltip" data-placement="top" title="Delete" name="delete"><i class="fa fa-trash"></i></button>
            </form>
            </li>
        </ul>
    </td>
    </tr>
    <?php }?>
  </tbody>
</table>


</div>

<script>

var i = 0;
function add(){
    var form = document.getElementById("form");
    var libelle = document.getElementById("libelle");
    var effectif = document.getElementById("effectif");

    if( libelle.value!='' && effectif.value!='')
    {
        i++;
        form.innerHTML+='<div class="row"><div class="col-lg-6 col-sm-4"><div class="input-group mb-3"><div class="input-group-prepend"><span class="input-group-text" id="basic-addon1">Libelle</span></div><input type="text" id="libelle" class="form-control" name="libelleg'+i+'" placeholder="Libelle???" aria-label="Libelle" value="'+libelle.value+'" aria-describedby="basic-addon1"></div></div><div class="col-lg-6 col-sm-4"><div class="input-group mb-3"><div class="input-group-prepend"><span class="input-group-text">Effectif</span></div><input type="text" class="form-control" id="effectif" placeholder="Effectif??" aria-label="Effectif" value="'+effectif.value+'" name="effectifg'+i+'"></div></div></div>';
          
    }else
    {
        alert('Tous les champs sont obligatoires.');
    }
    
}

</script>
<?php  include_once __DIR__.'/../includes/footer.php';?>










