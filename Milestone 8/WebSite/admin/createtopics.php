<?php
include('../config.php'); 
include_once('section/functions.php');
include_once('section/dlinks.php');
$page_title = "Create Topics";
$churchadminpage = 'createtopics';
if (isset($_SESSION['user'])) { if ($_SESSION['role'] != 1) {	header($headerlocation .$actual_link);	}}else{header($headerlocation .$actual_login_link);}
?>
<?php $topics = getAllTopics();	?>

<?php include_once('section/admin-header.php')?>
<div class="container">
  <div class="row">
<h1 class="h2">Create Topics</h1>
</div>
<?php include_once('content/createtopics.php');  ?>
</div>
      </div>
  <?php include_once('../section/footer.php')?>
    </main>
  </div>
  
</div>

<?php include('../assets/script-link.php');  ?>
</html>
