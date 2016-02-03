<?php

if (isset($_POST['mensagem'])) {

$nome = $_POST['nome'];
$email = $_POST['email'];
$mensagem = $_POST['mensagem'];
$leaveblank = $_POST['leaveblank'];
$dontchange = $_POST['dontchange'];

$body = '<div style="max-width: 400px;">' . $mensagem . '</div> <br/>------------ <br/>Nome: ' . $nome . '<br/>' . $email;

$to = get_option( 'admin_email' ); // Mudar aqui o e-mail;
$subject = 'Formulário - ' . $nome;
$headers = 'Reply-To: <' . $nome . '> ' . $email;

	if (($leaveblank != '') or ($dontchange != 'http://')) {
	$formularioMensagem = '<p>Erro no envio. Tente novamente ou mande para ' . $to . '</p>';
	} else {
		$formularioMensagem = '<p>Enviado com sucesso.</p>';
		wp_mail( $to, $subject, $body, $headers );
	}
}

?>

<form action="<?php the_permalink(); ?>" method="post" name="form" class="contato__orcamento__form">
	<label for="nome">Nome</label>
	<input id="nome" name="nome" type="text" required>
	<label for="email">E-mail</label>
	<input id="email" name="email" type="text">
	<label for="telefone">Telefone</label>
	<input id="telefone" name="telefone" type="text">

	<label class="nao-aparece">Se você não é um robô, deixe em branco.</label>
	<input type="text" class="nao-aparece" name="leaveblank"><br>
	<label class="nao-aparece">Se você não é um robô, não mude este campo.</label>
	<input type="text" class="nao-aparece" name="dontchange" value="http://" >

	<label for="mensagem">Mensagem</label>
	<textarea name="mensagem" id="mensagem" required></textarea>

	<button id="enviar" class="button-enviar" name="enviar" type="submit">Enviar</button>
</form>
