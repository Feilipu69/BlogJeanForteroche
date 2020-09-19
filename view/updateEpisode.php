<form method="post" action="<?= HOST; ?>/updateEpisode/<?= $_GET['parameter']; ?>">
	<label for="title">Titre : </label>
	<br>
	<input type="text" name="title" id="title" value="<?= isset($episodeData) ? strip_tags($episodeData->getTitle()) : ''; ?>"/>
	<br>
	<label for="content">Contenu : </label>
	<br>
	<textarea name="content" id="form"><?= isset($episodeData) ? strip_tags($episodeData->getContent()) : ''; ?></textarea>
	<br>
	<input type="submit" name="updateEpisode" class="btn btn-dark" />
	<a href="<?= HOST; ?>/updateEpisode/<?= $_GET['parameter']; ?>"><input type="button" value="Annuler" class="btn btn-dark" /></a>
</form>
