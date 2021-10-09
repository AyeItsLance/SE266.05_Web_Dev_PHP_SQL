<?php


require 'functions.php'



$animals = ['dog', 'cat'];



$task = [

    'title' => 'Go to the Mall',

    'due' => 'tommorow',

    'whoDoesIt' => 'Lance',

    'completed' => true
    
];

//die means my program would end once the die function was triggered

//while the dump tag will dump my animals array... so before my program ends it will dump animals and then kill the program

//die(var_dump($animals))


//dd == die & dump



dd($task)
