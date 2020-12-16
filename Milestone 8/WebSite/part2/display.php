<?php
    
    $id=$_POST["phone_Num"];
    $mysqli = new mysqli("localhost","avasgpfl_ashrest2","Ava54555stha","avasgpfl_MY_SITE");
    $result = $mysqli -> query("SELECT * FROM CHURCH_DATA WHERE Id=$id");
      
            while ($row = $result->fetch_assoc()){
                
               
                echo  $row["Description"]  ;
            }
?>
