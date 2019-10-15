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
				<ul class="breadcrumb-tree">
					<li><a href="#">Home</a></li>
					<li><a href="#">CARRINHO DE COMPRAS</a></li>
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
			<!-- STORE -->
			<div id="store" class="col-md-12">
				<!-- store products -->
				<div class="row" id="produtos">
				</div>
				<!-- /store products -->

			</div>
			<div id="store" class="col-md-12">

				<form action="" id="compraform">
					<div class="col-md-12">

						<div class="col-md-12">
							<div class="section-title">
								<h3 class="title">DADOS PARA COMPRA</h3>
							</div>
						</div>
						<div class="col-md-6">
							<fieldset>Retorna casco:</fieldset>
							<select class="input required" id="fl_retornocasco">
								<option value="S">SIM</option>
								<option value="N">NÃO</option>
							</select>
						</div>
						<div class="col-md-6">
							<fieldset>Entregador:</fieldset>
							<select class="input required col-md-6" id="cd_entregador"></select>
						</div>
						<div class="col-md-6">
							<fieldset>Forma Pagamento:</fieldset>
							<select class="input required col-md-6" id="cd_formapagamento">
								<option value="1">CARTÃO CRÉDITO</option>
								<option value="2">CARTÃO DÉBITO</option>
								<option value="2">DINHEIRO</option>
							</select>
						</div>
						<div class="col-md-6">
							<fieldset>Data Entrega:</fieldset>
							<input type="date" class="input required" id="dt_entrega" />
						</div>
						<!-- store products -->
						<div class="col-md-12" style="margin-top:15px;">

							<div class="col-md-12">
								<h3 id="valorTotal" style="margin-top: 25px;">TOTAL: </h3>
							</div>
							<div class="col-md-12">
								<input type="button" style="margin: 10px 0px 40px 0px" value="COMPRAR" onclick="comprar()" class="primary-btn order-submit">
							</div>


						</div>
				</form>


			</div>
			<!-- /STORE -->
		</div>
		<!-- /row -->
	</div>
	<!-- /container -->
</div>
<!-- /SECTION -->
<script src="controller/carrinho.js"></script>
<?php

include 'rodape.php';
?>