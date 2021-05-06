<?php

class User{

     static public function connectionU($data)
     {
		$qr="SELECT * FROM user WHERE email LIKE '".$data['email']."'";
		$res=DB::connect()->query($qr);
		if($row=$res->fetch(PDO::FETCH_ASSOC)){
			
			if($row['motpass']==$data['motpass']){
				
				$_SESSION['user_name']=$row['nom'];
				if($row['type']=="admin")
				{
					$_SESSION['admin']=true;

				}
				else{

					$qr="SELECT * FROM enseignant WHERE iduser=".$row['id'];
      				$rs=DB::connect()->query($qr);
					$rw=$rs->fetch(PDO::FETCH_ASSOC);
					$_SESSION['id_ens']=$rw['id_ens'];
				}
				return 'ok';
			}
			else{
				
				$_SESSION['login_erreur']="Password is not valid!";
				return "erreur";
			}
		 }
		 else{
			$_SESSION['login_erreur']="no account with this email";
			return "erreur";
		 }

     }


     
	static public function ajouterU($data)

	{	
		$stmt=DB::connect()->prepare('insert into user(nom,prenom,email,motpass,type) values (:nom,:prenom,:email,:motpass,:type)');
		$stmt->bindParam(':nom',$data['nom']);
		$stmt->bindParam(':prenom',$data['prenom']);
		$stmt->bindParam(':email',$data['email']);
		$stmt->bindParam(':motpass',$data['motpass']);
		$stmt->bindParam(':type',$data['type']);

		if($stmt->execute()){
			return 'ok';
		}
		else{
			return 'erreur';
		}
		$stmt->close();
		$stmt=null;
	}


	static public function modifierU()
     {


     }

	 static public function supprimerU()
     {


     }


public function lastOne()
{
	$qr="SELECT id FROM user ORDER BY id DESC LIMIT 1";
	$res=DB::connect()->query($qr);
	$row=$res->fetch(PDO::FETCH_ASSOC);
	return $row;		
}

function isertEns($user,$mat)
{
	$qr='insert into enseignant (idmat,iduser) values('.$mat.','.$user.')';
	$res=DB::connect()->prepare($qr);
	if($res->execute()){
		return 'ok';
	}
	else{
		return 'no';
	}
}




}


?>