<?php include('dbconnect.php'); ?>

<!DOCTYPE html> 
 <html> 
 <head> 
 <title>Saint Brigid's Parish</title> 
 <link rel="stylesheet" type="text/css" href="css/headers.css"/>
 <link rel="stylesheet" type="text/css" href="css/asside_article.css"/>
 <link rel="stylesheet" type="text/css" href="css/form.css"/>
 <!--the viewport shrinks the content of the website with the size of the device-->
 <meta name="viewport" content="width=device-width, initial-scale=1">
 
  <!--
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  -->
 <script src='https://code.responsivevoice.org/responsivevoice.js'></script>
 </head>
 <body>
 <header>
  
  <img src="images/banner2.jpg" style="width: auto; height: auto;max-width: 1300px;max-height: 300px"/>
 
  <div class="title">
   <h1>Saint Brigid's Parish</h1>
  </div>
 </header>
 
 <ul id="nav">
   
  <li><a href="index.php">Parish</a></li>
  <li><a href="admin.php">Admin</a></li>
  <li><a href="services.php">Services</a></li>
  <li><a href="safe.php">Safeguarding</a></li>
  <li><a href="info.php">Information</a></li>
  <li><a href="links.php">Links</a></li>
  <li><input onclick='responsiveVoice.speak("Parish, Admin, Services, Safeguarding, Information, Links");' type='button' value='🔊 Play' /></li>
 </ul>
</br>
 </br>
 </br>
 </br>
 </br>
 </br>
</div>

