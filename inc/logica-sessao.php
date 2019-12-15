<?php
/* SESSÕES PHP*/ 


/* VERIFICANDO SE NÃO EXISTE UMA 
SESSÃO EM FUNCIONAMENTO */


if(!isset($_SESSION)){
        //Inicamos
        session_start();
}
/*Passamos os dados para funçao (id, nome, email, tipo)
e levamos estas informações para a sessão na forma de variaveis */
function login($id, $nome, $email, $tipo){

    //Criar variaveis de SESSÃO
    $_SESSION['id'] = $id;
    $_SESSION['nome'] = $nome;
    $_SESSION['email'] = $email;
    $_SESSION['tipo'] = $tipo;
}


function verificaAcesso(){
    /* Se o usuario não estiver logado (ou seja, não há variavel de sessão com ID) */
    if(!isset($_SESSION['id']) ){
        //Destrua qualquer resquicio de sessão 
        session_destroy();
        //mande ele para a página de login
        header("location:../login.php?acesso_proibido");
        //Para complementamento do script
        exit;
    }
}

function logout(){
    session_start();
    session_destroy();
    header("location:../login.php?logout");
    exit;
}