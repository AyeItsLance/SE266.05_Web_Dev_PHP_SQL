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



        function bmiHeight($num1, $num2) {

            $combined = $num1 * 12 + $num2;


            $total = $combined * 0.0254;


            return $total;
            
        }


        function bmiWeight($num1){

            $total = $num1 / 2.20462;

            return $total;


        }


        $firstName = filter_input(INPUT_POST, 'fName');         //having these up top to force the program to stick after entering it in

        $lastName = filter_input(INPUT_POST, 'lName');

        $marriedYes = filter_input(INPUT_POST, 'marriedYes');       

        $marriedNo = filter_input(INPUT_POST, 'marriedNo');     

        $age = filter_input(INPUT_POST, 'birthDate');

        $number1 = filter_input(INPUT_POST, 'feet', FILTER_VALIDATE_FLOAT);    

        $number2 = filter_input(INPUT_POST, 'inches', FILTER_VALIDATE_FLOAT);           
    

        $number3 = filter_input(INPUT_POST, 'weight', FILTER_VALIDATE_FLOAT);           

    ?>

    <h1>Please Sign This Form</h1>

    <!--ALL MY FORM INFORMATIONS-->

    <form action='index.php' method='post'>
        <label><strong>First Name</strong></label>
        <input type='text' name='fName' placeholder='First Name' value="<?php echo $firstName; ?>" />

        <label><strong>Last Name</strong></label>
        <input type='text' name='lName' placeholder='Last Name' value="<?php echo $lastName; ?>"/>

        <br>
        <br>

        <label for='married'><strong>Married?</strong></label><br>

        <input type='radio' name='marriedYes' value=<?php echo $marriedYes; ?>"">
        <label for ='mYes'>Yes</label>
        
        <br>

        <input type='radio' name='marriedNo' value="<?php echo $marriedNo; ?>">
        <label for ='mNo'>No</label>
        
        <br>
        <br>

        <label><strong>Date of Birth</strong></label>
        <input type='date' name='birthDate' value="<?php echo $age; ?>" />

        <br>

        <label><strong>Height</strong></label>
        <input type='text' name='feet' placeholder='Feet' value="<?php echo $number1; ?>"/>
        <input type='text' name='inches' placeholder='Inches' value="<?php echo $number2; ?>"/>


        <br>

        <label><strong>Weight in LBS</strong></label>
        <input type='text' name='weight' placeholder='Weight' value="<?php echo $number3; ?>"/>



        <br>
        <input type='submit' name='submitBtn' />


       

    </form> <!--END OF FORM-->


    <?php   

        $error = 0; //creating a error var

        //first we will be setting up the first and last names

        if(isset($_POST['submitBtn'])) {        //all of my code will activate once my submit btn is pressed

            echo '<hr/> Form Submited <br/>';

            $firstName = filter_input(INPUT_POST, 'fName');                 //grabbing my first name and storing it

            if($firstName == ''){

                echo 'Make sure your first name is a real name!<br>';       //making sure my first name has a value

                $error = 1;     //what these errors are doing is storing the value this is imporant later

            } 
            else{

                $error = 0; //what these errors are doing is storing the value this is imporant later
            }

            $lastName = filter_input(INPUT_POST, 'lName');      //grabbing my last name and storing it

            if($lastName == ''){

                echo 'Make sure your last name is a real name!<br>';        //making sure my last name has a value

                $error = 1;

            } else{

                $error = 0;
            }

            //after grabbing my first and last names fields I store it into Full name which is at the bottom


            //now on to marriage


            $marriedYes = filter_input(INPUT_POST, 'marriedYes');       //storing the yes value

            $marriedNo = filter_input(INPUT_POST, 'marriedNo');     //storing the no value

            if($marriedYes == '' && $marriedNo == ''){

                echo 'Make sure you select your mariage status! <br>';      //if neither yes or no are filled out will print error

                $error = 1;

            } else{

                $error = 0;
            }


            //my set up for age



            $age = filter_input(INPUT_POST, 'birthDate');


            if($age == '')
            {
                echo 'Please select an age! <br>';

                $error = 1;
            } else{

                $error = 0;
            }


            


            $age = age($age);       //using the age function to find the users age in years




            //BMI calculator

            $number1 = filter_input(INPUT_POST, 'feet', FILTER_VALIDATE_FLOAT);     //my number one is height in feet

            $number2 = filter_input(INPUT_POST, 'inches', FILTER_VALIDATE_FLOAT);           //my number 2 is height in inches
        

            $number3 = filter_input(INPUT_POST, 'weight', FILTER_VALIDATE_FLOAT);           //my number 3 is my weight


            if($number1 == '' or $number2 == '' or $number3 == ''){

                echo 'Make sure your height and weight are real numbers!<br>';

                $error = 1;

            }

            else
            {

        
    
    
                $error = 0;

                
            }

            
            





            

           

    


           

            if($error == 0)     //at the end if my error is 0 that means no errors occured throughout my program and im all set to continue as usal
            {

                //displaying my data along with the else statement

                $height = bmiHeight($number1, $number2);        //my function does all my math for me and stores my height in $height

                $weight = bmiWeight($number3);      //function stores the after weight in $weight
                 
     
                $totalBMI = $weight / ($height * $height);      //after grabbing my total bmi I rounded it using the round function
     
                $roundedBMI = round($totalBMI,1);       //easier way to do? ask prof

                echo 'Full Name: ', $firstName, ' ', $lastName, '<br>';

                echo 'Age: ', $age, '<br>';

                echo 'BMI: ', $roundedBMI, '<br>';

                //creating my class system

                if($roundedBMI < 18.5)
                {
                    echo 'Class: Under Weight';
                }

                elseif($roundedBMI >= 18.5 and $roundedBMI <= 24.9)
                {
                    echo 'Class: Normal Weight';
                }

                elseif($roundedBMI >= 25.0 and $roundedBMI <=29.9)
                {
                    echo 'Class: Over Weight';
                }

                elseif($roundedBMI >= 30)
                {
                    echo 'Class: Obese';
                }

                //end of class system


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