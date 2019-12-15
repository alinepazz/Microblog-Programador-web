<?php 
require "../inc/logica-usuarios.php"; 
require "../inc/cabecalho-admin.php";

if($_SESSION['tipo'] != 'admin') {
    header("location:nao-autorizado.php");
    exit;
}
$usuarios = lerUsuarios($conexao);

?>
       
        <section class="conteudo">
            <p class="breadcrumb"><a href="index.php">Home</a> / Usuários</p>
            <hr>
            
            <h2>Usuários</h2>
            <p>Administração de usuários.</p>
            <hr>
            <p><a href="usuario-insere.php" class="inserir">Inserir novo usuário</a></p>
            
            <table>
                <thead>
                    <tr>
                        <th>Nome</th>
                        <th>E-mail</th>
                        <th>Tipo</th>
                        <th colspan="2">Operações</th>
                    </tr>
                </thead>

                <tbody>
<?php foreach($usuarios as $usuario){ ?>

                    <tr>
                        <td><?=$usuario['nome']?></td>
                        <td><?=$usuario['email']?></td>
                        <td><?=$usuario['tipo']?></td>
                        <td>
                            <a class="atualizar" 
                            href="usuario-atualiza.php?id=<?=$usuario['id']?>">
                                Atualizar
                            </a>
                        </td>
                        <td>
                            <a class="excluir" 
                            href="usuario-exclui.php?id=<?=$usuario['id']?>">
                                Excluir
                            </a>
                        </td>
                    </tr>
  <?php
}
    require "../inc/desconecta.php";
  
  ?> 
                </tbody>                
            </table>
        </section>

<?php require "../inc/rodape-admin.php"; ?> 