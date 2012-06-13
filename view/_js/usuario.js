$(document).ready(function(){
	// trava o uso acidental do enter para envio do form
	travarteclaEnter();
	preencheCamposCep(cepComplementoArray, cepArray, cepTipo);
	preencheCamposTelefone(telefoneArray);	
	
	if(telefoneArray == null){
		mostrarCampoLogin();
	}
	
});	
/**
 * muda a mascara conforme o tipo que o usuario selecionou
 * @param documento tipo
 */
function mudaMascara(tipo){
	// apaga o valor que tiver no campo
	$('#usuarioDocumento').val('');
	$('#documentoNumero').show();
	$('#usuarioDocumento').focus();
	
	//verifica qual a mascara ira aparecer quando ele mudar o select no campo do cadastro de usuario
	// coloca a mascara e depois ja faz a validacaos
	if(tipo == 'cpf'){
		$("#usuarioDocumento").mask("999.999.999-99",{
			completed: function(){
				if (!validarDocumento(this.val(), 'cpf')){
					alert('Número do documento inválido.');
					this.focus();
				}
			}
		});
	} else if (tipo == 'cnpj'){
		$('#usuarioDocumento').mask('99.999.999/9999-99',{
			complete: function(){
				validarDocumento('cnpj', this.val());
			}
		});
	} else {
		$('#usuarioDocumento').unmask();
	} 
}

