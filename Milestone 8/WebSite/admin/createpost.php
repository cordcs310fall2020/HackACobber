<?php
include('../config.php'); 
include_once('section/functions.php');
include_once('section/dlinks.php');
$page_title = "Create Post";
$churchadminpage = 'createpost';
if (isset($_SESSION['user'])) { if ($_SESSION['role'] != 1) {	header($headerlocation .$actual_link);	}}else{header($headerlocation .$actual_login_link);}
?>
<?php $topics = getAllTopics();	?>
<?php include_once('section/admin-header.php')?>
<div class="container">
  <div class="row">
  <div style="align-content: center;max-width: 600px;" class="container">
    <div class="card">
      <div class="card-header">
<h1 class="h2 text-center font-weight-bold">Create and Edit Data</h1></div>

        
<?php include_once('content/createpost.php');  ?></div></div></div>
        </div>
      </div>
  <?php include_once('../section/footer.php')?>
    </main>
  </div>
  
</div>
<?php include('../assets/script-link.php');  ?>
<script>
	CKEDITOR.replace('body');
</script>
</html>
