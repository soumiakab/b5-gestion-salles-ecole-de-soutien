<?php

class GroupeController{

    public function index()
    {
        header("location:".URLR."/groupe/afficherGrp");
    }
    public function ajouterGrp()
    {
        if(isset($_POST['cmp'])){
        $i=(int)$_POST['cmp'];
            while(isset($_POST['libelleg'.$i]) && !empty($_POST['libelleg'.$i])){
                    $grp=new Groupe();
                    $grp->setLibelle($_POST['libelleg'.$i]);
                    $grp->setEffectif($_POST['effectifg'.$i]);
                    $grp->ajouterG();
                    $i--;
            }
        }
        header("location:".URLR."/groupe/afficherGrp");

    }

    public function afficherGrp()
    {
        $grp=new Groupe();
        $tab=$grp->afficherG();
        require __DIR__.'/../view/groupe/afficher.php';
        
    }
    public function modifierGrp()
    {
        if(isset($_POST['save'])){
            $i=$_POST['num'];
            $grp=new Groupe();
            $grp->setId($_POST['idg'.$i]);
            $grp->setLibelle($_POST['libelleg'.$i]);
            $grp->setEffectif($_POST['effectif'.$i]);
            $mgrp=$grp->modifierG();
            header("location:".URLR."/groupe/afficherGrp");
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
            $i=$_POST['num'];
            $grp=new Groupe();
            $grp->setId($_POST['idg'.$i]);
            $grp->supprimer();
            header("location:".URLR."/groupe/afficherGrp");
        }
       
    }

    public function amodf()
    {
        if(isset($_POST['edit'])){    
            $grp=new Groupe();
            $grp->setId($_POST['idg']);
            $group=$grp->edit();
            require __DIR__.'/../view/groupe/modifier.php';
        }
    }

}












?>