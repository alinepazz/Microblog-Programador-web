<?php
require "conecta.php";

function inserirUsuario($conexao, $nome, $email, $senha, $tipo){
    $sql = "INSERT INTO usuarios(nome, email, senha, tipo) VALUES ('$nome', '$email', '$senha', '$tipo')";
    mysqli_query($conexao, $sql) or die (mysqli_error($conexao));
}//fim inserirUsuario


function codificaSenha($senha){
    return password_hash($senha, PASSWORD_BCRYPT);
}//fim codificaSenha


function buscaUsuario($conexao, $email){
    $sql = "SELECT * FROM usuarios WHERE email = '$email'";
    $resultado = mysqli_query($conexao, $sql) or die (mysqli_error($conexao));
    return mysqli_fetch_assoc($resultado);
}



function lerUsuarios($conexao){
    $sql = "SELECT * FROM usuarios ORDER BY nome";
    $resultado = mysqli_query($conexao, $sql) or die (mysqli_error($conexao));
    
    $usuarios = [];

    while($usuario = mysqli_fetch_assoc($resultado)){
        array_push($usuarios, $usuario);
    };
    return $usuarios;
}



function lerUmUsuario($conexao, $id){
    $sql = "SELECT * FROM usuarios WHERE id = '$id'";
    $resultado = mysqli_query($conexao, $sql) or die (mysqli_error($conexao));
    return mysqli_fetch_assoc($resultado);
}


function atualizarUsuario($conexao, $id, $nome, $email, $senha, $tipo){
$sql = "UPDATE usuarios SET nome = '$nome', email = '$email', senha = '$senha', tipo = '$tipo' WHERE id = $id";

mysqli_query($conexao, $sql) or die (mysqli_error($conexao));

}

function verificaSenha($senhaDigitada, $senhaBanco){ 
    if(password_verify($senhaDigitada, $senhaBanco) ){
        return $senhaBanco;
    }else {
        return codificaSenha($senhaDigitada);
    }
}

function excluirUsuario($conexao, $id){
    $sql = "DELETE FROM usuarios WHERE id = $id";
    mysqli_query($conexao, $sql) or die (mysqli_error($conexao));
}