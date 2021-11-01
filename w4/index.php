<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
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
                    <th>Age</th>
                    <th>Married</th>
                </tr>
            </thead>
            <tbody>
           
            
            <?php foreach ($teams as $row): ?>
                <tr>
                    <td><?php echo $row['id']; ?></td>
                    <td><?php echo $row['teamName']; ?></td>
                    <td><?php echo $row['division']; ?></td>            
                </tr>
            <?php endforeach; ?>
            </tbody>
        </table>
        
        <br />
        <a href="addPatient.php">Add Team</a>
    </div>
    </div>
    
</body>
</html>