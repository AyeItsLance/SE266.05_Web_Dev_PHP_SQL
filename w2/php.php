<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PHP Helo</title>
</head>
<body>
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
    
        <a href='index.html'><strong>Home</strong></a>
    
        <a href='https://github.com/AyeItsLance/SE266.05_Web_Dev_PHP_SQL'><strong>Github</strong></a>
    
        <a href='php.html'><strong>PHP Resources</strong></a>
    
        <a href='git.html'><strong>Git Resources</strong></a>
    
        <a href="about.html"><strong>About Me</strong></a>
    </header>

    <footer>

        <hr>

        <?php       
        $file = basename($_SERVER['PHP_SELF']);
        $mod_date=date("F d Y h:i:s A", filemtime($file));
        echo "File last updated $mod_date ";
        //date.timezone = "Europe/Athens"
        ?>

    </footer>
    
</body>
</html>