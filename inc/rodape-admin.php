    </main>
</div>
    
<footer id="rodape">
    <h2>Site Dinâmico</h2>
    <p>Microblog é um site dinâmico fictício desenvolvido educacionalmente
	<br>Senac Penha - 2019 - Direitos Reservados</p>
</footer>

<script>
    //
var linkExcluir = document.querySelectorAll(".excluir");
var quantidade = linkExcluir.length
for( var i = 0; i < quantidade; i++ ){
    linkExcluir[i].onclick = function(event){
        event.preventDefault();
        var enderecoDoLink = this.href;
        var resposta = confirm("Tem certeza que deseja excluir?");

        if( resposta ) {
            location.href = enderecoDoLink;
        } else {
            return false;
        }
    }
}

</script>


</body>
</html>