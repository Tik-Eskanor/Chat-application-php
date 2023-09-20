<?php

require_once("../autoload.php");

$fname = $_POST['fname'];
$lname = $_POST['lname'];
$email = $_POST['email'];
$pwd = $_POST['pwd'];
$pwd_r = $_POST['pwd_r'];
$image = $_FILES['image'];


$user = new User($DB,$fname,$lname,$email,$pwd,$pwd_r,$image);
$signup = $user->sign_up();

if($signup == true)
{
    $_SESSION['unique_id'] = $user->get_unique_id();
    echo "successful";
}
else 
{
    die("Error: Unable to Signup");
}
