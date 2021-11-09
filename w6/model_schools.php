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

        return 0;
    }