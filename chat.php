<?php
 require_once("header.php");
?>

<?php
 if(!isset($_SESSION['unique_id']))
 {
     header("location:login.php");
 }

 if(isset($_GET['unique_id']))
 {
    $in_id = $_GET['unique_id'];
    $sql = "SELECT * FROM users WHERE unique_id = :in_id";
    $stmt = $DB->pdo->prepare($sql);
    $stmt->execute(['in_id'=>$in_id]);
    $user = $stmt->fetch(PDO::FETCH_OBJ);
 }
 else 
 {
  header("location:login.php");
 }
?>
<body>
 <div class="wrapper">
     <section class="chat-area">
      <header>
         <a href="users.php" class="black-icon"><i class=" fas fa-arrow-left"></i></a>
         <img src="php/exe/images/<?= $user->image; ?>" alt="">
         <div class="details">
             <span><?= $user->fname." ".$user->lname; ?></span>
             <p><?= $user->status ?></p>
         </div>
      </header>
       <div class="chat-box">
       </div>
       <form action="" class="typing-area">
         <input type="text" placeholder="Type a message here..." class="input-field" name="message" required>
         <input type="text" name ="incoming_id" value="<?= $user->unique_id ?>" hidden>
         <input type="text" name ="outgoing_id" value="<?= $_SESSION['unique_id'] ?>" hidden>
         <button><i class="fab fa-telegram-plane"></i></button>
       </form>
     </section>
 </div>
</body>

<script src="js/chat.js"></script>
</html>