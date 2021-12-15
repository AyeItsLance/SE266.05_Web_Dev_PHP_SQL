<?php

  if($_SESSION["loggedIn2"] == false) {

    header('Location: index.php');    //simple and easy way for my session vars hope this is alright


  }

  else{


  }
?>

<!--THIS IS MY ADMIN ACCOUNT HEADER-->
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Cars</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
  <style type="text/css">
      

    #center{

      
      text-align: center;
      
      border: 3px solid gray;


    }

        
  </style>
</head>
<body>

<nav id='center' class="navbar navbar-inverse">

  <div class="container-fluid">

    <div class="navbar-header">
      <a href="admin.php" class="navbar-brand">Main Menu</a>
    </div>

    <ul class="nav navbar-nav navbar-right">
      <li><a href="logout.php"><span class="glyphicon glyphicon-log-out"></span> Logout</a></li>
    </ul>

  </div>

</nav>
  
<div class="container">