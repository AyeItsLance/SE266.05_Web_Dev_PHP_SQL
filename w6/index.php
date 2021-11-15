<?php

    $pwd ="password12345678";    //creating and storing password, and immeditally hashing it but after the hash we reset the pwd to null 


    

    //$storeInDB = sha1($pwd.$salt);


   


    // $userName = 'donald';

    // $pw = "duck";

    // $salt = 'secret stuff';

    // $protectedPW = sha1($pw.$salt);


    





    include __DIR__ . "/functions.php";

    include __DIR__ . "/model_schools.php";


    //insertIntoDB($userName, $protectedPW);

    // $pw = '';

    // $salt = '';

    // $protectedPW = "";

    //after inserting it into my db I comment it out so the code doesn't keep running on start up

  


    //my code here


    if(isPostRequest()) {

        $username = filter_input(INPUT_POST, 'userName');
        $password = filter_input(INPUT_POST, 'password');
       
        $stmt = checkLogin($username, $password);


        if($stmt > 0){


            header('Location: upload.php');
            


        }

        else{

            echo 'login failed!';
        }
        
    
    }



?>


<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" 
          integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <style type="text/css">
        #mainDiv {margin-left: 100px; margin-top: 100px;}
        .col1 {width: 100px; float: left;}
        .col2 {float: left;}
        .rowContainer {clear: left; height: 40px;}
        .error {margin-left: 100px; clear: left; height: 40px; color: red;}
    </style>
<title>Schools Upload</title>
</head>
<body>

    <div id="mainDiv">
        <form method="post" action="index.php">
           
            <div class="rowContainer">
                <h3>Please Login</h3>
            </div>
            <div class="rowContainer">
                <div class="col1">User Name:</div>
                <div class="col2"><input type="text" name="userName" value="donald"></div> 
            </div>
            <div class="rowContainer">
                <div class="col1">Password:</div>
                <div class="col2"><input type="password" name="password" value="duck"></div> 
            </div>
              <div class="rowContainer">
                <div class="col1">&nbsp;</div>
                <div class="col2"><input type="submit" name="login" value="Login" class="btn btn-warning"></div> 
            </div>
            
        </form>
        
    </div>


</body>
</html>