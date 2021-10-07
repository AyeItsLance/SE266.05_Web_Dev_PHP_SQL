<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

    <ul>

    

        
        <!--Start of homework-->


        <?php foreach ($task as $questions => $answers) : ?>

            <li><strong><?= $questions; ?></strong> <?= $answers; ?></li>

            <!--Displaying the data-->


        <?php endforeach; ?>



    </ul>
    
</body>
</html>