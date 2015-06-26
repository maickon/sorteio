<?php require_once 'class/arquivos.class.php'; ?>
<?php require_once 'functions/arquivos.class.php'; ?>
<script type="text/javascript">
$(document).ready(function(){ 
    $("#myTab a").click(function(e){
    	e.preventDefault();
    	$(this).tab('show');
    });
});
</script>
<style type="text/css">
	.bs-example{
		margin: 20px;
	}
</style>
<?php
$arquivo1 = new Arquivo(); 
$arquivo1->open_file('txt/participantes_100.txt','r'); 
$file100  = $arquivo1->read_file(true);
$lista100 = explode("\n", $file100);

$arquivo2 = new Arquivo(); 
$arquivo2->open_file('txt/participantes_1000.txt','r'); 
$file1000  = $arquivo2->read_file(true);
$lista1000 = explode('\n', $file1000);
$lista_dividida1000 = explode(' ', $lista1000);
$nomes1000 = $lista1000[0].'_'.$lista1000[2].' Cadastrado dia '.$lista100[4].' às '.$lista100[5];
?>
<div class="bs-example">
	<p>
		Aqui você pode visualizar a lista de participantes cadastrados. 
		Vale lembrar que estar cadastrado não significa que você esteja participando do sorteio,
		pois você precisa pagar a taxa do sorteio em que você esteja participando.
	</p>

	<p>
		Mesmo assim da para se ter uma ideia sobre a quantidade de pessoas envolvidas com este 
		sorteio. Abaixo segue a lista dos sorteios que estão em aberto.
	</p>
	<p>
		A lista é acompanha do nome do participante mais o seu endereço de email saparado 
		por um "_" (underline).
	</p>

    <ul class="nav nav-tabs" id="myTab">
        <li class="active"><a href="#sectionA">Lista - Sorteio R$ 100,00</a></li>
        <li><a href="#sectionB">Lista - Sorteio R$ 1000,00</a></li>
    </ul>

    <div class="jumbotron">
	    <div class="tab-content">
	        <div id="sectionA" class="tab-pane fade in active">
	            <div class="row">
	            	<br />
					<p>
	    				Lista geral de pessoas que fizeram cadastro para o sorteio de R$ 100,00. 
	    			</p>
					<textarea readonly class="form-control" id="nomes" rows="15" placeholder="Lista de Inscritos."><?php listar_participantes($lista100); ?></textarea>
				</div>
	        </div>

	        <div id="sectionB" class="tab-pane fade">
	           <div class="row">
	           		<br />
					<p>
	    				Lista geral de pessoas que fizeram cadastro para o sorteio de R$ 1000,00. 
	    			</p>
					<textarea readonly class="form-control" id="nomes" rows="15" placeholder="Lista de Inscritos."><?php echo $nomes1000; ?></textarea>
				</div>
	        </div>
	    </div>
	</div>
</div>