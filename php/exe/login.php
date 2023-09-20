<?php
require_once("../autoload.php");

$email = $_POST['email'];
$pwd = $_POST['pwd'];

$user = new Login($DB,$email,$pwd);
$login =  $user->login();

if($login === true)
{
    $_SESSION['unique_id'] = $user->get_unique_id();
    echo "successful";
}
else 
{
    die("Error: Unable to Login");
}
