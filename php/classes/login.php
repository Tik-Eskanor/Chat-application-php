<?php
class Login
{
  private string $email;
  private string $pwd;
  private int $unique_id;

  public  $db_obj = null;
  
  public function __construct(Database $obj, string $email, string $pwd)
  {
      $this->email = $email;
      $this->pwd = $pwd;
      $this->db_obj = $obj;
  }

  private function email_checker():array|bool
  {
    $sql = "SELECT * FROM users WHERE email = :email";
    $stmt = $this->db_obj->pdo->prepare($sql);
    $stmt->execute(['email'=>$this->email]);
    $row_count = $stmt->rowCount();
    if($row_count == 1)
    {
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        return  $row;
    }
    else
    {
        return false;
    }
  }

  private function password_checker():bool
  {
    $row = $this->email_checker();
    $row['password'];
    if(md5($this->pwd) == $row['password'])
    {
        return true;
    }
    else 
    {
        return false;
    }
  }

  public function login():bool
  {
     if($this->email_checker() == false)
     {
        die("User not found");
     }
     if($this->password_checker() == false)
     {
        die("Incorrect Password");
     }

     $row = $this->email_checker();
     $unique_id = $row['unique_id'];
     $status = "Active now";

     $sql = "UPDATE users SET status = :status WHERE unique_id = :unique_id";
     $stmt = $this->db_obj->pdo->prepare($sql);
     $stmt->execute(['status'=>$status,'unique_id'=>$unique_id]);

     if($stmt)
     {
       $this->unique_id = $unique_id;
       return true;
     }
     else 
     {
        return false;
     }

  }
  public function get_unique_id():int
  {
      return $this->unique_id;
  }
}