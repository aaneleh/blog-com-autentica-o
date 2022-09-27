<?php
    include '../bd.php';
    $bd = connect();

    $id = $_GET['id'];

    $query = "SELECT * FROM artigos WHERE id = $id";
    $res = $bd->prepare($query);
    $res->execute();
    $row = $res->fetch();

    $titulo = $row['titulo'];
    $texto = $row['texto'];
    $data = $row['data'];
    $imagem = $row['imagem'];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../style.css">
    <title>Editar Artigo</title>
</head>
<body>

    <?php
        require_once('../header.html');
    ?>

    <a class="button botao-voltar" href="index.php">
        Voltar
    </a>
    
    <main class="admin-wrapper">
        <h1>Editar Artigo <?php echo $id?></h1>

        <form class="formulario" action="../acoes/editar.php" method="POST" enctype="multipart/form-data">
            <input type="hidden" name="id" value="<?php echo $id ?>">

            <div class="form-line">
                <label for="titulo">Título: </label>
                <input type="text" name="titulo" value="<?php echo $titulo ?>">
            </div>


            <div class="form-line">
                <label for="texto">Texto: </label>
                <textarea name="texto" cols="30" rows="10"><?php echo $texto ?></textarea>
            </div>
            

            <div class="form-line">
                <label for="texto">Data: </label>
                <input type="date" name="data" value="<?php echo $data ?>"></input>
            </div>

            <div class="form-line">
                <label for="imagem">Nova Imagem: </label>
                <input type="file" name="imagem" value="<?php echo $imagem ?>">
            </div>
            
            <div class="imagem-form imagem-container">
                <img src="../imagens/<?php echo $imagem ?>" alt="<?php echo $imagem ?>">
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