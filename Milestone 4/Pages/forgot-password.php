<?php
 $page_title = "Forgot Password Page";
 include($_SERVER['DOCUMENT_ROOT'].'/components/head.php');
?>
<body>
<center>    
<div class="form_header">
	<h2>Forgot Password</h2>
    </div>
<form method="post" action="forgot-password.php">
        <p>Please fill in this form to recover your password.</p>
        <div class="input-group">
        <input type="text" placeholder="Enter Email or Username" name="paswd_recovery" id="paswd_recovery"><br><br>
        </div>
        <button type="submit" class="btn" name="signup_btn">Send</button><br><br>
        <a class="btn" href="../login.php">Log in</a><br><br>
        <a class="btn" href="../signup.php">Sign Up</a>
</form>
</center>
</body>
</html>