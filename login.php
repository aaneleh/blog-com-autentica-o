<main class="admin-wrapper">
    <h1>LOGIN</h1>

    <form class="formulario" action="acoes/logar.php" method="POST">

        <div class="form-line">
            <label for="email">Email: </label>
            <input type="text" name="email" required>
        </div>

        <div class="form-line">
            <label for="senha">Senha: </label>
            <input type="password" name="senha" required>
        </div>

        <div class="form-botao">
            <input class="button" type="submit" value="Logar">
        </div>
    </form>

    <br><br>
    <a href="logon.php" class="link">Não possui conta? Cadastre-se aqui</a>
</main>