<?php

spl_autoload_register(function($className){

    $basepath = dirname(__FILE__).DIRECTORY_SEPARATOR;

    if (strpos($className, 'EasyTransac\\') !== 0)
        return;

    $className = str_replace('EasyTransac\\', '', $className);
    $classPath = $basepath.str_replace('\\', DIRECTORY_SEPARATOR, $className).'.php';

    if (file_exists($classPath))
        require_once($classPath);
});

?>
