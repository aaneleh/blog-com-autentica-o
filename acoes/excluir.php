<?php
    include '../bd.php';
    $bd = connect();

    $id = $_GET['id'];

    if(!empty($id)){
        try{
            $query = "DELETE FROM artigos WHERE id = $id";
            $res = $bd->prepare($query);
            $res->execute();
            $status = 'excluido';
        } catch (PDOException $er){
            echo 'Erro: '.$er->getMessage();
        }
    } 

    header('Location: ../admin/index.php?status='.$status);
    exit();

?>