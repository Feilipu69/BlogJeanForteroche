<form method="post" action="<?= HOST; ?>addEpisode">
	<label for="chapter">Chapitre : </label>
	<input type="text" name="chapter" id="chapter" />
	<br>
	<label for="title">Titre : </label>
	<input type="text" name="title" id="title" />
	<br>
	<textarea name="content" id="form"></textarea>
	<br>
	<input type="submit" name="addEpisode" />
	<a href="<<?= HOST; ?>addEpisode"><input type="button" value="Annuler" /></a>
</form>
