<?php 
//start of the session and refers to the connction to database
session_start();
include('dbconnect.php');

//if the admin session see the links

if ($_SESSION['user_session']=='admin') {
    // when login succesfull the menu loads for aministrator to add bulletin

    
    try{
       if (isset($_POST['upload'])&&$_FILES['userfile']['size']>0) {
            
            $fileName = $_FILES['userfile']['name'];
            $tmpName  = $_FILES['userfile']['tmp_name'];
            $fileSize = $_FILES['userfile']['size'];
            $fileType = $_FILES['userfile']['type'];
            
            
            $fp = fopen($tmpName, 'r');
            $content = fread($fp, filesize($tmpName));
            $content = addslashes($content);
            fclose($fp); 
            
             $stmt=$conn->prepare("INSERT INTO bulletins (name, size, type, content)
            VALUES (:name, :size, :type, :content)");
            
           $stmt->bindParam(':name',$fileName);
           $stmt->bindParam(':size',$fileSize);
           $stmt->bindParam(':type',$fileType);
           $stmt->bindParam(':content',$content);
           $stmt->execute();

            
            if($stmt){
                 echo'<script>alert("You have added the file")</script>';
                
            }
          
             else {
                echo "There is an error ".$sql."<br/>".mysqli_error($conn);
            }
            } 
                    include('header.php');
  
        //this is a form to add bulletin
       echo '
       <br>
       <h2>Add Bulletin</h2>
       <br>
       <br>
       <form method="post" enctype="multipart/form-data">
        <table width="450" border="0" cellpadding="0" cellspacing="0" class="box">
        <tr> 
        <td width="346">
        <input type="hidden" name="MAX_FILE_SIZE" value="2000000">
        <input name="userfile" type="file" id="userfile"> 
        </td>
        <td width="280"><input name="upload" type="submit" class="box" id="upload" value=" Upload "></td>
        </tr>
        </table>
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