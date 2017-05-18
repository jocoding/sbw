<?php
//set up connection for database
include('dbconnect.php');
session_start();

if ($_SESSION['user_session']=='admin') {
    try {//prepare and bind - displays all the users with a amend link
    
        $stmt=$conn->prepare("SELECT * FROM add_events ORDER BY event_id DESC");
        $stmt->execute();
        include('header.php');
         
        //will display all the users with link to amend
        while($row=$stmt->fetch(PDO::FETCH_ASSOC)){
           
            echo'
            <p>'.$row["event_id"].'</p>
            <p>'.$row["author"].'</p>
            <p>'.$row["date_time"].'<a rel="external" onclick="return checkAmend();"href="edit_event.php?action=amend&date_time='.$row["date_time"].'">Edit Date and Time</a></p>
            <p>'.$row["event_title"].'<a rel="external" onclick="return checkAmend();"href="edit_event.php?action=amend&event_title='.$row["event_title"].'">Edit Event Title</a></p>
            <p>'.$row["description"].'<a rel="external" onclick="return checkAmend();"href="edit_event.php?action=amend&description='.$row["description"].'">Edit Description</a></p>
            ';
        }
    } 
    catch (PDOException $e) {
        echo "Error: ".$e->getMessage();
    }
    //if submitted action was from amend form
    if (isset($_POST['amend'])) {
        $date_time=$_POST["date_timebox"];
        $event_title=$_POST["event_titlebox"];
        $description=$_POST["descriptionbox"];
        //chosing the event for editing
        //this paert needs a revision and further research
        $stmt=$conn->prepare("UPDATE add_events SET add_event=:add_event WHERE event_id=:event_id");
        $stmt->bindParam(':event_id',$event_id);
        $stmt->bindParam(':date_time',$date_time);
        $stmt->bindParam(':description',$description);
        $stmt->execute();
        if ($stmt) {
            
        echo'<script>alert("Record Updated")</script>';
        echo'<script>location.href="admin.php"</script>';
        
        }
        else {
            echo"There is an error ".$sql."<br/>".mysqli_error($conn);
        }
    }
    //if submitted action was amended
    if ($_GET['action']=='amend') {
        // if delete was requested AND an id is present
        $num=$_GET['event_id'];
        $stmt=$conn->prepare("SELECT event_id, date_time, description FROM add_events WHERE event_id= :num");
        $stmt->bindParam(':event_id', $event_id);
        $stmt->bindParam(':date_time', $date_time);
        $stmt->bindParam(':description', $description);
        $stmt->execute();
        if ($stmt) {
            $row=$stmt->fetch(PDO::FETCH_ASSOC);
            ?>

<?php
            echo'
            <form method="POST" data-ajax="false" action="">
            <label>Event title</label>
            <input type="hidden" name="event_titlebox" value="'.$row['event_id'].'">
            <label>Date and Time</label>
            <input type="text" name="date_timebox" required value="'.$row['date_time'].'">
            <label>Description</label>
            <input type="text" name="descriptionbox" value="'.$row['description'].'">
            <input type="submit" value="Make Changes" name="amend">
            </form>
            ';
            ?>
            </article>
            <?php
        }
        else {
            echo"There is an Error ".$sql."<br/>".mysqli_error($conn);
        }
    }
}//end of admin check
else {
    header('Location: adminlogin.php');
}
?>
</article>
<?php include('footer.php');?>