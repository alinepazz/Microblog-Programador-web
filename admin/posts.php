<?php 
require "../inc/logica-posts.php";
require "../inc/cabecalho-admin.php"; 


if($_SESSION['tipo'] == 'admin'){ //Trazer todos os posts
    $posts = listaPostsAdmin($conexao);
}else{
    $posts = listaPosts($conexao, $_SESSION['id']); //Se o editor, irá trazer os seus posts
}


?> 

        <section class="conteudo">
            <p class="breadcrumb"><a href="index.php">Home</a> / Posts</p>
            <hr>
            <h2>Posts</h2>
            <p>Administração de posts.</p>
            <hr>
            
            <p><a href="post-insere.php" class="inserir">Inserir novo post</a></p>

            <table>
                <thead>
                    <tr>
                        <th>Título</th>
                        <th>Data</th>
  <?php if($_SESSION['tipo'] == 'admin'){ ?>                      
                        <th>Autor</th>

  <?php } ?>                     
                        <th colspan="2">Operações</th>
                    </tr>
                </thead>
               
                <tbody>
<?php foreach($posts as $post) { ?>
                    <tr>
                        <td><?=$post['titulo']?></td>
                        <td><?=formataData($post['data'])?></td>

     <?php if($_SESSION['tipo'] == 'admin'){ ?> 
                        <td><?=$post['autor']?></td>   
         <?php } ?>          
                        <td>
                            <a class="atualizar" 
                            href="post-atualiza.php?id=<?=$post['id']?>">
                                Atualizar
                            </a>
                        </td>
                        <td>
                            <a class="excluir" 
                            href="post-exclui.php?id=<?=$post['id']?>">
                                Excluir
                            </a>
                        </td>
                    </tr>
<?php } ?>
                </tbody>                
            </table>
        </section>

<?php require "../inc/rodape-admin.php"; ?> 