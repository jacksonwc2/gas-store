<?php include "topo.php"; ?>


<div class="container-fluid">

    <div class="card shadow mb-4">

        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Relatório 03</h6>
            <br>
            <p>Relacione o código, data quantidade e valor total de todos os pedidos de meses ímpares de 2017 a 2019 pagos com cartão de crédito. Ordene o relatório do pedido mais recente para o pedido mais antigo</p>
        </div>

        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>VALOR</th>
                            <th>DATA</th>
                            <th>QUANTIDADE</th>
                        </tr>
                    </thead>
                    <tbody id="items">

                    </tbody>
                </table>
            </div>
        </div>
    </div>

</div>
<script src="../js/proxy.js"></script>
<script>
    var success = function(obj) {
        var items = document.getElementById("items");
        var render = "";

        if (obj != false && Array.isArray(obj) && obj.length > 0) {
            obj.forEach(element => {
                debugger
                var itemAtual = '<tr><td>{id}</td><td>{valor}</td><td>{data}</td><td>{quantidade}</td></tr>';
                itemAtual = itemAtual.replace("{id}", element.id);
                itemAtual = itemAtual.replace("{valor}", element.valor);
                itemAtual = itemAtual.replace("{data}", element.data);
                itemAtual = itemAtual.replace("{quantidade}", element.quantidade);
                render += itemAtual;
            });
        }

        items.innerHTML = render;
    }
    debugger
    get_request('http://localhost:8080/services/relatorios/r3', success, null, null);
</script>

<?php include "rodape.php"; ?>