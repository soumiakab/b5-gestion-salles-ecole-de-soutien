<?php

class User{

	private  $id;
    private  $email;
    private  $userName;
    private  $passWord;
    private  $type;

    public function setId($id){
        $this->id = $id;
    }

    public function setEmail($email){
        $this->email = $email;
     }

     public function setUserName($userName){
        $this->userName = $userName;
     }

	 public function setPassWord($passWord){
        $this->passWord = $passWord;
     }
	 public function setType($type){
        $this->type = $type;
     }
      public function connectionU()
     {
		$qr="SELECT * FROM user WHERE email LIKE '".$this->email."'";
		$res=DB::connect()->query($qr);
		if($row=$res->fetch(PDO::FETCH_ASSOC)){
			
			if($row['motpass']==$this->passWord){
				
				$_SESSION['user_name']=$row['nom_util'];
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


     
	 public function ajouterU()

	{
		$stmt=DB::connect()->prepare('insert into user(email,nom_util,motpass,type) values (:email,:nom_util,:motpass,:type)');
		$stmt->bindParam(':email',$this->email);
		$stmt->bindParam(':nom_util',$this->userName);
		$stmt->bindParam(':motpass',$this->passWord);
		$stmt->bindParam(':type',$this->type);

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
	$qr='insert into enseignant (nom,prenom,idmat,iduser) values('.$mat.','.$user.')';
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