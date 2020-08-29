<h3>Episodes</h3>
<a href="index.php?get=addEpisode" class="lead">Ajouter un épisode</a>
<div class="table-responsive">
	<table class="table table-bordered table-hover mt-3">
		<thead class="thead-dark">
			<tr>
				<th>Chapitre</th>
				<th>Titre</th>
				<th>Créé le</th>
				<th>Modifié le</th>
				<th>Action</th>
			</tr>
		</thead>
		<tbody>
			<?php
			foreach ($episodes as $episode) {
				?>
				<tr>
					<td><?=$episode->getChapter(); ?></td>
					<td><a href="index.php?get=episode&chapter=<?=$episode->getChapter(); ?>"><?=$episode->getTitle(); ?></a></td>
					<td><?= $episode->getCreationDate(); ?></td>
					<td><?= $episode->getUpdateDate(); ?></td>
					<td><a href="index.php?get=updateEpisode&chapter=<?= $episode->getChapter(); ?>">Modifier</a> <a href="index.php?get=deleteEpisode&chapter=<?= $episode->getChapter(); ?>" class="text-danger">Supprimer</a></td>
				</tr>
				<?php
			}
			?>
		</tbody>
	</table>
</div>
<h3>Commentaires signalés</h3>
<div class="table-responsive">
	<table class="table table-bordered table-hover">
		<thead class="thead-dark">
		<tr>
			<th>Auteur</th>
			<th>Chapitre</th>
			<th>Commentaire</th>
			<th>Signalements</th>
			<th>Action</th>
		</tr>
		</thead>
		<tbody>
		<?php
		foreach ($rudeComments as $rudeComment) {
			?>
			<tr>
				<td><?= $rudeComment->getAuthor(); ?></td>
				<td><?= $rudeComment->getEpisodeId(); ?></td>
				<td><?= $rudeComment->getComment(); ?></td>
				<td><?= $rudeComment->getRudeComment(); ?></td>
				<td><a href="index.php?get=deleteComment&id=<?= $rudeComment->getId(); ?>" class="text-danger">Supprimer</a></td>
				<?php
			}
			?>
			</tbody>
		</table>
	</div>
