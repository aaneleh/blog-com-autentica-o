<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=, initial-scale=1.0">
    <link rel="stylesheet" href="../style.css">
    <title>Blog</title>
</head>
<body>

    <?php
        require_once('../header.html');
    ?>


<a class="button botao-voltar" href="../index.php">
    Home
</a>

    <?php 
        include '../bd.php';
        $bd = connect();

        session_start();
        
        if(isset($_SESSION['id']) and !empty($_SESSION['id'])) {
            $query = "SELECT admin FROM usuarios WHERE id = ". $_SESSION['id'];
            $res = $bd->prepare($query);
            $res->execute();
            $row = $res->fetch();

            if($row['admin'] == 1) {
                require_once('menu.php');
            
                require_once('footer.html');
            } else {
                echo '<br><br><div class="admin-wrapper"> Você não é um administrador </div>';
            }
        } else {
            echo '<br><br><div class="admin-wrapper"> Você não é um administrador </div>';
        }
    ?>

</body>
</html>