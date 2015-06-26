<div class="jumbotron">
    <h1>Sorteio</h1>
    <input type="text" class="form-control" readonly id="campo" name="campo" /><br />
    <input type="button" class="btn btn-lg btn-success" id="bt-sorteio" role="button" onclick="sorteio_numeral();" value="Sortear número" id="btn" name="btn" />
    <span>Ou</span>
    <input type="button" class="btn btn-lg btn-success" id="bt-sorteio" role="button" onclick="sorteio_palavras();" value="Sortear palavras" id="btn" name="btn" />
    
    <div id="config">
        <h2>Configuração</h2>
        <div class="row">
            <div class="col-lg-12">
                <a href="#">
                    <div class="glyphicon glyphicon-sort-by-alphabet" onclick="sorteio_palavras();">Sortear Nomes</div>
                </a>
                <p id="info">Digite os nomes separado por quebra de linha.</p>
                <textarea class="form-control" id="nomes" rows="10" placeholder="Digite um nome aqui. Se for mais de um, dê ENTER para separa os nomes."></textarea>
            </div>

            <div class="col-lg-12">
                <br />
                <a href="#">
                    <div class="glyphicon glyphicon-sort-by-order" onclick="sorteio_numeral();">Sortear Números</div>
                </a>
                <p id="info">Digite o intervalo de número a ser sorteado.</p>

                <div class="col-xs-6">
                    <input type="text" class="form-control" id="inicio" placeholder="Entre...">
                </div>

                <div class="col-xs-6">
                    <input type="text" class="form-control" id="fim" placeholder="até...">
                </div>
            </div> <!-- //end col-xs-6-->
        </div> <!-- //end row-->

        <br>
        <div class="row">
            <input type="hidden" class="btn btn-primary btn-xs" id="bt-salvar" role="button" onclick="print();" value="Salvar sorteio"name="btn" /> 
        </div>
    </div>  
</div>

<div class="row marketing">
    <?php 
        $info_1 = array(
                'Nomes' => 'Aqui você pode montar uma lista de nomes e submetê las ao sorteio. É bem simples e rápido.',
                'Números' => 'Definindo um intervalo entre os números você poderá sortear os números que deseja aqui no site.',
                'Dados' => 'O site também oferece um simulador de rolagem de dados. São 6 tipos de dados que você poderá simular.',
            );

         $info_2 = array(
                'Dados' => 'No simulador de dados vai aparecer mensagens meio "bizarras kkk" em casos de você tirar o maior número possível ou o menor.',
                'Salvar' => 'Uma vez feito o sorteio os dados poderão ser guardados pelo usuário via pdf ou serem impressos diretamente.',
                'Configuração' => 'A configuração é bem simples, basta você escolher o tipo de sorteio, definir o conjunto e clicar em sortear.',
            );
    ?>
    <div class="col-lg-6">
        <?php foreach($info_1 as $titulo => $info): ?>
            <h4><?php echo $titulo; ?></h4>
            <p><?php echo $info; ?></p>
        <?php endforeach; ?>   
    </div>

     <div class="col-lg-6">
        <?php foreach($info_2 as $titulo => $info): ?>
            <h4><?php echo $titulo; ?></h4>
            <p><?php echo $info; ?></p>
        <?php endforeach; ?>   
    </div>
</div>