<?php 
require "../inc/logica-usuarios.php";
require "../inc/cabecalho-admin.php"; 

if($_SESSION['tipo'] != 'admin') {
    header("location:nao-autorizado.php");
    exit;
}


if( isset($_POST['inserir'])) {
    $nome = $_POST['nome'];
    $email = $_POST['email'];
    $senha = codificaSenha($_POST['senha']);
    $tipo = $_POST['tipo'];
    
    // echo $senha;
inserirUsuario($conexao, $nome, $email, $senha, $tipo);
require "../inc/desconecta.php";
header("location:usuarios.php");
}     


?> 
       
        <section class="conteudo">
            <p class="breadcrumb">
                <a href="index.php">Home</a> / 
                <a href="usuarios.php">Usuários</a> / 
                Inserir
            </p>
            <hr>
            <h2>Inserir Usuário</h2>
            <form action="" method="post" id="form-inserir" name="form-inserir">
                <p>
                    <label for="nome">Nome:</label><br>
                    <input type="text" id="nome" name="nome" required>
                </p>
                <p>
                    <label for="email">E-mail:</label><br>
                    <input type="email" id="email" name="email" required>
                </p>
                <p>
                    <label for="senha">Senha:</label><br>
                    <input type="password" id="senha" name="senha" required>
                </p>
                <p>
                   <label for="tipo">Tipo:</label>
                   <select name="tipo" id="tipo" required>
                    <option value=""></option>
                    <option value="editor">Editor</option>
                    <option value="admin">Administrador</option>
                   </select>
                </p>
                <button id="inserir" name="inserir">Inserir usuário</button>
            </form>
           
        </section>

<?php  
require "../inc/rodape-admin.php"; 
?>