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
                                <img class="card-img-top" src="assets/img/aboutme.jpg" alt="Card image cap">
                                <div class="card-body">
                                    <h5 class="card-title">Rod Oppegard</h5>
                                    <p class="card-text">In the summer of 1996, Mr. Daniels asked me to take on a project, which I described then as “The Altar Art (Ecclesiastical Art) Documentation Project in North Dakota”. I worked nearly fourteen years as a partially reimbursed volunteer with the Region III Archives at Luther Seminary in St. Paul, Minnesota. While documenting Altar Art or Ecclesiastical Art remains a key component of the project, it has been expanded to give a more complete picture of the church interior and exterior. This project was conducted by visiting church structures built between the late 1800s and the present day and whose altar art dated from the same time period. The churches were located mainly in North Dakota. During the earlier years I documented altar paintings, statuary, altarpieces and building exteriors. But in the final years of the project the documentation expanded to include chancel furniture, pews, photos of the building exteriors taken from several angles and the histories of the churches. Beyond the photographs, I recorded research notes concerning the buildings and its furnishings within the chancel and sanctuary. These notes also grew in length over the fourteen year period. This information went into the Region III Archives congregational files.</p>
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
