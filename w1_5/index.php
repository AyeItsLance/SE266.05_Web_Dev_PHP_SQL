<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

    <?php



        //creating my function with a number var
        
        function fizzBuzz($num){

            if($num % 2 == 0 && $num % 3 == 0) :?>        

                <print>fizz buzz</print>
                <br> <!--If my number can be divided by 2 and 3 it means that the number can be a multiple of 2 and both 3 so we'd give it fizz buzz line break for better view-->
                <!--Early version had something different at the top so we need to find both 2 and 3 first instead!!! -->
            <?php elseif($num % 3 == 0) :?>

                <print>buzz</print>
                <br> <!--If my number can be divided by 3 it means that the number can be a multiple of 3-->
            
            <?php elseif($num % 2 == 0) :?>

                <print>fizz</print>
                <br>
                <!--If my number can be divided by 2 it means that the number can be a multiple of 2-->
            <?php else :?>

                <print><?=$num;?></print>
                <br>

                <!--Every other number prints through here-->

            <?php endif;
        }


    
        //creating my counter that will cycle 100 times
        for($i = 1; $i <= 100; $i++)
        {

            fizzBuzz($i);       //calling my function


        }


        

        //end of php code!!!
    ?>


    
</body>
</html>