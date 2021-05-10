<?php

session_start();
include_once __DIR__.'/define.php';

spl_autoload_register('autoload');
function autoload($class_name)
{
    $array_paths=array('database/',
    'classes/','models/','controllers/');

    $parts=explode('\\',$class_name);

    $name=array_pop($parts);
    // die($class_name);
    foreach($array_paths as $path){
        $file=sprintf($path.'%s.php',$name);
        if(is_file($file)){

            include_once $file;
        }
    }

}



?>