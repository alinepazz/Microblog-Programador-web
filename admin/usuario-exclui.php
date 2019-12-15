<?php
require "../inc/logica-sessao.php";
require "../inc/logica-usuarios.php";


verificaAcesso();
$id = $_GET['id'];
excluirUsuario($conexao, $id);
require "../inc/desconecta.php";
header("location:usuarios.php");



if($_SESSION['tipo'] != 'admin') {
    header("location:nao-autorizado.php");
    exit;
}
