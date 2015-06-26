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
      			<!-- https://pagseguro.uol.com.br/v2/checkout/payment.html 	-->
				<form method="post" target="pagseguro" action="?p=contratacao">  
					<!-- Dados do comprador (opcionais) --> 
					<script type="text/javaScript">
						function noSpace(v){
							v = v.replace(/[\s\t\n]/g, "");
							return v;
						}
					</script>
					<span>Nome (sem espaços)</span>
					<input name="senderName" id="input_name" onkeyup="this.value = noSpace( this.value )" class="form-control" type="text" required value="">  
					<input name="senderAreaCode" class="form-control" type="hidden" value="11">  
					<span>Telefone</span>
					<input name="senderPhone" id="input_phone" class="form-control" type="tel" value="">
					<span>E-mail</span>  
					<input name="senderEmail" id="input_mail" class="form-control" type="email" required value="">
					<span>Facebook</span>  
					<input name="senderFacebook" id="input_facebook" class="form-control" type="text" required value="">  

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
					<br />
					<div class="alert alert-warning" role="alert">Após clicar no botão Pagar uma nova aba abrirá no seu navegador. Acesse-a por favor.</div>
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