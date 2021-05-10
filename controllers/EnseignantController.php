<?php

class EnseignantController{

    public function index()
    {
        header("location:http://localhost/brief5-exel-gestion-salles/enseignant/afficher");
    }

    public function ajouterResrv()
    {
       $resv=new Cours();
       $resv->setSalle($_POST['salle']);
       $resv->setGroup($_POST['groupe']);
       $resv->setDate($_POST['date']);
       $resv->setDure($_POST['dure']);
       $resv->setIdcr( $_SESSION['id_resr']);
       if(isset( $_SESSION['id_resr']) && !empty( $_SESSION['id_resr'])){
        $resv->modifierReserv();
        unset($_SESSION['id_resr']);
        unset($_SESSION['dure_resr']);
        unset($_SESSION['id_sl_resr']);
        unset($_SESSION['libelle_sl_resr']);
       }
       else{
       
        $rv= $resv->ajouterR();
       }
        header("location:afficher");

    }

    public function afficher()
    {

        $resv=new Cours();
        $tabc=$resv->afficherR();
        require __DIR__.'/../view/enseignant/gestionReserv.php';
        
    }

    public function reserver()
    {
        $grp=new Groupe();
        $tabg=$grp->afficherG();
        require __DIR__.'/../view/enseignant/reservationp1.php';

    }


    public function modifierReserv($id)
    {
        $reser=new Cours();
        $reser->setIdcr($id);
        $r=$reser->getOne();
        $_SESSION['id_resr']=$r[0]['id_cours'];
        $_SESSION['dure_resr']=$r[0]['dure'];
        $_SESSION['id_sl_resr']=$r[0]['id_salle'];
        $sl=new Salle();
        $sl->setId($r[0]['id_salle']);
        $salle=$sl->edit();
        $_SESSION['libelle_sl_resr']=$salle['libelle'];
        $grp=new Groupe();
        $tabg=$grp->afficherG();
        require __DIR__.'/../view/enseignant/reservationp1.php';

    }

    public function supprimerReserv($id)
    {
        $r=new Cours();
        $r->setIdcr($id);
        $r->supprimer();
       
        header("location:http://localhost/brief5-exel-gestion-salles/enseignant/afficher");

    }

    public function amodf()
    {

    }

    public function filterDure()
    {
        
        if(isset($_POST['date'])){
             $groupe=$_POST['groupe'];
             $date=$_POST['date'];
            $id=$_SESSION['id_ens'];
                $drs=new Cours();
                $drs->setens($id);
                $drs->setGroup($groupe);
                $drs->setDate($date);
                $dures=$drs->filtreD();
           
        } 
        require __DIR__.'/../view/enseignant/reservationp2.php';
    }

    



    public function filterSalle()
    { 
        $date=$_POST['date'];
        $groupe=$_POST['groupe'];
        $dure=$_POST['dure'];
        $sl=new Cours();
        $sl->setDure($_POST['dure']);
        $sl->setGroup($_POST['groupe']);
        $sl->setDate($_POST['date']);
        $salles=$sl->filtreS();
        $salle=new Salle();
        $tab=$salle->afficherSome($salles);
        
        require __DIR__.'/../view/enseignant/reservationp3.php';

    }

}

?>