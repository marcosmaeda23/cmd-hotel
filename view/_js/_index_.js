$(document).ready(function(){
	$('.aparecerOnline').hide();
	
});	

function  verificarCampos(_form){
	var erro = false;
	$('#'+_form).find('.obrigatorio').each(function(){	
		
		if($(this).val() == ''){
			erro = true;	
			$(this).addClass('obrigatorio_forte');
		}  else {
			$(this).removeClass('obrigatorio_forte');
			erro = false;
			
		}
	});
	if(erro){
		alert('preencha os campos em amarelo');
		return false;
	}
	return true;
}

function offLine(){
	alert("Nenhum dos seus contatos poderão te ver");
	$('#online').addClass('offLine');
	$(".aparecerOffline").hide();
	$(".aparecerOnline").show();
}
function onLine(){
	alert("Todos os seus contatos poderão te ver");
	$('#online').removeClass('offLine');
	$(".aparecerOnline").hide();
	$(".aparecerOffline").show();
}
function  apagarFoto(foto_tipo){
	$.ajax({
		//definimos a url
		url : 'galeriaController.php',
		//definimos o tipo de requisi��o, post ou get
		type: 'post',
		//definimos o tipo de retorno, xml, html, json, sjonp, script e text
		dataType : 'text',
		//colocamos os valores a serem enviados
		data: "acao=excluir&foto_tipo="+foto_tipo,
		//beforeSend : function(){},
		//ao completar a requisi��o tira o sinal de carregando
		//complete : function(){},
		//aqui colocamos o callback na div #retorno
		
		//veja se teve erros
		error: function(jqXHR, exception) {
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
		//colocamos o retorno na tela
		success : function(resposta){
			if(resposta == 'sucesso'){
				alert('Foto excluida com sucesso.');
				location.href="index.php";
			} else {
				alert('Ocorreu um erro ao excluir foto');
			}
		    	
		    	
		}
	 });
}
function sair(){
	 $.ajax({
		//definimos a url
		url : 'galeriaController.php',
		//definimos o tipo de requisi��o, post ou get
		type: 'post',
		//definimos o tipo de retorno, xml, html, json, sjonp, script e text
		dataType : 'text',
		//colocamos os valores a serem enviados
		data: "acao=sair",
		//beforeSend : function(){},
		//ao completar a requisi��o tira o sinal de carregando
		//complete : function(){},
		//aqui colocamos o callback na div #retorno
		
		//veja se teve erros
		error: function(jqXHR, exception) {
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
		//colocamos o retorno na tela
		success : function(resposta){
			if(resposta == 'sucesso'){
				alert('Logout efetuado com sucesso. Volte sempre');
				location.href="../index.php";
			} else {
				alert('Ocorreu um erro ao efetuar o logout');
			}
		    	
		    	
		}
		
	 });
	
}