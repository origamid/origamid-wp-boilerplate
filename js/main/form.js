// Formulario

$('.form').on('submit', function() {
	var emailContato = "contato@gmail.com";

	$('#enviar').after("<div class='loader'></div>");
	var that = $(this),
			url = that.attr('action'),
			type = that.attr('method'),
			data = {};
	
	that.find('[name]').each(function(index, value) {
		var that = $(this),
				name = that.attr('name'),
				value = that.val();
				
		data[name] = value;
	});
	
	$.ajax({
		url: url,
		type: type,
		data: data,
		success: function(response) {
		
			if( $('[name="leaveblank"]').val().length != 0 ) {
				$('.form__wrapper').html("<div id='form__notification--error'></div>");
				$('#form__notification--error').html("<span>Falha no envio!</span><p>Você pode tentar novamente, ou enviar direto para o e-mail " + emailContato + " </p>")
				.hide()
				.fadeIn(1500, function() {
				$('#form__notification--error');
				});
			} else {
			
				$('.form__wrapper').html("<div id='form__notification'></div>");
				$('#form__notification').html("<span>Mensagem enviada!</span><p>Em breve entraremos em contato com você.</p>")
				.hide()
				.fadeIn(1500, function() {
				$('#form__notification');
				});
			};
		},
		error: function(response) {
			$('.form__wrapper').html("<div id='form__notification--error'></div>");
			$('#form__notification--error').html("<span>Falha no envio!</span><p>Você pode tentar novamente, ou enviar direto para o e-mail " + emailContato + " </p>")
			.hide()
			.fadeIn(1500, function() {
			$('#form__notification--error');  
		});
		}
	});
	
	return false;
});

// Notificação de Preenchimento

$(document).ready(function() {
	var elements = document.getElementsByTagName("INPUT");
		for (var i = 0; i < elements.length; i++) {
			elements[i].oninvalid = function(e) {
				e.target.setCustomValidity("");
				if (!e.target.validity.valid) {
					e.target.setCustomValidity("Por favor, preencha este campo.");
				}
			};
			elements[i].oninput = function(e) {
				e.target.setCustomValidity("");
		};
	}
});

$(document).ready(function() {
	var elements = document.getElementsByTagName("TEXTAREA");
		for (var i = 0; i < elements.length; i++) {
			elements[i].oninvalid = function(e) {
				e.target.setCustomValidity("");
				if (!e.target.validity.valid) {
					e.target.setCustomValidity("Por favor, preencha este campo.");
				}
			};
			elements[i].oninput = function(e) {
				e.target.setCustomValidity("");
		};
	}
});