<?php include "topo.php";?>


<div class="container-fluid">

    <div class="card shadow mb-4">

        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Relatório 04</h6>
            <br>
            <p>Relacione código da pessoa, nome da pessoa, quantidade de pedidos, quantidade total de produtos e valor total para pessoas que realizaram um valor total <br>em pedidos maior que 5000 e que sejam do sexo feminino e não residam no estado do RS. Ordene o relatório do cliente com mais pedidos para o cliente com menos pedidos</p>
        </div>

        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>NOME</th>
                            <th>QTD. PEDIDOS</th>
                            <th>QTD. PRODUTOS</th>
                            <th>VALOR TOTAL</th>
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
                var itemAtual = '<tr><td>{id}</td><td>{nome}</td><td>{qntdPedidos}</td><td>{qntdProdutos}</td><td>{somaValorPedidos}</td></tr>';
                itemAtual = itemAtual.replace("{id}", element.id);
                itemAtual = itemAtual.replace("{nome}", element.nome);
                itemAtual = itemAtual.replace("{qntdPedidos}", element.qntdpedidos);
                itemAtual = itemAtual.replace("{qntdProdutos}", element.qntdprodutos);
                itemAtual = itemAtual.replace("{somaValorPedidos}", element.somavalorpedidos);
                render += itemAtual;
            });
        }

        items.innerHTML = render;
    }
    debugger
    get_request('http://localhost:8080/services/relatorios/r4', success, null, null);
</script>

<?php include "rodape.php";?>