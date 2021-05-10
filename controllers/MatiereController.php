<?php

class MatiereController{
    
    public function index()
    {
        header("location:http://localhost/brief5-exel-gestion-salles/matiere/afficherMat");
    }

    public function ajouterMat()
    {
        if(isset($_POST['cmp'])){
            $i=(int)$_POST['cmp'];
            while(isset($_POST['libelle'.$i]) && !empty($_POST['libelle'.$i])){
                $mt=new Matiere();
                $mt->setLibelle($_POST['libelle'.$i]);
                $mt->ajouterM();
                $i--;
            }
        }
            header("location:afficherMat");
    }

    public function afficherMat()
    {
        $mat=new Matiere();
        $tab=$mat->afficherM();
        require __DIR__.'/../view/matiere/afficher.php';
        
    }
    public function modifierMat()
    {
        if(isset($_POST['save'])){
            $i=$_POST['num'];
            $mat=new Matiere();
            $mat->setId($_POST['id'.$i]);
            $mat->setLibelle($_POST['libelle'.$i]);
            $matr=$mat->modifierM();
            header("location:afficherMat");
            if($matr=='ok'){
                 echo $matr;
            }
            else{
                echo $matr;
            }
        }
    }

    public function supprimer()
    {
        if(isset($_POST['delete'])){
            $mat=new Matiere();
            $i=$_POST['num'];
            $mat->setId($_POST['id'.$i]);
            $mat->supprimer();
            header("location:afficherMat");
        }
       
    }

    public function amodf()
    {
        if(isset($_POST['edit'])){    
            $mat=new Matiere(); 
            $mat->setId($_POST['id']);
            $matr=$mat->edit();
            require __DIR__.'/../view/matiere/modifier.php';
        }
    }
}
?>