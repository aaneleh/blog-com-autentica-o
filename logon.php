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

    <main class="admin-wrapper">
        <h1>LOGON</h1>

        <form class="formulario" action="acoes/logon.php" method="POST">

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
                <input class="button" type="submit" value="Logon">
            </div>
        </form>

        <br><br>
        <a href="index.php" class="link">Já possui conta? Logue aqui</a>
    </main>

</body>
</html>