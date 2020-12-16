<?PHP
require('config.php');  
require_once( ROOT_PATH . '/section/dlinks.php');
if (isset($_SESSION['user'])) {
    header($headerlocation .$actual_default_link);
    }?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="HackACobber" />
        <title>Password Recovery</title>
    <?php include_once('assets/style-link.php');  ?>
    <link rel="stylesheet" href="assets/style.php">
    </head>
    <body class="bg-primary">
        <div class="church_auth">
            <div class="church_auth_content">
            <main>
                    <div class="container">
                        <div class="row justify-content-center">
                            <div class="col-lg-5">
                                <div class="card shadow-lg border-0 rounded-lg mt-5">
                                    <div class="card-header"><h3 class="text-center font-weight-light my-4">Password Recovery</h3></div>
                                    <div class="card-body">
                                    <?PHP include_once('section/userdatabasescript.php');  ?>
                                        <div class="small mb-3 text-muted">Enter your email address and we will send you a link to reset your password.</div>
                                        <form action="forgotpassword.php" method="post">
                                        <?PHP include_once('section/error-alert.php');  ?>
                                            <div class="form-group">
                                                <label class="small mb-1" for="email">Email</label>
                                                <input class="form-control py-4" id="email" name="email"  type="email" aria-describedby="emailHelp" onkeyup="validateEmail()" placeholder="Enter email address" />
                                            </div>
                                            <div class="form-group d-flex align-items-center justify-content-between mt-4 mb-0">
                                                <a class="small" href="login.php">Return to login</a>
                                                <input class="btn btn-primary" type="submit" name="submit_reset_password" value="Reset Password">
                                            </div>
                                        </form>
                                    </div>
                                    <div class="card-footer text-center">
                                        <div class="small"><a href="signup.php">No account? Request access!</a></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </main>
            </div>
        </div>
<?php include_once('section/footer.php')?>
<?php include_once('assets/script-link.php');  ?>
    </body>
</html>
