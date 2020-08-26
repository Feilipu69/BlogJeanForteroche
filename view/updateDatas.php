<form method="post" action="<? HOST; ?>updateDatas">
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
	<a href="<?= HOST; ?>updateDatas"><input type="button" value="Annuler" class="btn btn-dark mt-4" /></a>
	<a href="<?= HOST; ?>deleteCount"><input type="button" value="Supression du compte" class="btn btn-danger mt-4" /></a>
</form>
