<?php
    include '../bd.php';
    $bd = connect();

    //pega valores do form
    $nome = $_POST['nome'];
    $email = $_POST['email'];
    $senhaHash = md5($_POST['senha']);

    if(!empty($email) and !empty($email) and !empty($senhaHash)){

        try {
            $query = "INSERT INTO usuarios (nome, email, senha, admin) VALUES ('$nome','$email','$senhaHash', 0)";
            $res = $bd->prepare($query);
            $res->execute();

            $query = "SELECT id FROM usuarios WHERE email = '$email'";
            $res = $bd->prepare($query);
            $res->execute();

            $row = $res->fetch();

            session_start();
            $_SESSION['id'] = $row['id'];

            } catch (PDOException $er){
                echo 'Erro: '.$er->getMessage();
            }
    } 

    header('Location: ../index.php');
    exit();
?>