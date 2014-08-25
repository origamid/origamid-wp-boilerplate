<?php
/*
Template Name: Contato
*/
include('header.php'); // Depois do WP vira get_header()

?>

<section class="form__wrapper">
	<form action="enviar.php" method="post" name="form" class="form">
		<label for="nome">Nome</label>
		<input id="nome" name="nome" type="text" required>
		<label for="email">E-mail</label>
		<input id="email" name="email" type="text">

		<label class="hidden">Se você não é um robô, deixe em branco.</label>
		<input type="text" class="hidden" name="leaveblank"><br>
		<label class="hidden">Se você não é um robô, não mude este campo.</label>
		<input type="text" class="hidden" name="dontchange" value="http://" >

		<label for="mensagem">Mensagem</label>
		<textarea name="mensagem" id="mensagem" required></textarea>

		<button id="enviar" class="btn__enviar" name="enviar" type="submit">Enviar</button>
	</form>
</section>

<?php include('footer.php'); // Depois do WP vira get_footer() ?>