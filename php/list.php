<?php
include_once "conexao.php";

$usuarios = "SELECT id, nome, email FROM usuarios"; //Definindo uma consulta SQL para introduzir dados de id, nome e email e limitando a 10 usuários

$result_usuarios = $con -> prepare($usuarios); //Aqui utilizei o prepare, pois a garante segurança contra injeção de SQL, prevenindo a interpretação de valores como parte da consulta e dificultando ataques de invasores.

$result_usuarios -> execute(); //Consulta SQL é executada

$dados = ""; //Irá receber todas as informações, iniciado como string vázia

//Criei um loop while que percorre cada registro retornado pela consulta. A função fetch(PDO::FETCH_ASSOC) obtém um único registro da consulta, eu o armazenei em $row_usuario como um array associativo.
while ($row_usuario = $result_usuarios -> fetch(PDO::FETCH_ASSOC)){

    extract($row_usuario); //Utilizo extract para criar variáveis com os nomes das colunas do registro atual do banco de dados na váriavel $row_usuario.

    //Dentro do loop, criei linhas de tabela em HTML com informações de cada registro, e acumulei essas linhas na variável $dados.  A variável $dados é concatenada com essa string HTML, por isso usei a operação ".="
    $dados .= "<tr>
                    <td>$id</td>
                    <td>$nome</td>
                    <td>$email</td>
                    <td>
                        <button id='$id' class='btn btn-outline-primary btn-sm' onclick='visUsuario($id)'>Visualizar</button> 
                        <button id='$id' class='btn btn-outline-warning btn-sm' onclick='editUsuarioDados($id)'>Editar</button> 
                    </td> 
              </tr>"; //Último td se refere ao botão bootstrap do editar e visualizar declarando $id e levando para o nosso JS "custom.js"

}

echo $dados;