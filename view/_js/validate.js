$(document).ready( function() {
	$("#formularioContato").validate({
		// Define as regras
		rules:{
			campoNome:{
				// campoNome será obrigatório (required) e terá tamanho mínimo (minLength)
				required: true, minlength: 2
			},
			campoEmail:{
				// campoEmail será obrigatório (required) e precisará ser um e-mail válido (email)
				required: true, email: true
			},
			campoMensagem:{
				// campoMensagem será obrigatório (required) e terá tamanho mínimo (minLength)
				required: true, minlength: 2
			}
		},
		// Define as mensagens de erro para cada regra
		messages:{
			campoNome:{
				required: "Digite o seu nome",
				minLength: "O seu nome deve conter, no mínimo, 2 caracteres"
			},
			campoEmail:{
				required: "Digite o seu e-mail para contato",
				email: "Digite um e-mail válido"
			},
			campoMensagem:{
				required: "Digite a sua mensagem",
				minLength: "A sua mensagem deve conter, no mínimo, 2 caracteres"
			}
		}
	});
});