$(".btn-cadastrar").on('click', function() {
	limparError()
	$.post(base_url+'dashbord/cadastro/cadastrar', {
		nome: $('#nome').val(),
		email: $('#email').val(),
		senha: $('#senha').val(),
		senhaConfirma: $('#senhaRepetida').val()
	}, function(data) {
		if(data.tipo == 'alert') {
			errorFormulario(data);
		} else {
			alert(data.mensagem);
			$(location).attr('href', base_url);
		}
	}, 'JSON');
});

$("body").on('click', '.btn-login', function(e) {
	e.preventDefault();

	limparError()
	$.post(base_url+'dashbord/autenticacao/login', {
		email: $('#email').val(),
		senha: $('#senha').val(),
	}, function(data) {
		if(data.tipo == 'alert') {
			errorFormulario(data);
		} else {
			$(location).attr('href', data.url);
		}
	}, 'JSON');
});

$("body").on('click', '.btn-registrarPonto', function(e) {
	e.preventDefault();

	$.post(base_url+'dashbord/ponto/registrarPonto', {}, function(data) {
		if(data.tipo == 'alert') {
			alert(data.mensagem);
		} else {
			alert(data.mensagem);
			location.reload();
		}
	}, 'JSON');
});

$("body").on('click', '.btn-buscar', function(e) {
	e.preventDefault();
	$.post(base_url+'dashbord/ponto/buscarPontoPorData', {
		dataInicial: $('#dataInicial').val(),
		dataFinal: $('#dataFinal').val(),
	}, function(data) {
		$(".historicoPonto").html(data.html);
	}, 'JSON');
});

$(".historicoPonto").on('click', '.btn-detalharPonto', function(e) {
	e.preventDefault();
	$.post(base_url+'dashbord/ponto/detalharPonto', {
		data: $(this).attr('data-historico'),
	}, function(data) {
		$("#tituloModal").html(data.tituloModal);
		$(".detalharPonto").html(data.html);
		$('#modal-historico').modal();
	}, 'JSON');
});



function errorFormulario(error) {
	$('#error-nome').html(error.campos.nome);
	$('#error-mensagem').html(error.campos.mensagem);
	$('#error-email').html(error.campos.email);
	$('#error-senha').html(error.campos.senha);
    $('#error-senhaRepetida').html(error.campos.senhaConfirma);
}

function limparError() {
	$('#error-nome').html('');
	$('#error-email').html('');
	$('#error-mensagem').html('');
	$('#error-senha').html('');
    $('#error-senhaRepetida').html('');
}