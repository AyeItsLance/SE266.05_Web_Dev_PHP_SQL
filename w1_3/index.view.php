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




        <!--example of having some control over my array titles-->
        <li>

            <strong>Name: </strong> <?= $task['title']; ?>


        </li>

        <li>

            <strong>Due Date: </strong> <?= $task['due']; ?>


        </li>

        <li>

            <strong>Who Does It: </strong> <?= $task['assigned_to']; ?>


        </li>

        <li>

            <!--? means that if the thing we are checking is true it will print "Complete" If false it will print "Incompletet-->

            <!--? 'do something if true' : 'do something if false'-->

            <strong>Status: </strong>

            <!--When having a ! in front of something it means not  for example if (! true) this means not true-->


            
            
            <?php if ($task['completed'])  : ?>

                <span class="icon">Completed &#9989;</span>

                
            <?php else: ?>

                <span class="icon">Incomplete</span>

            <?php endif; ?>

            <!--When having a ! it means not true so ! true means not true-->


        </li>

        <li>


            <strong>Was it Started:</strong>

            <?php if ($task['startYet'])  : ?>

                <span class="icon">Yes &#9989;</span>

                
            <?php else: ?>

                <span class="icon">No &#10060;</span>

            <?php endif; ?>



        </li>



    </ul>

    
</body>
</html>