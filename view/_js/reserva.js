$(document).ready(function(){
	// trava o uso acidental do enter para envio do form
	travarteclaEnter();
	aplicarMascara();
});	

function verificarCampos_1(){
	if($('#data_inicial').val() == ''){
		return;
	}
	if($('#data_final').val() == ''){
		return;
	}
	if($('#quartoId').val() == ''){
		return;
	}
	
	var parametros = '';
	parametros += '&itemReservaDataInicial=' + $('#data_inicial').val();
	parametros += '&itemReservaDataFinal=' + $('#data_final').val();
	parametros += '&quartoId=' + $('#quartoId').val();
	$.ajax({
		// definimos a url
		url : 'reservaController.php',
		// definimos o tipo de requisi��o, post ou get
		type : 'post',
		// definimos o tipo de retorno, xml, html, json, sjonp, script e text
		dataType : 'text',
		// colocamos os valores a serem enviados
		data : "acao=verificaReserva" + parametros,
		// beforeSend : function(){},
		// ao completar a requisi��o tira o sinal de carregando
		// complete : function(){},
		// aqui colocamos o callback na div #retorno

		// veja se teve erros
		error : function(jqXHR, exception) {
			if (jqXHR.status === 0) {
				alert('Not connect.\n Verify Network.');
			} else if (jqXHR.status == 404) {
				alert('Requested page not found. [404]');
			} else if (jqXHR.status == 500) {
				alert('Internal Server Error [500].');
			} else if (exception === 'parsererror') {
				alert('Requested JSON parse failed.');
			} else if (exception === 'timeout') {
				alert('Time out error.');
			} else if (exception === 'abort') {
				alert('Ajax request aborted.');
			} else {
				alert('Uncaught Error.\n' + jqXHR.responseText);
			}
		},
		// colocamos o retorno na tela
		success : function(resposta) {
			alert(resposta);
			if(resposta == 'sucesso'){
				alert('Quarto indispon�vel nesta data.');
			} else {
				alert('Reserva efetuada.');
			}
			
		}
	});
	return false;

}