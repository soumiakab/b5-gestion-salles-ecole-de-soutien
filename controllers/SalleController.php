<?php

class SalleController{

    public function index()
    {
        header("location:http://localhost/brief5-exel-gestion-salles/salle/afficherS");    }

    public function ajouterS()
    {
        if(isset($_POST['cmp'])){
            $i=(int)$_POST['cmp'];
                while(isset($_POST['libelle'.$i]) && !empty($_POST['libelle'.$i])){
                        $salle=new Salle();
                        $salle->setLibelle($_POST['libelle'.$i]);
                        $salle->setCapacite($_POST['capacite'.$i]);
                        $s=$salle->ajouterS();
                        $i--;
                }
            }
        header("location:afficherS");
    }

    public function afficherS()
    {
        $salle=new Salle();
        $tab=$salle->afficherS();
        require __DIR__.'/../view/salle/afficher.php';
        
    }
    public function modifierS()
    {
        if(isset($_POST['save'])){
            $i=$_POST['num'];
            $salle=new Salle();
            $salle->setId($_POST['id'.$i]);
            $salle->setLibelle($_POST['libelle'.$i]);
            $salle->setCapacite($_POST['capacite'.$i]);
            $msalle=$salle->modifierS();
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
            $i=$_POST['num'];
            $salle=new Salle();
            $salle->setId($_POST['id'.$i]);
            $salle->supprimer();
            header("location:afficherS");
        }
       
    }

    public function amodf()
    {
        if(isset($_POST['edit'])){    
            $salle=new Salle();
            $salle->setId($_POST['id']);
            $sal=$salle->edit();
            require __DIR__.'/../view/salle/modifier.php';
        }
    }

}

?>