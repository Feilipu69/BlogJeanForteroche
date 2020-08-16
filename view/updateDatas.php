<form method="post" action="<? HOST; ?>updateDatas">
	<label for="login">Login : </label>
	<input type="text" name="login" id="login" required/>
	<br>
	<label for="password">Votre code : </label>
	<input type="password" name="password" id="password" required />
	<br>
	<label for="email">Adresse mail : </label>
	<input type="email" name="email" id="email" required />
	<br>
	<input type="submit" name="updateDatas" value="Modification" />
	<a href="updateDatas"><input type="button" value="Annuler" /></a>
</form>
