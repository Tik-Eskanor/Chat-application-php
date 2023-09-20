<?php
require_once("../autoload.php");
$unique_id = $_SESSION['unique_id'];

$term  = $_POST['term'];
$user_list = new User_list($DB, $unique_id);
$lists = $user_list->search($term);


$data = "";

if(is_array($lists))
{
    foreach($lists as $list)
    {
       $img = $list['image'];
       $fname= $list['fname'];
       $lname= $list['lname'];
       $unique_id= $list['unique_id'];
    
       $data .= "
                    <a href ='chat.php?unique_id=$unique_id'>
                        <div class='content'>
                            <img src='php/exe/images/$img' alt=''>
                            <div class='details'>
                                <span>$fname $lname</span>
                                <p>this is test message</p>
                            </div>
                        </div>
                        <div class='status-dot'><i class='fas fa-circle'></i></div>
                    </a>
                ";
    }
}
else
{
    $data = "No user found related to your search";
}


echo $data;