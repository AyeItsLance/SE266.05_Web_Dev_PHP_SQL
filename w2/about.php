<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>About Me</title>
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
        <ul>

            <li>I like cars, I don't know to much about them but they've always have intrested me.</li>

            <br>

            <li>I enjoy learning new things for instance not to long ago I tried learning how to build a computer, currently that's a work in progress but im slowly learning from my mistakes.</li>
            
            <br>

            <li>Lastly I also enjoy playing games and hanging out with friends on my free time, I try to keep social because I think it's a important part of everyday life.</li>
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