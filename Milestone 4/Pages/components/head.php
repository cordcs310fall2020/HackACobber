<?php include($_SERVER['DOCUMENT_ROOT'].'/components/config.php');?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewpiont" content="width=device-width, initial-scale"=1>
<title><?php echo $page_title;?></title>
<?php
 const CSS = array('../assets/css/default.css','../assets/css/menu.css','../assets/css/forms.css');

foreach (CSS as $css)	{
  echo '<link rel="stylesheet" href="' . $css . '" type="text/css">';
}
?>
</head>