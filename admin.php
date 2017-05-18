<?php 
//start of the session and refers to the conncti9on to database
session_start();
include('dbconnect.php');

//if the admin session see the links

if ($_SESSION['user_session']=='admin') {
    // when login succesfull the menu loads for aministrator for following links:write post, edit user and delete comment
    include('header.php');
    ?><div id="article"><?php
    echo '
   
    <ul data-role="listview">
    <a href="logout.php">Log out</a>
    </ul>
    
    <ul data-role="listview">
    <h3>EVENT CALENDAR:<h3>
    <li data-icon="false"><a href="add_event.php">Add Event</a></li>
    <li data-icon="false"><a href="edit_event.php">Edit Event</a></li>
    <li data-icon="false"><a href="remove.php">Remove Event</a></li>
    <li data-icon="false"><a href="view_events.php">View Events</a></li>
    </ul>
    <ul data-role="listview">
    <h3>WEEKLY BULLETIN:<h3>
    <li data-icon="false"><a href="add_bulletin.php">Add Bulletin</a></li>
    <li data-icon="false"><a href="edit_bulletin.php">Edit Bulletin</a></li>
    <li data-icon="false"><a href="remove.php">Remove Bulletin</a></li>
    <li data-icon="false"><a href="view_bulletins.php">View Bulletin</a></li>
    </ul>
    
    <ul data-role="listview">
    <h3>REGISTERED USERS:<h3>
    <li data-icon="false"><a href="users.php">Edit Users</a></li>
    <li data-icon="false"><a href="remove_user.php">Remove users</a></li>
    <li data-icon="false"><a href="view_users.php">View users</a></li>
       </ul>
       
        
    <ul data-role="listview">
    <h3>SACRAMENT FORMS:<h3>
    <li data-icon="false"><a href="forms.php">View forms</a></li>
    <li data-icon="false"><a href="remove_form.php">Delete forms</a></li>
    </ul>
          
   
   ';?>
   </div>
   <?php
    include('footer.php');
}
else {//if the seesion is not established sends to the login page
    header('Location: adminlogin.php');
}
?>