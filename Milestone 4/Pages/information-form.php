<?php
 $page_title = "Information Page";
 include($_SERVER['DOCUMENT_ROOT'].'/components/head.php');
?>
<body>
<center>    
<div class="form_header">
	<h2>Sign Up</h2>
    </div>
<form method="post" action="information-form.php">
        <p>Please fill in this form to complete your account.</p>
        <div class="input-group">
        <input type="text" placeholder="Enter Address line 1" name="adrl_1" id="adrl_1"><br><br>
        </div>
        <div class="input-group">
        <input type="text" placeholder="Enter Address line 2" name="adrl_2" id="adrl_2"><br><br>
        </div>
        <div class="input-group">
        <input type="email" placeholder="Enter City" name="city" id="city"><br><br>
        </div>
        <div class="input-group">
	<select style="" name="state">
	<option value="" disabled selected>State</option>
	<option value="MN">Minnesota</option>
	<option value="ND">North Dakota</option>
    </select>
    <input style="display: inline-block;width: 25%;" type="text" placeholder="Enter Zip" name="zip" id="zip">
        </div>
        <a class="btn main" href="index.php">Continue</a>
</form>
</center>
</body>
</html>