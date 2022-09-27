<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../style.css">
    <title>Novo Artigo</title>
</head>
<body>

    <?php
        require_once('../header.html');
    ?>
    
    <a class="button botao-voltar" href="index.php">
        Voltar
    </a>

    <main class="admin-wrapper">
        <h1>Novo Artigo</h1>

        <form class="formulario" action="../acoes/cadastrar.php" method="POST" enctype="multipart/form-data">
            
            <div class="form-line">
                <label for="titulo">Titulo: </label>
                <input type="text" name="titulo" required>
            </div>

            <div class="form-line">
                <label for="texto">Texto: </label>
                <textarea name="texto" id="" cols="30" rows="10" required></textarea>
            </div>
            
            <div class="form-line">
                <label for="imagem">Imagem</label>
                <input type="file" name="imagem" required>
            </div>

            <div class="form-botao">
                <input class="button" type="submit" value="Concluir">
            </div>

        </form>
    </main>

    <?php
        require_once('footer.html');
    ?>


</body>
</html>