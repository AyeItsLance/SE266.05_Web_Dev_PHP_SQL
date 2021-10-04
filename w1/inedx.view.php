<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    
    <!--adding a bit of style-->

    <style>
        
    
        header {
            
            background: "red";

            padding: 2em;

            text-allign: center;
        }

    </style>
</head>
<body>


    <ul>

        <?php

            foreach ($names as $name) {

                echo "<li?$name</li>";
            }

        ?>

    </ul>
    
</body>
</html>