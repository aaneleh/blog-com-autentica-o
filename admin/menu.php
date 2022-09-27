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

<main class="admin-wrapper">
    <?php
        $query = "SELECT * FROM artigos ORDER BY data DESC";
        $res = $bd->prepare($query);
        $res->execute();
        if(isset($_GET['status'])){
            switch ($_GET['status']){
                case 'cadastrado':
                    echo "<p class='status verde'> Artigo salvo com sucesso! </p>";
                    break;
                case 'editado':
                    echo "<p class='status verde'> Artigo editado com sucesso! </p>";
                    break;
                case 'excluido':
                    echo "<p class='status verde'> Artigo excluido com sucesso! </p>";
                    break;
                default:
                    echo "<p class='status vermelho'> Erro! </p>";
                    break;
            }
        } else {
            echo "<p class='status invisivel'>mensagem</p>";
        }
    
    ?>

    <table class="listagem">
        <tr>
            <th> Id </th>
            <th> Titulo </th>
            <th> Data </th>
            <th> Editar </th>
            <th> Excluir </th>
        </tr>

        <?php
            while($row = $res->fetch()){
                echo '
                    <tr>
                        <td>
                            '.$row['id'].'
                        </td>
                        <td>
                            '.$row['titulo'].'
                        </td>
                        <td>
                            '.$row['data'].'
                        </td>
                        <td>
                            <a href="editar.php?id='.$row['id'].'">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pen" viewBox="0 0 16 16">
                                    <path d="m13.498.795.149-.149a1.207 1.207 0 1 1 1.707 1.708l-.149.148a1.5 1.5 0 0 1-.059 2.059L4.854 14.854a.5.5 0 0 1-.233.131l-4 1a.5.5 0 0 1-.606-.606l1-4a.5.5 0 0 1 .131-.232l9.642-9.642a.5.5 0 0 0-.642.056L6.854 4.854a.5.5 0 1 1-.708-.708L9.44.854A1.5 1.5 0 0 1 11.5.796a1.5 1.5 0 0 1 1.998-.001zm-.644.766a.5.5 0 0 0-.707 0L1.95 11.756l-.764 3.057 3.057-.764L14.44 3.854a.5.5 0 0 0 0-.708l-1.585-1.585z"/>
                                </svg>
                            </a>
                        </td>
                        <td>
                            <a href="../acoes/excluir.php?id='.$row['id'].'">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" viewBox="0 0 16 16">
                                    <path d="M2.146 2.854a.5.5 0 1 1 .708-.708L8 7.293l5.146-5.147a.5.5 0 0 1 .708.708L8.707 8l5.147 5.146a.5.5 0 0 1-.708.708L8 8.707l-5.146 5.147a.5.5 0 0 1-.708-.708L7.293 8 2.146 2.854Z"/>
                                </svg>
                            </a>
                        </td>
                    </tr> 
                ';
            }
        ?>
    </table>

    <a href="cadastro.php" class="button">Novo Artigo</a>
</main>

<?php
    require_once('footer.html');
?>


</body>
</html>