<?php 
require "../inc/logica-usuarios.php";
require "../inc/cabecalho-admin.php"; 


//Recuperar o ID do usuario logado na sessão

$id = $_SESSION['id'];



//Buscando os dados do usuário logado
$usuario = lerUmUsuario($conexao, $id);
// echo "<pre>";
// var_dump($usuario);
// echo "</pre>";


if( isset($_POST['atualizar'])) {    
$nome = $_POST['nome'];
$email= $_POST['email'];


//Recuperando o tipo do usuário já logado
$tipo = $_SESSION['tipo'];

if(empty($_POST['senha']) ){
    $senha = $usuario['senha'];
    }else {
    $senha = verificaSenha(
        $_POST['senha'], $usuario['senha']);
    }
    // echo $senha;

    atualizarUsuario($conexao, $id, $nome, $email, $senha, $tipo);

    require "../inc/desconecta.php";
    header("location:index.php");
    
    
}
?>
       
        <section class="conteudo">
            <p class="breadcrumb">
                <a href="index.php">Home</a> / 
                Meu perfil
            </p>
            <hr>
            <h2>Atualizar meu perfil</h2>
            <form action="" method="post" id="form-atualizar" name="form-atualizar">
                <input type="hidden" name="id" value="<?=$usuario['id']?>">
                <p>
                    <label for="nome">Nome:</label>
                    <input required type="text" id="nome" name="nome" 
                    value="<?=$usuario['nome']?>">
                </p>
                <p>
                    <label for="email">E-mail:</label>
                    <input required type="email" id="email" name="email" 
                    value="<?=$usuario['email']?>">
                </p>
                <p>
                    <label for="senha">Senha</label>
                    <input type="password" id="senha" name="senha">
                </p>

                <p>
                <?php if($_SESSION['tipo']  == 'admin') { ?>

                   <label for="tipo">Tipo:</label>
                   <select name="tipo" id="tipo" required>
                    <option value=""></option>                    
                    <option value="editor">Editor</option>   
             <option value="admin">Administrador</option>




                    <?php } ?>
                   </select>
                </p>

                <button name="atualizar">Atualizar</button>
            </form>
            
        </section>

<?php
require "../inc/rodape-admin.php"; 
?>