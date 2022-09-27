<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../style.css">
    <title>Novo Administrador</title>
</head>
<body>

    <?php
        require_once('../header.html');
    ?>
    
    <a class="button botao-voltar" href="index.php">
        Voltar
    </a>

    <main class="admin-wrapper">
        <h1>Novo Administrador</h1>

        <form class="formulario" action="../acoes/novoadmin.php" method="POST" enctype="multipart/form-data">
            
            <div class="form-line">
                <label for="nome">Nome: </label>
                <input type="text" name="nome" required>
            </div>

            <div class="form-line">
                <label for="email">Email: </label>
                <input type="text" name="email" required>
            </div>

            <div class="form-line">
                <label for="senha">Senha: </label>
                <input type="password" name="senha" required>
            </div>

            <div class="form-botao">
                <input class="button" type="submit" value="Cadastrar">
            </div>

        </form>
    </main>

    <?php
        require_once('footer.html');
    ?>


</body>
</html>