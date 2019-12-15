<!doctype html>
<html lang="pt-br">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title> Microblog </title>
<link rel="stylesheet" href="css/normalize.min.css">
<link rel="stylesheet" href="css/style.css">
</head>
<body>

<div id="container">
    <header id="topo">
        <div>
            <h1><a href="index.php">Microblog</a></h1>
            <form action="search.php" method="get" id="form-busca" name="form-busca">
                <input type="search" name="q" id="q" placeholder="Pesquise aqui" size="25">
            </form>
            <nav>
                <a href="index.php">Home</a>
                <a href="admin">Admin</a>
            </nav>
        </div>
    </header>

    <main>