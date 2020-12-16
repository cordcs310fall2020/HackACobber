<?php
require_once('section/cookies.php');
$connect = true;
$fileconf = "database/db.config";
if (file_exists($fileconf)) {
	$env = json_decode(file_get_contents($fileconf)); 
	$dbco= mysqli_connect($env->host, $env->root, $env->pass, $env->db, $env->port);
}else{
    $connect = false;
}

if (mysqli_connect_errno()) {
	$connect = false;
}
if ($connect = false) {
    die("Error connecting to database: " . mysqli_connect_error());
}
define ('ROOT_PATH', realpath(dirname(__FILE__)));
?>