<?php 
require "../inc/logica-posts.php"; 
require "../inc/cabecalho-admin.php"; 

if( isset($_POST['inserir']) ) {
    $titulo = $_POST['titulo'];
    $texto = $_POST['texto'];
    $resumo = $_POST['resumo']; 

    //Array$_FILES[] => traz dados do arquivo
    $imagem = $_FILES['imagem'];
    $usuarioId = $_SESSION['id'];

    // echo"<pre>";
    // var_dump($imagem);
    // echo"</pre>";

    upload($imagem);

     inserePost(
        $conexao, $titulo, $texto, $resumo, $imagem['name'], $usuarioId
    ); 

     header("location:posts.php");
    require "../inc/desconecta.php"; 
}        
?>
       
        <section class="conteudo">
            <p class="breadcrumb">
                <a href="index.php">Home</a> / 
                <a href="posts.php">Posts</a> / 
                Inserir
            </p>
            <hr>
            <h2>Inserir Post</h2>
            <!-- todo formularo que vai ter upload precisa do enctype="multipart/form-data" -->
            <form enctype="multipart/form-data" action="" method="post" id="form-inserir" name="form-inserir">
                <p>
                    <label for="titulo">Título:</label><br>
                    <input required type="text" id="titulo" name="titulo" >
                </p>
                <p>
                    <label for="texto">Texto:</label><br>
                    <textarea required name="texto" id="texto" cols="50" rows="10"></textarea>
                </p>
                <p>
                    <label for="resumo">Resumo:</label><br>
                    <textarea required name="resumo" id="resumo" cols="50" rows="3"></textarea>
                </p>
                
                <p>
                    <label for="imagem">Selecionar uma imagem para este post: </label>
                    <input required type="file" id="imagem" name="imagem" 
                    accept="image/png, image/jpeg, image/gif, image/svg+xml">
                </p>

                <button id="inserir" name="inserir">Inserir post</button>                
            </form>
        </section>

<?php require "../inc/rodape-admin.php"; ?> 