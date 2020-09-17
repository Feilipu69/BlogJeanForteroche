<form method="post" action="<?= HOST; ?>/inscription">
	<label for="login">Login : </label>
	<br>
	<input type="text" name="login" id="login" required/>
	<br>
	<label for="password">Votre code : </label>
	<br>
	<input type="password" name="password" id="password" required />
	<br>
	<label for="email">Adresse mail : </label>
	<br>
	<input type="email" name="email" id="email" required />
	<br>
	<input type="submit" name="register" value="Inscription" class="btn btn-dark mt-4" />
	<a href="<?= HOST; ?>/inscription"><input type="button" value="Annuler" class="btn btn-dark mt-4" /></a>
</form>
