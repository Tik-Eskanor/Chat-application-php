<?php
 class Database
 {
     private string $DNS="mysql:host=localhost;dbname=chat_oop";
     private string $user="root";
     private string $pwd="";     
     public $pdo = null;

     public function __construct()
     {
         $this->pdo = new PDO($this->DNS,$this->user,$this->pwd);
         if(!$this->pdo)
         {
             echo "ERROR: Unable to make connection";
         }
     }
 }