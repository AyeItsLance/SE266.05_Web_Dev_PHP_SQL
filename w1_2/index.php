<?php


$persons = [

    'age' => 31,

    'hair color' => 'brown',

    'sport' => 'basketball'

];


//creating a push to my og array

$persons['name'] = 'Lance';

//getting rid of an item from array

unset($persons['age']);


//homework create a task associate array

$task = [      

    'title' => 'Do the Dishes',

    'Who Does it' => 'Lance Lespinasse',

    'due' => 'Tommorow',

    'completed' => 'Yes',

    //


];

//title of task, when it's due, who needs to do it, and if its completed (yes or no strings for now)




#the values to my left are my keys values

require 'index.view.php';

#making sure the view and index are connected