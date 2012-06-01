$(document).ready( function() {
	$("#formularioContato").validate({
		// Define as regras
		rules:{
			campoNome:{
				// campoNome ser� obrigat�rio (required) e ter� tamanho m�nimo (minLength)
				required: true, minlength: 2
			},
			campoEmail:{
				// campoEmail ser� obrigat�rio (required) e precisar� ser um e-mail v�lido (email)
				required: true, email: true
			},
			campoMensagem:{
				// campoMensagem ser� obrigat�rio (required) e ter� tamanho m�nimo (minLength)
				required: true, minlength: 2
			}
		},
		// Define as mensagens de erro para cada regra
		messages:{
			campoNome:{
				required: "Digite o seu nome",
				minLength: "O seu nome deve conter, no m�nimo, 2 caracteres"
			},
			campoEmail:{
				required: "Digite o seu e-mail para contato",
				email: "Digite um e-mail v�lido"
			},
			campoMensagem:{
				required: "Digite a sua mensagem",
				minLength: "A sua mensagem deve conter, no m�nimo, 2 caracteres"
			}
		}
	});
});