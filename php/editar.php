<?php
include_once "conexao.php";

$dados = filter_input_array(INPUT_POST, FILTER_DEFAULT); // filter_input_array para receber todos os dados, com o método POST que estou utilizando e utilizo FILTER_DEFAULT para receber como String.

if(empty($dados['id'])){ //Verificação de entrada do id

    $retorna = ['erro' => true, 'msg' => "<div class='alert alert-danger' role='alert'>'Erro: Tente mais tarde!>"]; ////Caso dê erro, erro é true, mostrando a mensagem acima, id é um campo oculto então por isso a mensagem de tentar mais tarde

} else if(empty($dados['nome'])){ //Verificação de entrada, se o campo for vázio, vai dar erro.

    $retorna = ['erro' => true, 'msg' => "<div class='alert alert-danger' role='alert'>'Erro: Preencher o campo Nome!'</div>"]; ////Caso dê erro, erro é true, mostrando a mensagem acima, detalhe que essa div é o danger do bootstrap para sinalizar erro.

} elseif (empty($dados['email'])){ //Verificação de entrada, se o campo for vázio, vai dar erro.

    $retorna = ['erro' => true, 'msg' => "<div class='alert alert-danger' role='alert'>'Erro: Preencher o campo E-mail!'</div>"]; ////Caso dê erro, erro é true, mostrando a mensagem acima, detalhe que essa div é o danger do bootstrap para sinalizar erro.

} else {

    $query_usuario = "UPDATE usuarios SET nome=:nome, email=:email WHERE id=:id";

    $edit_usuario = $con -> prepare($query_usuario); //Preparo a consulta SQL para execução usando a instância $con da pagina conexao.php criando conexão ao banco.

    $edit_usuario -> bindParam(':nome', $dados['nome']); //O bindParam serve para apontar que o ":nome" de $query_usuario vai ser substituido por $dados['nome'], valor "nome" é o declarado em "name" no formulário do campo nome em HTML de index.php.

    $edit_usuario -> bindParam(':email', $dados['email']);

    $edit_usuario -> bindParam(':id', $dados['id']);

    $edit_usuario -> execute(); //Executa

    if($edit_usuario -> rowCount()){ //Se conseguiu afetar alguma coluna acessa esse IF

        $retorna = ['erro' => false, 'msg' => "<div class='alert alert-success' role='alert'>'Usuário editado com sucesso!'</div>"]; //Caso dê certo, erro é false, mostrando a mensagem acima, detalhe que essa div é o sucess do bootstrap.

    } else { //Se não afetou acessa este else
        $retorna = ['erro' => true, 'msg' => "<div class='alert alert-danger' role='alert'>'Erro: Usuário não foi editado com sucesso!'</div>"];

    }

}

echo json_encode($retorna); //Estou enviando a resposta em JSON para o custom.js