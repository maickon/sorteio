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
    			?>
    		</p>
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
				<!-- Declaração do formulário -->  
				<form method="post" target="pagseguro" action="https://pagseguro.uol.com.br/v2/checkout/payment.html">  
					<!-- Campos obrigatórios -->  
					<input name="receiverEmail" type="hidden" value="maickon4developers@gmail.com">  
					<input name="currency" type="hidden" value="BRL">  

					<!-- Itens do pagamento (ao menos um item é obrigatório) -->  
					<input name="itemId1" type="hidden" value="0001">  
					<input name="itemDescription1" type="hidden" value="Sorteio de R$ 100,00">  
					<input name="itemAmount1" type="hidden" value="10.00">  
					<input name="itemQuantity1" type="hidden" value="1">  
					<input name="itemWeight1" type="hidden" value="1000"> 

					<!-- Código de referência do pagamento no seu sistema (opcional) -->  
					<input name="reference" type="hidden" value="REF1234">  


					<!-- Dados do comprador (opcionais) --> 
					<span>Nome</span>
					<input name="senderName" class="form-control" type="text" required value="">  
					<input name="senderAreaCode" class="form-control" type="hidden" value="11">  
					<span>Telefone</span>
					<input name="senderPhone" class="form-control" type="tel" value="">
					<span>E-mail</span>  
					<input name="senderEmail" class="form-control" type="email" required value="">  
					
					<div class="modal-footer">
						<!-- submit do form (obrigatório) -->  
						<input alt="Pague com PagSeguro" name="submit" type="submit" class="btn btn-primary" id="bt-participar" />  
					</div>
				</form>

				<?php
					echo $_POST['submit'] = 'as';
					if(isset($_POST['submit'])):
						echo 'pagseguro!';
					else:
						echo $_POST['senderEmail'];
					endif;
				?> 
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