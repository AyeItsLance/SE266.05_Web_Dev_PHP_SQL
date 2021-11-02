<?php

    include __DIR__ .'/model_patient.php';

    $patient = GetPatient();


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

font-family: cursive;

}


thead{

    text-align: center;

    background-color: gray;

    color: black;
}


</style>
<body>

<div class="container">
        
    <div class="col-sm-offset-2 col-sm-10">
        <h1>Patient List</h1>
    
   
  
    <table class="table table-striped">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>First Name</th>
                    <th>Last Name</th>
                    <th>Date of Birth</th>
                    <th>Married</th>
                </tr>
            </thead>
            <tbody>
           
            
            <?php foreach ($patient as $row): ?>
                <tr>
                    <td><?php echo $row['id']; ?></td>
                    <td><?php echo $row['patientFirstName']; ?></td>
                    <td><?php echo $row['patientLastName']; ?></td>

                    

                    <td><?php echo $row['patientBirthDate']; ?></td>
                    <td>

                        <?php 
                        
                        
                        if($row['patientMarried'] == 1) :?>

                            <print>Yes</print>

                        <?php else :?>

                            <print>No</print>

                        <?php endif;

                        ?>

                        
                    
                    
                    
                    </td>
                    
                </tr>
            <?php endforeach; ?>
            </tbody>
        </table>
        
        <br />
        <a href="addPatient.php">Add Patient</a>
    </div>
    </div>
    
</body>
</html>