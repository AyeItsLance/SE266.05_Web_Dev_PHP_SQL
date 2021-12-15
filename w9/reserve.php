<?php

    session_start();


    include_once __DIR__ . "/header.php";



?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reserve Cars</title>  
</head>
<body>

<style>

    h1{
        text-align: center;
    }

</style>

    <?php

        

        //COPIED OVER FROM WEEK 4
        include __DIR__ . '/functions.php';
        include __DIR__. '/model_car.php';
        



        $carMake = filter_input(INPUT_POST, 'carMake');         //having these up top to force the program to stick after entering it in

        $carModel = filter_input(INPUT_POST, 'carModel');

        $carYear = filter_input(INPUT_POST, 'carYear');       

        $carMiles = filter_input(INPUT_POST, 'carMiles', FILTER_VALIDATE_FLOAT);     

        $carColor = filter_input(INPUT_POST, 'carColor');        

        $id = filter_input(INPUT_GET, 'carID');




        $row = getCars($id);

        $id = filter_input(INPUT_GET, 'carID', FILTER_VALIDATE_FLOAT);
        

        $carMake = $row['carMake'];

        $carModel = $row['carModel'];

        $carYear = $row['carYear'];

        $carMiles = $row['carMiles'];

        $carColor = $row['carColor'];

        

        

    



        


        

        

    ?>

    <h1>Would you like to reserve this car?</h1>


    <p>Reserving the car removes it from the listing so you have first dibs on test driving and even buying the car!!<p>

    <!--ALL MY FORM INFORMATIONS-->

    <form action='reserve.php' method='post'>

    


        <input type="hidden" name="carID" value="<?= $id;?>">

      

        <label><strong>Car Make</strong></label>
        <input type='text' disabled="disabled" name='carMake' placeholder='' value="<?= $carMake; ?>" />

        <br>
        <br>

        <label><strong>Car Model</strong></label>
        <input type='text' disabled="disabled" name='carModel' placeholder='' value="<?= $carModel; ?>"/>

        <br>
        <br>

        <label><strong>Car Year</strong></label>
        <input type='text' disabled="disabled" name='carYear' placeholder='' value="<?= $carYear; ?>"/>
        

        <br>
        <br>

        <label><strong>Number of Miles</strong></label>
        <input type='text' disabled="disabled" name='carMiles' placeholder='' value="<?= $carMiles; ?>"/>

        <br>
        <br>

        <label><strong>Color of Car</strong></label>
        <input type='text' disabled="disabled" name='carColor' placeholder='' value="<?= $carColor; ?>"/>

        

        <button type='submit' name='deleteBtn'> Reserve</button>

        <br>

        <a href="sellerMenu.php">Return to Your Car List</a>


       

    </form> <!--END OF FORM-->


    <?php


        


        if(isset($_POST['deleteBtn'])) {

            $id = filter_input(INPUT_POST, 'carID', FILTER_VALIDATE_INT);

            deleteCar($id);

            var_dump($id);

            header('Location: sellerMenu.php');      //creating my own button for delete once pressed the delete function runs
        }



        

    

        $error = 0;       //error to make suer user fixes everything
        $error1 = 0;
        $error2 = 0;
        $error3 = 0;

        if(isset($_POST['submitBtn'])) {

            $carYear = filter_input(INPUT_POST, 'carYear');

            if(strlen($carYear) != 4)
            {
                echo "please make sure there's 4 digits for the Year";
                $error = 1;
            }
            else{
                $error = 0;
            }


            $carMake = filter_input(INPUT_POST, 'carMake');
            if($carMake != 'Honda' && $carMake != 'BMW' && $carMake != 'Toyota' && $carMake != 'RAM' && $carMake != 'Nissan' && $carMake != 'Dodge' && $carMake != 'Chevrolet' && $carMake != 'Ford' && $carMake != 'Tesla' && $carMake != 'Jeep' && $carMake != 'Mazda' && $carMake != 'Hyundai' && $carMake != 'Lexus' && $carMake != 'Volvo' && $carMake != 'Kia' && $carMake != 'Mercedes' && $carMake != 'Volkswagen' && $carMake != 'Lincoln' && $carMake != 'GMC' && $carMake != 'Mitsubishi') //long code easier way???
            {

                echo '<br>Please enter in a real car make, if you beleive this to be an error please contact our support';

                $error1 = 1;

            }
            else{
                $error1 = 0;
            }

            $carModel = filter_input(INPUT_POST, 'carModel');

            if($carModel == ''){

                echo '<br>Please enter in a real model';
                $error2 = 1;
            }
            else{


                $error2 = 0;
            }

            $carColor = filter_input(INPUT_POST, 'carColor');
            
            if($carColor != 'Red' && $carColor != 'Yellow' && $carColor != 'Blue' && $carColor != 'Black' && $carColor != 'White' && $carColor != 'Gray' && $carColor != 'Purple' && $carColor != 'Orange' && $carColor != 'Green' && $carColor != 'Custom'){

                echo '<br>Please enter in a real color. Colors are "RED, YELLOW, BLUE, BLACK, WHITE, GRAY, PURPLE, ORANGE, GREEN, Or CUSTOM';

                $error3 = 1;
            }
            else{


                $error3 = 0;
            }


        

            if($error == 0 && $error1 == 0 && $error2 == 0 && $error3 == 0)     //at the end if my error is 0 that means no errors occured throughout my program and im all set to continue as usal
                {

                    //displaying my data along with the else statement
                    $id = filter_input(INPUT_POST, 'carID', FILTER_VALIDATE_INT);

                    $resluts = updateCar($id, $carMake, $carModel, $carYear, $carMiles, $carColor, 1);    //calling my add patient function which will actually add my patient

                    

                    if (isPostRequest()) {
                
                        echo "Car added";

                        header('Location: sellerMenu.php');

                    }

                    header('Location: sellerMenu.php');

                    
                

                    //creating my class system

        
                }
                else

            {       //if error equals anything else this means that something happened along the way and I need to go back and correct

                echo '<br>Please fix your errors';

                header('Location: sellerMenu.php');
            }

           

        } else{

            echo '<hr/>Loading information';
        }



    ?>
    
    
</body>
</html>