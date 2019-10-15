<?php
include 'cabecalho.php';
?>

<!-- BREADCRUMB -->
<div id="breadcrumb" class="section">
	<!-- container -->
	<div class="container">
		<!-- row -->
		<div class="row">
			<div class="col-md-12">
				<h3 class="breadcrumb-header">PERFIL</h3>
				<ul class="breadcrumb-tree">
					<li><a href="index.php">Home</a></li>
					<li class="active">EDITAR PERFIL</li>
				</ul>
				<ul class="breadcrumb-tree" style="float: right;padding-right: 30px;" >
					<li><a id="adm" hidden href="admin/index.php">Painel Administrador</a></li>
				</ul>
				<ul class="breadcrumb-tree" style="float: right;padding-right: 30px;">
					<li><a href="#" onclick="sair()">Sair</a></li>
				</ul>
			</div>
		</div>
		<!-- /row -->
	</div>
	<!-- /container -->
</div>
<!-- /BREADCRUMB -->

<!-- SECTION -->
<div class="section">
	<!-- container -->
	<div class="container">
		<!-- row -->
		<div class="row">
			<form action="#" id="cadastro">
				<div class="col-md-12">

					<!-- Billing Details -->
					<div class="billing-details col-md-6">
						<div class="section-title">
							<h3 class="title">Dados Pessoais</h3>
						</div>
						<div class="form-group">
							<input class="input" type="text" id="tx_nome" maxlength="50" placeholder="Nome"><br>
						</div>
						<div class="form-group"><input class="input" type="text" id="tx_email" maxlength="100" placeholder="Email"><br>
						</div>
						<div class="form-group"><input class="input" type="text" id="tx_documento" maxlength="50" placeholder="CPF/CNPJ"><br>
						</div>
						<div class="form-group"><input class="input" type="date" id="dt_nascimento" placeholder="Data de Nascimento"><br>
						</div>
						<div class="form-group"><input class="input" type="numeric" id="nr_telefone" maxlength="11" placeholder="Telefone Celular"><br>
						</div>
						<div class="form-group"><input class="input" type="numeric" id="nr_telefonefixo" maxlength="11" placeholder="Telefone Fixo">
						</div>
					</div>
					<!-- /Billing Details -->

					<!-- Billing Details -->
					<div class="billing-details col-md-6">
						<div class="section-title">
							<h3 class="title">Dados Endereço</h3>
						</div>
						<div class="form-group">
							<input class="input" type="text" id="tx_estado" maxlength="2" placeholder="Sigla do estado"><br>
						</div>
						<div class="form-group"><input class="input" type="text" id="tx_cidade" maxlength="50" placeholder="Cidade"><br>
						</div>
						<div class="form-group"><input class="input" type="text" id="tx_bairro" maxlength="50" placeholder="Bairro"><br>
						</div>
						<div class="form-group"><input class="input" type="text" id="tx_rua" maxlength="50" placeholder="Rua"><br>
						</div>
						<div class="form-group"><input class="input" type="numeric" id="nr_numero" maxlength="10" placeholder="Número"><br>
						</div>
						<div class="form-group"><input class="input" type="numeric" id="nr_cep" maxlength="12" placeholder="CEP"><br>
						</div>
						<div class="form-group"><input class="input" type="text" id="tx_complemento" maxlength="50" placeholder="Complemento">
						</div>
					</div>
					<!-- /Billing Details -->

					<!-- Billing Details -->
					<div class="billing-details col-md-6" id="dadosFornecedor" hidden>
						<div class="section-title">
							<h3 class="title">Dados Do Fornecedor</h3>
						</div>
						<div class="form-group">
						</div>
						<div class="form-group"><input class="input" type="text" id="tx_razaosocial" maxlength="50" placeholder="Razão Social"><br>
						</div>
						<div class="form-group"><input class="input" type="text" id="tx_nomefantasia" maxlength="50" placeholder="Nome"><br>
						</div>
						<div class="form-group"><input class="input" type="numeric" id="nr_cnpj" maxlength="11" placeholder="CNPJ"><br>
						</div>
						<div class="form-group"><input class="input" type="numeric" id="nr_telefonefornecedor" maxlength="11" placeholder="Telefone Celular"><br>
						</div>
						<div class="form-group"><input class="input" type="numeric" id="nr_telefonefixofornecedor" maxlength="11" placeholder="Telefone Fixo"><br>
						</div>
						<div class="form-group"><input class="input" type="text" id="tx_emailfornecedor" maxlength="100" placeholder="Email">
						</div>
					</div>
					<!-- /Billing Details -->

					<!-- Billing Details -->
					<div class="billing-detailscol-md-6" id="dadosEntregador" hidden>
						<div class="section-title">
							<h3 class="title">Dados Do Entregador</h3>
						</div>
						<div class="form-group">
						</div>
						<div class="form-group"><input class="input" type="text" id="tx_placa" maxlength="7" placeholder="Placa do veículo"><br>
						</div>
						<div class="form-group"><input class="input" type="numeric" id="vl_frete" maxlength="21" placeholder="Valor Frete"><br>
						</div>
					</div><!-- Billing Details -->

					<!-- Shiping Details -->
					<div class="shiping-details col-md-6">
						<div class="section-title">
							<h3 class="title">Dados Usuário</h3>
						</div>
						<div class="form-group">
							<input class="input" type="text" readonly disabled id="tx_login" maxlength="25" placeholder="Login"><br>
						</div>
						<div class="form-group"><input class="input" type="password" id="tx_senha" maxlength="50" placeholder="Senha">
						</div>
						<div class="form-group"><input type="button" onclick="editar()" value="SALVAR" class="primary-btn order-submit">
						</div>


					</div>

					<div class="shiping-details col-md-12">
						<div class="section-title">
							<h3 class="title">Opções</h3>
						</div>
						<a href="#" onclick="excluir()">Desejo excluir minha conta!</a>

					</div>
					<!-- /Shiping Details -->


				</div>
			</form>
		</div>
		<!-- /row -->
	</div>
	<!-- /container -->
</div>
<!-- /SECTION  -->
<script src="controller/perfil.js"></script>

<?php
include 'rodape.php';
?>