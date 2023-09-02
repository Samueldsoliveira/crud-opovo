<?php
include_once "conexao.php";

$id = filter_input(INPUT_GET, "id", FILTER_SANITIZE_NUMBER_INT); //Estamos enviando através do metodo GET pela page "custom.js" por isso o uso do "INPUT_GET" e o recebemos do tipo int.

if (!empty($id)){ // Se for diferente de vázio eu estou recebendo o id.

    $query_usuario = "SELECT id, nome, email FROM usuarios WHERE id = :id LIMIT 1";
    $result_usuario = $con -> prepare($query_usuario);
    $result_usuario -> bindParam(':id', $id); //indica que o ':id' do $query_usuario é substituido pelo $id variavel global do inicio da página

    $result_usuario -> execute();

    $row_usuario = $result_usuario -> fetch(PDO::FETCH_ASSOC); //Variavel está obtendo uma linha de dados do resultado da consulta que foi preparada anteriormente. O método fetch(PDO::FETCH_ASSOC) é usado para buscar a próxima linha de resultados como um array associativo.
 
    $retorna = ['erro' => false, 'dados' => $row_usuario]; //Defino a variável $retorna como um array associativo com duas chaves: 'erro' com valor false (indicando que não houve erro) e 'dados' com o valor da $row_usuario que já obteve dados do banco.

} else {

    $retorna = ['erro' => true, 'msg' => "<div class='alert alert-danger' role='alert'>'Erro: Nenhum usuário foi encontrado!'</div>"];

}

echo json_encode($retorna); //Como $retorna é um array, devemos devolve-lo em .json