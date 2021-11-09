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


//creating my update or edit patient

function updatePatient($id, $firstName, $lastName, $status, $age){

    global $db;

    $results = "";      //creating empty var

    $stmt = $db->prepare("UPDATE patients SET patientFirstName = :firstname, patientLastName = :lastname, patientMarried = :status, patientBirthDate = :age WHERE id=:id");       //my update statement


    $stmt->bindValue(':id', $id);
    $stmt->bindValue(':firstname', $firstName);     //binding all my values
    $stmt->bindValue(':lastname', $lastName);
    $stmt->bindValue(':status', $status);
    $stmt->bindValue(':age', $age);

    if ($stmt->execute() && $stmt->rowCount() > 0) {

        $results = 'Patient Updated';      //if stmt executes then Data updated will print to my screen

    }
    
    return ($results);      //results
}


function deletePatient ($id) {     //creating my function for deleting patients
    global $db;     //
    
    $results = "Patient was not deleted";      //creating my results var

    $stmt = $db->prepare("DELETE FROM patients WHERE id=:id");      //so if the id is the same as the id im editing it will delete 
    
    $stmt->bindValue(':id', $id);
        
    if ($stmt->execute() && $stmt->rowCount() > 0) {

        $results = 'Patient Deleted';       //if stmt works then patient deleted will be printed

    }
    
    return ($results);      //returning my results
}

function getPatients ($id) {

    global $db;

   
   $result = [];        //creating empty array
   
   $stmt = $db->prepare("SELECT id, patientFirstName, patientLastName, patientMarried, patientBirthDate FROM patients WHERE id=:id");

   $stmt->bindValue(':id', $id);
  

   if ( $stmt->execute() && $stmt->rowCount() > 0 ) {

        $result = $stmt->fetch(PDO::FETCH_ASSOC);
                   
    }
    
    return ($result);
}


//creating some search functions

function searchPatient($column, $searchValue) {

    global $db;

    $results = [];

    $stmt = $db->prepare("SELECT id, patientFirstName, patientLastName, patientMarried, patientBirthDate FROM patients WHERE $column LIKE :search");

    $search = '%'.$searchValue.'%';

    $stmt->bindValue(':search', $search);

    if ($stmt->execute()&& $stmt->rowCount() > 0 ){
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);

    }

    return($results);
}



//creating my sorting function

function sortPatient($column, $order){

    global $db;

    $results = []; //creating emppty array

    $stmt = $dbl->prepare("SELECT id, patientFirstName, patientLastName, patientMarried, patientBirthDate FROM patients ORDER BY $column $order");


    if ( $stmt->execute() && $stmt->rowCount() > 0 ) {
        
        $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
                   
    }
    
    return ($results);

}




?>