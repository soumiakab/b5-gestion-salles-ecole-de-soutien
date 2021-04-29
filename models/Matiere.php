<?php

class Matiere{

    public function ajouterM($liblle)
    {
        $qr='insert into matiere (libelle) values("'.$liblle.'")';
        $res=DB::connect()->prepare($qr);
        if($res->execute()){
            return 'ok';
        }
        else{
            return 'no';
        }

    }
    public function afficherM()
    {
        $qr='select * from matiere order by id DESC';
        $res=DB::connect()->prepare($qr);
        $res->execute();
            return $res->fetchAll();
            $res->close();
            $res=null;
       
    }

    public function modifierM($id,$libelle)
    {
        // die($id.$libelle.$effectif);
     
        $qr="UPDATE matiere SET libelle='$libelle' WHERE id=".(int)$id;

        $res=DB::connect()->prepare($qr);
        if($res->execute()){
            return 'ok';
        }
        else{
            return 'no ip';
        }
    }


    public function supprimer($id)
    {
        $qr="delete from matiere where id=".(int)$id;
        $res=DB::connect()->query($qr);
    }

    public function edit($id)
    {
        $qr='Select * from matiere where id='.(int)$id;
        $res=DB::connect()->query($qr);
        
       if( $row=$res->fetch(PDO::FETCH_ASSOC)){
        return $row;
        
       }
       else{
           die('fgg');
       }
        
           $res->close();
           $res=null;
      
    }


}



?>