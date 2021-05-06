<?php

class EnseignantController{

    public function index()
    {
        header("location:http://localhost/brief5-exel-gestion-salles/enseignant/afficher");
    }

    public function ajouterResrv()
    {
       $resv=new Reservation();
       $rv= $resv->ajouterR($_POST['salle'],$_POST['groupe'],$_POST['date'],$_POST['dure']);
        header("location:afficher");

    }

    public function afficher()
    {

        $resv=new Reservation();
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
        $reser=new Reservation();
        $r=$reser->getOne($id);
        $grp=new Groupe();
        $tabg=$grp->afficherG();
        require __DIR__.'/../view/enseignant/upreservationp1.php';

    }

    public function supprimerReserv($id)
    {
        $r=new Reservation();
        $r->supprimer($id);
       
        header("location:http://localhost/brief5-exel-gestion-salles/enseignant/afficher");

    }

    public function amodf()
    {
    }

    public function filterDure()
    {
        
        if(isset($_POST['date'])){
                $drs=new Reservation();
                //idens_from session
                $groupe=$_POST['groupe'];
                $date=$_POST['date'];
                $id=$_SESSION['id_ens'];
                $dures=$drs->filtreD($groupe,$date,$id);
           
        } 
        require __DIR__.'/../view/enseignant/reservationp2.php';
    }

    



    public function filterSalle()
    {
        $date=$_POST['date'];
        $groupe=$_POST['groupe'];
        $dure=$_POST['dure'];
        $sl=new Reservation();
        $salles=$sl->filtreS($_POST['groupe'],$_POST['date'],$_POST['dure']);
        $salle=new Salle();
        $tab=$salle->afficherSome($salles);
       
        require __DIR__.'/../view/enseignant/reservationp3.php';

    }

}













?>