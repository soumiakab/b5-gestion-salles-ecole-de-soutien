<?php

class DB{
   	
	private	$servername='localhost';
	private	$db="dbExel";
	private	$username="root";
	private	$passw="";
	public $con;

	public static function connect()
	{
		
			// $this->con=new PDO("mysql:host=$this->servername;dbname=$this->db", $this->username,$this->passw); 

		$con=new PDO("mysql:host=localhost;dbname=dbexel","root",'');
		
		return $con;
	

	}

	 public function deconnect()
	{
			return $this->con = null;

	}
}



?>