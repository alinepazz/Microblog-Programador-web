<?php
require "conecta.php";


function inserePost($conexao, $titulo, $texto, $resumo, $imagem, $usuarioId){
    $sql = "INSERT INTO posts (titulo, texto, resumo, imagem, usuario_id) VALUES( '$titulo', '$texto', '$resumo', '$imagem', '$usuarioId' )";
    mysqli_query($conexao, $sql) or die(mysqli_error($conexao));
} // fim function inserePost

//EDITOR
function listaPosts($conexao, $usuarioId){
	$posts = [];
	$sql = "SELECT * FROM posts WHERE usuario_id = $usuarioId ORDER BY data DESC";
    $resultado = mysqli_query($conexao, $sql) or die(mysqli_error($conexao));
	while( $post = mysqli_fetch_assoc($resultado) ){
		array_push($posts, $post);
	}
	return $posts; 
} // fim function listaPosts

//EDITOR: Só pode ver os dados do seu próprio post
function listaUmPost($conexao, $id, $usuarioId){    
    $sql = "SELECT * FROM posts WHERE id = $id AND usuario_id = $usuarioId";    
	$resultado = mysqli_query($conexao, $sql) or die(mysqli_error($conexao));
    return mysqli_fetch_assoc($resultado); 
} // fim function listaUmPost
 
//ADMIN: pode ver os dados de qualquer post
function listaUmPostAdmin($conexao, $id){    
    $sql = "SELECT * FROM posts WHERE id = $id";    
	$resultado = mysqli_query($conexao, $sql) or die(mysqli_error($conexao));
    return mysqli_fetch_assoc($resultado); 
} // fim function listaUmPostAdmin


function atualizaPost($conexao, $id, $titulo, $texto, $resumo, $imagem){
    $sql = "UPDATE posts SET titulo = '$titulo', texto = '$texto', resumo = '$resumo', imagem = '$imagem' WHERE id = $id";
    mysqli_query($conexao, $sql) or die(mysqli_error($conexao));       
} // fim function atualizaPost

//EDITOR: pode excluir apenas os próprios posts
function excluiPost($conexao, $id, $usuarioId){
    $sql = "DELETE FROM posts WHERE id = $id AND usuario_id = $usuarioId";
	mysqli_query($conexao, $sql) or die(mysqli_error($conexao));
} // fim function excluiPost

//ADMIN: pode excluir qualquer post
function excluiPostAdmin($conexao, $id){
    $sql = "DELETE FROM posts WHERE id = $id";
	mysqli_query($conexao, $sql) or die(mysqli_error($conexao));
} // fim function excluiPostAdmin


//FUNCÕES PARA O ADMINISTRADOR

//Lista de todos os post a serem exibidos para o admin
function listaPostsAdmin($conexao){
    $sql = "SELECT posts.id, posts.titulo, posts.data, usuarios.nome AS autor FROM posts INNER JOIN usuarios ON
    posts.usuario_id = usuarios.id ORDER BY data DESC";

    $resultado = mysqli_query($conexao, $sql) or die (mysqli_error($conexao));
    $posts = [];
    while($post = mysqli_fetch_assoc($resultado)){
        array_push($posts, $post);
    }
    return $posts;
}

//FUNÇÃO FORMATAR A DATA

function formataData($data){
    return date("d/m/Y h:i", strtotime($data)); //strtotime => transforma a data em string/ e o DATA ornazina da forma brasileira
}


function upload($arquivo){
    $tiposValidos = [
        "image/png",
        "image/jpeg",
        "image/gif",
        "image/svg+xml"
    ];

    // in_array() => verificando se não está no array
    // Se o tipo do arquivo enviado NÃO FOR um dos válidos, pare o script
    if(!in_array($arquivo["type"], $tiposValidos) ){
        die("<p> Formato não permitido!</p>");
    }

    $nome = $arquivo["name"]; // aqui vem o nome do arquivo e sua extensão
    $temp = $arquivo["tmp_name"]; // aqui o servidor gera um nome
    //Local final para onde vamos enviar a imagem 
    $destino = "../imagens/".$nome; // estamos fazendo uma concatenação com o ponto . 


    // Se o processo de upload for bem sucedido
    if(move_uploaded_file($temp,$destino)){
        // retorna true/verdadeiro
        return true;
    }
}


//FUNÇÕES para a área PUBLICA do site

function lerTodosOsPosts($conexao){
    $posts = [];
    
    $sql = "SELECT posts.*, usuarios.nome AS autor FROM posts INNER JOIN usuarios ON posts.usuario_id = usuarios.id ORDER BY data DESC";
    
    $resultado = mysqli_query($conexao, $sql) or die(mysqli_error($conexao));
    
    while( $post = mysqli_fetch_assoc($resultado) ){
        array_push($posts, $post);
    }
    
    return $posts; 
}


function lerDetalhes($conexao, $id){    
    $sql = "SELECT posts.*, usuarios.nome AS autor FROM posts INNER JOIN usuarios ON posts.usuario_id = usuarios.id WHERE posts.id = $id";
    $resultado = mysqli_query($conexao, $sql) or die(mysqli_error($conexao));
    return mysqli_fetch_assoc($resultado); 
}


function busca($conexao, $termo){
    $posts = [];
    
    $sql = "SELECT * FROM posts WHERE titulo like '%$termo%' or resumo like '%$termo%' or texto like '%$termo%' order by data desc ";

    $resultado = mysqli_query($conexao, $sql) or die(mysqli_error($conexao));
    
    while( $post = mysqli_fetch_assoc($resultado) ){
        array_push($posts, $post);
    }
    
    return $posts; 
}