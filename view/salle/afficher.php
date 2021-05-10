<?php  include_once __DIR__.'/../includes/header.php';?>


<div>
    <form method="post" action="ajouterS" id="form">
    <div class="card-block">
        <h3 class="card-title">Ajouter SAlle(s)</h3>
        <div class="row">
            <div class="col-lg-4 col-sm-4">
                <div class="input-group mb-3">
                    <div class="input-group-prepend">
                        <span class="input-group-text" id="basic-addon1">Libelle</span>
                    </div>
                    <input type="text" class="form-control" id="libelle" name="libelle1" placeholder="Libelle???" aria-label="Libelle" aria-describedby="basic-addon1">
                </div>
            </div>
            <div class="col-lg-4 col-sm-4">
                <div class="input-group mb-3">
                    <div class="input-group-prepend">
                        <span class="input-group-text">Capacite</span>
                    </div>
                    <input type="text" class="form-control" placeholder="Capacite??" id="capacite" aria-label="Capacite" name="capacite1">
                    
                </div>
            </div>
            <div class="col-lg-1 col-sm-3">
                <div class="input-group mb-3">
                    
                <button type="button" class="form-control" onclick="add()">+</button>                  
                </div>
            </div>
            <div class="col-lg-3 col-sm-4">
                <div class="input-group mb-3">
                     <input type="text" value="1" name="cmp" hidden id="cmp">
                    <input type="submit" class="form-control" value="ajouter">
                    
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
      <th scope="col">capacite</th>
      <th scope="col">action</th>
    </tr>
  </thead>
  <tbody>
<?php $i=0; foreach($tab as $row){?>
    <tr>
    <form action="supprimer" method="post">
      <td><input type="text" value="<?php echo $row['id'] ?>" name="<?php echo "id".$i; ?>" id="<?php echo "id".$i; ?>" style="display:none;"><span id="<?php echo "idv".$i; ?>" ><?php echo $row['id']?></span></td>
      <td><input type="text" value="<?php echo $row['libelle'] ?>" name="<?php echo "libelle".$i; ?>" id="<?php echo "libelle".$i; ?>" style="display:none;"><span id="<?php echo "libellev".$i; ?>" ><?php echo $row['libelle']?></span></td>
      <td><input type="text" value="<?php echo $row['capacite'] ?>" name="<?php echo "capacite".$i; ?>" id="<?php echo "capacite".$i; ?>" style="display:none;"><span id="<?php echo "capacitev".$i; ?>" ><?php echo $row['capacite']?></span></td>
      <td>
        <ul class="list-inline m-0">
            <li class="list-inline-item">
                <button class="btn btn-primary btn-sm rounded-0" type="submit" data-toggle="tooltip" id="<?php echo "edit".$i; ?>" onclick='f(<?php echo $i; ?>)' data-placement="top" title="Edit" name="edit"><i class="fa fa-edit"></i></button>
            </li>
            <li class="list-inline-item">
                <button class="btn btn-danger btn-sm rounded-0" type="submit" data-toggle="tooltip" id="<?php echo "delete".$i; ?>"  data-placement="top" title="Delete" name="delete"><i class="fa fa-trash"></i></button>
            </li>
            <li class="list-inline-item">
            <input type="hidden" value="<?php echo $i;?>" name="num">
                <button class="btn btn-success btn-sm rounded-0" type="submit" data-toggle="tooltip" id="<?php echo "save".$i; ?>" data-placement="top" title="save" name="save" onclick='this.form.action="modifierS";' style="display:none;"><i class="fa fa-save"></i></button>
            </li>
            <li class="list-inline-item">
                <button class="btn btn-danger btn-sm rounded-0" type="submit" data-toggle="tooltip" id="<?php echo "cancel".$i; ?>"  onclick='f2(<?php echo $i; ?>)' data-placement="top" title="CANCEL" name="CANCEL" style="display:none;"><i class="fa fa-times"></i></button>
            </li>
        </ul>
    </td>
    </form>
    </tr>
    <?php $i++; }?>
  </tbody>
</table>


</div>
<script>

var i = 1;
function add(){
    var form = document.getElementById("form");
    var libelle = document.getElementById("libelle");
    var capacite = document.getElementById("capacite");

    if( libelle.value!='' && capacite.value!='')
    {
        i++;
        form.innerHTML+='<div class="row"><div class="col-lg-6 col-sm-4"><div class="input-group mb-3"><div class="input-group-prepend"><span class="input-group-text" id="basic-addon1">Libelle</span></div><input type="text" id="libelle" class="form-control" name="libelle'+i+'" placeholder="Libelle???" aria-label="Libelle" value="'+libelle.value+'" aria-describedby="basic-addon1"></div></div><div class="col-lg-6 col-sm-4"><div class="input-group mb-3"><div class="input-group-prepend"><span class="input-group-text">Capacite</span></div><input type="text" class="form-control" placeholder="capacite??" aria-label="capacite" value="'+capacite.value+'" name="capacite'+i+'"></div></div></div>';
        document.getElementById('cmp').value=i;
    }else
    {
        alert('Tous les champs sont obligatoires.');
    }
    
}

function f(i){

    event.preventDefault();
    // document.getElementById("id"+i).style.display="block";
    // document.getElementById("idv"+i).style.display="none";
    document.getElementById("libelle"+i).style.display="block";
    document.getElementById("libellev"+i).style.display="none";
    document.getElementById("capacite"+i).style.display="block";
    document.getElementById("capacitev"+i).style.display="none";
    document.getElementById("edit"+i).style.display="none";
    document.getElementById("delete"+i).style.display="none";
    document.getElementById("save"+i).style.display="block";
    document.getElementById("cancel"+i).style.display="block";

}

function f2(i){

event.preventDefault();
document.getElementById("libelle"+i).style.display="none";
document.getElementById("libelle"+i).value=document.getElementById("libellev"+i).innerHTML;
document.getElementById("libellev"+i).style.display="block";
document.getElementById("capacite"+i).style.display="none";
document.getElementById("capacite"+i).value=document.getElementById("capacitev"+i).innerHTML;
document.getElementById("capacitev"+i).style.display="block";
document.getElementById("edit"+i).style.display="block";
document.getElementById("delete"+i).style.display="block";
document.getElementById("save"+i).style.display="none";
document.getElementById("cancel"+i).style.display="none";

}

</script>
<?php  include_once __DIR__.'/../includes/footer.php';?>
