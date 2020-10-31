<h3>Modification de l'épisode <?= strip_tags($episodeData->getChapter()); ?></h3>
<form method="post" action="<?= HOST; ?>/updateEpisode/<?= $_GET['parameter']; ?>">
	<label for="title">Titre : </label>
	<br>
	<input type="text" name="title" id="title" value="<?= isset($episodeData) ? strip_tags($episodeData->getTitle()) : ''; ?>"/>
	<br>
	<label for="form">Contenu : </label>
	<br>
	<textarea name="content" id="form"><?= isset($episodeData) ? strip_tags($episodeData->getContent()) : ''; ?></textarea>
	<br>
	<input type="submit" name="updateEpisode" class="btn btn-dark mt-4" />
	<button class="btn btn-dark mt-4" onclick="window.location.href='<?= HOST; ?>/updateEpisode/<?= $_GET["parameter"]; ?>';">Annuler</button>
</form>
