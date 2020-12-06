<?php 
	 if (isset($_SESSION['user'])) { 

	 	if ($_SESSION['user']['ROLE'] != "1") {

	 		header('Location: user.php');
	 	}
	 	
      }else{
        header('Location: login.php');
      }
?>
