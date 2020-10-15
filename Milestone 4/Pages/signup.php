<?php
 $page_title = "Sign Up Page";
 include($_SERVER['DOCUMENT_ROOT'].'/components/head.php');
?>
<body>
<center>
<form action="action_page.php">
    
    <div class="container">
       
        <h1>Sign Up</h1>
        <p>Please fill in this form to create an account.</p>

        <label for="fname"><b></b></label>
        <input type="text" placeholder="Enter First Name" name="fname" id="fname"><br><br>

        <label for="lname"><b></b></label>
        <input type="text" placeholder="Enter Last Name" name="lname" id="lname"><br><br>

        <label for="email"><b></b></label>
        <input type="email" placeholder="Enter Email" name="email" id="email"><br><br>

        <label for="confirmemail"><b></b></label>
        <input type="email" placeholder="Confirm Email" name="email" id="email"><br><br>

        <label for="psw"><b></b></label>
        <input type="password" placeholder="Enter Password" name="psw" id="psw"><br><br>

        <label for="confirmpsw"><b></b></label>
        <input type="password" placeholder="Confirm Password" name="confirmpsw" id="confirmpsw"><br><br>

        <label for="male"><b>Male</b></label>
        <input type="radio" name="gender" id="male" value="male"><b></b>

        <label for="female"><b>Female</b></label>              
        <input type="radio" name="gender" id="female" value="Female"><br><br>

        <label for="birthday"><b>Date of Birth:</b></label> 
        <input type="date"/><br><br>

        <input type="checkbox" name="terms" id="terms" value="agree">
        <label for="terms"><b>Accept Terms and Conditions</b></label><br><br>

        <button type="button" name="signup_btn">Sign Up</button><br><br>
        <button type="button" name="login_btn">Login</button>
    </div>
</form>
</center>
</body>
</html>