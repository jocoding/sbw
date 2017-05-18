 
 <?php include('header.php');?>
 <?php
     try {//prepare and bind - displays all the users with a amend link
    echo'<strong>Weekly Bulletin:</strong>';
        $stmt=$conn->prepare("SELECT * FROM bulletins ORDER BY name DESC");
        $stmt->execute();
         
        //will display all the users with link to amend
        while($row=$stmt->fetch(PDO::FETCH_ASSOC)){
            echo'
          
           <a href=open_pdf.php><p>'.$row["name"].'</p></a>
            <br>
    
            ';
             

            
        }
        
    } 
    
    catch (PDOException $e) {
        echo "Error: ".$e->getMessage();
    }
    
    
   ?>
   <?php include('footer.php');?>
   
  