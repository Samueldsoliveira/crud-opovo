<?php
include_once "conexao.php";

$dados = filter_input_array(INPUT_POST, FILTER_DEFAULT); // filter_input_array para receber todos os dados, com o método POST que estou utilizando e utilizo FILTER_DEFAULT para receber como String.

if(empty($dados['nome'])){ //Verificação de entrada, se o campo for vázio, vai dar erro.

    $retorna = ['erro' => true, 'msg' => "<div class='alert alert-danger' role='alert'>'Erro: Preencher o campo Nome!'</div>"]; ////Caso dê erro, erro é true, mostrando a mensagem acima, detalhe que essa div é o danger do bootstrap para sinalizar erro.

} elseif (empty($dados['email'])){ //Verificação de entrada, se o campo for vázio, vai dar erro.

    $retorna = ['erro' => true, 'msg' => "<div class='alert alert-danger' role='alert'>'Erro: Preencher o campo E-mail!'</div>"]; ////Caso dê erro, erro é true, mostrando a mensagem acima, detalhe que essa div é o danger do bootstrap para sinalizar erro.

} else {

    $query_usuario = "INSERT INTO usuarios (nome, email) VALUES (:nome, :email)"; //Defini a consulta SQL na tabela usuario do BD OPOVO para a variavel $query_usuario

    $cadUsuario = $con -> prepare($query_usuario); //Preparo a consulta SQL para execução usando a instância $con da pagina conexao.php criando conexão ao banco.

    $cadUsuario -> bindParam(':nome', $dados['nome']); //O bindParam serve para apontar que o ":nome" de $query_usuario vai ser substituido por $dados['nome'], valor "nome" é o declarado em "name" no formulário do campo nome em HTML de index.php.

    $cadUsuario -> bindParam(':email', $dados['email']);//O bindParam serve para apontar que o ":email" de $query_usuario vai ser substituido por $dados['email'], valor "email" é o declarado em "name" no formulário do campo email em HTML de index.php.

    $cadUsuario -> execute(); //Executa

    if($cadUsuario -> rowCount()){ //Se conseguiu afetar alguma coluna acessa esse IF

        $retorna = ['erro' => false, 'msg' => "<div class='alert alert-success' role='alert'>'Usuário cadastrado com sucesso!'</div>"]; //Caso dê certo, erro é false, mostrando a mensagem acima, detalhe que essa div é o sucess do bootstrap.

    } else { //Se não afetou acessa este else
        $retorna = ['erro' => true, 'msg' => "<div class='alert alert-danger' role='alert'>'Erro: Usuário não foi cadastrado!'</div>"]; ////Caso dê erro, erro é true, mostrando a mensagem acima, detalhe que essa div é o danger do bootstrap para sinalizar erro.

    }

}

echo json_encode($retorna); //Estou enviando a resposta em JSON para o custom.js