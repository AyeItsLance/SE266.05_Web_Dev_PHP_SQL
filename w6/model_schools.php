<?php

    include (__DIR__ . '/db.php');      //including my files


    function insertSchoolsFromFile ($fname) {
        global $db;
        $i = 0;
       
        if (!file_exists($fname)) return false;

        deleteAllSchools();
        $file = fopen ($fname, 'rb');
        // ignore first line
        $row = fgetcsv($file);
        
        while (!feof($file) && $i++ < 10000) {
            $row = fgetcsv($file);
            $school = str_replace("'", "''", htmlspecialchars ($row[0]));
            $city = str_replace("'", "''", htmlspecialchars ($row[1]));
            $state = str_replace("'", "''", htmlspecialchars ($row[2]));

            $sql[] = "('" . $school . "' , '" . $city . "' , '" . $state. "')";
            // 1,000 records at a time
            if ($i % 1000 == 0) {
                $db->query('INSERT INTO schools (schoolName, schoolCity, schoolState) VALUES '.implode(',', $sql));
                $sql = array();
            }
        }
        if (count($sql)) {
            $db->query('INSERT INTO schools (schoolName, schoolCity, schoolState) VALUES '.implode(',', $sql));
        }

        return(true);
    }


    function deleteAllSchools () {

        global $db;

        $stmt = $db->query("DELETE FROM schools");

        return 0;       //deleteing all schools functions
    }


    function getSchoolCount() {
        global $db;

        $stmt = $db->query("SELECT COUNT(*) AS schoolCount FROM schools");

        $results = $stmt->fetch(PDO::FETCH_ASSOC);          //my function for getting the school count 
       return($results['schoolCount']);
   
    }

    function getSchools ($name, $city, $state) {
        global $db;
        
        $binds = array();
        $sql = "SELECT id, schoolName, schoolCity, schoolState FROM schools WHERE 0=0 ";
        if ($name != "") {
             $sql .= " AND schoolName LIKE :schoolName";
             $binds['schoolName'] = '%'.$name.'%';
        }
       
        if ($city != "") {
            $sql .= " AND schoolCity LIKE :city";
            $binds['city'] = '%'.$city.'%';
        }
        if ($state != "") {
            $sql .= " AND schoolState LIKE :state";
            $binds['state'] = '%'.$state.'%';
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
        $stmt = $db->prepare("SELECT id FROM users WHERE userName =:userName AND userPassword = :password");
        
        $stmt->bindValue(':userName', $userName);
        $stmt->bindValue(':password', sha1($password. "secret stuff"));
            
        $stmt->execute ();
           
        return( $stmt->rowCount() > 0);
            
    }

    
    function insertIntoDB($userName, $password){

        global $db;

        $results = "Not addded";        //this will display if code doesnt work

        $stmt = $db->prepare("INSERT INTO users SET userName = :username, userPassword = :userpassword");     //craeting my sql statement that will add data into the db

        $binds = array(
            ":username" => $userName,
            ":userpassword" => $password,
                    //binding my information of array to my vars
        );


        if ($stmt->execute($binds) && $stmt->rowCount() > 0) {
            $results = "Person Added";     //if command works print out patient added
        }


    }
        
?>