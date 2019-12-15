<?php
require "../inc/logica-posts.php"; 
require "../inc/cabecalho-admin.php"; 


//ID do post
$id = $_GET['id'];

//ID do usuário logado
$idUsuario = $_SESSION['id'];

// Verificando o nível do usúario logado

if($_SESSION['tipo'] == 'admin'){

    // Pode carregar os dados de qualquer post de qualquer usúario
    $post = listaUmPostAdmin($conexao, $id);
}else{
    //Pode carregar os dados somente dos seus próprios posts
    $post = listaUmPost($conexao, $id, $idUsuario);
}

if( isset($_POST['atualizar'])) {
    $titulo = $_POST['titulo'];
    $texto = $_POST['texto'];
    $resumo = $_POST['resumo'];
//Se o campo imagem está vazio
if(empty($_FILES['imagem']['name']) ){
    $imagem = $_POST['imagem-existente'];
//Pegue a nova imagem e a envie para o servidor
}else{
    $imagem = $_FILES['imagem']['name'];
    upload($_FILES['imagem']);
}


    atualizaPost($conexao, $id, $titulo, $texto, $resumo, $imagem);
    header("location:posts.php");
    require "../inc/desconecta.php"; 
}          
?>
       
        <section class="conteudo">
            <p class="breadcrumb">
                <a href="index.php">Home</a> / 
                <a href="posts.php">Posts</a> / 
                Atualizar
            </p>
            <hr>
            <h2>Atualizar Post</h2>
            <form action="" method="post" id="form-atualizar" name="form-atualizar" enctype="multipart/form-data">
                <input type="hidden" id="id" name="id" 
                value="<?=$post['id']?>">  
               
                <p>
                    <label for="titulo">Título:</label><br>
                    <input type="text" id="titulo" name="titulo" value="<?=$post['titulo']?>" required>
                </p>
                
                <p>
                    <label for="texto">Texto:</label><br>
                    <textarea name="texto" id="texto" cols="50" rows="10" required><?=$post['texto']?></textarea>
                </p>
                
                <p>
                    <label for="resumo">Resumo:</label><br>
                    <textarea name="resumo" id="resumo" cols="50" rows="3" required><?=$post['resumo']?></textarea>
                </p>
                
                <p>
                    <label for="imagem-existente">Imagem do post:</label>
                    <!-- campo somente leitura, meramente informativo -->
                    <input type="text" id="imagem-existente" name="imagem-existente" readonly 
                    value="<?=$post['imagem']?>">
                </p>            
                    
                <p>
                    <label for="imagem">Selecionar uma imagem para este post:</label>
                    <input type="file" id="imagem" name="imagem"
                    accept="image/png, image/jpeg, image/gif, image/svg+xml">
                </p>
                
                <button name="atualizar">Atualizar post</button>
            </form>
            
        </section>

<?php
require "../inc/rodape-admin.php"; 
?>