<?php

    class UserController{

        public function index()
        {
            if(isset($_SESSION['admin']) && !empty($_SESSION['admin'])){
        
                header("location:http://localhost/brief5-exel-gestion-salles/salle/afficherS");
            }
            else{
                    header("location:http://localhost/brief5-exel-gestion-salles/enseignant");

            }
        }

        public function login()
        {
            if(isset($_SESSION['login_erreur'])){
            $err=$_SESSION['login_erreur'];
            unset($_SESSION['login_erreur']);}
            require_once __DIR__.'/../view/login.php';
        }

        public function inscription()
        {
            $matiere=new Matiere();
            $mat=$matiere->afficherM();
            require_once __DIR__.'/../view/inscription.php';
        }



        public function afficherUtil()
        {
           $utilisateurs=User::affichU();

           return $utilisateurs;
        }


        public function inscriptionConf()
        {
            $mat=$_POST['matiere'];
            if(isset($_POST['sub'])){
                $res= new User();
                $res->setEmail($_POST['email']);
                $res->setUserName($_POST['username']);
                $res->setPassWord($_POST['passw']);
                $res->setType($_POST['type']);
                $r=$res->ajouterU();
                if($r== 'ok'){
               
                   $user= new User();
                   $iduser=$user->lastOne();
                   $ens=new Enseignant();
                   $ens->setNom($_POST['nom']);
                   $ens->setPrenom($_POST['prenom']);
                   $ens->setMatiere($mat);
                   $ens->setUser($iduser['id']);
                   $ens->isertEns();
                   require_once __DIR__.'/../view/login.php';

                }
                else{
                    require_once __DIR__.'/../view/inscription.php';
                }


            }
       }


       public function connection()
       {
        if(isset($_POST['connection'])){
            $user=new User();
            $user->setEmail($_POST['email']);
            $user->setPassWord($_POST['passw']);
            $res=$user->connectionU();
            
            if($res== 'ok'){
                if(isset($_SESSION['admin']) && !empty($_SESSION['admin'])){
        
                header("location:http://localhost/brief5-exel-gestion-salles/salle/afficherS");
                }
                else{
                    header("location:http://localhost/brief5-exel-gestion-salles/enseignant");

                }
            }
            else{
                header("location:login");
            }
        }
       }
       public function deconnecter()
       {
           session_start();
           session_unset();
           session_destroy();
           header("location:http://localhost/brief5-exel-gestion-salles/user/login");
       }

       public function droit()
       {
        require_once __DIR__.'/../view/includes/404.php';

       }
    }



 ?>