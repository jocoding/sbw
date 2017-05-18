<?php include('header.php');

include('dbconnect.php');
//strats session
session_start();
//when the user logins with admin data and they are included in DB the connection will be established 
if($_SESSION['user_session']=='admin'){
    header('Location: admin.php');
}

if (isset($_POST['login'])) {
    try {
        //data from the form is put to the variable
        $uname=$_POST['abox'];
        $upass=$_POST['passbox'];
        //set up statment and select the check the values in DB
        //prepare and bind
        $stmt=$conn->prepare("SELECT * FROM admin WHERE admin=:uname AND password=:upass LIMIT 1");
        $stmt->bindParam(':uname', $uname);
        $stmt->bindParam(':upass', $upass);
        $stmt->execute();
        
        $userRow=$stmt->fetch(PDO::FETCH_ASSOC);
        
        if($stmt->rowCount()>0){
            //admin record found set admin session up
            $_SESSION['user_session']='admin';
            header('Location: admin.php');
        }
        else {
            echo'<script>alert("Wrong username or password. Try enter correct credentials.")</script>';
            
        }
       //if there is issue the relevant error message will be displayed
    } catch (PDOException $e ) {
        echo $e->getMessage();
    }
}
?>

<!-- CSS container-->
<article class="article_index">
<h1>Administrator Login Page</h1>
<!--form for the administrator to login-->
<form name="adminlogin" data-ajax="false" method="POST">
    
    <input type="text" name="abox" placeholder="name" required><br>
    <input type="password" name="passbox" placeholder="password" required>
    
    <input type="submit" value="Login" name="login" required>
</form>
</article>


<?php include('footer.php');?>