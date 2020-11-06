<?php
if (isset($_SESSION['registerError'])) {
	?>
	<div class="alert alert-danger" role="alert"><?= $_SESSION['registerError']; ?></div>
	<?php
}
?>

<h3>Modifications de vos données</h3>
<form method="post" action="<?= HOST; ?>/updateData">
	<label for="login">Login : </label>
	<br>
	<input type="text" name="login" id="login" value="<?= isset($userData) ? strip_tags($userData->getLogin()) : ''; ?>" required/>
	<br>
	<label for="password">Votre code : </label>
	<br>
	<input type="password" name="password" id="password" required />
	<br>
	<label for="email">Adresse mail : </label>
	<br>
	<input type="email" name="email" id="email" value="<?= isset($userData) ? strip_tags($userData->getEmail()) : ''; ?>" required />
	<br>
	<input type="submit" name="updateData" value="Modification" class="btn btn-dark mt-4" />
	<button class="btn btn-dark mt-4" onclick="window.location.href='<?= HOST; ?>/updateData';">Annuler</button><br>
	<button class="btn btn-danger mt-4" onclick="window.location.href='<?= HOST; ?>/deleteCount';">Suppression du compte</button>
</form>
