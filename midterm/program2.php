<?php
    include 'dbConnection.php';
    
    $conn = getDatabaseConnection("midterm");
    function displaySearchResults(){
        global $conn;
        
        $sql = "SELECT quoteId, quote FROM `q_quotes` where author = 'Albert Einstein'";
        $stmt = $conn->prepare($sql);
        $stmt->execute();
        $records = $stmt->fetchAll(PDO::FETCH_ASSOC);
        foreach ($records as $record) {
            
            echo "<option value='".$record["quoteid"]."' >" . $record["quote"] . "</option>";
            
        }
    }
?>

<!DOCTYPE html>
<html>
    <body>
    <h1>Albert Einstein quotes</h1>
            <?= displaySearchResults() ?>
    </body>
</html>