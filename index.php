<?php
require 'autoload.php';
$parametrs=explode('/',$_GET['page']);
// $parametrs[0]='controllers'
// $parametrs[1]='action'
if(isset($parametrs[0]) & !empty($parametrs[0]) )
{
    $controller=ucfirst($parametrs[0]);
    $file='controllers/'.$controller.'controller'.'.php';
    if(file_exists($file)){
        $pages=['Salle','Groupe','Matiere'];
        if(in_array($controller,$pages))
        {
            if(!isset($_SESSION['user_name']) || empty($_SESSION['user_name'])){
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
                    if (isset($params[2]) & !empty($params[2])) 
                    {
                        $obj->$action($params[2]);
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
    require_once "controller/HomeController.php";
	$obj=new HomeController();
	$obj->index();
}
?>