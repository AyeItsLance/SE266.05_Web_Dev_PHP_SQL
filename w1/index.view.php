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

            text-align: center;
        }

    </style>
</head>
<body>

 <!--for each loop for every animal in it the array it will print here-->

    <ul>

        <p>Hello</p>



     

                    
        <?php foreach ($animals as $animal) : ?>

           <li><?= $animal; ?></li>

        <?php endforeach; ?>


    

    </ul>
    
</body>
</html>