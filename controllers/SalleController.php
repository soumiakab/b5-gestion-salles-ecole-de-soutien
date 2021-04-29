<?php

class SalleController{

    public function index()
    {
        header("location:http://localhost/brief5-exel-gestion-salles/salle/afficherS");    }

    public function ajouterS()
    {
       if(isset($_POST['libelle'])){
        $salle=new Salle();
           $s=$salle->ajouterS($_POST['libelle'],$_POST['capacite']);
            header("location:afficherS");
           if($s=='ok'){
                echo "<script>alert('ajouter');</script>";

           }
           else{
               echo "<script>alert('".$s."');</script>";
           }

       }
    }

    public function afficherS()
    {
        $salle=new Salle();
        $tab=$salle->afficherS();
        require __DIR__.'/../view/salle/afficher.php';
        
    }
    public function modifierS()
    {
        if(isset($_POST['id'])){
            $salle=new Salle();
            $msalle=$salle->modifierS($_POST['id'],$_POST['libelle'],$_POST['capacite']);
            header("location:afficherS");
            if($msalle=='ok'){
                 echo $msalle;
            }
            else{
                echo $msalle;
            }
        }
    }

    public function supprimer()
    {
        if(isset($_POST['delete'])){
            $salle=new Salle();
            $salle->supprimer($_POST['id']);
            header("location:afficherS");
        }
       
    }

    public function amodf()
    {
        if(isset($_POST['edit'])){    
            $salle=new Salle();
            $sal=$salle->edit($_POST['id']);
            require __DIR__.'/../view/salle/modifier.php';
        }
    }

}

?>