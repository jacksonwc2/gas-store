<?php include "topo.php"; ?>

<div class="container-fluid">

    <div class="card shadow mb-4">

        <div class="text-center mt-4">
            <h1 class="h4 text-gray-900 mb-4">Cadastro de produtos</h1>
        </div>

        <form class="container" id="cadastro-produto" action="#">

            <div class="form-group">
                <input type="text" class="form-control form-control-user" id="marcaProduto" placeholder="Marca" required>
            </div>

            <div class="form-group">
                <div class="input-group mb-3">
                    <select class="custom-select" id="tipoProduto" required> 
                        <option selected disabled>Tipo</option>
                        <option value="G">Gás</option>
                        <option value="A">Água</option>
                    </select>
                </div>
            </div>

            <div class="form-group">
                <div class="input-group mb-3">
                    <select class="custom-select" id="unidadeMedidaProduto" required>
                        <option selected disabled>Unidade de medida</option>
                        <option value="1">UN</option>
                        <option value="2">KG</option>
                    </select>
                </div>
            </div>

            <div class="form-group">
                <input type="text" class="form-control form-control-user" id="volumeProduto" placeholder="Volume" required>
            </div>

            <div class="form-group">
                <div class="input-group mb-3">
                    <div class="input-group-prepend">
                        <span class="input-group-text">R$</span>
                    </div>
                    <input type="text" class="form-control form-control-user" id="precoProduto" placeholder="Preço" required>
                </div>
            </div>

            <div class="form-group container mt-5" style="width: 20%;">
                <input type="submit" value="Salvar" class="btn btn-success btn-block">
            </div>

        </form>

    </div>

</div>

<script src="../js/jquery.js"></script>
<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js" ></script>
<script src="../js/proxy.js"></script>
<script src="controllers/produto.js"></script>

<?php include "rodape.php"; ?>