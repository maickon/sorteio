<?php
if($_POST):
	$senderName 	= $_POST['senderName'];
	$senderPhone 	= $_POST['senderPhone'];
	$senderEmail 	= $_POST['senderEmail'];
	$senderFacebook = $_POST['senderFacebook'];
	$itemDescription1 = $_POST['itemDescription1'];
	$itemAmount1 	= $_POST['itemAmount1'];
endif;

if(isset($senderName) and isset($senderPhone) and isset($senderEmail) and isset($senderFacebook)):
	require_once 'class/arquivos.class.php'; 
	$arquivo_3 = new Arquivo();
	if($itemAmount1 == 5.00):
		$arquivo_3->open_file('txt/participantes_100.txt','a');
	elseif($itemAmount1 == 10.00):
		$arquivo_3->open_file('txt/participantes_1000.txt','a');
	endif;
	
	$participante = $_POST['senderName'].' '.$_POST['senderPhone'].' '.$_POST['senderEmail'] .' '.$_POST['senderFacebook'].' '.date("d/m/Y H:i:s")."\n";
	$arquivo_3->write_file($participante);
	if($arquivo_3->conteudo != FALSE):
		echo '<div class="alert alert-success" role="alert">Dados salvos! Pressione o botão Confirmar Cadastro.</div>';
	else:
		echo '<div class="alert alert-danger" role="alert">Seus dados não foram salvos. Não prossiga o processo. Informe este erro pelo contato por favor.</div>';
	endif;
endif;
?> 

<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
       			<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        		<h4 class="modal-title" id="exampleModalLabel">Confirme os dados cadastrais.</h4>
      		</div>

      		<div class="modal-body">
      			<!-- https://pagseguro.uol.com.br/v2/checkout/payment.html 	-->
				<form method="post" target="pagseguro" action="https://pagseguro.uol.com.br/v2/checkout/payment.html">  
					<!-- Dados do comprador (opcionais) --> 
					<span>Nome</span>
					<input name="senderName" id="input_name" class="form-control" type="text" required value="<?php echo $senderName; ?>">  
					<input name="senderAreaCode" class="form-control" type="hidden" value="11">  
					<span>Telefone</span>
					<input name="senderPhone" id="input_phone" class="form-control" type="tel" value="<?php echo $senderPhone; ?>">
					<span>E-mail</span>  
					<input name="senderEmail" id="input_mail" class="form-control" type="email" required value="<?php echo $senderEmail; ?>">
					<span>Facebook</span>  
					<input name="senderFacebook" id="input_facebook" class="form-control" type="text" required value="<?php echo $senderFacebook; ?>">  

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


