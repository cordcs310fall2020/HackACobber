<?php
session_start();
$connect = true;

$fileconf = "database/db.config";
if (file_exists($fileconf)) {
	$env = json_decode(file_get_contents($fileconf)); 
	$base= mysqli_connect($env->host, $env->root, $env->pass, $env->db);
}else{
    $connect = false;
}
 
if (mysqli_connect_errno()) {
	$connect = false;
}

$url_root = 'http://localhost/';
$url_home = 'index.php';

if(isset($_GET['logout']) && ($_GET["logout"]== true)){
	session_unset ();
	session_destroy();
}
?>