<?php

$pwd ="password12345678";    //creating and storing password, and immeditally hashing it but after the hash we reset the pwd to null 

$storeInDB = sha1($pwd.$salt);


$pwd = '';


?>