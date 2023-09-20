<?php
  class Chat
  {
     private int $incoming_id;
     private int $outgoing_id;
     private string $msg;
     
     public $db_obj = null;

     public function __construct(Database $obj, int $incoming_id, int $outgoing_id, string $msg = "")
     {
         $this->incoming_id = $incoming_id;
         $this->outgoing_id = $outgoing_id;
         $this->msg = $msg;
         $this->db_obj = $obj;
     }

     public function insert_chat():bool
     {
         $sql = "INSERT INTO messages SET incoming_id = :incoming_id, outgoing_id = :outgoing_id, msg = :msg";
         $stmt = $this->db_obj->pdo->prepare($sql);
         $stmt->execute(['incoming_id'=>$this->incoming_id, 'outgoing_id'=>$this->outgoing_id, 'msg'=>$this->msg]);
         if($stmt)
         {
             return true;
         }
         else 
         {
             return false;
         }
     }

     public function get_chat():bool|array
     {
        $sql = "SELECT * FROM messages LEFT JOIN users ON users.unique_id = messages.outgoing_id WHERE (incoming_id = :incoming_id AND outgoing_id = :outgoing_id) OR (incoming_id = :outgoing_id AND outgoing_id = :incoming_id) ORDER By msg_id";
        $stmt = $this->db_obj->pdo->prepare($sql);
        $stmt->execute(['incoming_id'=>$this->incoming_id, 'outgoing_id'=>$this->outgoing_id,'outgoing_id'=>$this->outgoing_id, 'incoming_id'=>$this->incoming_id]);
        $chats = $stmt->fetchAll(PDO::FETCH_ASSOC);
        if($chats)
        {
            return $chats;
        }
        else 
        {
            return false;
        }
     }
  }