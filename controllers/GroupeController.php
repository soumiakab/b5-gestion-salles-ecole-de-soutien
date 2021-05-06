<?php

class GroupeController{

    public function index()
    {
        header("location:http://localhost/brief5-exel-gestion-salles/groupe/afficherGrp");
    }

    public function ajouterGrp()
    {
        $i=0;
        while(isset($_POST['libelleg'.$i])){
        $grp=new Groupe();
           $grp->ajouterG($_POST['libelleg'.$i],$_POST['effectifg'.$i]);
        //    $this->afficherGrp();
        $i++;
        }
        header("location:afficherGrp");

    }

    public function afficherGrp()
    {
        $grp=new Groupe();
        $tab=$grp->afficherG();
        require __DIR__.'/../view/groupe/afficher.php';
        
    }
    public function modifierGrp()
    {
        if(isset($_POST['id'])){
            $grp=new Groupe();
            $mgrp=$grp->modifierG($_POST['id'],$_POST['libelle'],$_POST['effectif']);
            header("location:afficherGrp");
            if($mgrp=='ok'){
                 echo $mgrp;
            }
            else{
                echo $mgrp;
            }
        }
    }

    public function supprimer()
    {
        if(isset($_POST['delete'])){
            $grp=new Groupe();
            $grp->supprimer($_POST['idg']);
            header("location:afficherGrp");
        }
       
    }

    public function amodf()
    {
        if(isset($_POST['edit'])){    
            $grp=new Groupe();
            $group=$grp->edit($_POST['id']);
            require __DIR__.'/../view/groupe/modifier.php';
        }
    }

}












?>