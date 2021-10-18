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

    ?>

    <h1>Please Sign This Form</h1>

    <!--ALL MY FORM INFORMATIONS-->

    <form action='index.php' method='post'>
        <label><strong>First Name</strong></label>
        <input type='text' name='fName' placeholder='First Name'/>

        <label><strong>Last Name</strong></label>
        <input type='text' name='lName' placeholder='Last Name'/>

        <br>
        <br>

        <label for='married'><strong>Married?</strong></label><br>

        <input type='radio' name='marriedYes'>
        <label for ='mYes'>Yes</label>
        
        <br>

        <input type='radio' name='marriedNo'>
        <label for ='mNo'>No</label>
        
        <br>
        <br>

        <label><strong>Date of Birth</strong></label>
        <input type='date' name='birthDate' />

        <br>

        <label><strong>Height</strong></label>
        <input type='text' name='feet' placeholder='Feet'/>
        <input type='text' name='inches' placeholder='Inches'/>


        <br>

        <label><strong>Weight in LBS</strong></label>
        <input type='text' name='weight' placeholder='Weight'/>



        <br>
        <input type='submit' name='submitBtn' />


       

    </form> <!--END OF FORM-->


    <?php   

        //first we will be setting up the first and last names

        if(isset($_POST['submitBtn'])) {        //all of my code will activate once my submit btn is pressed

            echo '<hr/> Form Submited <br/>';

            $firstName = filter_input(INPUT_POST, 'fName');                 //grabbing my first name and storing it

            if($firstName == ''){

                echo 'Make sure your first name is a real name!<br>';       //making sure my first name has a value

            }

            $lastName = filter_input(INPUT_POST, 'lName');      //grabbing my last name and storing it

            if($lastName == ''){

                echo 'Make sure your last name is a real name!<br>';        //making sure my last name has a value

            }

            //after grabbing my first and last names fields I store it into Full name which is at the bottom


            //now on to marriage


            $marriedYes = filter_input(INPUT_POST, 'marriedYes');       //storing the yes value

            $marriedNo = filter_input(INPUT_POST, 'marriedNo');     //storing the no value

            if($marriedYes == '' && $marriedNo == ''){

                echo 'Make sure you select your mariage status! <br>';      //if neither yes or no are filled out will print error

            }


            //my set up for age
            







            //BMI calculator

            $number1 = filter_input(INPUT_POST, 'feet', FILTER_VALIDATE_FLOAT);     //my number one is height in feet

            if($number1 == ''){

                echo 'Make sure your heigh is a real number!<br>';

            }

            $number2 = filter_input(INPUT_POST, 'inches', FILTER_VALIDATE_FLOAT);           //my number 2 is height in inches
        
            if($number2 == ''){

                echo 'Make sure your heigh is a real number!<br>';

            }

            $number3 = filter_input(INPUT_POST, 'weight', FILTER_VALIDATE_FLOAT);           //my number 3 is my weight

            if($number3 == ''){

                echo 'Make sure your weight is a real number!<br>';

            }


            $height = bmiHeight($number1, $number2);

            $weight = bmiWeight($number3);
            

            $totalBMI = $weight / ($height * $height);

            $roundedBMI = round($totalBMI,1);


            echo $roundedBMI;

           

    






            //displaying my data along with the else statement

            echo 'Full Name = ', $firstName, ' ', $lastName;

        } else{
            echo '<hr/>Loading information';
        }


    ?>
    
    
</body>
</html>