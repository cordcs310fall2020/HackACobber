<?php
include('../config.php'); 
include_once('section/functions.php');
include_once('section/dlinks.php');
$page_title = "Data";
$churchadminpage = 'data';
if (isset($_SESSION['user'])) { if ($_SESSION['role'] != 1) {	header($headerlocation .$actual_link);	}}else{header($headerlocation .$actual_login_link);}
?>
<?php $posts = getAllPosts(); ?>
<?php include_once('section/admin-header.php')?>
<div class="container">
  <div class="row">
<h1 class="h2">Edit Data</h1>
</div>
  <div class="row">  
<?php include_once('content/data.php');  ?>
        </div>
</div>
</div>
  <?php include_once('../section/footer.php')?>
      </div>
    </main>
  </div>
  
</div>

<?php include('../assets/script-link.php');  ?>
</html>
