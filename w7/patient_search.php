<?php

    session_start();
    include_once __DIR__ . "/model_patient.php";
    include_once __DIR__ . "/functions.php";

   include_once __DIR__ . "/header.php";

    //copy and paste over
    
    $firstName = "";      
    $lastName = "";
    $birthDate = "";
    $married = "";          //this is forcing all the vars to equal blank and or nothing, so when the get schools functions runs it will just display everything since there isn't anything being searched

    $results = grabPatient($firstName, $lastName, $birthDate, $married);
    if (isPostRequest()) {
    // your search logic goes here. Call getSchools with the appropriate arguments

        //now when the search button is actually pressed then it will take the data of what the user has entered and run the program!
        $firstName = filter_input(INPUT_POST, 'firstName');

        $lastName = filter_input(INPUT_POST, 'lastName');

        $married = filter_input(INPUT_POST, 'married');  
        
        $birthDate = filter_input(INPUT_POST, 'birthDate');         //grabbing the information of what the user is entering
        
        $results = grabPatient($firstName, $lastName, $birthDate, $married);
    }
    
?>
<style>

    thead{
        color: black;

        font-size: 25px;
    }



</style>

            <h2>Search Patients</h2>

            
            <form method="post" action="patient_search.php">
                <div class="rowContainer">
                   <div class="col1">First Name:</div>
                   <div class="col2"><input type="text" name="firstName" value="<?php echo $firstName; ?>"></div> 
               </div>
               <div class="rowContainer">
                   <div class="col1">Last Name:</div>
                   <div class="col2"><input type="text" name="lastName" value="<?php echo $lastName; ?>"></div> 
               </div>
               <div class="rowContainer">
                   <div class="col1">Mariage Status:</div>
                   <div class="col2"><input type="text" name="married" value="<?php echo $married; ?>"></div> 
               </div>
                 <div class="rowContainer">
                   <div class="col1">&nbsp;</div>
                   <div class="col2"><input type="submit" name="search" value="Search" class="btn btn-warning"></div> 
               </div>
               <p>HINT: To search for married patients enter in a 1, for non married patients enter in 0.
            </form>
            
            

            <thead>
                <br>
                <tr>
                    <strong>        <!--Displaying a little header for visual reasons-->
                        <th>First Name</th>
                        <th>|</th>
                        <th>Last Name</th>
                        <th>|</th>
                        <th>Birth Date</th>
                        <th>|</th>
                        <th>Marriage Status</th>
                    </strong>
                </tr>
                <br> 
            </thead>

            <?php foreach ($results as $row): ?>
                <tr>
                    <br>    <!--Displaying my data before and after my search-->
                    <td><?php echo $row['patientFirstName']; ?></td>
                    <td>,</td>
                    <td><?php echo $row['patientLastName']; ?></td>
                    <td>,</td>
                    <td><?php echo $row['patientBirthDate']; ?></td>
                    <td>,</td>

                    <td>

                    <?php

                    

                        if($row['patientMarried'] == 1) :?>

                            <print>Married</print>

                        <?php else :?>

                            <print>Not Married</print>

                        <?php endif;



                    ?>
                    
                    </td>


                    <br>       

                </tr>

                
            <?php endforeach; ?>

          <a href="menu.php">Back to Main Menu</a>
        
