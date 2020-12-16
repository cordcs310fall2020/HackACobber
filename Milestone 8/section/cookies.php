<?php
require_once('dlinks.php');
setcookie(session_name('churchdatabase'), session_id(), strtotime('NOW+60MINUTES'),'',$actual_default_link);
session_start();
?>