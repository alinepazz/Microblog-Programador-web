<?php 
require "inc/logica-posts.php";
require "inc/cabecalho.php"; 

$id = $_GET['id'];
$post = lerDetalhes($conexao, $id);




?>    
        <article class="post">
            <h2><?=$post['titulo']?></h2>
            <time>
            <?=formataData($post['data'])?>
            </time> - <b><td><?=$post['autor']?></b>

            <img src="imagens/<?=$post['imagem']?>" alt="Destaque" class="foto">
            
            <!-- nl2br -> função que devolve os espaços dentro do texto -->
            <p><?=nl2br($post['texto'])?></p>  
        </article>

<?php 
require "inc/rodape.php"; 
?> 