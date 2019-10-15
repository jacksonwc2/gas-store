<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<title>Gas Store</title>

	<link type="text/css" rel="stylesheet" href="css/bootstrap.min.css" />
	<link type="text/css" rel="stylesheet" href="css/slick.css" />
	<link type="text/css" rel="stylesheet" href="css/slick-theme.css" />
	<link type="text/css" rel="stylesheet" href="css/nouislider.min.css" />
	<link type="text/css" rel="stylesheet" href="css/font-awesome.min.css">
	<link type="text/css" rel="stylesheet" href="css/style.css" />
	<script src="js/jquery.js"></script>
	<script src="js/proxy.js"></script>
	<link href="https://fonts.googleapis.com/css?family=Montserrat:400,500,700" rel="stylesheet">

</head>

<body>

	<header>

		<div id="header">

			<div class="container">

				<div class="row">
					<!-- LOGO -->
					<div class="col-md-3">
						<div class="header-logo">
							<a href="index.php" class="logo">
								<img src="./img/logogas.png" alt="">
							</a>
						</div>
					</div>

					<!-- Barra de pesquisa -->
					<div class="col-md-6">
					</div>

					<!-- ACCOUNT -->
					<div class="col-md-3 clearfix">
						<div class="header-ctn">

							<!-- Carinho -->
							<div class="carrinho">
								<a href="carrinho.php" aria-expanded="true">
									<i class="fa fa-shopping-cart"></i>
									<span>Carrinho</span>
									<div class="qty" id="qty" hidden></div>
								</a>
							</div>

							<!-- Perfil -->
							<div class="perfil">
								<a id="btnPerfil" href="perfil.php" aria-expanded="true">
									<i class="fa fa-user"></i>
									<span id="spanPerfil">Perfil</span>
								</a>
							</div>

						</div>
					</div>

				</div>

			</div>

		</div>

	</header>

	<!-- CATEGORIAS -->
	<nav id="navigation">
		<!--
		<div class="container">

			<div id="responsive-nav">

				<ul class="main-nav nav navbar-nav">
					<li class="active"><a href="#">Home</a></li>
					<li><a href="#">Página 01</a></li>
					<li><a href="#">Página 02</a></li>
					<li><a href="#">Página 03</a></li>

				</ul>

			</div>

		</div>
-->
	</nav>
	<script src="controller/cabecalho.js"></script>