<?php

class Groupe{
    private  $id;
    private  $libelle;
    private  $effectif;

    public function setId($id){
        $this->id = $id;
    }

    public function setLibelle($lbl){
        $this->libelle = $lbl;
     }

     public function setEffectif($effectif){
        $this->effectif = $effectif;
     }
    public function ajouterG()
    {
        $qr='insert into groupe (libelle,effectif) values("'.$this->libelle.'",'.$this->effectif.')';
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

     public function modifierG()
    {
        $qr="UPDATE groupe SET libelle='$this->libelle',effectif=".(int)$this->effectif." WHERE id=".(int)$this->id;

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
        $qr='Select * from groupe where id='.(int)$this->id;
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
            $qr="delete from groupe where id=".(int)$this->id;
            $res=DB::connect()->query($qr);
    }


}



?>