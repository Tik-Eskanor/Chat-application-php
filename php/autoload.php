<?php
declare(strict_types = 1);
//start session
session_start();

//autoloader
spl_autoload_register('autoload');
function autoload($classname)
{
   include("classes/".$classname.".php");
}

//Data base object
$DB = new Database();


