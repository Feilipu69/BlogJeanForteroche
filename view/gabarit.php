<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8" />
		<script src="https://cdn.tiny.cloud/1/wh9z1mfuolvg4lwiul6nr0x5ur1txczi3ksrn9vm58r2itps/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>
		<title>Billet simple pour l'Alaska</title>
	</head>
	<body>
		<h1>Billet simple pour l'Alaska</h1>
		<header>
			<div class="menu">
				<ul>
					<?php
					if (!isset($_SESSION['login'])) {
						?>
						<li><a href="<?= HOST; ?>home">Accueil</a></li>
						<li><a href="<?= HOST; ?>connection">Compte</a></li>
						<li><a href="<?= HOST; ?>register">Inscription</a></li>
						<?php
					} elseif (isset($_SESSION['login'])) {
						?>
						<li><a href="<?= HOST; ?>home">Accueil</a></li>
						<?php
						if (isset($_SESSION['roleId']) && $_SESSION['roleId'] === 'admin') {
							?>
							<li><a href="<?= HOST; ?>administration">Administration</a></li>
							<?php
						}
						?>
						<li><a href="<?= HOST; ?>updateDatas">Modifier vos données</a></li>
						<li><a href="<?= HOST; ?>disconnection">Déconnexion</a></li>
						<?php
					}
					?>
				</ul>
			</div>
		<?php
		if (isset($_SESSION['login'])) {
			?>
			<p>Bienvenue <?= $_SESSION['login']; ?></p>
			<?php
		}
		?>
		<img src="utils/trainAlaska.png" alt="Train d'Alaska" />
		</header>
		<?= $content; ?>
		<script>
			tinymce.init({
				selector: 'textarea#form'
			});
		</script>
	</body>
</html>
