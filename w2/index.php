<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lance's PHP</title>
</head>
<body>

<!--Some style was inspired by Henry's site-->
<style>

    .navbar {

        text-align: center;
        
        background-color: black;

        font-family: 'Times New Roman', Times, serif;

        font-size: 20px;

        margin-right: 15px;

        margin-left: 15px;

        padding: 15px;

        
    }

    .navbar a{

        color: white;

        text-decoration: none;

        padding: 10px;
    }

    li {
        font-family: 'Times New Roman', Times, serif;
    }

</style>

    <header class='navbar'>

        <a href='index.php'><strong>Home</strong></a>

        <a href='https://github.com/AyeItsLance/SE266.05_Web_Dev_PHP_SQL'><strong>Github</strong></a>

        <a href='php.php'><strong>PHP Resources</strong></a>

        <a href='git.php'><strong>Git Resources</strong></a>

        <a href="about.php"><strong>About Me</strong></a>
    </header>


    <main>

        <h1>Lance Lespinasse</h1>

        <h3>PHP Assignments</h3>

        <ul> 
            <li><a href='http://se266-php-lespinasse.herokuapp.com/w1/'>Week 1 Basic PHP</a></li>
            
            <li><a href='https://se266-php-lespinasse.herokuapp.com/w1_2/'>Week 1 Arrays</a></li>
            
            <li><a href='https://se266-php-lespinasse.herokuapp.com/w1_3/'>Week 1 Booleans</a></li>
            
            <li><a href='https://se266-php-lespinasse.herokuapp.com/w1_4/'>Week 1 Functions</a></li>
            
            <li><a href='https://se266-php-lespinasse.herokuapp.com/w1_5/'>Week 1 FizzBuzz</a></li>

            <li><a href='https://se266-php-lespinasse.herokuapp.com/w2-Forms/'>Week 2 Paitent Form</a></li>
                
            <li><a href='#'>Week 3</a></li>
            
            <li><a href='#'>Week 4</a></li>
            
            <li><a href='#'>Week 5</a></li>
            
            <li><a href='#'>Week 6</a></li>

            <li><a href='#'>Week 7</a></li>
            
            <li><a href='#'>Week 8</a></li>
            
            <li><a href='#'>Week 9</a></li>
            
            <li><a href='#'>Week 10</a></li>
            
        </ul>

        <h3>SQL Assignments</h3>

        <ul>

            <li><a href='#'>PENDING...</a></li>

        </ul>


    </main>


    <footer>

        <hr>

        <?php
        date_default_timezone_set("America/New_York");
        $file = basename($_SERVER['PHP_SELF']);
        $mod_date=date("F d Y h:i:s A", filemtime($file));
        echo "File last updated $mod_date ";
        //date.timezone = "Europe/Athens"
        //my footer was gotten from the help of Henry!
        ?>

    </footer>
    
</body>
</html>