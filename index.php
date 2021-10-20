<?php
function loadClass($class)
{
    require 'controller' . DIRECTORY_SEPARATOR . $class . '.class.php';
}
spl_autoload_register('loadClass'); 

$controllerFrontend = new FrontendController();

$controllerFrontend->HomePage();