<?php
include_once('../config.php'); 
include_once('section/functions.php');
include_once('section/dlinks.php');
$page_title = "Create Users";
$churchadminpage = 'addusers';
if (isset($_SESSION['user'])) { if ($_SESSION['role'] != 1) {	header($headerlocation .$actual_link);	}}else{header($headerlocation .$actual_login_link);}
?>
<?php 
	$users = getUsers();			
?>

<?php include_once('section/admin-header.php')?>
<div class="container">
  <div class="row">
        <h1 class="h2">Create Users</h1>
</div>
<?php include_once('content/createusers.php');  ?>
</div>
        </div>
  <?php include_once('../section/footer.php')?>
      </div>
    </main>
  </div>
  
</div>

<?php include('../assets/script-link.php');  ?>
</html>
