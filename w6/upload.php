
<?php
    include_once __DIR__ . "/model_schools.php";
    include_once __DIR__ . "/functions.php";
    
    if (isset ($_FILES['file1'])) {

        
        $tmp_name = $_FILES['file1']['tmp_name'];

        $path = getcwd() .DIRECTORY_SEPARATOR . 'uploads';

        $new_name = $path . DIRECTORY_SEPARATOR . $_FILES['file1']['name'];         //copy and past this part is was confusing ask for help from prof!!!


        

        insertSchoolsFromFile($tmp_name, $new_name);        //once I insert everything I will then be thrown over to search by default

        header('Location: search.php');
        
        
    }

    include_once __DIR__ . "/header.php";

?>  
    <h2>Upload File</h2>
    <p>
        Please specify a file to upload and then be patient as the upload may take a while.
    </p>

    <form action="upload.php" method="post" enctype="multipart/form-data">
        <input type="file" name="file1">
        <input type="submit" value="Upload">

    </form>    

<?php
    include_once __DIR__ . "/footer.php";
?>