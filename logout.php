<?php
//logout from the session
session_start();
session_destroy();
unset($_SESSION['user_session']);
header('Location: index.php');
?>