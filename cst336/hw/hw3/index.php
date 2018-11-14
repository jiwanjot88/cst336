<?php
  
   if(empty($_GET['keyword']) && empty($_GET['category']) && isset($_GET["submit"]))
      {
        echo"<h2> Questionare </h2>";
      }
    
  if((($_GET['keyword'] == "" || empty($_GET['keyword'])) && !empty($_GET['category'])) || (!empty($_GET['keyword']) && !empty($_GET['category'])) || (!empty($_GET['keyword']) && empty($_GET['category']))) { 
      
      
      $keyword = $_GET['keyword'];
      
      if (isset($_GET['layout'])) { 
        
        $orientation = $_GET['layout'];
        
      }
      
      if (!empty($_GET['category'])) { 
        $keyword = $_GET['category'];
      }
 
  }  
   
 
 function checkCategory($category){
   
    if ($category == $_GET['category']) {
       echo " selected";
    }
 }
 
 function checkcolor($color){
   
    if ($color == $_GET['color']) {
       echo " selected";
    }
 }
 
?>

<!DOCTYPE html>
<html>
    <head>
        <title> HW 3 </title>
    </head>
    <style>
        @import url("https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css");
        @import url("style.css");
        
    </style>
    <body>

        <form method="GET">
            <div id="layoutdiv">
            <legend>How many months in a year?</legend> 
            <div></div> 
            <input type="radio" name="layout" value="12" id="hlayout" <?= ($_GET['layout']=="12")?"checked":"" ?>>
            <label for="12"> 12 </label>
            <br>
            
            <input type="radio" name="layout" value="11" id="vlayout" <?= ($_GET['layout']=="11")?"checked":"" ?>>
            <label for="11"> 11 </label>
            
            <br>
            
            <input type="radio" name="layout" value="10" id="hlayout"<?= ($_GET['layout']=="10")?"checked":"" ?>>
            <label for="10"> 10 </label>
            
            <br>
            
            </div>
            <div>
                <?php
               
                
              
                if($_GET['layout']=="12")
                {
                    echo"<h2> Correct! </h2> <div></div>";
                }
                else if($_GET['layout']!="12" && isset($_GET['layout']) ||isset($_GET["submit"]))
                {
                     echo"<h2> Incorrect!</h2> <div></div>";
                }
                
                
                ?>
            <div id="layoutdiv">
            <legend>What year is this?</legend>
            <input type="text" size="20" id= "search"name="keyword" placeholder="Enter year (2000 - 2020)" value="<?=$_GET['keyword']?>"/>
            </div>
            <div></div>
            
            <?php
            if ((!empty($_GET['keyword'])) || $_GET['keyword']=="" && isset($_GET["submit"])){
                echo"<h2> Answer the question!</h2> <div></div>";
            }
            
            else{
             if($_GET['keyword'] !='2018' && (!empty($_GET['keyword'])) || $_GET['keyword']=="" && isset($_GET["submit"]))
             {
                 echo"<h2> Incorrect!</h2> <div></div>";
            }
            else if($_GET['keyword'] =='2018' && (!empty($_GET['keyword'])) )
            {
                echo"<h2> Correct! </h2> <div></div>";
            }
            }
            ?>
                
            
            <div id="layoutdiv">
            <legend>What month is Thanksgiving?</legend>
            <div></div>
            <select name="category">
              <option value="" >  Select One </option> 
              <option value="sea" <?=checkCategory('Mar')?>>  Mar </option>
              <option <?=checkCategory('Nov')?>>  Nov </option>
              <option <?=checkCategory('Dec')?>>  Dec </option>
              <option <?=checkCategory('Jan')?>>  Jan </option>
              <option <?=checkCategory('Oct')?>>  Oct </option>
            </select>
            </div>
            
             <?php
                if($_GET['category']=="Nov")
                {
                    echo"<h2> Correct! </h2> <div></div>";
                }
                
                else if($_GET['category']!="Nov" && isset($_GET['category']))
                {
                    echo"<h2> Incorrect!</h2> <div></div>";
                }
                
                
                ?>
            
            <div id="layoutdiv">
            <legend> What food is most popular around Thanksgiving? </legend>
            <div></div>
            <input type="radio" name="food" value="Turkey" id="hlayout" <?= ($_GET['food']=="Turkey")?"checked":"" ?>>
            <label for="food"> Turkey </label>
            <br>
            
            <input type="radio" name="food" value="Rabbit" id="vlayout" <?= ($_GET['food']=="Rabbit")?"checked":"" ?>>
            <label for="food"> Rabbit </label>
            
            <br>
            
            <input type="radio" name="food" value="Chicken" id="hlayout"<?= ($_GET['food']=="Chicken")?"checked":"" ?>>
            <label for="food"> Chicken </label>
            </div>
            <div></div>
            <?php
                if($_GET['food']=="Turkey")
                {
                    echo"<h2> Correct! </h2> <div></div>";
                }
                
                else if($_GET['food']!="Turkey" && isset($_GET['food']) || isset($_GET["submit"]))
                {
                    echo"<h2> Incorrect!</h2> <div></div>";
                }
                
                
                ?>
            
            
            <div id="layoutdiv">
            <legend>What color is Pumpkin?</legend>
            <div></div>
               <select name="color">
               <option value="" >  Select One </option> 
               <option <?=checkcolor('Black')?>> Black </option>    
               <option <?=checkcolor('Orange')?>> Orange </option>    
               <option <?=checkcolor('Red')?>>  Red </option>    
               <option <?=checkcolor('White')?>> White </option>    
            </select>
            </div>
            <div></div>
             <?php
                if($_GET['color']=="Orange")
                {
                    echo"<h2> Correct! </h2> <div></div>";
                }
                
                else if($_GET['color']!="Orange" && isset($_GET['color']))
                {
                     echo"<h2> Incorrect!</h2> <div></div>";
                }
                
                
                ?>
            
            
            <div id="layoutdiv">
            <legend>Thanksgiving is in Nov and famous for Pumpkin Pies and Turkey?<legend>
            <br>
            <input type="radio" name="gen" value="Yes" id="Yes" <?= ($_GET['gen']=="Yes")?"checked":"" ?>>
            <label for="Yes">Yes</label></br>
            
            <br>
            
            <input type="radio" name="gen" value="No" id="No" <?= ($_GET['gen']=="No")?"checked":"" ?>>
            <label for="No">No</label></br>
            
            </div>
            
             
            </div>
            <?php
            if($_GET['gen']=="Yes")
                {
                    echo"<h2> Correct! </h2> <div></div>";
                }
                
                else if($_GET['gen']!="Yes" && isset($_GET['gen']) || isset($_GET["submit"]))
                {
                     echo"<h2> Incorrect! </h2> <div></div>";
                }
                
                
                ?>
            <div id="submitdiv">
            <input id="submitd" type="submit" name="submit" value="Submit!"/>
                
            <div></div>
                
            
         
        </form>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
        
    </body>
</html>