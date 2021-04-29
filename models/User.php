<?php

class User{

     static public function connectionU($data)
     {
		$qr="SELECT * FROM user WHERE email LIKE '".$data['email']."'";

		$res=DB::connect()->query($qr);
		session_start();
		if($row=$res->fetch(PDO::FETCH_ASSOC)){
			
			if($row['motpass']==$data['motpass']){
				
				
				$_SESSION['user_name']=$row['nom'];
				session_unset($_SESSION['login_erreur']);
				session_destroy($_SESSION['login_erreur']);
				return 'ok';
			}
			else{
				
				$_SESSION['login_erreur']="Password is not valid!";
				
			}
		 }
		 else{
			return "erreur";
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







}


?>