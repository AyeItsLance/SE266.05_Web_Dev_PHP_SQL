<?php

    include (__DIR__ . '/db.php');      //including my files

    function insertIntoDB($userName, $password){

        global $db;

        $results = "Not addded";        //this will display if code doesnt work

        $stmt = $db->prepare("INSERT INTO usercars SET username = :username, userPassword = :userPassword");     //craeting my sql statement that will add data into the db

        $binds = array(
            ":username" => $userName,

            ":userPassword" => $password,
                    //binding my information of array to my vars
        );


        if ($stmt->execute($binds) && $stmt->rowCount() > 0) {
            $results = "Person Added";     //if command works print out cars added
        }


    }

    function getCar () {     //creating my function that grabs my cars

        global $db;    //global database
    
    
        $results = [];      //creating my empty resuts array
    
        $stmt = $db->prepare("SELECT id, carMake, carModel,carYear, carMiles, carColor, accountID FROM cars ORDER BY carMake");      //this is my sql code that selects my paitent
    
    
        if ( $stmt->execute() && $stmt->rowCount() > 0) {
    
            $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
    
    
        }        //this is me checking to make sure the code executes
    
        return ($results);      //returning my results var
    
    }

    function getUser () {     //creating my function that grabs my cars

        global $db;    //global database
    
    
        $results = [];      //creating my empty resuts array
    
        $stmt = $db->prepare("SELECT accountID, username, userPassword FROM usercars");      //this is my sql code that selects my paitent
    
    
        if ( $stmt->execute() && $stmt->rowCount() > 0) {
    
            $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
    
    
        }        //this is me checking to make sure the code executes
    
        return ($results);      //returning my results var
    
    }


    function searchCars ($carMake, $carModel, $carYear, $carMiles, $carColor, $accountID){

        global $db;
            
        $binds = array();
        $sql = "SELECT id, carMake, carModel, carYear, carMiles, carColor, accountID FROM cars WHERE 0=0 ";
    
        if ($carMake != "") {
            $sql .= " AND carMake LIKE :carMake";
            $binds['carMake'] = '%'.$carMake.'%';
        }
           
        if ($carModel != "") {
            $sql .= " AND carModel LIKE :carModel";
            $binds['carModel'] = '%'.$carModel.'%';
        }
        if ($carYear != "") {
            $sql .= " AND carYear LIKE :carYear";
            $binds['carYear'] = '%'.$carYear.'%';
        }
        if ($carMiles != "") {
            $sql .= " AND carMiles LIKE :carMiles";
            $binds['carMiles'] = '%'.$carMiles.'%';
        }
        if ($carColor != "") {
            $sql .= " AND carColor LIKE :carColor";
            $binds['carColor'] = '%'.$carColor.'%';
        }
        if ($accountID != "") {
            $sql .= " AND accountID LIKE :accountID";
            $binds['accountID'] = '%'.$accountID.'%';
        }
            
        $stmt = $db->prepare($sql);
           
        $results = array();
        if ($stmt->execute($binds) && $stmt->rowCount() > 0) {
                $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
            }
        return ($results);
    }

    function checkLogin ($userName, $password) {
        global $db;
        $stmt = $db->prepare("SELECT accountID FROM usercars WHERE username =:username AND userPassword = :password");
        
        $stmt->bindValue(':username', $userName);
        $stmt->bindValue(':password', sha1($password. "secret stuff"));
            
        $stmt->execute ();
           
        return( $stmt->rowCount() > 0);
            
    }


    function addCar ($carMake, $carModel, $carYear, $carMiles, $carColor, $accountID)  {
    
        //craeting my add car function that will actually add to my db
    
    
        global $db;
    
        $results = "Not addded";        //this will display if code doesnt work
    
        $stmt = $db->prepare("INSERT INTO cars SET carMake = :carMake, carModel = :carModel, carYear = :carYear, carMiles = :carMiles, carColor = :carColor, accountID = :accountID ");     //craeting my sql statement that will add data into the db
    
        $binds = array(
            ":carMake" => $carMake,
            ":carModel" => $carModel,
            ":carYear" => $carYear,
            ":carMiles" => $carMiles, //binding my information of array to my vars            
            ":carColor" => $carColor,
            ":accountID" => $accountID
        );
    
    
        if ($stmt->execute($binds) && $stmt->rowCount() > 0) {

            $results = "Car Added";     //if command works print out car added
        }
    
    }

    function updateCar($id, $carMake, $carModel, $carYear, $carMiles, $carColor, $accountID){

        global $db;
    
        $results = "";      //creating empty var
    
        $stmt = $db->prepare("UPDATE cars SET carMake = :carMake, carModel = :carModel, carYear = :carYear, carMiles = :carMiles, carColor = :carColor, accountID = :accountID WHERE id=:id");       //my update statement
    
    
        $stmt->bindValue(':id', $id);
        $stmt->bindValue(':carMake', $carMake);     //binding all my values
        $stmt->bindValue(':carModel', $carModel);
        $stmt->bindValue(':carYear', $carYear);
        $stmt->bindValue(':carMiles', $carMiles);
        $stmt->bindValue(':carColor', $carColor);
        $stmt->bindValue(':accountID', $accountID);
    
        if ($stmt->execute() && $stmt->rowCount() > 0) {
    
            $results = 'Car Updated';      //if stmt executes then Data updated will print to my screen
    
        }
        
        return ($results);      //results
    }

    function deleteCar ($id) {     //creating my function for deleting patients
        global $db;     //
        
        $results = "Car was not deleted";      //creating my results var
    
        $stmt = $db->prepare("DELETE FROM cars WHERE id=:id");      //so if the id is the same as the id im editing it will delete 
        
        $stmt->bindValue(':id', $id);
            
        if ($stmt->execute() && $stmt->rowCount() > 0) {
    
            $results = 'Car Deleted';       //if stmt works then car deleted will be printed
    
        }
        
        return ($results);      //returning my results
    }

    function getCars ($id) {

        global $db;
    
       
       $result = [];        //creating empty array
       
       $stmt = $db->prepare("SELECT id, carMake, carModel, carYear, carMiles, carColor, accountID FROM cars WHERE id=:id");
    
       $stmt->bindValue(':id', $id);
      
    
       if ( $stmt->execute() && $stmt->rowCount() > 0 ) {
    
            $result = $stmt->fetch(PDO::FETCH_ASSOC);
                       
        }
        
        return ($result);
    }
    

?>