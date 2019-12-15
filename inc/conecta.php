<?php
$servidor = "localhost";	
$usuario = "root";			
$senha = "";
$banco = "progwebt12_microblog_aline";

$conexao = mysqli_connect($servidor, $usuario, $senha, $banco);
mysqli_set_charset($conexao, "utf8");

if( !$conexao ){
    die(mysqli_connect_error($conexao));
}