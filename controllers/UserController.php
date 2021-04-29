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





        public function afficherUtil()
        {
           $utilisateurs=User::affichU();

           return $utilisateurs;
        }


        public function inscription()
        {

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
               
                    echo $res;
                }
                else{
                    echo $res;
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
                header("location:http://localhost/brief5-exel-gestion-salles/salle/afficherS");
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




    }



 ?>