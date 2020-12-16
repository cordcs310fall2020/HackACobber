<?php
$usermenu1 = "";
$usermenu2 = "";
$usermenu3 = "";
$usermenu4 = "";

if ($churchadminpage == 'home'){
  $usermenu1 = "active";
}elseif($churchadminpage == 'data'){
  $usermenu2 = "active";
}elseif($churchadminpage == 'aboutme'){
  $usermenu3 = "active";
}else{
  $usermenu4 = "active";
}

?>
<nav class="navbar navbar-expand-lg fixed-top navbar-dark bg-dark">
  <a class="navbar-brand mr-auto mr-lg-0" href="/">Church Database</a>
  <button class="navbar-toggler p-0 border-0" type="button" data-toggle="offcanvas">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="navbar-collapse offcanvas-collapse" id="navbarsExampleDefault">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item <?php echo $usermenu1;?>">
        <a class="nav-link" href="<?php echo $actual_default_link;?>">Home<span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item <?php echo $usermenu2;?>">
        <a class="nav-link" href="<?php echo $actual_posts_link;?>">Datas</a>
      </li>
      <li class="nav-item <?php echo $usermenu3;?>">
        <a class="nav-link" href="<?php echo $actual_about_link;?>">About Me</a>
      </li>
      <li class="nav-item <?php echo $usermenu4;?>">
        <a class="nav-link" href="<?php echo $actual_contact_link;?>">Contact Me</a>
      </li>
      <?php if(isset($_SESSION['role']) && $_SESSION['role'] == 1):?>
      <li class="nav-item">
        <a class="nav-link" href="<?php echo $actual_admin_link;?>">Admin Pannel</a>
      </li>
      <?php endif?>
      </ul>
      <?php if(isset($_SESSION['user'])):?>
        <?php $_SESSION['message'] = 'logged out!'; $_SESSION['type'] = 'alert-success';?>
      <a href="<?php echo $actual_default_link;?>/logout.php" class="btn btn-outline-danger my-2 my-sm-0" >Logout</a>
      <?php endif?>
      <?php if(!(isset($_SESSION['user']))):?>
      <a href="<?php echo $actual_default_link;?>/login.php" class="btn btn-outline-primary my-2 my-sm-0" >Login</a>
      <?php endif?>
  </div>
</nav>