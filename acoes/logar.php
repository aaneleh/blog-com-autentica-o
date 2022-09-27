<?php
    include '../bd.php';
    $bd = connect();

    //pega valores do form
    $email = $_POST['email'];
    $senha = $_POST['senha'];

    if(!empty($email) and !empty($senha)){

        try {
            $query = "SELECT * from usuarios WHERE email = :email AND senha = :senha";
            $res = $bd->prepare($query);
            $password_md5 = md5($_POST['senha']);
            $valores = array(
                'email'=>$_POST['email'],
                'senha'=>$password_md5
            );
            $res->execute($valores);

            if ($res->rowCount() > 0){
                $row = $res->fetch();
                session_start();
                $_SESSION['id'] = $row['id'];
            } 

        }   catch (PDOException $er){
            echo 'Erro: '.$er->getMessage();
        }
    } 

    header('Location: ../index.php');
    exit();
?>