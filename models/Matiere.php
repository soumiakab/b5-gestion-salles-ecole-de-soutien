<?php

class Matiere{
    private  $id;
    private  $libelle;

    public function setId($id){
        $this->id = $id;
    }

    public function setLibelle($lbl){
        $this->libelle = $lbl;
     }

    public function ajouterM()
    {
        $qr='insert into matiere (libelle) values("'.$this->libelle.'")';
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

    public function modifierM()
    {
        // die($id.$libelle.$effectif);
     
        $qr="UPDATE matiere SET libelle='$this->libelle' WHERE id=".(int)$this->id;

        $res=DB::connect()->prepare($qr);
        if($res->execute()){
            return 'ok';
        }
        else{
            return 'no ip';
        }
    }


    public function supprimer()
    {
        $qr="delete from matiere where id=".(int)$this->id;
        $res=DB::connect()->query($qr);
    }

    public function edit()
    {
        $qr='Select * from matiere where id='.(int)$this->id;
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