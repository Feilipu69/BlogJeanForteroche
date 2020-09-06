<form method="post" action="index.php?get=updateData">
	<label for="login">Login : </label>
	<br>
	<input type="text" name="login" id="login" value="<?= isset($userData) ? strip_tags($userData->getLogin()) : ''; ?>"required/>
	<br>
	<label for="password">Votre code : </label>
	<br>
	<input type="password" name="password" id="password" required />
	<br>
	<label for="email">Adresse mail : </label>
	<br>
	<input type="email" name="email" id="email" value="<?= isset($userData) ? strip_tags($userData->getEmail()) : ''; ?>"required />
	<br>
	<input type="submit" name="updateData" value="Modification" class="btn btn-dark mt-4" />
	<a href="updateData"><input type="button" value="Annuler" class="btn btn-dark mt-4" /></a><br>
	<a href="deleteCount"><input type="button" value="Suppression du compte" class="btn btn-danger mt-4" /></a>
</form>
