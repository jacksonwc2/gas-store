<?php include "topo.php"; ?>


<div class="container-fluid">

    <div class="card shadow mb-4">

        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Relatório 01</h6>
            <br>
            <p>Relacione o código, nome, telefone e idade de pessoas que realizaram pedidos em 2018. Ordene o relatório das pessoas mais velhas para as mais novas</p>
        </div>

        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>NOME</th>
                            <th>TELEFONE</th>
                            <th>IDADE</th>
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
        debugger
        var items = document.getElementById("items");
        var render = "";

        if (obj != false && Array.isArray(obj) && obj.length > 0) {
            obj.forEach(element => {
                var itemAtual = '<tr><td>{id}</td><td>{nome}</td><td>{telefone}</td><td>{idade}</td></tr>';
                itemAtual = itemAtual.replace("{id}", element.id);
                itemAtual = itemAtual.replace("{telefone}", element.telefone);
                itemAtual = itemAtual.replace("{nome}", element.nome);
                itemAtual = itemAtual.replace("{idade}", element.idade);
                render += itemAtual;
            });
        }

        items.innerHTML = render;
    }

    get_request('http://localhost:8080/services/relatorios/r1', success, null, null);
</script>

<?php include "rodape.php"; ?>