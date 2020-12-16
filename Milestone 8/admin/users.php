<?php
include_once('../config.php'); 
include_once('section/functions.php');
include_once('section/dlinks.php');
$page_title = "Users";
$churchadminpage = 'users';
if (isset($_SESSION['user'])) { if ($_SESSION['role'] != 1) {	header($headerlocation .$actual_link);	}}else{header($headerlocation .$actual_login_link);}
?>
<?php 
	// Get all admin users from DB
	$users = getUsers();			
?>

<?php include_once('section/admin-header.php')?>
<div class="container">
  <div class="row">
        <h1 class="h2">Edit Users</h1>
</div>
<?php include_once('content/users.php');  ?>
</div>
        </div>
  <?php include_once('../section/footer.php')?>
      </div>
    </main>
  </div>
  
</div>

<?php include('../assets/script-link.php');  ?>
</html>
