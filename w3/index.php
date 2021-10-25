<?php
    require 'account.php';

   if (isset ($_POST['withdrawChecking'])) {

    

    echo "<br>I pressed the checking withdrawal button";

    $number = filter_input(INPUT_POST, 'checkingWithdrawAmount', FILTER_VALIDATE_FLOAT);

    $checking->withdrawal($number);     //if the number is a real number it will be stored into number var which will be sent to the checking withdraw function

    if($number == ''){

        echo '<br>Make sure your enter in real numbers!<br>';       //error message

    }


} else if (isset ($_POST['depositChecking'])) {

    echo "<br>I pressed the checking deposit button";

    $number = filter_input(INPUT_POST, 'checkingDepositAmount', FILTER_VALIDATE_FLOAT);

    $checking->deposit($number);                 //if the number is a real number it will be stored into number var which will be sent to the checking deposit function

    if($number == ''){      //error message

        echo '<br>Make sure your enter in real numbers!<br>';

    }


} else if (isset ($_POST['withdrawSavings'])) {

    echo "<br>I pressed the savings withdrawal button";


    $number = filter_input(INPUT_POST, 'savingsWithdrawAmount', FILTER_VALIDATE_FLOAT);      //if the number is a real number it will be stored into number var which will be sent to the savoings withdraw function

    $savings->withdrawal($number);

    if($number == ''){

        echo '<br>Make sure your enter in real numbers!<br>';       //error message

    }

} else if (isset ($_POST['depositSavings'])) {

    echo "<br>I pressed the savings deposit button";

    $number = filter_input(INPUT_POST, 'savingsDepositAmount', FILTER_VALIDATE_FLOAT);

    $savings->deposit($number);      //if the number is a real number it will be stored into number var which will be sent to the savings deposit function

    if($number == ''){

        echo '<br>Make sure your enter in real numbers!<br>';

        //error message

    }
} 
     
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ATM</title>
    <style type="text/css">
        body {
            margin-left: 120px;
            margin-top: 50px;
        }
       .wrapper {
            display: grid;
            grid-template-columns: 300px 300px;
        }
        .account {
            border: 1px solid black;
            padding: 10px;
        }
        .label {
            text-align: right;
            padding-right: 10px;
            margin-bottom: 5px;
        }
        label {
           font-weight: bold;
        }
        input[type=text] {width: 80px;}
        .error {color: red;}
        .accountInner {
            margin-left:10px;margin-top:10px;
        }
    </style>
</head>
<body>

    <form method="post">        <!--This is my atm start which you gave us-->
       
        <input type="hidden" name="checkingAccountId" value="C123" />
        <input type="hidden" name="checkingDate" value="12-20-2019" />
        <input type="hidden" name="checkingBalance" value="1000" />
        <input type="hidden" name="savingsAccountId" value="S123" />
        <input type="hidden" name="savingsDate" value="03-20-2020" />
        <input type="hidden" name="savingsBalance" value="5000" />
        
    <h1>ATM</h1>
        <div class="wrapper">
            
            <div class="account">
              
                    
                    <div class="accountInner">
                        

                        <?php

                            echo $checking->getAccountDetails();     //echoing my account details fopr checking account

                            echo '<br>';
                           
                        ?>
                        <input type="text" name="checkingWithdrawAmount" value="" />
                        <input type="submit" name="withdrawChecking" value="Withdraw" />
                    </div>
                    <div class="accountInner">

                        <input type="text" name="checkingDepositAmount" value="" />
                        <input type="submit" name="depositChecking" value="Deposit" /><br />
                    </div>
            
            </div>

            <div class="account">
               
                    

                    <?php

                        echo $savings->getAccountDetails();     ///echoing my savings account detail

                    ?>
                    <div class="accountInner">
                        <input type="text" name="savingsWithdrawAmount" value="" />
                        <input type="submit" name="withdrawSavings" value="Withdraw" />
                    </div>
                    <div class="accountInner">
                        <input type="text" name="savingsDepositAmount" value="" />
                        <input type="submit" name="depositSavings" value="Deposit" /><br />
                    </div>
            
            </div>
            
        </div>
    </form>
</body>
</html>