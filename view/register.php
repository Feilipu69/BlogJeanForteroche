<form method="post" action="<? HOST; ?>register">
	<label for="login">Login : </label>
	<input type="text" name="login" id="login" required/>
	<br>
	<label for="password">Votre code : </label>
	<input type="password" name="password" id="password" required />
	<br>
	<label for="email">Adresse mail : </label>
	<input type="email" name="email" id="email" required />
	<br>
	<input type="submit" name="register" value="Inscription" />
	<a href="<?= HOST; ?>register"><input type="button" value="Annuler" /></a>
</form>
