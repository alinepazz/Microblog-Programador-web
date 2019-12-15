<?php require "../inc/cabecalho-admin.php"; ?> 
       
        <section class="conteudo">
            <p class="breadcrumb">Home</p>
            <hr>
            <h2>Olá <?=$_SESSION['nome']?>, seu nível de acesso é do tipo: <?=$_SESSION['tipo']?> </h2>
            <p>Você está no <b>painel de controle e administração</b> do
            site Microblog.</p>
            <hr>
            <p>Escolha o que deseja gerenciar:</p>

            <ul>
                <li><a href="meu-perfil.php">Meu perfil</a></li>
                <li><a href="posts.php">Posts</a></li>

<?php if($_SESSION['tipo'] == 'admin') { ?>
                <li><a href="usuarios.php">Usuários</a></li>
<?php } ?>              
            </ul>
        </section>


<?php require "../inc/rodape-admin.php"; ?> 