<form method="post" action="index.php?get=updateEpisode&chapter=<?= $_GET['chapter']; ?>">
	<label for="title">Titre : </label>
	<br>
	<input type="text" name="title" id="title" value="<?= isset($episodeDatas) ? strip_tags($episodeDatas->getTitle()) : ''; ?>"/>
	<br>
	<label for="content">Contenu : </label>
	<br>
	<textarea name="content" id="form"><?= isset($episodeDatas) ? strip_tags($episodeDatas->getContent()) : ''; ?></textarea>
	<br>
	<input type="submit" name="updateEpisode" class="btn btn-dark" />
	<a href="index.php?get=updateEpisode&chapter=<?= $_GET['chapter']; ?>"><input type="button" value="Annuler" class="btn btn-dark" /></a>
</form>
