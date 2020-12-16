<?PHP
require_once('config.php'); 
require_once( ROOT_PATH . '/section/functions.php');
require_once( ROOT_PATH . '/section/dlinks.php');
$page_title = "About Me";
$churchadminpage = 'aboutme';
?>
<?php include(ROOT_PATH .'/section/user-header.php');  ?>
<?php include_once(ROOT_PATH .'/menu/user-top-menu.php');  ?>
<div class="church_auth">
  <div class="church_auth_content">
                <main style="padding-top: 56px;">
                    <div class="container">
                        <div class="row justify-content-center">
                            <div class="col-lg-5">
                                <div class="card shadow-lg border-0 rounded-lg mt-5">
                                <img class="card-img-top" src="assets/img/" alt="Card image cap">
                                <div class="card-body">
                                    <h5 class="card-title">Card title</h5>
                                    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                                    <a href="contact.php" class="btn btn-primary">Send me a message</a>
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
