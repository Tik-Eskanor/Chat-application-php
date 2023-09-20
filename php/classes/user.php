<?php

class User
{
   private string $fname;
   private string $lname;
   private string $email;
   private string $pwd;
   private string $pwd_r;
   private array|string $image;
   private string $status;
   private int $unique_id;

   public $db_obj = null;
   
   public function __construct(Database $obj, string $fname, string $lname, string $email, string $pwd, string $pwd_r, array $image)
   {
     $this->fname = $fname;
     $this->lname = $lname;
     $this->email = $email;
     $this->pwd = $pwd;
     $this->pwd_r = $pwd_r;
     $this->image = $image;

     $this->db_obj = $obj;
   }

   private function invalid_name():bool
   {
       if(!preg_match("/^[a-zA-Z0-9]*$/", $this->fname) || !preg_match("/^[a-zA-Z0-9]*$/", $this->lname))
       {
          return false;
       }
       else {
           return true;
       }
   }

   private function email_validation():bool
   {
     if(!filter_var($this->email, FILTER_VALIDATE_EMAIL))
     {
         return false;
     }
     else 
     {
         return true;
     }

   }

   private function pwd_match():bool
   {
       if($this->pwd != $this->pwd_r)
       {
           return false;
       }
       else {
           return true;
       }
   }

   private function already_exists():bool
   {
       $sql = "SELECT * FROM users WHERE email = :email";
       $stmt = $this->db_obj->pdo->prepare($sql);
       $stmt->execute(["email"=>$this->email]);
       $count = $stmt->rowCount();
       if($count > 0)
       {
           return false;
       }
       else
       {
           return true;
       }
   }
   
   private function image_validation():bool|string
   {
     if(isset($this->image))
     {
        $img_name = $this->image['name'];
        // $img_type = $this->image['type'];
        $img_tmp_name = $this->image['tmp_name'];

        $explode = explode(".",$img_name);
        $img_ext = end($explode);
        $valid_ext  = ['jpg','jpeg','png','gif'];
        if(in_array($img_ext, $valid_ext))
        {
           $new_img_name = time().$img_name;
           if(!move_uploaded_file($img_tmp_name,"images/".$new_img_name))
           {
               return false;
           }
           else
           {
               $this->image = $new_img_name;
               return true;
           }
        }
        else 
        {
              return "format";
        }
     }
   }

   private function set_unique_id():bool
   {
       $this->unique_id = rand(time(), 10000000);
       if(!$this->unique_id)
       {
           return false;
       }
       else
       {
           return true;
       }
   }

   private function set_status():bool
   {
       $this->status = "Active now";
       if(!$this->status)
       {
           return false;
       }
       else
       {
           return true;
       }
       
   }
   private function pwd_hash():bool
   {
       $this->pwd = md5($this->pwd);
       if(!$this->pwd)
       {
          return false;
       }
       else 
       {
           return true;
       }
   }

   public function sign_up():bool
   {
     
     if($this->invalid_name() === false)
     {
         die("Only characters of a-z,A-Z,0-9,*$ are allowed");
     }
     if($this->email_validation() === false)
     {
         die("Invalid Email");
     }
     if($this->pwd_match() === false)
     {
         die("Incorrect Password");
     }
     if($this->already_exists() === false)
     {
         die("User already exixts");
     }
     if($this->image_validation() === false)
     {
        die("Image file too large. Try a samller size");
     }

    //  elseif($this->image_validation() == "format")
    //  {
    //     echo "Please use an image JPG/JPEG/PNG/GIF format";
    //  }

     if($this->set_unique_id() === false)
     {
         die("Error 5099:Unique ID");
     }

     if($this->set_status() === false)
     {
         die("Error 50100:Status");
     }

     if($this->pwd_hash() === false)
     {
         die("Error 50101: Hash failed");
     }

     $sql = "INSERT INTO users SET unique_id = :unique_id, fname = :fname, lname = :lname, email = :email, password = :pwd, image = :image, status = :status";
     $stmt = $this->db_obj->pdo->prepare($sql);
     $stmt->execute(['unique_id'=>$this->unique_id,'fname'=>$this->fname,'lname'=>$this->lname,'email'=>$this->email,'pwd'=>$this->pwd,'image'=>$this->image,'status'=>$this->status]);
     
     if($stmt)
     {
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