<?PHP
require_once('config.php'); 
require_once( ROOT_PATH . '/section/functions.php');
require_once( ROOT_PATH . '/section/dlinks.php');
$page_title = "Users";
$churchadminpage = 'contactme';
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
                                    <div class="card-header"><h3 class="text-center font-weight-light my-4">Contact Form</h3></div>
                                    <div class="card-body"><?PHP include_once('section/userdatabasescript.php');  ?>
                                        <form action="contact.php" method="post">
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
                                                <label class="small mb-1" for="inputEmail">Email</label>
                                                <input class="form-control py-4" name="email" value="<?php echo $email; ?>" id="inputEmail" type="text" placeholder="Enter email address" />
                                            </div>
                                            <div class="form-group">
                                                <label for="InputMessage">Message</label>
                                                <textarea class="form-control" id="inputMessage" rows="6"></textarea>
                                            </div>
                                            <div class="form-group mt-4 mb-0"><input class="btn btn-primary btn-block" type="submit" name="submit_request" value="Send Form"></div>
                                        </form>
                                    </div>
                                    <div class="card-footer text-center">
                                        <div class="small"><a href="/">Return Home</a></div>
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