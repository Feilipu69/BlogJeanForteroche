<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8" />
		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
		<script src="https://cdn.tiny.cloud/1/wh9z1mfuolvg4lwiul6nr0x5ur1txczi3ksrn9vm58r2itps/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
		<title>Billet simple pour l'Alaska</title>
	</head>
	<body>
		<div class="container">
			<header>
				<div class="bg-dark">
					<h1 class="text-center"><a href="index.php?get=home" class="text-white text-decoration-none">Billet simple pour l'Alaska</a></h1>
					<h3 class="text-white text-center">Jean Forteroche</h3>
					<nav class="navbar navbar-expand-md navbar-dark text-center">
						<button class="navbar-toggler mx-auto" type="button" data-toggle="collapse" data-target="#navbarContent">
							<span class="navbar-toggler-icon"></span>
						</button>
						<div id="navbarContent" class="collapse navbar-collapse">
							<ul class="navbar-nav ml-auto">
								<?php
								if (!isset($_SESSION['login'])) {
									?>
									<li class="nav-item active">
										<a class="nav-link" href="index.php?get=home">Accueil</a>
									</li>
									<li class="nav-item">
										<a class="nav-link" href="index.php?get=connection">Compte</a>
									</li>
									<li class="nav-item">
										<a class="nav-link" href="index.php?get=register">Inscription</a>
									</li>
									<?php
								} elseif (isset($_SESSION['login'])) {
									?>
									<li class="nav-item">
										<a class="nav-link" href="index.php?get=home">Accueil</a>
									</li>
									<?php
									if (isset($_SESSION['roleId']) && $_SESSION['roleId'] === 'admin') {
										?>
										<li class="nav-item">
											<a class="nav-link" href="index.php?get=administration">Administration</a>
										</li>
										<?php
									}
									?>
									<li class="nav-item">
										<a class="nav-link" href="index.php?get=updateData">Modifier vos données</a>
									</li>
									<li class="nav-item">
										<a class="nav-link" href="index.php?get=disconnection">Déconnexion</a>
									</li>
									<?php
								}
								?>
							</ul>
						</div>
					</nav>
				</div>
				<?php
				if (isset($_SESSION['login'])) {
					?>
					<p class="lead text-info pt-2">Bienvenue <?= $_SESSION['login']; ?></p>
					<?php
				}
				?>
				<img src="public/trainAlaska.png" alt="Train d'Alaska" class="img-fluid mb-3" />
			</header>
		</div>
		<div class="container">
			<section>
				<?= $content; ?>
			</section>
		</div>

		<script>
			tinymce.init({
				selector: 'textarea#form'
			});
		</script>
		<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
		<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
		<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
	</body>
</html>
