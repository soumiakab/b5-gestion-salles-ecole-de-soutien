<?php

class Salle{

     public function ajouterS($liblle,$cap)
    {
        $qr='insert into salle (libelle,capacite) values("'.$liblle.'",'.$cap.')';
        $res=DB::connect()->prepare($qr);
        if($res->execute()){
            return 'ok';
        }
        else{
            return 'no';
        }

    }

     public function afficherS()
    {
        $qr='select * from salle order by id DESC';
        $res=DB::connect()->prepare($qr);
        $res->execute();
            return $res->fetchAll();
            $res->close();
            $res=null;
        // else{
            return 'no';
        // }
    }
    public function afficherSome($data)
    {
        if(empty($data)){
            $data[0]=0;
        }
        $qr="select * from salle where id in (".implode(',',$data).")";
        $res=DB::connect()->query($qr);
        if($row=$res->fetchAll(PDO::FETCH_ASSOC)){
            return $row;
        }
        else{
            return $row=[];
        }
        $res=null;

    }

     public function modifierS($id,$libelle,$capacite)
    {
        // die($id.$libelle.$effectif);
     
        $qr="UPDATE salle SET libelle='$libelle',capacite=".(int)$capacite." WHERE id=".(int)$id;

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
        $qr='Select * from salle where id='.(int)$id;
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
            $qr="delete from salle where id=".(int)$id;
            $res=DB::connect()->query($qr);
    }


}



?>