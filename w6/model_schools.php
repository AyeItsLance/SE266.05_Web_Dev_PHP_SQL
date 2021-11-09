<?php

    include (__DIR__ . '/db.php');      //including my files


    function insertSchoolsFromFile ($fname) {

        //creating my function that will insert from file

        global $db;

        $i = 0; //creating empty var

        if(!file_exists($fname)) return false;


        deleteAllSchools();

        $file = fopen($fname, 'rb');

        $row = fgetcsv($file);      //making row my 'csv'


        while(!feof($file) && $i++ < 10000){

            $row - fgetcsv($file);
            $school = str_replace("'", "'", htmlspecialchars($row[0]));
            $city = str_replace("'", "'", htmlspecialchars($row[1]));
            $state = str_replace("'", "'", htmlspecialchars($row[2]));  //making school city and state equal rows in my file




            $sql[] = "('" . $school . "', '" . $city . "' , '" . $state. "')";      //


            if($i % 1000 == 0) {

                $db->query('INSERT INTO schools (schoolName, schoolCity, schoolState) VALUES '.implde(',', $sql));

                $sql = array();
            }


        }
        if(count($sql)){
            $db->query('INSERT INTO schools (schoolName, schoolCity, schoolSate) VALUES '.implode(',',$sql));
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
        global $db;     //my function for grabbing schools
        
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

        function checkLogin ($userName, $password) {
            global $db;
            $stmt = $db->prepare("SELECT id FROM users WHERE userName =:userName AND userPassword = :password");
        
            $stmt->bindValue(':userName', $userName);
            $stmt->bindValue(':password', sha1("school-salt".$password));
            
            $stmt->execute ();
           
            return( $stmt->rowCount() > 0);
            
        }
        
    }