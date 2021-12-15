<?php


    session_start();
    include __DIR__ .'/model_car.php';

   

    $results = getCar();        //running my get car command


    include_once __DIR__ . "/sellerheader.php";

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>


<style>

body{

    background-color: white;

    font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif;

}

table{

    width:80%;
    border-collapse: collapse;
}

td{

    text-align: center;
    border-bottom:1px solid black;
}

h1{



text-align: center;



}


thead{

    text-align: center;

    background-color: gray;

    color: black;
}


#search{
    font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif; 

    font-size: 20px;
}




</style>



<body>

<div class="container">
        
    <div class="col-sm-offset-2 col-sm-10">
        <h1>Cars You Are Selling!</h1>

        <a id='search' href="car_search.php">Car Search</a> <!--Adding a new link that leads to patient search-->

        <br>
    
        <br>
   
  
    <table class="table table-striped">
            <thead>
                <tr>
                    <td><b>Car Make</b></td>
                    <td><b>Car Model</b></td>
                    <td><b>Car Year</b></td>
                    <td><b>Car Miles</b></td>
                    <td><b>Car Color</b></td>
                </tr>
            </thead>
            <tbody>
           
            
            <?php foreach ($results as $row): ?>
                <tr>
                    <td><?php echo $row['carMake']; ?></td>
                    <td><?php echo $row['carModel']; ?></td>
                    <td><?php echo $row['carYear']; ?></td>
                    
                    

                        <?php 

                        //this if statement is so I can switch my boooleans 

                        //meaning that if patientMarrieed field is an 1 itll print out Yes, and if its anything else will print no
                        
                        
                            if($row['carMiles'] == '') :?>

                                <td>N/A</td>

                            <?php else :?>

                                <td><?php echo $row['carMiles']; ?></td>

                            <?php endif;

                        ?>

                        
                    
                    
                    
                    
                    <td><?php echo $row['carColor']; ?></td>

                    <td><a href="editCar.php?action=update&carID=<?= $row['id'] ?>">Edit</a></td> <!--Adding link for edits-->
                    
                </tr>
            <?php endforeach; ?>
            </tbody>
        </table>
        
        <br />
        
    </div>
    </div>
    
</body>
</html>