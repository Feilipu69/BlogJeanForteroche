<form method="post" action="<? HOST; ?>updateDatas">
	<label for="login">Login : </label>
	<input type="text" name="login" id="login" value="<?= isset($userDatas) ? strip_tags($userDatas->getLogin()) : ''; ?>"required/>
	<br>
	<label for="password">Votre code : </label>
	<input type="password" name="password" id="password" required />
	<br>
	<label for="email">Adresse mail : </label>
	<input type="email" name="email" id="email" value="<?= isset($userDatas) ? strip_tags($userDatas->getEmail()) : ''; ?>"required />
	<br>
	<input type="submit" name="updateDatas" value="Modification" />
	<a href="<?= HOST; ?>updateDatas"><input type="button" value="Annuler" /></a>
	<a href="<?= HOST; ?>deleteCount"><input type="button" value="Supression du compte" /></a>
</form>
