<?php 
require "inc/logica-usuarios.php";
require "inc/logica-sessao.php";
require "inc/cabecalho.php"; 

/* Mensagens de feedback */
if( isset($_GET['acesso_proibido']) ){
    $feedback = "Você deve logar primeiro!";
} elseif( isset($_GET['logout']) ) {
    $feedback = "Você saiu do sistema!";
} elseif( isset($_GET['nao_encontrado']) ) {
    $feedback = "Usuário não encontrado!";
} elseif( isset($_GET['senha_incorreta']) ) {
    $feedback = "A senha está errada!";          
} elseif( isset($_GET['campos_obrigatorios']) ) {
    $feedback = "Você deve preencher todos os campos!";
} else {
    $feedback = "";
}


if(isset($_POST['entrar'])){
    if( empty($_POST['email']) || empty($_POST['senha']) ){
        header("location:login.php?campos_obrigatorios");
    } else {
        $email = $_POST['email'];
        $senha = $_POST['senha'];

        $usuario = buscaUsuario($conexao, $email);
        /* echo "<pre>";
        var_dump($usuario);
        echo "</pre>";

        echo "Senha formulario/digitada: ".$senha;
        echo "<br>";
        echo "Senha que tá no banco: ".$usuario['senha']; */

        //die();
        // Se usuario não for nulo (ou seja, se ele existe)
        if( $usuario != null ){
            // Verifique as DUAS SENHAS
            // $senha é a que foi digitada
            // $usuario['senha'] é a que tá no banco
            if( password_verify($senha, $usuario['senha']) ){
                // Senha OK, então loga/entra no admin:
                login(
                    $usuario['id'], $usuario['nome'], $usuario['email'], $usuario['tipo']
                );
                header("location:admin/index.php");
            } else {
                header("location:login.php?senha_incorreta");
            }
        } else {
            header("location:login.php?nao_encontrado");
        }
    }
}
?>
        <div class="conteudo">
            <h2>Acesso ao Painel de Controle (Admin)</h2>
        
            <p class="mensagem"> <?=$feedback?> </p>

            <form action="" method="post" id="form-login" name="form-login">
                <p>
                    <label for="email">E-mail:</label><br>
                    <input  required  type="text" id="email" name="email" size="35">
                </p>
                <p>
                    <label for="senha">Senha:</label><br>
                    <input  required type="password" id="senha" name="senha" size="35">
                </p>
                <p>
                    <button name="entrar">Entrar</button>
                </p>
            </form>
       
        </div>

<?php
require "inc/rodape.php"; 
?>