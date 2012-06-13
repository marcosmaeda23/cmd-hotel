$(document).ready(function(){
	// trava o uso acidental do enter para envio do form
	travarteclaEnter();
	
	//preencheCamposCep(cepComplementoArray, cepArray, cepTipo);
	//preencheCamposTelefone(telefoneArray);	
	

	preencheCamposCep(cepComplementoArray, cepArray, cepTipo);
	preencheCamposTelefone(telefoneArray);	

	
	
});	
