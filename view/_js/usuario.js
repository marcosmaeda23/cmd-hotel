$(document).ready(function(){
	// busca o campo paisOrigem no formulario do cliente para setar a mascara, default brasil
	var pais = $('#paisOrigem').val();
	preencheCamposTelefone(telefoneArray);	
	//mostrarTelefone();
	//mostrarCep();
	aplicarMascara(pais);
});	
/**
 * muda a mascara conforme o tipo que o usuario selecionou
 * @param documento tipo
 */
function mudaMascara(tipo){
	// apaga o valor que tiver no campo
	$('#usuarioDocumento').val('');
	//verifica qual a mascara ira aparecer quando ele mudar o select no campo do cadastro de usuario
	// coloca a mascara e depois ja faz a validacaos
	if(tipo == 'cpf'){
		$("#usuarioDocumento").mask("999.999.99-99",{
			completed: function(){
				validarDocumento('cpj', this.val());
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

