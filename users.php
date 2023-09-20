<?php
 require_once("header.php");
?>

<?php
 if(!isset($_SESSION['unique_id']))
 {
     header("location:login.php");
 }
  $sql = "SELECT * FROM users WHERE unique_id = :unique_id";
  $stmt = $DB->pdo->prepare($sql);
  $stmt->execute(['unique_id'=>$_SESSION['unique_id']]);
  $user = $stmt->fetch(PDO::FETCH_OBJ);

?>
<body>
 <div class="wrapper">
     <section class="users">
       <header>
           <div class="content">
              <img src="php/exe/images/<?= $user->image; ?>" alt="">
              <div class="details">
                  <span><?=  $user->fname." ".$user->lname; ?></span>
                  <p><?=  $user->status; ?></p>
              </div>
           </div>
           <a href="php/logout.php" class="logout">Logout</a>
       </header>
       <div class="search">
           <span class="text">Select a user to start chart</span>
           <input type="text" placeholder="Enter to Search...">
           <button><i class="fas fa-search"></i></button>
       </div>
       <div class="users-list">
       </div>
     </section>
 </div>
 <script src="js/users.js"></script>
</body>
</html>