<form method="post" action="<?= HOST; ?>updateEpisode?chapter=<?= $_GET['chapter']; ?>">
	<label for="title">Titre : </label>
	<input type="text" name="title" id="title" />
	<br>
	<textarea name="content"></textarea>
	<br>
	<input type="submit" name="updateEpisode" />
	<a href="<<?= HOST; ?>updateEpisode"><input type="button" value="Annuler" /></a>
</form>
