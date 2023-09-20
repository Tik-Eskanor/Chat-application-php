<?php

class User_list
{
    private int $unique_id;
    public $db_obj= null;

    public function __construct(Database $obj, int $unique_id)
    {
       $this->db_obj = $obj;
       $this->unique_id = $unique_id;
    }

    public function get_list():array|bool
    {
        $sql = "SELECT * FROM users WHERE NOT unique_id = :unique_id";
        $stmt = $this->db_obj->pdo->prepare($sql);
        $stmt->execute(['unique_id'=>$this->unique_id]);
        $user_list = $stmt->fetchAll(PDO::FETCH_ASSOC);

        if($user_list)
        {
            return $user_list;
        }
        else 
        {
            return false;
        }
    }

    public function get_msg($incoming_id,$outgoing_id):array|bool
    {
       $sql = "SELECT * FROM messages WHERE (incoming_id = :incoming_id OR incoming_id = :outgoing_id) AND (outgoing_id = :incoming_id OR outgoing_id = :outgoing_id) ORDER BY msg_id DESC LIMIT 1";
       $stmt = $this->db_obj->pdo->prepare($sql);
       $stmt->execute(['incoming_id'=>$incoming_id,'outgoing_id'=>$outgoing_id,'incoming_id'=>$incoming_id,'outgoing_id'=>$outgoing_id]);
       $messages = $stmt->fetchAll(PDO::FETCH_ASSOC);
       if($messages)
       {
         return $messages;
       }
       else
       {
        return false;
       }
    }

    public function search(string $term):array|bool
    {
        $sql = "SELECT * FROM users WHERE NOT unique_id = :unique_id AND (fname  LIKE :fname OR lname LIKE :lname)";
        $stmt = $this->db_obj->pdo->prepare($sql);
        $stmt->execute(['unique_id'=>$this->unique_id,'fname'=>'%'.$term.'%','lname'=>'%'.$term.'%']);
        $user_list = $stmt->fetchAll(PDO::FETCH_ASSOC);

        if($user_list)
        {
            return $user_list;
        }
        else 
        {
            return false;
        }
    }
}