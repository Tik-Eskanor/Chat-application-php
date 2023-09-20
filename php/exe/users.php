<?php
require_once("../autoload.php");

$my_unique_id = $_SESSION['unique_id'];

$user_list = new User_list($DB, $my_unique_id);
$lists = $user_list->get_list();

$data = "";

foreach($lists as $list)
{
   $img = $list['image'];
   $fname= $list['fname'];
   $lname= $list['lname'];
   $unique_id= $list['unique_id'];
   $status = $list['status'];

   $outgoing_msg_id = "";
   $result = "";

   $messages = $user_list->get_msg($unique_id, $my_unique_id);
   if(is_array($messages))
   {
    foreach($messages as $message)
    {
       $outgoing_msg_id = $message['outgoing_id'];
       $result = $message['msg'];
    }
   }
   else 
   {
       $result = "No message available";
   }
   ($outgoing_msg_id == $my_unique_id) ? $you = "you:" :$you = "";
   (strlen($result) > 28 ) ? $msg = substr($result, 0 ,28)."..." : $msg = $result;
   ($status == "offline") ? $status = "offline" : $status = "";
   
   $data .= "
                <a href ='chat.php?unique_id=$unique_id'>
                    <div class='content'>
                        <img src='php/exe/images/$img' alt=''>
                        <div class='details'>
                            <span>$fname $lname</span>
                            <p>$you $msg</p>
                        </div>
                    </div>
                    <div class='status-dot $status'><i class='fas fa-circle'></i></div>
                </a>
            ";
}

echo $data;
