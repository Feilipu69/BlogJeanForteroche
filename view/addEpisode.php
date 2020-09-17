<form method="post" action="<?= HOST; ?>/addEpisode">
	<label for="chapter">Chapitre : </label>
	<br>
	<input type="text" name="chapter" id="chapter" value=<?= $newChapter; ?> />
	<br>
	<label for="title">Titre : </label>
	<br>
	<input type="text" name="title" id="title" />
	<br>
	<textarea name="content" id="form"></textarea>
	<br>
	<input type="submit" name="addEpisode" class="btn btn-dark" />
	<a href="<?= HOST; ?>/addEpisode"><input type="button" value="Annuler" class="btn btn-dark" /></a>
</form>
