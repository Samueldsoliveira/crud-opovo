const tbody = document.querySelector("tbody"); //Criei uma const chamada "tbody" para receber nosso tbody do HTML.
const cadForm = document.getElementById("cad-usuario-form") //declarando uma const que recebe o ID declarado no formulário do index.php
const msgAlerta = document.getElementById("msgAlerta") //ID declarada do span no modal de index.php
const cadModal = new bootstrap.Modal(document.getElementById("cadUsuarioModal"));

const listarUsuarios = async () =>{ //Utilizo async para usar o await

    const dados = await fetch("./php/list.php"); //O JS não aguarda os dados chegarem, então, eu utilizei o Await  pois ele vai fazer me fazer aguardar os $dados da list.php chegar na const dados.

    const resposta = await dados.text(); //A const "resposta" vai literalmente receber a resposta da requisição pedida pelos da list.php.

    tbody.innerHTML = resposta; //Uso o innerHTML para manipular o HTML tbody para ser exibido na tela com os dados da const "resposta" que recebeu a requisição de list.php

}

listarUsuarios();

cadForm.addEventListener("submit", async (e) => { //Crio um evento escutando com função assíncrona que será executada quando o evento de submissão ocorrer.

    e.preventDefault(); //A página estava atualizando automaticamente por comportamento padrão do form HTML, então adicionei "preventDefault", para previnir este comportamento.

    const dadosForm = new FormData(cadForm); //Criei um objeto FormData chamado dadosForm a partir do formulário cadForm. Isso me permite coletar todos os campos de entrada e seus valores do formulário.

    dadosForm.append("add", 1);

    const dados = await fetch ("./php/cadastrar.php", {
        method: "POST",
        body: dadosForm,
    }); //Aqui envio informações do formulário para o arquivo "cadastrar.php" usando o método POST e use async para aguardar a resposta.

    const resposta = await dados.json(); //espera pelos dados em json vir do cadastrar.php

    if(resposta['erro']){ //Se a reposta for true, deu erro ao cadastrar assim como feito em cadastrar.php no IF do $cadUsuario
        msgAlerta.innerHTML = resposta['msg'];

    } else { //Se der false, cadastrou com sucesso, assim como feito em cadastrar.php no IF do $cadUsuario
        msgAlerta.innerHTML = resposta['msg'];
        cadModal.hide(); //Isso serve para fechar o modal automaticamente ao clicar em cadastrar, esse cadModal que foi chamado pelo id "cadUsuarioModal" declarado no modal

    }

    listarUsuarios(); //Chamo a const novamente, para que toda vez que clicarmos no evento escutador, o novo usuário ja seja cadastrado sem precisar atualizar a página
})

async function visUsuario(id){ //Função do botão visualizar recebendo o $id do usuário como parâmetro

    //console.log ("Acessou: " + $id); //testando se a função está chamando o botão visualizar.

    const dados = await fetch('./php/visualizar.php?id=' + id);//envia como parâmetro a variável $id

    const resposta = await dados.json();
    //console.log(resposta); console para testar se os dados estão chegando corretamente dentro do array e visualiza-los

    if (resposta['erro']){
        msgAlerta.innerHTML = resposta['msg'] //Utilizo a mensagem 'msg' de dentro do array $resposta de dentro do if em visualizar.php 

    } else {
    
        const visModal = new bootstrap.Modal(document.getElementById("visUsuarioModal"));
        visModal.show();

        document.getElementById("idUsuario").innerHTML = resposta['dados'].id;
        document.getElementById("nomeUsuario").innerHTML = resposta['dados'].nome;
        document.getElementById("emailUsuario").innerHTML = resposta['dados'].email;

    }

}

async function editUsuarioDados($id){

    //console.log("Função editar") //testando se a função está chamando o botão editar.

    const dados = await fetch()

}