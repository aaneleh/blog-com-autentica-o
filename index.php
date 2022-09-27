<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Blog</title>
</head>
<body>

    <?php
        require_once('header.html');
    ?>

    <?php 
        session_start();
        
        if(isset($_SESSION['id']) and !empty($_SESSION['id'])) {

            require_once('home.php');
            
            require_once('footer.html');
            
        } else {
            require_once('login.php');
        }
    ?>

</body>
</html>