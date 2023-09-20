<?php
 require_once("header.php");
?>
<body>
 <div class="wrapper">
     <section class="form signup">
         <header>Real Time Chat App</header>
         <form action="#" id="signup-form"  encrypt="multipart/form-data">
             <div class="error-text"></div>
             <div class="name-details">
                 <div class="field input">
                    <label>First Name</label>
                    <input type="text" placeholder="First Name" name="fname">
                 </div>
                 <div class="field input">
                    <label>Last Name</label>
                    <input type="text" placeholder="Last Name" name="lname">
                 </div>
            </div>
                 <div class="field input">
                    <label>Email Address</label>
                    <input type="text" placeholder="Enter your email" name="email">
                 </div>
                 <div class="field input">
                    <label>Password</label>
                    <input type="password" placeholder="Enter new password" name="pwd">
                    <i class="fas fa-eye"></i>
                 </div>
                 <div class="field input">
                    <label>Password Repeat</label>
                    <input type="password" placeholder="Confirm Password" name="pwd_r">
                    <i class="fas fa-eye"></i>
                 </div>
                 <div class="field image">
                    <label>Select Image</label>
                    <input type="file" name="image">
                 </div>
                 <div class="field button">
                    <input type="submit" value="Continue to chart">
                 </div>
                 <div class="link">Already signed in ?<a href="login.php"> Login</a></div>
         </form>
     </section>
 </div>

<script src="js/pass-show-hide.js"></script>
<script src="js/signup.js"></script>
</body>
</html>