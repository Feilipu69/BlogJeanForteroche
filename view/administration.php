<h3>Episodes</h3>
<a href="<?= HOST; ?>/addEpisode" class="lead">Ajouter un épisode</a>
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
					<td><?=strip_tags($episode->getChapter()); ?></td>
					<td><a href="<?= HOST; ?>/episode/<?=strip_tags($episode->getChapter()); ?>"><?=strip_tags($episode->getTitle()); ?></a></td>
					<td><?= strip_tags($episode->getCreationDate()); ?></td>
					<td><?= strip_tags($episode->getUpdateDate()); ?></td>
					<td><a href="<?= HOST; ?>/updateEpisode/<?= strip_tags($episode->getChapter()); ?>">Modifier</a> <a href="<?= HOST; ?>/deleteEpisode/<?= strip_tags($episode->getChapter()); ?>" class="text-danger">Supprimer</a></td>
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
				<th>Action</th>
			</tr>
		</thead>
		<tbody>
			<?php
			if ($rudeComments !== null) {
				foreach ($rudeComments as $rudeComment) {
					?>
					<tr>
						<td><?= strip_tags($rudeComment->getLogin()); ?></td>
						<td><?= strip_tags($rudeComment->getEpisodeId()); ?></td>
						<td><?= strip_tags($rudeComment->getComment()); ?></td>
						<td><a href="<?= HOST; ?>/deleteComment/<?= strip_tags($rudeComment->getId()); ?>" class="text-danger">Supprimer</a></td>
					</tr>
					<?php
				}
			}
			?>
		</tbody>
	</table>
</div>
<div class="table-responsive">
	<table class="table table-bordered table-hover">
		<thead class="thead-dark">
			<tr>
				<th>Login</th>
				<th>Email</th>
				<th>Action</th>
			</tr>
		</thead>
		<tbody>
			<?php
			foreach ($users as $user) {
				?>
				<tr>
					<td><?= strip_tags($user->getLogin()); ?></td>
					<td><?= strip_tags($user->getEmail()); ?></td>
					<td><a href="<?= HOST; ?>/deleteUser/<?= strip_tags($user->getId()); ?>" class="text-danger">Supprimer</a></td>
				</tr>
				<?php
			}
			?>
		</tbody>
	</table>
</div>
