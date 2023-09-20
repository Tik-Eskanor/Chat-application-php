<?php

 require_once("../autoload.php");
 $unique_id = $_SESSION['unique_id']; //Not neccessary

 $incoming_id = $_POST['incoming_id'];
 $outgoing_id  = $_POST['outgoing_id'];

 $chat = new Chat($DB,$incoming_id,$outgoing_id);
 $get_chat = $chat->get_chat();

 $output = "";
 if(is_array($get_chat))
 {
    foreach($get_chat as $chats)
    {
       if($chats['outgoing_id'] === $outgoing_id)
       {
           $output .= "
                       <div class='chat outgoing'>
                        <div class='details'>
                         <p>$chats[msg]</p>
                        </div>
                       </div>
                     ";
       }
       else 
       {
           $output.= "
                       <div class='chat incoming'>
                        <img src='php/exe/images/$chats[image]' alt=''>
                        <div class='details'>
                         <p>$chats[msg]</p>
                        </div>
                       </div>
                   ";
           
       }
    }
 }


 echo $output;
 
