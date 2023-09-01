const tbody = document.querySelector("tbody"); //Criei uma const chamada "tbody" para receber nosso tbody do HTML.

const listarUsuarios = async () =>{ //Utilizo async para usar o await
    
    const dados = await fetch("./php/list.php"); //O JS não aguarda os dados chegarem, então, eu utilizei o Await  pois ele vai fazer me fazer aguardar os $dados da list.php chegar na const dados.

    const resposta = await dados.text(); //A const "resposta" vai literalmente receber a resposta da requisição pedida pelos da list.php.

    tbody.innerHTML = resposta; //Uso o innerHTML para manipular o HTML tbody para ser exibido na tela com os dados da const "resposta" que recebeu a requisição de list.php

}

listarUsuarios();