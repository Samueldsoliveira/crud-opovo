<?php

$host = "localhost"; //O banco de dados é local por isso 'localhost'.

$user = "root"; //Variável que armazena o nome do usuário que utilizo, no caso é root.

$password = ""; //Variável que armazena a senha do usuário do banco de dados, eu deixei em branco então fica vázia.

$dbname = "opovo"; //Variável que recebe nossa base de dados que coloquei com nome "opovo".

try{ // Aqui eu utilizo um bloco try para tentar criar uma conexão com o banco de dados usando a classe PDO (PHP Data Objects).

    $con = new PDO("mysql:host = $host;dbname=" . $dbname, $user, $password); // Instância PDO criada para conectar ao banco com detalhes definidos na string de conexão (host, nome do banco, usuário e senha).

    //echo "Conexão OK!.";  Para testar conexão com o BD na tela

} catch (PDOException $err) { // Se houver um erro na conexão, o código capturará a exceção PDOException e entrará no bloco catch.

    echo "Erro: Houve algum problema com sua conexão com o banco de dados. Erro gerado " . $err->getMessage(); //Uma mensagem de erro mostrará detalhes do erro obtidos com getMessage(), facilitando a identificação de problemas de conexão.

}