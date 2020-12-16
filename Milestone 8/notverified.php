<?PHP
require_once('config.php');
require_once('section/cookies.php');
require_once('section/dlinks.php');
if (isset($_SESSION['verified']) && $_SESSION['verified'] == 1) {
    header($headerlocation .$actual_default_link);
    }
session_destroy();
header("refresh:15;url=/"); 
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="HackACobber" />
        <title>Not Verified</title>
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
                                    <div class="card-header"><h3 class="text-center font-weight-light my-4">Account Not Verified!</h3></div>
                                    <div class="card-body"><?PHP include_once('section/userdatabasescript.php');  ?>
                                        <form action="login.php" method="post">
                                        <?PHP include_once('section/error-alert.php');  ?>
                                            <div class="form-group">
                                            <p> Your request has been sent to .</p>
	                                        <p>Please wait for the confirmation email to try to login into your account.</p>
                                            </div>
                                        </form>
                                    </div>
                                    <div class="card-footer text-center">
                                        <div class="small"><a href="/">Back to Home Page!</a></div>
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
