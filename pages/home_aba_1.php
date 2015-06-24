<?php require_once 'class/arquivos.class.php'; ?>
<?php 
$arquivo = new Arquivo(); 
$arquivo->open_file('txt/termos.txt','r');
?>
<div class="jumbotron">
	<h1>Sorteio</h1>
	<div class="row">
    	<div class="col-lg-12">
    		<p>
    			<?php 
    				$arquivo_2 = new Arquivo();
    				$arquivo_2->open_file('txt/sorteio.txt','r');
    				$arquivo_2->read_file();
    				$itemDescription1 = null; 
    				$itemAmount1 = null;
    			?>
    		</p>
    		<?php 
						
				if(isset($_POST['itemDescription1']) and isset($_POST['itemAmount1'])):
					isset($_POST['itemDescription1']) ? $itemDescription1 = $_POST['itemDescription1'] : $itemDescription1 = "Sorteio de R$ 100,00";
					isset($_POST['itemAmount1']) ? $itemAmount1 = $_POST['itemAmount1'] : $itemAmount1 = 5.00;
				endif;
			?> 
    		<textarea class="form-control" rows="20" readonly><?php $arquivo->read_file(); ?></textarea>
			<div class="row">
				<input type="checkbox" id="checkbox"> Concordo com os termos.
				<br>
				<input type="button" class="btn btn-lg" id="bt-prosseguir" role="button" onclick="bt_prosseguir();" value="Prosseguir" name="btn" data-toggle="modal" data-target="#exampleModal" data-whatever="@mdo" />
			</div>

			<?php
			if($_POST['cadastro']):
				$arquivo_3 = new Arquivo();
				$arquivo_3->open_file('txt/participantes.txt','a');
				$participante = $_POST['senderName'].' '.$_POST['senderPhone'].' '.$_POST['senderEmail'] .' '.$_POST['senderFacebook'];
				if($arquivo_3->write_file($participante)):
					echo '<div class="alert alert-success" role="alert">Dados salvos! Pressione o botão pagar para que seja direcionado so site do page seguro.</div>';
				else:
					echo '<div class="alert alert-danger" role="alert">Seus dados não foram salvos. Não prossiga o processo. Informe este erro pelo contato por favor.</div>';
				endif;
			endif;
			?>
		</div>
	</div>
</div>

<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
       			<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        		<h4 class="modal-title" id="exampleModalLabel">Preencha seus dados por favor.</h4>
      		</div>

      		<div class="modal-body">

				<form method="post">
					<!-- Dados do comprador (opcionais) --> 
					<span>Nome</span>
					<input name="senderName" id="input_name" class="form-control" type="text" required value="">  
					<input name="senderAreaCode" class="form-control" type="hidden" value="11">  
					<span>Telefone</span>
					<input name="senderPhone" id="input_phone" class="form-control" type="tel" value="">
					<span>E-mail</span>  
					<input name="senderEmail" id="input_mail" class="form-control" type="email" required value="">
					<span>Facebook</span>  
					<input name="senderFacebook" id="input_facebook" class="form-control" type="text" required value="">  
					
					<div class="modal-footer">
						<!-- submit do form (obrigatório) -->  
						<input alt="Pague com PagSeguro" name="cadastro" value="Cadastrar-se" type="submit" class="btn btn-primary" id="bt-participar" />  
					</div>
				</form>

								<!-- Declaração do formulário -->  
				<form method="post" target="pagseguro" action="https://pagseguro.uol.com.br/v2/checkout/payment.html">  
					<!-- Campos obrigatórios -->  
					<input name="receiverEmail" type="hidden" value="maickon4developers@gmail.com">  
					<input name="currency" type="hidden" value="BRL">  

					<!-- Itens do pagamento (ao menos um item é obrigatório) -->  
					<input name="itemId1" type="hidden" value="0001"> 
					<input name="itemDescription1" type="hidden" value="<?php echo $itemDescription1; ?>">  
					<input name="itemAmount1" type="hidden" value="<?php echo $itemAmount1; ?>">  
					<input name="itemQuantity1" type="hidden" value="1">  
					<input name="itemWeight1" type="hidden" value="1000"> 

					<!-- Código de referência do pagamento no seu sistema (opcional) -->  
					<input name="reference" type="hidden" value="REF1234">  
					
					<div class="modal-footer">
						<!-- submit do form (obrigatório) -->  
						<input alt="Pague com PagSeguro" name="submit" value="Pagar" type="submit" class="btn btn-primary" id="bt-participar" />  
					</div>
				</form>
			</div> 
		</div>
	</div>
</div>
<script type="text/javascript">

	$('#exampleModal').on('show.bs.modal', function (event) {
	  var button = $(event.relatedTarget) // Button that triggered the modal
	  var recipient = button.data('whatever') // Extract info from data-* attributes
	  // If necessary, you could initiate an AJAX request here (and then do the updating in a callback).
	  // Update the modal's content. We'll use jQuery here, but you could use a data binding library or other methods instead.
	  var modal = $(this)
	  modal.find('.modal-title').text('New message to ' + recipient)
	  modal.find('.modal-body input').val(recipient)
	})

</script>	