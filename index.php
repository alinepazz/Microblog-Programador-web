<?php 
require "inc/logica-posts.php";
require "inc/cabecalho.php"; 



$post = lerTodosOsPosts($conexao);
?> 
       <div class="grupo-de-posts">
<?php foreach($post as $post) { ?>
            <article class="post">
                <img src="imagens/<?=$post['imagem']?>" alt="Destaque">
                <h2>
                <a href="post-detalhe.php?id=<?=$post['id']?>">
                    <?=$post['titulo']?>
                </a>
                </h2>
                <p> <?=$post['resumo']?></p>
            </article>
<?php } ?>
        </div>

<?php require "inc/rodape.php"; ?> 