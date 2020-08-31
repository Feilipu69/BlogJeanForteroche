<form method="post" action=index.php?get=updateDatas">
	<label for="login">Login : </label>
	<br>
	<input type="text" name="login" id="login" value="<?= isset($userDatas) ? strip_tags($userDatas->getLogin()) : ''; ?>"required/>
	<br>
	<label for="password">Votre code : </label>
	<br>
	<input type="password" name="password" id="password" required />
	<br>
	<label for="email">Adresse mail : </label>
	<br>
	<input type="email" name="email" id="email" value="<?= isset($userDatas) ? strip_tags($userDatas->getEmail()) : ''; ?>"required />
	<br>
	<input type="submit" name="updateDatas" value="Modification" class="btn btn-dark mt-4" />
	<a href="index.php?get=updateDatas"><input type="button" value="Annuler" class="btn btn-dark mt-4" /></a><br>
	<a href="index.php?get=deleteCount"><input type="button" value="Suppression du compte" class="btn btn-danger mt-4" /></a>
</form>
