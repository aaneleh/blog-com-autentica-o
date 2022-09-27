<?php
    include 'bd.php';
    $bd = connect();
?>

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

    <a class="button botao-voltar" href="index.php">
        Voltar
    </a>
    <br><br>

    <main class="home-wrapper">
        <?php
        if(isset($_GET['id']) and !empty($_GET['id']) ){
            $query = "SELECT * FROM artigos WHERE id =". $_GET['id'];
            $res = $bd->prepare($query);
            $res->execute();
            $row = $res->fetch();
            echo '
                <div class="artigo-container">
                    <h4 class="data">
                        '.$row['data'].'
                    </h4>
                    <div class="artigo-conteudo">
                        <div class="artigo-texto">
                            <h2 class="titulo"> '.$row['titulo'].' </h2>
                            <p> '.$row['texto'].' </p>
                        </div>
                        <div class="imagem-home imagem-container">
                            <img src="imagens/'.$row['imagem'].'" alt="'.$row['imagem'].'">
                        </div>
                    </div>
                </div>
            ';

        } else {
            echo '
            <div class="artigo-container">
                <h2> Artigo não encontrado! </h2>
            </div>
        ';

        }
            
        ?>
    </main>

    <?php
        require_once('footer.html');
    ?>

</body>
</html>