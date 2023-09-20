<?php
 require_once("header.php");
?>
<body>
 <div class="wrapper">
     <section class="form login">
         <header>Real Time Chat App</header>
         <form action="" id="login-form" encrypt ="multipart/form-data">
             <div class="error-txt"></div>
                 <div class="field input">
                    <label>Email Address</label>
                    <input type="text" placeholder="Enter your email" name="email">
                 </div>
                 <div class="field input">
                    <label>Password</label>
                    <input type="password" placeholder = "Enter your password"  name="pwd">
                    <i class="fas fa-eye"></i>
                 </div>
                 <div class="field button">
                  <input type="submit" value="Continue to chart">
                 </div>
                 <div class="link">Not yet signed up ? <a href="index.php">signup now</a></div>
         </form>
     </section>
 </div>
<script src="js/pass-show-hide.js"></script>
<script src="js/login.js"></script>

</body>
</html>