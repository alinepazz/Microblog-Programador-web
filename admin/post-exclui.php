<?php
require "../inc/logica-posts.php";
require "../inc/logica-sessao.php";
verificaAcesso();

$id = $_GET['id']; //id do POST
$idUsuario = $_SESSION['id']; // id do usúario logado

if($_SESSION['tipo'] == 'admin'){
    excluiPostAdmin($conexao, $id);
} else {
    excluiPost($conexao, $id, $idUsuario);
}


 require "../inc/desconecta.php";
header("location:posts.php"); 

