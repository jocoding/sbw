<?php include('header.php');?>

<div id="aside">
     <?php
     try {//prepare and bind - displays all the users with a amend link
    echo'<strong>Weekly Bulletin:</strong>';
        $stmt=$conn->prepare("SELECT * FROM bulletins ORDER BY name DESC");
        $stmt->execute();
         
        //will display all the users with link to amend
        while($row=$stmt->fetch(PDO::FETCH_ASSOC)){
            echo'
            
            <p>'.$row["name"].'</p>
    
            ';
        }
    } 
    
    catch (PDOException $e) {
        echo "Error: ".$e->getMessage();
    }
   ?>
<a href="https://www.facebook.com/groups/Stbrigidstoryglen/"><img src="images/facebook.png" width="48" height="48" alt="Twitter" /></a>
<a href="https://twitter.com/stbrigidspar/"><img src="images/twitter.png" width="48" height="48" alt="Facebook" /></a>

<br>
<br>
</div>
<div id="article">
    <h1>Welcome to our St Brigid's Safeguarding Information.</h1>
    <input onclick='responsiveVoice.speak("Welcome to our St Brigids Parish website. Awaiting content from the client.");' type='button' value='🔊 Play' />

</div>


<div id="events">
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
   </div>


<?php include('footer.php');?>