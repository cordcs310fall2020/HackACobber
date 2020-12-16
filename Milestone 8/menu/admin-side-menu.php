<?php
$usermenu1 = "";
$usermenu2 = "";
$usermenu3 = "";
$usermenu4 = "";
$usermenu5 = "";
$usermenu6 = "";
$usermenu7 = "";

if ($churchadminpage == 'dashboard'){
  $usermenu1 = "active";
}elseif($churchadminpage == 'users'){
  $usermenu2 = "active";
}elseif($churchadminpage == 'addusers'){
  $usermenu3 = "active";
}elseif($churchadminpage == 'data'){
  $usermenu4 = "active";
}elseif($churchadminpage == 'topics'){
  $usermenu5 = "active";
}elseif($churchadminpage == 'createtopics'){
  $usermenu6 = "active";
}else{
  $usermenu7 = "active";
}

?>

<nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block bg-light sidebar collapse">
      <div class="sidebar-sticky pt-3">
        <ul class="nav flex-column">
          <li class="nav-item">
            <a class="nav-link <?php echo $usermenu1;?>" href="<?php echo $actual_link .'/admin/index.php'?>">
              <span data-feather="home"></span>
              Dashboard <span class="sr-only"></span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link <?php echo $usermenu2;?>" href="<?php echo $actual_link .'/admin/users.php'?>">
              <span data-feather="file"></span>
              Users 
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link <?php echo $usermenu3;?>" href="<?php echo $actual_link .'/admin/createusers.php'?>">
              <span data-feather="file"></span>
              Add Users 
            </a>
          </li>
        </ul>

        <h6 class="sidebar-heading d-flex justify-content-between align-items-center px-3 mt-4 mb-1 text-muted">
          <span>Data</span>
          <a class="d-flex align-items-center text-muted" href="#" aria-label="Add a new report">
            <span data-feather="plus-circle"></span>
          </a>
        </h6>
        <ul class="nav flex-column mb-2">
          <li class="nav-item">
            <a class="nav-link <?php echo $usermenu4;?>" href="<?php echo $actual_link .'/admin/data.php'?>">
              <span data-feather="shopping-cart"></span>
              Data
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link <?php echo $usermenu5;?>" href="<?php echo $actual_link .'/admin/topics.php'?>">
              <span data-feather="file-text"></span>
              Topics
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link <?php echo $usermenu6;?>" href="<?php echo $actual_link .'/admin/createtopics.php'?>">
              <span data-feather="file-text"></span>
              Create Topics
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="<?php echo $actual_link .'/allposts.php'?>">
              <span data-feather="file-text"></span>
              Posts
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link <?php echo $usermenu7;?>" href="<?php echo $actual_link .'/admin/createpost.php'?>">
              <span data-feather="file-text"></span>
              Create Post
            </a>
          </li>
        </ul>
        <h6 class="sidebar-heading d-flex justify-content-between align-items-center px-3 mt-4 mb-1 text-muted">
          <span>
            Profile
          <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-person-fill" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
            <path fill-rule="evenodd" d="M3 14s-1 0-1-1 1-4 6-4 6 3 6 4-1 1-1 1H3zm5-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6z"/>
          </svg>
          </span>
          <a class="d-flex align-items-center text-muted" href="#" aria-label="Add a new report">
            <span data-feather="plus-circle"></span>
          </a>
        </h6>
        <ul class="nav flex-column mb-2">
          <li class="nav-item">
          <a class="nav-link" href="#"><?php echo $_SESSION['firstname']." ".$_SESSION['lastname']; ?></a>
          </li>
          <li class="nav-item">
        <a class="nav-link" href="<?php echo (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http") . "://$_SERVER[HTTP_HOST]/logout.php";?>">Logout</a>
          </li>
        </ul>
      </div>
    </nav>