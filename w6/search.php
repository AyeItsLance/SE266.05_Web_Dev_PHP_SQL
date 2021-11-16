<?php
    include_once __DIR__ . "/model_schools.php";
    include_once __DIR__ . "/functions.php";
   
    session_start();
    $schoolName = "";      
    $city = "";
    $state = "";        //this is forcing all the vars to equal blank and or nothing, so when the get schools functions runs it will just display everything since there isn't anything being searched

    $results = getSchools($schoolName, $city, $state);
    if (isPostRequest()) {
    // your search logic goes here. Call getSchools with the appropriate arguments

        //now when the search button is actually pressed then it will take the data of what the user has entered and run the program!
        $schoolName = filter_input(INPUT_POST, 'schoolName');

        $city = filter_input(INPUT_POST, 'city');

        $state = filter_input(INPUT_POST, 'state');     //grabbing the information of what the user is entering
        
        $results = getSchools($schoolName, $city, $state);
    }
    include_once __DIR__ . "/header.php";
?>
<style>

    thead{
        color: black;

        font-size: 25px;
    }



</style>

            <h2>Search Schools</h2>

            
            <form method="post" action="search.php">
                <div class="rowContainer">
                   <div class="col1">School Name:</div>
                   <div class="col2"><input type="text" name="schoolName" value="<?php echo $schoolName; ?>"></div> 
               </div>
               <div class="rowContainer">
                   <div class="col1">City:</div>
                   <div class="col2"><input type="text" name="city" value="<?php echo $city; ?>"></div> 
               </div>
               <div class="rowContainer">
                   <div class="col1">State:</div>
                   <div class="col2"><input type="text" name="state" value="<?php echo $state; ?>"></div> 
               </div>
                 <div class="rowContainer">
                   <div class="col1">&nbsp;</div>
                   <div class="col2"><input type="submit" name="search" value="Search" class="btn btn-warning"></div> 
               </div>
            </form>
            
            <p>This is where your search results go</p>

            <thead>
                <br>
                <tr>
                    <strong>        <!--Displaying a little header for visual reasons-->
                        <th>School Name</th>
                        <th>|</th>
                        <th>City</th>
                        <th>|</th>
                        <th>State</th>
                    </strong>
                </tr>
                <br> 
            </thead>

            <?php foreach ($results as $row): ?>
                <tr>
                    <br>    <!--Displaying my data before and after my search-->
                    <td><?php echo $row['schoolName']; ?></td>
                    <td>,</td>
                    <td><?php echo $row['schoolCity']; ?></td>
                    <td>,</td>
                    <td><?php echo $row['schoolState']; ?></td>
                    <br>            
                </tr>
            <?php endforeach; ?>
            <?php

                
            
                include_once __DIR__ . "/footer.php";
            ?>
        
