<form action="<?php echo get_template_directory_uri(); ?>/enviar.php" method="post" name="form" class="contato__orcamento__form">
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