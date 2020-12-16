<?PHP
require_once('config.php'); 
require_once( ROOT_PATH . '/section/dlinks.php');
if (isset($_SESSION['user'])) {
    header($headerlocation .$actual_default_link);
    }
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="HackACobber" />
        <title>Request Access</title>
    <?php include_once('assets/style-link.php');  ?>
    <link rel="stylesheet" href="assets/style.php">
        <?php include_once('assets/script-link.php');  ?>
    <script>
  
  function validateEmail(){   
	 
	 //var email = $("#email").val();
	 var mailformat = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
  
	 if(email.value.match(mailformat)){
	  $("#status_for_email").html('<strong style="color:green">Good email!</strong>');
	  document.signup_form.email.focus();
	  return true;
	 
	 }else{
	  $("#status_for_email").html('<strong style="color:red">Bad Email Address</strong>');
	  document.signup_form.email.focus();
	  return false;
	 
	 }
	 
	}
  </script>
    </head>
    <body class="bg-primary">
        <div class="church_auth">
            <div style="padding-top: 56px;" class="church_auth_content">
                <main>
                    <div class="container">
                        <div class="row justify-content-center">
                            <div class="col-lg-7">
                                <div class="card shadow-lg border-0 rounded-lg mt-5">
                                    <div class="card-header"><h3 class="text-center font-weight-light my-4">Request Access from Dr. Rod Oppegard</h3></div>
                                    <div class="card-body"><?PHP include_once('section/userdatabasescript.php');  ?>
                                        <form name="signup_form" action="signup.php" method="post">
                                        <?PHP include_once('section/error-alert.php');  ?>
                                            <div class="form-row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label class="small mb-1" for="inputFirstName">First Name</label>
                                                        <input class="form-control py-4" name="firstname" id="inputFirstName" type="text" placeholder="Enter first name" value="<?php echo $firstname; ?>" />
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label class="small mb-1" for="inputLastName">Last Name</label>
                                                        <input class="form-control py-4" name="lastname" id="inputLastName" type="text" placeholder="Enter last name" value="<?php echo $lastname; ?>"/>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="small mb-1" for="inputUsername">Username</label>
                                                <input class="form-control py-4" name="username" id="inputUsername" type="text" placeholder="Enter username" value="<?php echo $username; ?>"/>
                                            </div>
                                            <div class="form-group">
                                                <label class="small mb-1" for="email">Email</label><p id="status_for_email"></p>
                                                <input class="form-control py-4" id="email" name="email"  type="email" aria-describedby="emailHelp" onkeyup="validateEmail()" placeholder="Enter email address" value="<?php echo $email; ?>"/>
                                            </div>
                                            <div class="form-row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label class="small mb-1" for="inputPassword">Password</label>
                                                        <input class="form-control py-4" name="password" id="inputPassword" type="password" placeholder="Enter password" />
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label class="small mb-1" for="inputConfirmPassword">Confirm Password</label>
                                                        <input class="form-control py-4" name="passwordverifiaction" id="inputConfirmPassword" type="password" placeholder="Confirm password" />
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group mt-4 mb-0"><input class="btn btn-primary btn-block" type="submit" name="submit_request" value="Request Access"></div>
                                        </form>
                                    </div>
                                    <div class="card-footer text-center">
                                        <div class="small"><a href="login.php">Have an account? Go to login</a></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </main>
            </div>
        </div>
            <?php include_once('section/footer.php')?>

    </body>
 
</html>
