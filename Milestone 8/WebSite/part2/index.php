 <?php
        session_start();
?>
<html>
    <head >
        <title>This the database page</title>
        <link rel="stylesheet" href="Default.css">
    </head>
  
 
    <body>
        <?php
         $path = $_SERVER['DOCUMENT_ROOT'];
          $path .= "/menu/user-top-menu.php";
          
        include_once($path);  ?>
        <script>
            function displayData(phoneNum){
                var xhttp = new XMLHttpRequest();
                
                xhttp.onreadystatechange=function(){
                    
                        document.getElementById("description").innerHTML = this.responseText;
                
                };
                xhttp.open("POST","display.php",true);
                xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
                xhttp.send("phone_Num=" +phoneNum);
            }
        </script>
    <Div id="nav">This is where the navigation bar will be.</Div>
    <div class="grid-container">
    <div class="grid-item grid-item-1">
    <?php
        $_SESSION["logged"]=1;
        if ($_SESSION["logged"]==1){
            
         
            $mysqli = new mysqli("localhost","avasgpfl_ashrest2","Ava54555stha","avasgpfl_MY_SITE");
            
            $result = $mysqli -> query("SELECT * FROM CHURCH_DATA ");
            
            while ($row = $result->fetch_assoc()){
                $id=$row["Id"];
                echo "<a href=\"javascript:displayData($id);\"><p class='identifier'>" . $row["Pname"] ."</p></a>";
            }
            
        } else {
            echo "You are not logged in";
        }
    ?>
    </div>
    <div class="grid-item grid-item-2">
        <h4 id="description-Header">Research</h4>
        <p id="description">Content Should be here</p>
    </div>
    </div>
    <?php
         $path = $_SERVER['DOCUMENT_ROOT'];
          $path .= '/section/footer.php';
          
        include_once($path); 
    ?>
    </body>
    <?php
    $path = $_SERVER['DOCUMENT_ROOT'];
          $path .= "/assets/script-link.php";
          
    include($path);  ?>
</html>