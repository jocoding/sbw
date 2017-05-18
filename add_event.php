<?php 
//start of the session and refers to the conncti9on to database
session_start();
include('dbconnect.php');

//if the admin session see the links

if ($_SESSION['user_session']=='admin') {
    // when login succesfull the menu loads for aministrator for following links:write post, edit user and delete comment

    
    try{
       if (isset($_POST['add-event'])) {
            
            $author=$_SESSION['user_session'];
            $date_time=$_POST['date_timebox'];
            $event_title=$_POST["event_titlebox"];
            $description=$_POST["descriptionbox"];
            
            
            $stmt=$conn->prepare("INSERT INTO add_events(author,date_time,event_title,description) VALUES (:author,:date_time, :event_title, :description)");
            $stmt->bindParam(':author', $author);
            $stmt->bindParam('date_time',$date_time);
            $stmt->bindParam(':event_title', $event_title);
            $stmt->bindParam(':description', $description);
            
            $stmt->execute();
            if ($stmt) {
                echo'<script>alert("You have added the event")</script>';
                
            }
            else {
                echo "There is an error ".$sql."<br/>".mysqli_error($conn);
            }
            
        }
             ?><?php
       include('header.php');
  
        //this is a form to write new post
       echo '
       <br>
       <br>
       <br>
        <form method="POST" data-ajax="false" action="">    
        <label>Event Title:</label><br>
        <input type="text" name="event_titlebox" placeholder="Event title" required>   <br>   <br>
        <label>Date & Time:</label><br>
        <input type="datetime-local" name="date_timebox" placeholder="Event Date and Time" required>   <br>   <br>
        <label>Description</label><br>
        <input type="text" name="descriptionbox" placeholder="Description" required>
        <input type="submit" value="Submit a post" name="add-event">      <br><br>
        </form>
        ';
       
    } //end of try
    catch (PDOException $e) {
        echo"Error: ".$e->getMessage();
    }//end of catch
}//end of if admin session

  else {//if the seesion is not established sends to the login page
    header('Location: adminlogin.php');
}


    include('footer.php');



?>