<form method="post" action="<?= HOST; ?>updateEpisode?chapter=<?= $_GET['chapter']; ?>">
	<label for="title">Titre : </label>
	<input type="text" name="title" id="title" value="<?= isset($episodeDatas) ? strip_tags($episodeDatas->getTitle()) : ''; ?>"/>
	<br>
	<textarea name="content" id="form"><?= isset($episodeDatas) ? strip_tags($episodeDatas->getContent()) : ''; ?></textarea>
	<br>
	<input type="submit" name="updateEpisode" />
	<a href="<?= HOST; ?>updateEpisode?chapter=<?= $_GET['chapter']; ?>"><input type="button" value="Annuler" /></a>
</form>
