<?php require_once 'header.php'; ?>
<?php require_once 'class/arquivos.class.php'; ?>
<?php  $arquivo = new Arquivo(); ?>
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
</head>
<body>
<div class="bs-example">
    <ul class="nav nav-tabs" id="myTab">
        <li class="active"><a href="#sectionA">Como participar</a></li>
        <li><a href="#sectionB">Sorteio Livre</a></li>
        <li class="dropdown">
            <a data-toggle="dropdown" class="dropdown-toggle" href="#">Tipos de Sorteio <b class="caret"></b></a>
            <ul class="dropdown-menu">
                <li><a href="#dropdown1">Sorteio de R$ 100,00</a></li>
                <li><a href="#dropdown2">Sorteio de R$ 1000,00</a></li>
            </ul>
        </li>
    </ul>
    <div class="tab-content">
        <div id="sectionA" class="tab-pane fade in active">
            <?php require_once 'como_participar.php'; ?>
        </div>
        <div id="sectionB" class="tab-pane fade">
           <?php require_once 'sorteio.php'; ?>
        </div>
        <div id="dropdown1" class="tab-pane fade">
            <p>
                <?php 
                    $arquivo->open_file('txt/sorteio_100.txt','r');
                    $arquivo->read_file();  
                ?>
            </p>
             <form method="post" action="?p=cadastro">
                <input name="itemDescription1" type="hidden" value="Sorteio de R$ 100,00">  
                <input name="itemAmount1" type="hidden" value="5.00">
                <input alt="Pague com PagSeguro" name="submit" type="submit" class="btn btn-primary" id="bt-participar" value="Participar" />
            </form>
        </div>
        <div id="dropdown2" class="tab-pane fade">
            <p><?php 
                    $arquivo->open_file('txt/sorteio_1000.txt','r');
                    $arquivo->read_file();  
                ?>
            </p>
            <form method="post" action="?p=cadastro">
                <input name="itemDescription1" type="hidden" value="Sorteio de R$ 1000,00">  
                <input name="itemAmount1" type="hidden" value="10.00">
                <input alt="Pague com PagSeguro" name="submit" type="submit" class="btn btn-primary" id="bt-participar" value="Participar" />
            </form>
        </div>        
    </div>
</div>