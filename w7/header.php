<?php

  if($_SESSION["loggedIn"] == false) {

    header('Location: index.php');    //simple and easy way for my session vars hope this is alright


  }

  else{


  }


  
?>

<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <a class="navbar-brand" href="#">Navbar</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarNav">
    <ul class="navbar-nav">
      <li class="nav-item active">
        <a class="nav-link" href="menu.php">Main Menu <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="patient_search.php">Search</a>        <!--Creating a way for my user to get to the patient search page-->
      </li>
      <li class="nav-item">
        <a class="nav-link" href="logout.php">Log Out</a>
    </ul>
  </div>