<?php

class Cours{
    private $salle;
    private $group;
    private $date;
    private $dure;
    private $idcr;
    private $ens;
    public function setSalle($salle){
        $this->salle = $salle;
    }

    public function setGroup($group){

        $this->group = $group;
    }

    public function setDate($date){
        $this->date= $date;
    }

    public function setDure($dure){
        $this->dure = $dure;
    }

    public function setIdcr($idcr){
        $this->idcr = $idcr;
    }
    public function setens($ens){
        $this->ens = $ens;
    }
     public function ajouterR()
    {
        $this->ens=$_SESSION['id_ens'];
        $qr='insert into cours (date,dure,id_ens,id_grp,id_salle) values("'.$this->date.'","'.$this->dure.'",'.$this->ens.','.$this->group.','.$this->salle.')';
        $res=DB::connect()->prepare($qr);
        if($res->execute()){
            return 'ok';
        }
        else{
            return 'no';
        }

    }

     public function afficherR()
    {
        $this->ens=$_SESSION['id_ens'];
        $qr='select c.*,g.libelle as "libelleG",s.libelle as "libelleS" from cours c,groupe g ,salle s where c.id_grp=g.id and c.id_salle=s.id and c.id_ens='.$this->ens.' order by id_cours DESC';
        $res=DB::connect()->prepare($qr);
        $res->execute();
            return $res->fetchAll();
            $res->close();
            $res=null;
        // else{
            return 'no';
        // }
    }

     public function modifierReserv()
    {
        $qr="UPDATE cours SET date='$this->date',dure='$this->dure',id_grp=".$this->group.",id_salle=".$this->salle." WHERE id_cours=".(int)$this->idcr;

        $res=DB::connect()->prepare($qr);
        $res->execute();
    }

 public function supprimer()
    {

        $qr="delete from cours where id_cours=".(int)$this->idcr;
        $res=DB::connect()->query($qr);
    }

    public function getOne()
    {
        $qr="select * from cours where id_cours=".(int)$this->idcr;
        $res=DB::connect()->query($qr);
        return $res->fetchAll();
    }

    public function filtreD()
    {
        $qr="select dure from cours where date='$this->date' and id_grp=$this->group
        union
        select dure from cours where date='$this->date' and id_ens=$this->ens";
        $rs=DB::connect()->query($qr);

        if( $rw=$rs->fetchAll(PDO::FETCH_COLUMN, 0)){
            $row=array_values($rw);
            return $row;
         
        }
        else{
            return $row=[];
        }
        
       

    } 

    public function filtreS()
    {
        $qr1="select effectif from groupe where id=$this->group";
        $rs=DB::connect()->query($qr1);
        $r=$rs->fetch(PDO::FETCH_NUM);
        $rs=null;

        $effectif=(int)$r[0];

        $qr="select id as salleId from salle where capacite >= $effectif
        except
        select id_salle from cours where date='$this->date' and dure='$this->dure'";

        $rs=DB::connect()->query($qr);
        
        if( $row=$rs->fetchAll(PDO::FETCH_COLUMN, 0)){
            $rs=null;
            return $row;
         
        }
        else{
            return $row=[];
            $rs=null;
             
            }
     





    }


}



?>