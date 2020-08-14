<form method="post" action="<? HOST; ?>register">
	<label for="login">login : </label>
	<input type="text" name="login" id="login" required/>
	<br>
	<label for="password">Votre code : </label>
	<input type="password" name="password" id="password" required />
	<?php
	if (!isset($_SESSION['login'])) {
		?>
		<br>
		<label for="email">Adresse mail : </label>
		<input type="email" name="email" id="email" required />
		<?php
	}
	?>
	<br>
	<input type="submit" name="register" value="Inscription" />
	<input type="submit" name="connection" value="connexion" />
	<a href="register"><input type="button" value="Annuler" /></a>
</form>
