<?php

spl_autoload_register(function($className)
{  
    $file = $_SERVER['DOCUMENT_ROOT'].PROJECT_SUBFOLDER.'/'.$className.'.php';
    $file = str_replace('\\','/',$file);
    if(file_exists($file))
    {
        require_once $file;
    }
    else {
        echo 'File:'.$file.' not found';
    }
});

?>
