<?php 
require "../inc/logica-usuarios.php";
require "../inc/cabecalho-admin.php"; 


if($_SESSION['tipo'] != 'admin') {
    header("location:nao-autorizado.php");
    exit;
}


//CARREGA O ID A PARTIR DA URL
$id = $_GET['id'];

//Chama a função que trará os dados do usuário
$usuario = lerUmUsuario($conexao, $id);
if( isset($_POST['atualizar'])) {   
    $nome = $_POST['nome'];
    $email = $_POST['email'] ;
    $tipo = $_POST['tipo']  ;


    
    /*Lógica para senha
    Se o campo senha do formulário está vazio 
    E se estiver, significa que usuário não alterou a senha

    Caso contrário, se o usuário digitou alguma senha no campo, precisamos verificar esta senha digitada
    */
    if(empty($_POST['senha']) ){
    $senha = $usuario['senha'];
    }else {
    $senha = verificaSenha(
        $_POST['senha'], $usuario['senha']);
    }
    echo $senha;
     

atualizarUsuario($conexao, $id, $nome, $email, $senha, $tipo);

require "../inc/desconecta.php";
header("location:usuarios.php");

}
?>
       
        <section class="conteudo">
            <p class="breadcrumb">
                <a href="index.php">Home</a> / 
                <a href="usuarios.php">Usuários</a> / 
                Atualizar
            </p>
            <hr>
            <h2>Atualizar Usuário</h2>
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
                    <label for="nova-senha">Senha</label>
                    <input type="password" id="senha" name="senha">
                </p>
                <p>
                   <label for="tipo">Tipo:</label>
                   <select name="tipo" id="tipo" required>
                    <option value=""></option>                    
                    <option 
    <?php 
    if($usuario['tipo'] == 'editor') {
echo "selected";
    }
    ?>     
                    value="editor">Editor</option>                    
                    <option 
                    
                    <?php 
    if($usuario['tipo'] == 'admin') {
echo "selected";
    }
    ?>                       
                    value="admin">Administrador</option>
                   </select>
                </p>
                <button name="atualizar">Atualizar usuário</button>
            </form>
            
        </section>

<?php
require "../inc/rodape-admin.php"; 
?>