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



        function bmiNumber($num1, $num2) {

            $num1 * 12 + $num2 = $total;

            return $total;
            
        }

    ?>

    <h1>Please Sign This Form</h1>

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
        <input type='submit' name='submitBtn' />


       

    </form>


    <?php   

        //first we will be setting up the first and last names

        if(isset($_POST['submitBtn'])) {

            echo '<hr/> Form Submited <br/>';

            $firstName = filter_input(INPUT_POST, 'fName');

            if($firstName == ''){

                echo 'Make sure your first name is a real name!<br>';

            }

            $lastName = filter_input(INPUT_POST, 'lName');

            if($lastName == ''){

                echo 'Make sure your last name is a real name!<br>';

            }


            //now on to marriage


            $marriedYes = filter_input(INPUT_POST, 'marriedYes');

            $marriedNo = filter_input(INPUT_POST, 'marriedNo');

            if($marriedYes == '' && $marriedNo == ''){

                echo 'Make sure you select your mariage status! <br>';

            }


            //my set up for age
            







            //BMI calculator

            $number1 = filter_input(INPUT_POST, 'feet', FILTER_VALIDATE_FLOAT)

            if($number1 == ''){

                echo 'Make sure your heigh is a real number!<br>';

            }

            $number2 = filter_input(INPUT_POST, 'inches', FILTER_VALIDATE_FLOAT)
        
            if($number2 == ''){

                echo 'Make sure your heigh is a real number!<br>';

            }

            $total = bmiNumber($number1, $number2)

            echo $total


           

    






            //displaying my data along with the else statement

            echo 'Full Name = ', $firstName, ' ', $lastName;

        } else{
            echo '<hr/>Loading information';
        }


    ?>
    
    
</body>
</html>