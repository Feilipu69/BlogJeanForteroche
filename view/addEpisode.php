<h3>Nouvel épisode</h3>
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
	<input type="submit" name="addEpisode" value="Créer" class="btn btn-dark mt-4" />
	<button class="btn btn-dark mt-4" onclick="window.location.href='<?= HOST; ?>/addEpisode';">Annuler</button>
</form>
