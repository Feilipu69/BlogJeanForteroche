<?= print_r($_SESSION); ?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8" />
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
						<a href="<?= HOST; ?>home"<li>Accueil</li></a>
						<a href="<?= HOST; ?>connection"<li>Compte</li></a>
						<a href="<?= HOST; ?>register"<li>Inscription</li></a>
						<?php
					} elseif (isset($_SESSION['login'])) {
						?>
						<a href="<?= HOST; ?>home"<li>Accueil</li></a>
						<a href="<?= HOST; ?>updateDatas"<li>Modifier vos données</li></a>
						<a href="<?= HOST; ?>deleteCount"<li>Suppression du compte</li></a>
						<a href="<?= HOST; ?>disconnection"<li>Déconnexion</li></a>
						<?php
					}
					?>
				</ul>
			</div>
		</header>
		<?php
		if (isset($_SESSION['login'])) {
			?>
			<p>Bienvenue <?= $_SESSION['login']; ?></p>
			<?php
		}
		?>
		<?= $content; ?>
	</body>
</html>
