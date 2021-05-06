<?php

class Reservation{

     public function ajouterR($salle,$group,$date,$dure)
    {
        $i=$_SESSION['id_ens'];
        $qr='insert into cours (date,dure,id_ens,id_grp,id_salle) values("'.$date.'","'.$dure.'",'.$i.','.$group.','.$salle.')';
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
        $idens=$_SESSION['id_ens'];
        $qr='select c.*,g.libelle as "libelleG",s.libelle as "libelleS" from cours c,groupe g ,salle s where c.id_grp=g.id and c.id_salle=s.id and c.id_ens='.$idens.' order by id_cours DESC';
        $res=DB::connect()->prepare($qr);
        $res->execute();
            return $res->fetchAll();
            $res->close();
            $res=null;
        // else{
            return 'no';
        // }
    }

     public function modifierR($id,$libelle,$effectif)
    {
        
    }

     public function edit($id)
    {
      
      
    }


     public function supprimer($id)
    {
        $qr="delete from cours where id_cours=".(int)$id;
        $res=DB::connect()->query($qr);
    }
    public function getOne($id)
    {
        $qr="select * from cours where id_cours=".(int)$id;
        $res=DB::connect()->query($qr);
        return $res->fetchAll();
    }

    public function filtreD($grpid,$date,$ens)
    {
        $qr="select dure from cours where date='$date' and id_grp=$grpid
        union
        select dure from cours where date='$date' and id_ens=$ens";
        $rs=DB::connect()->query($qr);

        if( $rw=$rs->fetchAll(PDO::FETCH_COLUMN, 0)){
            $row=array_values($rw);
            return $row;
         
        }
        else{
            return $row=[];
        }
        
       

    } 

    public function filtreS($idg,$date,$dure)
    {
        $qr1="select effectif from groupe where id=$idg";
        $rs=DB::connect()->query($qr1);
        $r=$rs->fetch(PDO::FETCH_NUM);
        $rs=null;

        $effectif=(int)$r[0];

        $qr="select id as salleId from salle where capacite >= $effectif
        except
        select id_salle from cours where date='$date' and dure='$dure'";

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