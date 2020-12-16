<?php
require_once('section/cookies.php');
require_once('section/dlinks.php');
session_destroy();
header('refresh:5;' .$actual_default_link);
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="HackACobber" />
        <title>Lougout successful</title>
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
                                    <div class="card-header"><h3 class="text-center font-weight-light my-4">Lougout successful!</h3></div>
                                    <div class="card-body">
                                        <form action="login.php" method="post">
                                            <div class="form-group">
                                            <p> You are successfully logged out!</p>
	                                        <p>You are going to be redirected automatically to the Home page in 5 sec ;)</p>
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

