<?php
 $page_title = "Log In Page";
 include($_SERVER['DOCUMENT_ROOT'].'/components/head.php');
?>
<body>
<center>
<div class="form_header">
	<h2>Log In</h2>
    </div>
<form method="post" action="login.php">
    
        <div class="input-group">
        <input type="email" placeholder="Enter Email or Username" name="user id" id="user id"><br><br>
        </div>
        <div class="input-group">
        <input type="password" placeholder="Enter password" name="psw" id="psw"><br><br>
        </div>
        <button type="submit" class="btn" name="login_btn">Login</button><br><br>
        <a class="btn" href="../signup.php">Sign Up</a><br><br>
        <a class="btn" href="../forgot-password.php">Forgot Password ?</a>
</form>
</center>
</body>
</html>