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
        <title>New Password</title>
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
                                    <div class="card-header"><h3 class="text-center font-weight-light my-4">New Password</h3></div>
                                    <div class="card-body"><?PHP include_once('section/userdatabasescript.php');  ?>
                                        <form action="newpassword.php" method="post">
                                        <?PHP include_once('section/error-alert.php');  ?>
                                            <div class="form-group">
                                                <label class="small mb-1" for="inputNewPassword">New Password</label>
                                                <input class="form-control py-4" name="newpassword" id="inputNewPassword" type="password" placeholder="Enter new password" />
                                            </div>
                                            <div class="form-group">
                                                <label class="small mb-1" for="inputNewPasswordVal">Confirm New Password</label>
                                                <input class="form-control py-4" name="newpasswordvalidation" id="inputNewPasswordVal" type="password" placeholder="Confirm new password" />
                                            </div>
                                            <div class="form-group mt-4 mb-0">
                                                <input class="btn btn-primary" type="submit" name="submit_new_password" value="Change Password">
                                            </div>
                                        </form>
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
