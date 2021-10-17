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

    <for action='index.php' method='post'>

        <input type='text' name='fName' />

        <input type='submit' name='submitBtn' />

    </form>


    <?php

        if(isset($_POST['submitBtn'])){

            echo 'Form Submited <hr/>';

            $value = filter_input(INPUT_POST, 'fName');

            echo $value;

        }






    ?>
    
    
</body>
</html>