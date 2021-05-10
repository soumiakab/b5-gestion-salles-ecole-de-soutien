<?php

class Salle{
    private  $id;
    private  $libelle;
    private  $capacite;

    public function setId($id){
        $this->id = $id;
    }

    public function setLibelle($lbl){
        $this->libelle = $lbl;
     }

     public function setCapacite($capacite){
        $this->capacite = $capacite;
     }

     public function ajouterS()
    {
        $qr='insert into salle (libelle,capacite) values("'.$this->libelle.'",'.$this->capacite.')';
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

     public function modifierS()
    {
        // die($id.$libelle.$effectif);
     
        $qr="UPDATE salle SET libelle='$this->libelle',capacite=".(int)$this->capacite." WHERE id=".(int)$this->id;

        $res=DB::connect()->prepare($qr);
        if($res->execute()){
            return 'ok';
        }
        else{
            return 'no ip';
        }
    }

     public function edit()
    {
        $qr='Select * from salle where id='.(int)$this->id;
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


     public function supprimer()
    {
            $qr="delete from salle where id=".(int)$this->id;
            $res=DB::connect()->query($qr);
    }


}



?>