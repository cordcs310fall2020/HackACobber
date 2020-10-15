<?php
 $page_title = "Log In Page";
 include($_SERVER['DOCUMENT_ROOT'].'/components/head.php');
?>
<body>
<center>
<form action="action_page.php">
    
    <div class="container">
       
        <h1>Login </h1>
    
        <label for="user id"><b></b></label>
        <input type="email" placeholder="Enter Email or Username" name="user id" id="user id"><br><br>

        <label for="psw"><b></b></label>
        <input type="password" placeholder="Enter password" name="psw" id="psw"><br><br>

        <button type="button">Login</button><br><br>
        <button type="button">Sign up</button><br><br>
        <button type="button">Forgot Password</button>
    </div>
</form>
</center>
</body>
</html>