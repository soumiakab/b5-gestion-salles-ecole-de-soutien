<?php

class Enseignant{

	private  $id;
    private  $nom;
    private  $prenom;
    private  $matiere;
    private  $user;

    public function setId($id){
        $this->id = $id;
    }

    public function setNom($nom){
        $this->nom = $nom;
     }

     public function setPrenom($prenom){
        $this->prenom = $prenom;
     }

	 public function setMatiere($matiere){
        $this->matiere = $matiere;
     }
	 public function setUser($user){
        $this->user = $user;
     }
     
function isertEns()
{
	$qr='insert into enseignant (nom,prenom,idmat,iduser) values("'.$this->nom.'","'.$this->prenom.'",'.$this->matiere.','.$this->user.')';
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