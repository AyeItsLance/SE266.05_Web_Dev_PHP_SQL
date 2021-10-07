<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>


    <h1>Tasks for today</h1>


    <ul>


        <?php foreach ($task as $heading => $value) :?>


            <li>

                <strong><?= ucwords($heading); ?>: </strong> <?= $value; ?>
        
            </li>

        <?php endforeach; ?>



        <li>


        </li>



    </ul>

    
</body>
</html>