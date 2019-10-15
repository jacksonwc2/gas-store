<?php include "topo.php"; ?>


<div class="container-fluid">

    <div class="card shadow mb-4">

        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Relatório 02</h6>
            <br>
            <p>Relacione cnpj, nome, email dos fornecedores de produtos da marca A, B e C com volume maior que 20 e que são do PR. Ordene o relatório de forma ascendente pelo cnpj</p>
        </div>

        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                            <tr>
                                <th>CNPJ</th>
                                <th>NOME FANTASIA</th>
                                <th>EMAIL</th>
                                <th>MARCA</th>
                                <th>VOLUME</th>
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
                var itemAtual = '<tr> <th>{cnpj}</th> <th>{nomefantasia}</th> <th>{email}</th> <th>{marca}</th> <th>{volume}</th> </tr>';
                itemAtual = itemAtual.replace("{cnpj}", element.cnpj);
                itemAtual = itemAtual.replace("{nomefantasia}", element.nomefantasia);
                itemAtual = itemAtual.replace("{email}", element.email);
                itemAtual = itemAtual.replace("{marca}", element.marca);
                itemAtual = itemAtual.replace("{volume}", element.volume);
                render += itemAtual;
            });
        }

        items.innerHTML = render;
    }

    get_request('http://localhost:8080/services/relatorios/r2', success, null, null);
</script>

<?php include "rodape.php"; ?>