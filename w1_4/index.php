<?php






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

function dd($val) {
   
    echo '<pre>';
 
    die(var_dump($val));
 
    echo '</pre>';
 
 }
 




//die means my program would end once the die function was triggered

//while the dump tag will dump my animals array... so before my program ends it will dump animals and then kill the program

//die(var_dump($animals))


//dd == die & dump



dd($task);
