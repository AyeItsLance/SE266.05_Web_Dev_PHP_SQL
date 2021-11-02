<?php


include (__DIR__ . '/db.php'); //grabbing my db file

function GetPatient () {     //creating my function that grabs my paitents
    global $db;    //global database


    $results = [];      //creating my empty resuts array

    $stmt = $db->prepare("SELECT id, patientFirstName, patientLastName, patientMarried, patientBirthDate FROM patients ORDER BY patientLastName");      //this is my sql code that selects my paitent


    if ( $stmt->execute() && $stmt->rowCount() > 0) {

        $results = $stmt->fetchAll(PDO::FETCH_ASSOC);


    }        //this is me checking to make sure the code executes

    return ($results);      //returning my results var

}


function addPatient ($f, $l, $s, $a)  {
    
    //craeting my add patient function that will actually add to my db


    global $db;

    $results = "Not addded";        //this will display if code doesnt work

    $stmt = $db->prepare("INSERT INTO patients SET patientFirstName = :firstname, patientLastName = :lastname, patientMarried = :status, patientBirthDate = :age ");     //craeting my sql statement that will add data into the db

    $binds = array(
        ":firstname" => $f,
        ":lastname" => $l,
        ":status" => $s,
        ":age" => $a        //binding my information of array to my vars
    );


    if ($stmt->execute($binds) && $stmt->rowCount() > 0) {
        $results = "Patient Added";     //if command works print out patient added
    }

}





?>