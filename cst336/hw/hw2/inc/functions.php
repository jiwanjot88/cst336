<?php
        
          
        function displaySymbol($randomValue, $pos){
              $randomValue = rand(0,3);
                    
            switch($randomValue){
            
                case 0: $symbol = "coin";
                    break;
                case 1: $symbol = "globe";
                    break;
                case 2: $symbol = "money";
                    break;
                case 3: $symbol = "arrow";
                    break;
                case4: $symbol = "palm";
            }    //end switch
        
        echo "<img id='reel$pos' src='img/$symbol.png' alt='$symbol' title='" . ucfirst($symbol). "' width='70'>"  ;
       }  
      
    
    
          function displayPoints($randomValue1, $randomValue2, $randomValue3,$randomValue4){
        
            echo "<div id= 'output'>";
            if($randomValue1 == $randomValue2 && $randomValue2 == $randomValue3){
                switch($randomValue1){
                    case 0: $totalPoints = 1000;
                            echo "<h1> Cash! </h1>";
                            break;
                    case 1: $totalPoints = "Trip";
                            break;
                    case 2: $totalPoints = "Bankrupt";
                            break;
                    case 3: $totalPoints = "Getaway";
                            break;
                    case 4:
            }
            echo "<h2> You won $totalPoints !</h2>";
        } else{
            echo "<h3> Try Again!  </h3>";
        }
        echo "</div>";
        
     
    }

       function play(){
          for($i=0; $i<4; $i++){
            ${"$randomValues" . $i } = rand(0,3);
           displaySymbol(${"randomValue" . $i}, $i );
        }
        displayPoints($randomValue1, $randomValue2, $randomValue3, $randomValue4);
       }
?>

