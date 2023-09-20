<?php
require_once("autoload.php");
if(isset($_SESSION['unique_id']))
{
    $unique_id = $_SESSION['unique_id'];
    $sql = "UPDATE users SET status = :offline WHERE unique_id = :unique_id";
    $stmt = $DB->pdo->prepare($sql);
    $update = $stmt->execute(['offline'=>"offline",'unique_id'=>$unique_id]);
    if($update)
    {
        unset($unique_id);
        session_destroy();
        header("location:../login.php");
    }
   
}
else
{
    header("location:../login.php");
}

