<?php
    include '../bd.php';
    $bd = connect();

    //pega valores do form
    $titulo = $_POST['titulo'];
    $texto = $_POST['texto'];
    $data = date('Y-m-d');
    $hora = date('h-i-s');
    $arquivo = $_FILES['imagem'];

    //verifica se tem titulo texto e imagem (data é a atual do pc)
    if(!empty($titulo) and !empty($texto) and $arquivo['size'] > 0 ){
        //verifica por erros e tamanho do arquivo
        if($arquivo['error']==0 and $arquivo['size']<5000000){
            //monta o nome como o arquivo vai ficar salvo, algo como 'Ruiner.png_2022-08-28_44-13-18'
            $arquivoNome = explode('.',$arquivo['name'])[0];
            $arquivoExtensao = explode('.',$arquivo['name'])[1];
            $imagemNome = $arquivoNome.'_'.$data.'_'.$hora.'.'.$arquivoExtensao; 

            if(move_uploaded_file($arquivo['tmp_name'], '../imagens/'.$imagemNome)) {
                try{
                    $query = "INSERT INTO artigos (titulo,texto,data,imagem)
                                VALUES ('$titulo','$texto','$data','$imagemNome')";
                    $res = $bd->prepare($query);
                    $res->execute();
                    $status = 'cadastrado';
                } catch (PDOException $er){
                    echo 'Erro: '.$er->getMessage();
                }
            }
        }
    } 

    header('Location: ../admin/index.php?status='.$status);
    exit();



?>