<?php

    session_start();
    include_once __DIR__ . "/model_car.php";
    include_once __DIR__ . "/functions.php";

   include_once __DIR__ . "/header.php";

    //copy and paste over
    
    $carMake = "";      
    $carModel = "";
    $carYear = "";
    $carMiles = "";          //this is forcing all the vars to equal blank and or nothing
    $carColor = "";
    $accountID = "";

    $results = searchCars($carMake, $carModel, $carYear, $carMiles, $carColor, $accountID);
    if (isPostRequest()) {
  

        //now when the search button is actually pressed then it will take the data of what the user has entered and run the program!
        $carMake = filter_input(INPUT_POST, 'carMake');

        $carModel = filter_input(INPUT_POST, 'carModel');

        $carYear = filter_input(INPUT_POST, 'carYear');  
        
        $carMiles = filter_input(INPUT_POST, 'carMiles');         //grabbing the information of what the user is entering
        
        $carColor = filter_input(INPUT_POST, 'carColor');  

        $accountID = filter_input(INPUT_POST, 'accountID');  

        $results = searchCars($carMake, $carModel, $carYear, $carMiles, $carColor, $accountID);
    }
    
?>
<style>

    thead{
        color: black;

        font-size: 25px;
    }



</style>

            <h2>Search For a Car</h2>

            
            <form method="post" action="car_search.php">
                <div class="rowContainer">
                   <div class="col1">Car Make:</div>
                   <div class="col2"><input type="text" name="carMake" value="<?php echo $carMake; ?>"></div> 
               </div>
               <div class="rowContainer">
                   <div class="col1">Car Model:</div>
                   <div class="col2"><input type="text" name="carModel" value="<?php echo $carModel; ?>"></div> 
               </div>
               <div class="rowContainer">
                   <div class="col1">Car Year:</div>
                   <div class="col2"><input type="text" name="carYear" value="<?php echo $carYear; ?>"></div> 
               </div>
               <div class="rowContainer">
                   <div class="col1">Car Color:</div>
                   <div class="col2"><input type="text" name="carColor" value="<?php echo $carColor; ?>"></div> 
               </div>
                 <div class="rowContainer">
                   <div class="col1">&nbsp;</div>
                   <div class="col2"><input type="submit" name="search" value="Search" class="btn btn-warning"></div> 
               </div>
               
            </form>
            
            

            <thead>
                <br>
                <tr>
                    <strong>        <!--Displaying a little header for visual reasons-->
                        <th>Car Make</th>
                        <th>|</th>
                        <th>Car Model</th>
                        <th>|</th>
                        <th>Car Year</th>
                        <th>|</th>
                        <th>Car Miles</th>
                        <th>|</th>
                        <th>Car Color</th>
                        <th>|</th>
                    </strong>
                </tr>
                <br> 
            </thead>

            <?php foreach ($results as $row): ?>
                <tr>
                    <br>    <!--Displaying my data before and after my search-->
                    <td><?php echo $row['carMake']; ?></td>
                    <td>,</td>
                    <td><?php echo $row['carModel']; ?></td>
                    <td>,</td>
                    <td><?php echo $row['carYear']; ?></td>
                    <td>,</td>

                    <td>

                    <?php

                    

                        if($row['carMiles'] == '') :?>

                            <print>N/A</print>

                        <?php else :?>

                            <td><?php echo $row['carMiles']; ?></td>

                        <?php endif;



                    ?>
                    
                    </td>
                    <td>,</td>
                    <td><?php echo $row['carColor']; ?></td>
                    


                    <br>       

                </tr>

                
            <?php endforeach; ?>

          <a href="index.php">Back to Main Menu</a>
        
