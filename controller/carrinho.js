function render() {

    var row = document.getElementById("produtos");
    var render = "";
    var dados = JSON.parse(localStorage.getItem('usuarioLogado')).carrinho
    _valorTotal = 0;
    if (Array.isArray(dados) && dados.length > 0) {
        dados.forEach(element => {
            var itemAtual = '<div class="col-md-3" id="produto{codProduto}"><div class="product"><div class="product-img"><img src="{img}" alt=""></div><div class="product-body"><p class="product-category">{tipo}</p><h3 class="product-name">{fornecedor}</h3><h4 class="product-price">R${valor}</h4><div class="product-rating"></div><div class="product-btns"><fieldset>Quantidade:</fieldset><input readonly disabled type="numeric" id="qtdProduto{codProduto}" style="text-align:center;" value="{quantidade}"></div></div><div class="add-to-cart"><button class="add-to-cart-btn" onclick="removerCarrinho({idCarrinho})" produto={data}><i class="fa fa-shopping-cart"></i> Remover do Carrinho</button></div></div></div>';
            itemAtual = itemAtual.replace("{data}", JSON.stringify(element));
            itemAtual = itemAtual.replace("{codProduto}", element.id);
            itemAtual = itemAtual.replace("{idCarrinho}", element.idCarrinho);
            itemAtual = itemAtual.replace("{codProduto}", element.id);
            itemAtual = itemAtual.replace("{codProduto}", element.id);
            itemAtual = itemAtual.replace("{img}", element.fl_tipo == 'A' ? "https://mundopossivel.files.wordpress.com/2009/09/agua-2.jpg" : "https://www.chama-app.com.br/img/mobile/botijao-dinheiro.png");
            itemAtual = itemAtual.replace("{tipo}", element.fl_tipo == 'A' ? "ÁGUA" : "GÁS");
            itemAtual = itemAtual.replace("{fornecedor}", element.fornecedor);
            itemAtual = itemAtual.replace("{valor}", element.vl_preco);
            itemAtual = itemAtual.replace("{quantidade}", element.quantidade);

            render += itemAtual;
            _valorTotal += (element.quantidade * element.vl_preco);
        });
    }

    row.innerHTML = render;
    document.getElementById('valorTotal').innerHTML = 'TOTAL: R$' + formatReal(_valorTotal);


}

function aquirirEntregador() {

    var success = function (obj) {
        if (Array.isArray(obj) && obj.length > 0) {
            var render = "";

            obj.forEach(element => {
                var itemAtual = '<option value="{id}">{nome}</option>';
                itemAtual = itemAtual.replace('{id}', element.id);
                itemAtual = itemAtual.replace('{nome}', element.nome);

                render += itemAtual;
            });

            document.getElementById('cd_entregador').innerHTML = render;

        }
    }

    post_request('http://localhost:8080/services/entregador/listarTodos', success, null, null);
}

aquirirEntregador();
render();

function removerCarrinho(idCarrinho) {

    var usuario = localStorage.getItem("usuarioLogado");

    if (usuario == null) {
        window.location.href = 'login.php';
    } else {
        usuario = JSON.parse(usuario);
    }

    usuario.carrinho = arrayRemove(usuario.carrinho, idCarrinho);
    localStorage.setItem('usuarioLogado', JSON.stringify(usuario));

    if (usuario.carrinho != null) {
        document.getElementById('qty').hidden = false;
        document.getElementById('qty').innerHTML = usuario.carrinho.length;
    }

    alert("Produto removido Carrinho!");
    render();
}

function arrayRemove(arr, value) {

    return arr.filter(function (ele) {
        return ele.idCarrinho != value;
    });

}

function formatReal(int) {
    var tmp = int + '';
    tmp = tmp.replace(/([0-9]{2})$/g, ",$1");
    if (tmp.length > 6)
        tmp = tmp.replace(/([0-9]{3}),([0-9]{2}$)/g, ".$1,$2");

    return tmp;
}

function comprar() {

    var success = function () {

        var usuario = JSON.parse(localStorage.getItem("usuarioLogado"));
        usuario.carrinho = null;
        localStorage.usuarioLogado = JSON.stringify(usuario);

        alert('Compra realizada com Sucesso! Será entrega no endereço cadastrado no perfil do cliente.');
        window.location.href = 'index.php';
    }

    var parametros = {
        "dt_entrega": document.getElementById('dt_entrega').value,
        "vl_pedido": _valorTotal,
        "cd_formapagamento": document.getElementById('cd_formapagamento').value,
        "fl_retornocasco": document.getElementById('fl_retornocasco').value,
        "cd_entregador": document.getElementById('cd_entregador').value,
        "cd_pessoa": JSON.parse(localStorage.getItem("usuarioLogado")).pessoa.id,
        "cd_endereco": JSON.parse(localStorage.getItem("usuarioLogado")).endereco.id,
        "carrinho": JSON.parse(localStorage.getItem("usuarioLogado")).carrinho
    }

    post_request('http://localhost:8080/services/compra/realizarCompra', success, null, parametros);

}