<?php
 $page_title = "Sign Up Page";
 include($_SERVER['DOCUMENT_ROOT'].'/components/head.php');
?>
<body>
<center>    
<div class="form_header">
	<h2>Sign Up</h2>
    </div>
<form method="post" action="signup.php">
        <p>Please fill in this form to create an account.</p>

        <div class="input-group">
        <input type="text" placeholder="Enter First Name" name="fname" id="fname"><br><br>
        </div>
        <div class="input-group">
        <input type="text" placeholder="Enter Last Name" name="lname" id="lname"><br><br>
        </div>
        <div class="input-group">
        <input type="email" placeholder="Enter Email" name="email" id="email"><br><br>
        </div>
        <div class="input-group">
        <input type="email" placeholder="Confirm Email" name="email" id="email"><br><br>
        </div>
        <div class="input-group">
        <input type="password" placeholder="Enter Password" name="psw" id="psw"><br><br>
        </div>
        <div class="input-group">
        <input type="password" placeholder="Confirm Password" name="confirmpsw" id="confirmpsw"><br><br>
        </div>
        <div class="input-group">
        <label class="inline" for="male"><b>Male</b></label>
        <input type="radio" name="gender" id="male" value="male"><b></b>
        <label class="inline" for="female"><b>Female</b></label>
        <input type="radio" name="gender" id="female" value="Female"><br><br>
        </div>
        <div class="input-group">
        <label for="birthday"><b>Date of Birth:</b></label> 
        <input type="date"/><br><br>
        </div>
        <div class="input-group">
        <input class="checkbox" type="checkbox" name="terms" id="terms" value="agree">
        <label class="inline" for="terms"><b>Accept Terms and Conditions</b></label><br><br>
        </div>
        <a class="btn main" href="../information-form.php">Sign Up</a><br><br>
        <!--<button type="submit" class="btn" name="signup_btn">Sign Up</button><br><br>-->
        <a class="btn" href="../login.php">Login</a>
</form>
</center>
</body>
</html>