<!DOCTYPE html>
<html lang="en">

<head>

	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<meta name="description" content="">
	<meta name="author" content="">

	<title>OIA O GAIS - Login</title>

	<link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
	<link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
	<link href="css/sb-admin-2.min.css" rel="stylesheet">
	<script src="js/jquery.js"></script>
	<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
	<script src="js/proxy.js"></script>

	<script src="controller/login.js"></script>
</head>

<body style="background:black">

	<div class="container">

		<div class="row justify-content-center">

			<div class="col-xl-5 col-lg-6 col-md-5">

				<div class="card o-hidden border-0 shadow-lg my-5">
					<div class="card-body p-0">

						<div class="row">

							<div class="col-lg-12">
								<div class="p-5">
									<div class="text-center">
										<h1 class="h4 text-gray-900 mb-4">Login</h1>
									</div>

									<form class="user" id="login" action="#">

										<div class="form-group">
											<input required type="text" class="form-control form-control-user" id="email" aria-describedby="emailHelp" placeholder="Login">
										</div>

										<div class="form-group">
											<input required type="password" class="form-control form-control-user" id="senha" placeholder="Senha">
										</div>

										<input type="submit" value="login" class="btn btn-primary btn-user btn-block" style="background: #d40707;border: none;">

									</form>


									<div class="text-center">
										<a class="small" href="cadastro.php">Criar uma conta!</a>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>

			</div>

		</div>

	</div>
	
	<script src="controller/login.js"></script>
	<script src="vendor/jquery/jquery.min.js"></script>
	<script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
	<script src="vendor/jquery-easing/jquery.easing.min.js"></script>
	<script src="js/sb-admin-2.min.js"></script>

</body>

</html>