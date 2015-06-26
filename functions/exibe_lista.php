<?php
function listar_participantes($participantes){
	foreach($participantes as $item):
		$lista_dividida100 = explode(' ', $item);
		echo $lista_dividida100[0].'_'.$lista_dividida100[2].' Cadastrado dia '.$lista_dividida100[4].' às '.$lista_dividida100[5];
	endforeach;
}
?>