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

<br>
<h3>If you need to contact St Brigid's <br>please follow this link:
 <a href="http://www.123contactform.com/form-2525020/Contact-Form">Contact Form</a></h3>
<br>
 
 <br>
 <br>
 <a href="http://www.cathedralg1.org/">Saint Andrew's Cathedral Glasgow</a></br>
 <a href="http://www.standrewsbearsden.co.uk/">St Andrew's RC Church Bearsden</a></br>
<a href="http://stcadocscatholicchurch.org/">St Cadoc's Catholic Church</a></br>
<br>
<br>
<br>
</div>
<div id="events">
     <?php
     try {//prepare and bind - displays all the users with a amend link
    echo'<strong>The Events Calendar:</strong>';
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