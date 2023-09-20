<?php

 require_once("../autoload.php");
 $unique_id = $_SESSION['unique_id']; //Not neccessary
 
 $incoming_id = $_POST['incoming_id'];
 $outgoing_id  = $_POST['outgoing_id'];
 $msg = $_POST['message'];


 $chat = new Chat($DB,$incoming_id,$outgoing_id,$msg);
 $insert_chat = $chat->insert_chat();

 if($insert_chat)
 {
    echo "successful";
 }

