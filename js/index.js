
function sorteio_numeral(){
	var c 			= document.getElementById('campo');
	var inicio 		= document.getElementById('inicio').value;
	var fim 		= document.getElementById('fim').value;

	if(inicio == '' || inicio == 'undefined' || inicio == null || isNaN(inicio)){
		alert("Preencha algum valor válido no campo de número inicial.");
		return;
	}

	if(fim == ' ' || fim == 'undefined' || fim == null || isNaN(fim)){
		alert("Preencha algum valor válido no campo de número final.");
		return;
	}
	
	var velocidade 	= 50;
	var tempo 		= 2000;

	var intervalo = window.setInterval(function() {
				c.value = Math.floor((Math.random() * fim) + inicio);
			}, velocidade);
	window.setTimeout(function() {
				clearInterval(intervalo);
				c.value = Math.floor((Math.random() * fim) + inicio);
			}, tempo);

	document.getElementById("bt-salvar").type = "button";
}

function sorteio_palavras(){
	var c = document.getElementById('campo');
	var nomes = document.getElementById('nomes').value;
	if(nomes == '' || nomes == 'undefined' || nomes == null){
		alert("Preencha uma lista de nomes por favor.");
		return;
	}
	var nomes_separados = nomes.split(String("\n"));
	var i = 0;
	var velocidade 	= 50;
	var tempo 		= 2000;
	var intervalo = window.setInterval(function() {
				if (i >= nomes_separados.length)
					i = 0;
				c.value = nomes_separados[i++];
			}, velocidade);
	window.setTimeout(function() {
				clearInterval(intervalo);
				var n = Math.floor(Math.random()*nomes_separados.length);
				c.value = nomes_separados[n];
			}, tempo);

	document.getElementById("bt-salvar").type = "button";
}

var myVar = setInterval(function(){ myTimer() }, 1000);
var myDate = setInterval(function(){ data_atual() }, 1000);

function myTimer(){
	var dias = ["Domingo","Segunda-feira","Terça-feira","Quarta-feira","Quinta-feira","Sexta-feira"];
	var d = new Date();
	var t = d.toLocaleTimeString();
	var dia_semana 	= d.getDay();
	document.getElementById("hora").innerHTML = "Horário Local: " + t + " - " + dias[dia_semana];
}

function data_atual(){
	var meses = ["Janeiro","Fevereiro","Março","Abril","Maio","Junho","Julho","Agosto","Setembro","Outubro","Novembro","Dezembro"];
	var d 			= new Date();
	var dia 		= d.getDate();
	var mes 		= d.getMonth();
	var ano 		= d.getFullYear();
	document.getElementById("data").innerHTML = "Hoje é " + dia + " de " + meses[mes] + " de " + ano;
}

function rolar(name){
	var c 			= document.getElementById('campo');
	var velocidade 	= 50;
	var tempo 		= 2000;

	var maximo = null;
	var minimo = 1;

	switch(name){
		case 'd4': maximo = 4;
		break; 

		case 'd6': maximo = 6;
		break; 

		case 'd8': maximo = 8;
		break; 

		case 'd10': maximo = 10;
		break; 

		case 'd12': maximo = 12;
		break; 

		case 'd20': maximo = 20;
		break; 
	}

	var intervalo = window.setInterval(function() {
				c.value = Math.floor((Math.random() * maximo) + minimo);
			}, velocidade);
	window.setTimeout(function() {
				clearInterval(intervalo);
				c.value = Math.floor((Math.random() * maximo) + minimo);
				if(c.value == maximo){
					document.getElementById("campo").className = "roll_critico";
					var msg = [
					"Boa!", "Regaçou!", "Mandou bem!", "Que sorte!", "Top", "Sou foda!",
					"Sou sinistro!", "Caralhooo!", "Chupaaa porra!", "Isso!", "Máximo"
						];
					var indice = Math.floor(Math.random()*msg.length);
					document.getElementById("campo").value += " - "+msg[indice];
				}else if(c.value == minimo){
					document.getElementById("campo").className = "roll_falha";
					var msg = [
					"Merda!", "Se fudeu!", "Que Azar!", "PqP!", "Que lixo", "Sacanagem!",
					"Ta foda hj!", "Droga!", "Assim não dá!", "Dados malditos!", "Porra!",
						];
					var indice = Math.floor(Math.random()*msg.length);
					document.getElementById("campo").value += " - "+msg[indice];
				}
			}, tempo);
	document.getElementById("dado_rolado").innerHTML = "Você rolou o "+name;
	document.getElementById("campo").className = "null";
}

function bt_prosseguir(){
	if(document.getElementById("checkbox").checked == false){
		alert('Você precisa concordar com os termos do sorteio para prosseguir.');
		document.getElementById("exampleModal").id = "esconder";
		return 0;
	}else{
		document.getElementById("esconder").id = "exampleModal";
	}
}