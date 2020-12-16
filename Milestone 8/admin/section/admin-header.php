<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="HackACobber" />
        <title><?php echo $page_title;?> | Admin</title>
    <style>
      .bd-placeholder-img {
        font-size: 1.125rem;
        text-anchor: middle;
        -webkit-user-select: none;
        -moz-user-select: none;
        -ms-user-select: none;
        user-select: none;
      }

      @media (min-width: 768px) {
        .bd-placeholder-img-lg {
          font-size: 3.5rem;
        }
      }
    </style>
    <?php include_once(ROOT_PATH .'/assets/style-link.php');  ?>
    <link rel="stylesheet" href="<?php echo $actual_link?>/assets/style.php">
  </head>
  <body>
<?php include_once(ROOT_PATH .'/menu/admin-top-menu.php');  ?>

<div class="container-fluid">
  <div class="row">
    
<?php include_once(ROOT_PATH .'/menu/admin-side-menu.php');  ?>

    <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-md-4">
      <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">