<!doctype html>
<html>
	<head>
		<title>Vegania - Accueil</title>
		<meta charset="UTF-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
		<style>
			body {
				background-image: linear-gradient( rgba(0, 0, 0, 0.5), rgba(0, 0, 0, 0.5) ), url("<?= WEBROOT ?>assets/image/background.jpg");
			}
		
			header {
				background-image: linear-gradient( rgba(0, 0, 0, 0.5), rgba(0, 0, 0, 0.5) ), url("<?= WEBROOT ?>assets/image/shrek.jpg");
				background-position: 0px -260px;
			}
			
			.page-row {
				background-color: white;
			}

			.page-module {
				background-color: rgba(0, 255, 0, 0.05);
			}
			
			table, td {
				border: 1px solid black;
			}

			td {
				width: 200px;
				padding: 10px;
			}
		</style>
		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">
	</head>
	<body>
		<div class="container page-row p-0">
			<header class="page-header p-5 text-center text-white">
				<h1>Vegania</h1>
				<h3>Vente de produits naturels</h2>
			</header>
		</div>
		<div class="container page-row p-0">
			<nav class="navbar navbar-expand-sm navbar-dark bg-success">
				<span class="navbar-brand text-white" href="#">Navigation</span>
				<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collnavbar">
					<span class="navbar-toggler-icon white"></span>
				</button>
				<div class="collapse navbar-collapse" id="collnavbar">
					<ul class="navbar-nav"> 
						<li class="nav-item"><a class="nav-link" href="<?= WEBROOT ?>accueil/">Accueil</a></li>
						<li class="nav-item"><a class="nav-link" href="<?= WEBROOT ?>produits/">Produits</a></li>
						<li class="nav-item"><a class="nav-link" href="#">Contact</a></li>
						<li class="nav-item"><a class="nav-link" href="#">Panier</a></li>
					</ul>
				</div>
			</nav>
		</div>
		<div class="container page-row p-0">
			<?= $content_for_layout ?>
		</div>
		<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js" integrity="sha384-wHAiFfRlMFy6i5SRaxvfOCifBUQy1xHdJ/yoi7FRNXMRBu5WHdZYu1hA6ZOblgut" crossorigin="anonymous"></script>
		<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js" integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k" crossorigin="anonymous"></script>
	</body>
			<div class="container page-row p-0">
			<footer class="page-footer p-3 bg-success text-center text-white">
				<div class="container">
					<p class="py-1 my-0">Copyright &copy; Vegania</p>
				</div>
			</footer>
		</div>
</html>
<!-- coucou -->
