<?php


   

  





    include __DIR__ . "/functions.php";

    include __DIR__ . "/model_car.php";

    // $user1 = 'donald';
    // $pw1 = '';
    // $protectedPW1 = 

    // $user2 = 'mickey';
    // $pw2 = '';
    // $protectedPW2= 

    // $user3 = 'goofy';
    // $pw3 = '';
    // $protectedPW3 = 
    
    // insertIntoDB($user3, $protectedPW3);

    // $pw = '';

    // $salt = '';

    // $protectedPW = "";

    //after inserting it into my db I comment it out so the code doesn't keep running on start up

  
    session_start();        




    $_SESSION["loggedIn"] = false;


    $_SESSION["loggedIn2"] = false;




    

    $results = getUser();



    //my code here

   


            


    


        if(isPostRequest()) {

            $userName = filter_input(INPUT_POST, 'userName');
            $password = filter_input(INPUT_POST, 'password');
        
            $stmt = checkLogin($userName, $password);


        

            if($stmt > 0 && $userName == 'donald'){

                //copy and paste over

                $_SESSION["loggedIn2"] = true;

                header('Location: admin.php');      //this is so if the username equals the username of the admin itll bring users to admin page

            
                


            }

            elseif($stmt > 0){

                $_SESSION["loggedIn"] = true;       //once logged in and actually logged in this will set the loggedIn session var to true, but everything you're initally loaded onto the site you start off whith it being false,
                

                

                header('Location: sellerMenu.php');     //pushes user to the seller menu
        
                
            }
            

            

            

            else{

                echo 'login failed!';       //will display if login fails
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
<title>Cars Login</title>
</head>
<body>

    <div id="mainDiv">
        <form method="post" action="login.php">
           
            <div class="rowContainer">
                <h3>Please Login</h3>
            </div>
            <div class="rowContainer">
                <div class="col1">User Name:</div>
                <div class="col2"><input type="text" name="userName" value=""></div> 
            </div>
            <div class="rowContainer">
                <div class="col1">Password:</div>
                <div class="col2"><input type="password" name="password" value=""></div> 
            </div>
              <div class="rowContainer">
                <div class="col1">&nbsp;</div>
                <div class="col2"><input type="submit" name="login" value="Login" class="btn btn-warning"></div> 
            </div>
            
        </form>
        
    </div>


</body>
</html>