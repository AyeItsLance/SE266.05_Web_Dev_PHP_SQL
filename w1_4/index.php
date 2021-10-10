<?php

//require 'functions.php';




function dd($val) {
      
    echo '<pre>';

    die(var_dump($val));

    echo '</pre>';

}


// $animals = [
    
//     'dog', 

//     'cat'

// ];

$task = [


    'title' => 'Finish homework',

    'due' => 'today',

    'assigned_to' => 'Lance',

    'completed' => false,

    'startYet' => false


];






// weird error when having function in own file
//Fatal error: Cannot redeclare dd() (previously declared in C:\xampp\htdocs\SE266\w1_4\index.php:8) in C:\xampp\htdocs\SE266\w1_4\index.php on line 8
//die means my program would end once the die function was triggered

//while the dump tag will dump my animals array... so before my program ends it will dump animals and then kill the program

//die(var_dump($animals))


//dd == die & dump



dd($task);
