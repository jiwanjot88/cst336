<?php
include 'inc/functions.php';
?>

<!DOCTYPE html>
<html>
    <head>
        <title> Wheel of fortune </title>
        <meta charset="utf-8" />
        <style>
            @import url("css/styles.css");
        </style>
    </head>
    <body>
        
    <div id="main"
       <?php
  
       play();
        ?>
     <form>
         <input type="submit" value="Spin!"/>
     </form>
        
    </div>

    </body>
</html>