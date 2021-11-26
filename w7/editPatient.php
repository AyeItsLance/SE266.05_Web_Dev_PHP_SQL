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
    <title>Edit Patient</title>  
</head>
<body>

    <?php

        

        //COPIED OVER FROM WEEK 4
        include __DIR__ . '/functions.php';
        include __DIR__. '/model_patient.php';
        //setting up some functions for later use
        function age ($bdate) {
            $date = new DateTime($bdate);
            $now = new DateTime();
            $interval = $now->diff($date);
            return $interval->y;
        }
        
        function isDate($dt) {
            try {
            $d = new DateTime($dt);
            return (true);
            } catch(Exception $e) {
            return false;
            }
        }






        $firstName = filter_input(INPUT_POST, 'fName');         //having these up top to force the program to stick after entering it in

        $lastName = filter_input(INPUT_POST, 'lName');

        $marriedYes = filter_input(INPUT_POST, 'marriedYes');       

        $marriedNo = filter_input(INPUT_POST, 'marriedNo');     

        $age = filter_input(INPUT_POST, 'birthDate');     
        
        
        $action = filter_input(INPUT_GET, 'action');

        $id = filter_input(INPUT_GET, 'patientId');




        $row = getPatients($id);

        $id = filter_input(INPUT_GET, 'patientId', FILTER_VALIDATE_FLOAT);
        

        $firstName = $row['patientFirstName'];

        $lastName = $row['patientLastName'];

        $status = $row['patientMarried'];

        $age = $row['patientBirthDate'];

        

    



        


        

        

    ?>

    <h1>Please Sign This Form</h1>

    <!--ALL MY FORM INFORMATIONS-->

    <form action='editPatient.php' method='post'>

    


        


        
        <input type="hidden" name="patientId" value="<?= $id;?>">

      

        <label><strong>First Name</strong></label>
        <input type='text' name='fName' placeholder='First Name' value="<?= $firstName; ?>" />

        <label><strong>Last Name</strong></label>
        <input type='text' name='lName' placeholder='Last Name' value="<?= $lastName; ?>"/>

        <br>
        <br>

        <label for='married'><strong>Married?</strong></label><br>

        <input type='radio' name='marriedYes' value="<?= $status; ?>" <?php if($marriedYes != '') echo 'Checked'; ?> >
        <label for ='mYes'>Yes</label>
        
        <br>

        <input type='radio' name='marriedNo' value="<?= $status; ?>" <?php if($marriedNo != '') echo 'Checked'; ?>>
        <label for ='mNo'>No</label>
        
        <br>
        <br>

        <label><strong>Date of Birth</strong></label>
        <input type='date' name='birthDate' value="<?= $age; ?>" />

        <br>




        <br>
        <button type='submit' name='submitBtn'> Update Patient </button>

        <button type='submit' name='deleteBtn'> Delete Patient</button>

        <br>

        <a href="menu.php">Return to Patient List</a>


       

    </form> <!--END OF FORM-->


    <?php


        


        if(isset($_POST['deleteBtn'])) {

            $id = filter_input(INPUT_POST, 'patientId', FILTER_VALIDATE_INT);

            deletePatient($id);

            var_dump($id);

            header('Location: menu.php');      //creating my own button for delete once pressed the delete function runs
        }



        

    

        $error1 = 0; //creating a error var
        $error2 = 0; //creating a error var
        $error3 = 0; //creating a error var
        $error4 = 0; //creating a error var
        $error5 = 0; //creating a error var         all of these error vars are for different areas which will force a user to enter everything in before the information at the end displays

        //first we will be setting up the first and last names



        if(isset($_POST['submitBtn'])) {        //all of my code will activate once my submit btn is pressed

           

            echo '<hr/> Form Submited <br/>';

            

            $firstName = filter_input(INPUT_POST, 'fName');                 //grabbing my first name and storing it

            if($firstName == ''){

                echo 'Make sure your first name is a real name!<br>';       //making sure my first name has a value

                $error1 = 1;     //what these errors are doing is storing the value this is imporant later

            } 
            else{

                $error1 = 0; //what these errors are doing is storing the value this is imporant later
            }

            $lastName = filter_input(INPUT_POST, 'lName');      //grabbing my last name and storing it

            if($lastName == ''){

                echo 'Make sure your last name is a real name!<br>';        //making sure my last name has a value

                $error2 = 1;

            } else{

                $error2 = 0;
            }

            //after grabbing my first and last names fields I store it into Full name which is at the bottom


            //now on to marriage


            $marriedYes = filter_input(INPUT_POST, 'marriedYes');       //storing the yes value

            $marriedNo = filter_input(INPUT_POST, 'marriedNo');     //storing the no value

            if($marriedYes != '')
            {
                $status = 1;        //1 for true
            }

            if($marriedNo != '')
            {
                $status = 0;        //0 for false
            }




            if($marriedYes == '' and $marriedNo == ''){

                echo 'Make sure you select your mariage status! <br>';      //if neither yes or no are filled out will print error

                $error3 = 1;

                

            } else{

                $error3 = 0;
            }


            //my set up for age



            $age = filter_input(INPUT_POST, 'birthDate');


            if($age == '')
            {
                echo 'Please select an age! <br>';

                $error4 = 1;
            } else{

                $error4 = 0;
            }


            




           

    


           

            if($error1 == 0 and $error2 == 0 and $error3 == 0 and $error4 == 0)     //at the end if my error is 0 that means no errors occured throughout my program and im all set to continue as usal
            {

                //displaying my data along with the else statement
                

                

                //updatePatient($id, $firstName, $lastName, $status, $age);

                

            
                $id = filter_input(INPUT_POST, 'patientId', FILTER_VALIDATE_INT);
    
                $results = updatePatient($id, $firstName, $lastName, $status, $age);            //storing the update function into results

                echo 'Full Name: ', $firstName, ' ', $lastName, '<br>';

                echo 'Date of Birth: ', $age, '<br>';

                
                if($status == false)
                {
                    echo 'Married: No<br>';
                }
                
                else{       //status will come in later, this is what is stored and sent to the db if false will equal 0 and true will equal 1

                    echo 'Married: Yes<br>';
                }

               

                
               

                echo "Paitent Updated";


                header('Location: menu.php');      //once the update function fully runs user gets sent back to main page

               
            

            

                //creating my class system

    
            }
            else
            {       //if error equals anything else this means that something happened along the way and I need to go back and correct

                echo 'Please fix your errors';


                header('Location: menu.php');      //forcing user back to main page even for errors

                

            }

           

        } else{

            echo '<hr/>Loading information';

            
        }



    ?>
    
    
</body>
</html>