<?= print_r($_GET); ?>
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
						<li><a href="<?= HOST; ?>home">Accueil</a></li>
						<li><a href="<?= HOST; ?>connection">Compte</a></li>
						<li><a href="<?= HOST; ?>register">Inscription</a></li>
						<?php
					} elseif (isset($_SESSION['login'])) {
						?>
						<li><a href="<?= HOST; ?>home">Accueil</a></li>
						<?php
						if ($_SESSION['roleId'] === 'admin') {
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
