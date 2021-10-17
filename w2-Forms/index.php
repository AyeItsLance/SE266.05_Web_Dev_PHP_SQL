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

    ?>

    <form action='index.php' method='post'>

        <input type='text' name='fName' placeholder='First Name'/>

        <input type='text' name='lName' placeholder='Last Name'/>

        <br>

        <input type='submit' name='submitBtn' />

    </form>


    <?php

        if(isset($_POST['submitBtn'])) {

            echo '<hr/> Form Submited <br/>';

            $firstName = filter_input(INPUT_POST, 'fName';

            if($firstName == ''){

                echo 'Make sure your first name is a real name!';

            }

            $lastName = filter_input(INPUT_POST, 'lName');

            if($lastName == ''){

                echo 'Make sure your last name is a real name!';

            }

            echo 'Full Name = ', $firstName, ' ', $lastName;

        } else{
            echo '<hr/>Loading information';
        }


    ?>
    
    
</body>
</html>