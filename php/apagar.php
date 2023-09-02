<?php
include_once "conexao.php";

$id = filter_input(INPUT_GET, "id", FILTER_SANITIZE_NUMBER_INT); //Estamos enviando através do metodo GET pela page "custom.js" por isso o uso do "INPUT_GET" e o recebemos do tipo int.

if (!empty($id)){ // Se for diferente de vázio eu estou recebendo o id.

    $query_usuario = "DELETE FROM usuarios WHERE id =:id";
    $result_usuario = $con -> prepare($query_usuario);
    $result_usuario -> bindParam(':id', $id); //indica que o ':id' do $query_usuario é substituido pelo $id variavel global do inicio da página

    $result_usuario -> execute();

    if($result_usuario -> execute()){
        $retorna = ['erro' => false, 'msg' => "<div class='alert alert-success' role='alert'>'Usuário apagado com sucesso!'</div>"];

    } else {
        $retorna = ['erro' => true, 'msg' => "<div class='alert alert-danger' role='alert'>'Erro: Usuário não foi apagado!'</div>"];

    }

} else {

    $retorna = ['erro' => true, 'msg' => "<div class='alert alert-danger' role='alert'>'Erro: Nenhum usuário foi encontrado!'</div>"];

}

echo json_encode($retorna); //Como $retorna é um array, devemos devolve-lo em .json