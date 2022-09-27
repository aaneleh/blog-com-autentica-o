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

    <main class="home-wrapper">
        <?php
            include 'bd.php';
            $bd = connect();
            $query = "SELECT * FROM artigos ORDER BY data DESC";
            $res = $bd->prepare($query);
            $res->execute();
            while($row = $res->fetch()){
                echo '
                    <div class="artigo-container">
                        <h4 class="data">
                            '.$row['data'].'
                        </h4>
                        <div class="artigo-conteudo">
                            <div class="artigo-texto">
                                <a href="artigo.php?id='.$row['id'].'">
                                    <h2 class="titulo">
                                        '.$row['titulo'].'
                                    </h2>
                                </a>    
                                <p>
                                    &nbsp &nbsp'.substr($row['texto'], 0, 175).'...
                                </p>
                                <a class="button" href="artigo.php?id='.$row['id'].'">
                                    Ler mais
                                </a>   
                            </div>
                            <div class="imagem-home imagem-container">
                                <img src="imagens/'.$row['imagem'].'" alt="'.$row['imagem'].'">
                            </div>
                        </div>
                    </div>
                ';
            }
        ?>
    </main>



</body>
</html>