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

<h2>Society of St Vincent De Paul (SSVP)</h2>
<h3>St Brigid’s Toryglen</h3>
<p>The Society at St Brigid’s currently has 5 active members.  We are involved in the following activities.</p>
<ul>
    <li>Provide tea, coffee and sandwiches for the needy on Sunday mornings.</li>
    <li>Regular visits to a few families where we provide some food, cash, clothing etc. for children.</li>
    <li>Arranging and partly funding a monthly bus trip from St Brigid’s to Carfin (13th of each month – non parishioners welcome) </li>
    <li>Providing funds for children to go on school trips where the parent(s) can’t afford to cover the cost.</li>
    <li>Support SSVP Diocesan initiatives such as the caravan projects and Ozanam centre.</li>
    <li>Support for our twin conference in India.</li>
    <input onclick='responsiveVoice.speak("Society of St Vincent De Paul (SSVP). St Brigids Toryglen. The Society at St Brigids currently has 5 active members.  We are involved in the following activities. Provide tea, coffee and sandwiches for the needy on Sunday mornings. Regular visits to a few families where we provide some food, cash, clothing etc. for children. Arranging and partly funding a monthly bus trip from St Brigids to Carfin (13th of each month – non parishioners welcome). Providing funds for children to go on school trips where the parent(s) cant afford to cover the cost. Support SSVP Diocesan initiatives such as the caravan projects and Ozanam centre.Support for our twin conference in India. Over the Christmas period we provide Christmas bags of groceries for about 40 families.");' type='button' value='🔊 Play' />
    <li>Over the Christmas period we provide Christmas bags of groceries for about 40 families.  We also provide a small gift for each of the pupils at both St Brigid’s and Toryglen primary schools.</li>
    
</ul>
<p>If you or anyone you know, living in the Toryglen area would like some assistance from the SSVP, please get in touch by post, email or phone and we will be in touch.  All enquiries are dealt with in the strictest confidence.</p>

<p>If you would like to volunteer to help with the work we do please let us know by contacting using the any of the contact details below.</p>
<input onclick='responsiveVoice.speak("Over the Christmas period we provide Christmas bags of groceries for about 40 families. We also provide a small gift for each of the pupils at both St Brigid’s and Toryglen primary schools. If you or anyone you know, living in the Toryglen area would like some assistance from the SSVP, please get in touch by post, email or phone and we will be in touch.  All enquiries are dealt with in the strictest confidence. If you would like to volunteer to help with the work we do please let us know by contacting using the any of the contact details below");' type='button' value='🔊 Play' />



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