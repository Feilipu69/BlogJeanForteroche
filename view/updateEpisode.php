<form method="post" action="updateEpisode=<?= $_GET['chapter']; ?>">
	<label for="title">Titre : </label>
	<br>
	<input type="text" name="title" id="title" value="<?= isset($episodeData) ? strip_tags($episodeData->getTitle()) : ''; ?>"/>
	<br>
	<label for="content">Contenu : </label>
	<br>
	<textarea name="content" id="form"><?= isset($episodeData) ? strip_tags($episodeData->getContent()) : ''; ?></textarea>
	<br>
	<input type="submit" name="updateEpisode" class="btn btn-dark" />
	<a href="updateEpisode=<?= $_GET['chapter']; ?>"><input type="button" value="Annuler" class="btn btn-dark" /></a>
</form>
