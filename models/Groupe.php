<?php

class Groupe{

     public function ajouterG($liblle,$effictif)
    {
        $qr='insert into groupe (libelle,effectif) values("'.$liblle.'",'.$effictif.')';
        $res=DB::connect()->prepare($qr);
        if($res->execute()){
            return 'ok';
        }
        else{
            return 'no';
        }

    }

     public function afficherG()
    {
        $qr='select * from groupe order by id DESC';
        $res=DB::connect()->prepare($qr);
        $res->execute();
            return $res->fetchAll();
            $res->close();
            $res=null;
        // else{
            return 'no';
        // }
    }

     public function modifierG($id,$libelle,$effectif)
    {
        // die($id.$libelle.$effectif);
     
        $qr="UPDATE groupe SET libelle='$libelle',effectif=".(int)$effectif." WHERE id=".(int)$id;

        $res=DB::connect()->prepare($qr);
        if($res->execute()){
            return 'ok';
        }
        else{
            return 'no ip';
        }
    }

     public function edit($id)
    {
        $qr='Select * from groupe where id='.(int)$id;
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


     public function supprimer($id)
    {
            $qr="delete from groupe where id=".(int)$id;
            $res=DB::connect()->query($qr);
    }


}



?>