<?php
require 'autoload.php';
if(isset($_GET['page']))
$parametrs=explode('/',$_GET['page']);
if(isset($parametrs[0]) & !empty($parametrs[0]) )
{
    // if (basename($_SERVER['PHP_SELF'])) {
    //     session_destroy();
    // }
    $controller=ucfirst($parametrs[0]);
    $file='controllers/'.$controller.'controller'.'.php';
    if(file_exists($file)){
        $pages=['Salle','Groupe','Matiere'];
        if(in_array($controller,$pages))
        {
            if((!isset($_SESSION['admin']) || empty($_SESSION['admin'])) && isset($_SESSION['id_ens'])){
                header("location:http://localhost/brief5-exel-gestion-salles/user/droit");
                return 0;

            }
            if(!isset($_SESSION['admin']) || empty($_SESSION['admin'])){
                header("location:http://localhost/brief5-exel-gestion-salles/user/login");
                return 0;

            }

        }

        $pages2=['Enseignant'];
        if(in_array($controller,$pages2))
        {
            if((!isset($_SESSION['id_ens']) || empty($_SESSION['id_ens'])) && isset($_SESSION['admin'])){
                header("location:http://localhost/brief5-exel-gestion-salles/user/droit");
                return 0;

            }

            if(!isset($_SESSION['id_ens']) || empty($_SESSION['id_ens'])){
                header("location:http://localhost/brief5-exel-gestion-salles/user/login");
                return 0;

            }

        }

        require_once $file;
        
        $controller=$controller.'Controller';
        if(class_exists($controller))
        {
            $obj=new $controller();
           
            if(isset($parametrs[1]) & !empty($parametrs[1]))
            { 
                $action=$parametrs[1]; 
                if(method_exists($obj,$action))
                {
                    if (isset($parametrs[2]) && !empty($parametrs[2])) 
                    {
                        $obj->$action($parametrs[2]);
                    }else
                    {

                        $obj->$action();
                    }
                }else
                {
                    http_response_code(404);
				    echo "<h1>this method doesn't exist</h1>";
                }

            }else
            {
                $action="index";
                $obj->$action();
            }
        }else
        {
            http_response_code(404);
            echo "<h1>this classe doesn't exist</h1>";
        }
        

    }else
    {
        http_response_code(404);
        echo "<h1>this page doesn't exist</h1>";
    }
}else
{
    require_once "controllers/UserController.php";
	$obj=new UserController();
	$obj->index();
}
?>