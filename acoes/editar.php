<?php
    include '../bd.php';
    $bd = connect();

    $id = $_POST['id'];
    $titulo = $_POST['titulo'];
    $texto = $_POST['texto'];
    $data = $_POST['data'];
    $arquivo = $_FILES['imagem'];

    $status = 'erro';

    if(!empty($titulo) and !empty($texto)){ //verifica se esta tudo preenchido
        
        if($arquivo['size'] > 0) {//caso tenha imagem
            //verifica por erros e tamanho do arquivo (max 5MB)
            if($arquivo['error'] == 0 and $arquivo['size'] < 5000000) {
                $arquivoNome = explode('.',$arquivo['name'])[0];
                $arquivoExtensao = explode('.',$arquivo['name'])[1];
                $imagemNome = $arquivoNome.'_'.date('Y-m-d').'_'.date('h-i-s').'.'.$arquivoExtensao; //monta o nome como o arquivo vai ficar salvo, algo como 'Ruiner.png_2022-08-28_44-13-18'
                
                if(move_uploaded_file($arquivo['tmp_name'], '../imagens/'.$imagemNome)) {
                    try{ //tenta executar query
                        $query = "UPDATE artigos
                                SET titulo='$titulo', texto='$texto', data='$data', imagem='$imagemNome'
                                WHERE id= $id";                        
                        $res = $bd->prepare($query);
                        $res->execute();
                        $status = 'editado';
                    } catch (PDOException $er){
                        echo 'Erro: '.$er->getMessage();
                    }
                } 
            }
        } else {
            try{ //tenta executar query
                $query = "UPDATE artigos SET titulo='$titulo', texto='$texto', data='$data' WHERE id= $id";//monta query padrao, sem a imagem
                $res = $bd->prepare($query);
                $res->execute();
                $status = 'editado';
            } catch (PDOException $er){
                echo 'Erro: '.$er->getMessage();
            }
        }
        
    }

    header('Location: ../admin/index.php?status='.$status);
    exit();

?>