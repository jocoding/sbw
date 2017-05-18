<?php include('header.php');?>
  <?php
     try {//prepare and bind - displays all the users with a amend link
    echo'<H1>The Events Calendar:<h1/>';
        $stmt=$conn->prepare("SELECT * FROM add_events ORDER BY date_time DESC");
        $stmt->execute();
         
        //will display all the users with link to amend
        while($row=$stmt->fetch(PDO::FETCH_ASSOC)){
           
            echo'
            
            <h3>'.$row["event_title"].'</h2>
            <p>Date:'.$row["date_time"].'</p>
            <p>'.$row["description"].'</p>
            <p>Author:'.$row["author"].'</p>
            ';
        }
    } 
    
    catch (PDOException $e) {
        echo "Error: ".$e->getMessage();
    }
   ?>
   <?php include('footer.php');?>