<form method="post" action="<? HOST; ?>connection">
	<label for="login">Login : </label>
	<input type="text" name="login" id="login" required/>
	<br>
	<label for="password">Votre code : </label>
	<input type="password" name="password" id="password" required />
	<br>
	<input type="submit" name="connection" value="Connexion" />
	<a href="<?= HOST; ?>connection"><input type="button" value="Annuler" /></a>
</form>
