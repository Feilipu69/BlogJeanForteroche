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
					<a href="<?= HOST; ?>home"<li>Accueil</li></a>
					<a href="<?= HOST; ?>register"<li>Compte</li></a>
					<?php
					if (isset($_SESSION['login'])) {
						?>
						<a href=""<li>Déconnexion</li></a>
						<?php
					}
					?>
				</ul>
			</div>
		</header>
		<?= $content; ?>
	</body>
</html>
