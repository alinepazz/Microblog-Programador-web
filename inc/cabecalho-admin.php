<?php
require "logica-sessao.php";
verificaAcesso();
/*Detectar se há um parâmetro de URL
chamada ?logout */

if(isset($_GET['logout'])){
    logout(); //DEstrói a sessão e volta pra login
}

?>



<!doctype html>
<html lang="pt-br">
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta charset="utf-8">
<title>Admin | Microblog</title>
<link rel="stylesheet" type="text/css" href="../css/normalize.min.css">
<link rel="stylesheet" type="text/css" href="../css/style.css">
<link rel="stylesheet" type="text/css" href="../css/style-admin.css">
</head>

<body>
<div id="container">
    <header id="topo" class="clearfix">
        <div>
            <h1><a href="index.php">Admin | Microblog</a></h1>    
            <nav>
                <a href="?logout">Sair</a> 
            </nav>
        </div>
    </header>

    <main>