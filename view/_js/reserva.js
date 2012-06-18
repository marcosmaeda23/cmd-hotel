$(document).ready(function(){
	// trava o uso acidental do enter para envio do form
	travarteclaEnter();
	aplicarMascara();
});	

function verificarCampos(_form){
	alert('dsf');
	sucesso = verificarCampos(_form);
	if(!sucesso) {
		return false;
	} else {
		var parametros = '';
		parametros += '&dataInicial=' + $('#data_inicial').val();
		parametros += '&dataFinal=' + $('#data_final').val();
		parametros += '&tipoQuarto=' + $('#quartoId').val();
		$.ajax({
			// definimos a url
			url : 'rervaController.php',
			// definimos o tipo de requisiï¿½ï¿½o, post ou get
			type : 'post',
			// definimos o tipo de retorno, xml, html, json, sjonp, script e text
			dataType : 'text',
			// colocamos os valores a serem enviados
			data : "acao=verificaReserva" + parametros,
			// beforeSend : function(){},
			// ao completar a requisição tira o sinal de carregando
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
				if(resposta == 'sucesso'){
					alert('Reserva efetuada.');
				} else {
					alert('Quarto indisponível nesta data.');
				}
				
			}
		});
	}
}