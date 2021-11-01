<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form</title>
</head>
<body>

    <?php

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

    ?>

    <h1>Please Sign This Form</h1>

    <!--ALL MY FORM INFORMATIONS-->

    <form action='addPatient.php' method='post'>
        <label><strong>First Name</strong></label>
        <input type='text' name='fName' placeholder='First Name' value="<?php echo $firstName; ?>" />

        <label><strong>Last Name</strong></label>
        <input type='text' name='lName' placeholder='Last Name' value="<?php echo $lastName; ?>"/>

        <br>
        <br>

        <label for='married'><strong>Married?</strong></label><br>

        <input type='radio' name='marriedYes'<?php if($marriedYes != '') echo 'Checked'; ?> >
        <label for ='mYes'>Yes</label>
        
        <br>

        <input type='radio' name='marriedNo' <?php if($marriedNo != '') echo 'Checked'; ?>>
        <label for ='mNo'>No</label>
        
        <br>
        <br>

        <label><strong>Date of Birth</strong></label>
        <input type='date' name='birthDate' value="<?php echo $age; ?>" />

        <br>




        <br>
        <input type='submit' name='submitBtn' />

        <br>

        <a href="index.php">Return to Patient List</a>


       

    </form> <!--END OF FORM-->


    <?php   

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
                $status = 1;
            }

            if($marriedNo != '')
            {
                $status = 0;
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

                $resluts = addPatient ($firstName, $lastName, $status, $age);    //calling my add patient function which will actually add my patient

                echo 'Full Name: ', $firstName, ' ', $lastName, '<br>';

                echo 'Date of Birth: ', $age, '<br>';

                
                if($status == false)
                {
                    echo 'Married: No<br>';
                }
                
                else{

                    echo 'Married: Yes<br>';
                }

                if (isPostRequest()) {
            
                    echo "Paitent added";
                }

            

                //creating my class system

    
            }
            else
            {       //if error equals anything else this means that something happened along the way and I need to go back and correct

                echo 'Please fix your errors';
            }

           

        } else{
            echo '<hr/>Loading information';
        }

       


    ?>
    
    
</body>
</html>