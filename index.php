<?php include('header.php');?>

    <br>
    <br>

<div id="aside">
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
<a href="https://www.facebook.com/groups/Stbrigidstoryglen/"><img src="images/facebook.png" width="48" height="48" alt="Twitter" /></a>
<a href="https://twitter.com/stbrigidspar/"><img src="images/twitter.png" width="48" height="48" alt="Facebook" /></a>

<br>
<br>
</div>
 
<main>
<div id="article">
    <h1>Welcome to our St Brigid's Parish website.</h1>
<p>Pudding cookie chocolate apple pie biscuit tart macaroon marshmallow gummi bears. Gummies dragée icing dessert topping croissant cake. I love chocolate cake I love gingerbread bear claw. Pudding dessert chocolate cake sweet dessert candy canes caramels gummi bears gingerbread. Cotton candy sugar plum I love cookie pastry sweet roll I love chocolate cake jujubes. Jelly wafer tart. I love icing bonbon dessert danish icing icing. I love bonbon dragée. Ice cream topping I love.</p><br>
<p>Powder cheesecake ice cream pudding pie apple pie. Cheesecake liquorice oat cake lollipop chocolate bar I love liquorice fruitcake apple pie. Sugar plum sweet roll powder fruitcake halvah dessert liquorice. Lemon drops carrot cake brownie. I love marshmallow muffin ice cream candy. Bonbon soufflé jujubes carrot cake. Cheesecake gummi bears jujubes dragée icing jelly-o. Tootsie roll pudding sesame snaps. Marshmallow apple pie gummi bears icing jelly candy canes chocolate apple pie.</p>
    <input onclick='responsiveVoice.speak("Welcome to our St Brigids Parish website. Awaiting content from the client.");' type='button' value='🔊Play' />

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