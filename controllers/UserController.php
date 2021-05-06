<?php

    class UserController{

        public function index()
        {
            require_once __DIR__.'/../view/home.php';
        }

        public function login()
        {
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
                $data=array(
                    'nom'=>$_POST['nom'],
                    'prenom'=>$_POST['prenom'],
                    'email'=>$_POST['email'],
                    'motpass'=>$_POST['passw'],
                    'type'=>$_POST['type']

                );
                $res=User::ajouterU($data);
                if($res== 'ok'){
               
                   $iduser=User::lastOne();
                   $ens=User::isertEns($iduser['id'],$mat);
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
            $data=array(
                'email'=>$_POST['email'],
                'motpass'=>$_POST['passw']

            );
            $res=User::connectionU($data);
            
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