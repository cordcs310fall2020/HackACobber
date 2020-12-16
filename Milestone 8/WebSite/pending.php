<?PHP
include_once('config.php'); 
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
        <title>Login</title>
    <?php include_once('assets/style-link.php');  ?>
    <link rel="stylesheet" href="assets/style.php">
    </head>
    <body class="bg-primary">
        <div class="church_auth">
            <div style="padding-top: 56px;" class="church_auth_content">
                <main>
                    <div class="container">
                        <div class="row justify-content-center">
                            <div class="col-lg-5">
                                <div class="card shadow-lg border-0 rounded-lg mt-5">
                                    <div class="card-header"><h3 class="text-center font-weight-light my-4">Email Sent!</h3></div>
                                    <div class="card-body"><?PHP include_once('section/userdatabasescript.php');  ?>
                                        <form action="login.php" method="post">
                                        <?PHP include_once('section/error-alert.php');  ?>
                                            <div class="form-group">
                                            <p> We sent an email to  <b><?php echo $_GET['email'] ?></b> to help you recover your account.</p>
	                                        <p>Please login into your email account and click on the link we sent to reset your password</p>
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

    </body>
<?php include_once('assets/script-link.php');  ?>
</html>
