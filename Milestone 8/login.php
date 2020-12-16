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
    <?php include('assets/style-link.php');  ?>
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
                                    <div class="card-header"><h3 class="text-center font-weight-light my-4">Login</h3></div>
                                    <div class="card-body"><?PHP include_once('section/userdatabasescript.php');  ?>
                                        <form action="login.php" method="post">
                                        <?PHP include_once('section/error-alert.php');  ?>
                                            <div class="form-group">
                                                <label class="small mb-1" for="inputUserName">Username</label>
                                                <input class="form-control py-4" name="username" value="<?php echo $username; ?>" id="inputUserName" type="text" placeholder="Enter username" />
                                            </div>
                                            <div class="form-group">
                                                <label class="small mb-1" for="inputPassword">Password</label>
                                                <input class="form-control py-4" name="password" id="inputPassword" type="password" placeholder="Enter password" />
                                            </div>
                                            <div class="form-group">
                                                <div class="form-group form-check">
                                                    <input class="form-check-input" id="rememberpasswordcheck" type="checkbox" />
                                                    <label class="form-check-label" for="rememberpasswordcheck">Remember password</label>
                                                </div>
                                            </div>
                                            <div class="form-group d-flex align-items-center justify-content-between mt-4 mb-0">
                                                <a class="small" href="forgotpassword.php">Forgot Password?</a>
                                                <input class="btn btn-primary" type="submit" name="submit_login" value="Login">
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
            <?php include_once('section/footer.php')?>
        </div>

<?php include('assets/script-link.php');  ?>
    </body>
</html>
