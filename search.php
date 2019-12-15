<?php 
    require "inc/logica-posts.php";
    require "inc/cabecalho.php"; 
//Palavra digitada no formulario de busca
    $termo = $_GET['q'];// 'q' é o name do campo do form


$resultado = busca($conexao, $termo);
    
?>    
       
    <div class="posts conteudo">
            <h3>Você procurou por: <?=$termo?>
            (<?=count($resultado)?> registros) </h3>
<?php foreach($resultado as $post) { ?>

        <a href="post-detalhe.php?id=<?=$post['id']?>">
            <article class="post-resultado">
                <header>
                    <h2><?=$post['titulo']?></h2>
                    <time><?=formataData($post['data'])?></time>
                </header>
                <p><?=$post['resumo']?></p>
            </article>
        </a>
<?php } ?>
    </div>

<?php 
require "inc/rodape.php"; 
?> 