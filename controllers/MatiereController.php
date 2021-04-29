<?php

class MatiereController{
    
    public function index()
    {
        header("location:http://localhost/brief5-exel-gestion-salles/matiere/afficherMat");
    }

    public function ajouterMat()
    {
       if(isset($_POST['libelle'])){
        $mt=new Matiere();
           $mt->ajouterM($_POST['libelle']);
            header("location:afficherMat");
           if($mt=='ok'){
                echo "<script>alert('ajouter');</script>";

           }
           else{
               echo "<script>alert('".$mt."');</script>";
           }

       }
    }

    public function afficherMat()
    {
        $mat=new Matiere();
        $tab=$mat->afficherM();
        require __DIR__.'/../view/matiere/afficher.php';
        
    }
    public function modifierMat()
    {
        if(isset($_POST['id'])){
            $mat=new Matiere();
            $matr=$mat->modifierM($_POST['id'],$_POST['libelle']);
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
            $mat->supprimer($_POST['id']);
            header("location:afficherMat");
        }
       
    }

    public function amodf()
    {
        if(isset($_POST['edit'])){    
            $mat=new Matiere(); 
            $matr=$mat->edit($_POST['id']);
            require __DIR__.'/../view/matiere/modifier.php';
        }
    }

}
?>