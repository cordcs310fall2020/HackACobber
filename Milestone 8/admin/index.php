<?php
include('../config.php'); 
include_once('section/functions.php');
include_once('section/dlinks.php');
$page_title = "Dashboard";
$churchadminpage = 'dashboard';
if (isset($_SESSION['user'])) { if ($_SESSION['role'] != 1) {	header($headerlocation .$actual_link);	}}else{header($headerlocation .$actual_login_link);}
?>

<?php include_once('section/admin-header.php')?>
        <h1 class="h2">Dashboard</h1>
        
<?php include_once('content/admin.php');  ?>
        </div>
  <?php include_once('../section/footer.php')?>
      </div>
    </main>
  </div>
  
</div>

<?php include('../assets/script-link.php');  ?>
</html>
