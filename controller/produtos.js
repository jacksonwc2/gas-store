var success = function (obj) {
    _produtos = obj;
    renderProdutos();
}

get_request('http://localhost:8080/services/produto/listarProdutos', success, null, null);

function renderProdutos() {
    var row = document.getElementById("produtos");
    var gas = document.getElementById("gas").checked;
    var agua = document.getElementById("agua").checked;
    var render = "";

    if (gas && _produtos.gas != false && Array.isArray(_produtos.gas) && _produtos.gas.length > 0) {
        _produtos.gas.forEach(element => {
            var itemAtual = '<div class="col-md-4 col-xs-6" id="produto{codProduto}" produto={data}><div class="product"><div class="product-img"><img src="{img}" alt=""></div><div class="product-body"><p class="product-category">{tipo}</p><h3 class="product-name">{fornecedor}</h3><h4 class="product-price">R${valor}</h4><div class="product-rating"></div><div class="product-btns"><fieldset>Quantidade:</fieldset><input type="numeric" id="qtdProduto{codProduto}" style="text-align:center;" value="1"></div></div><div class="add-to-cart"><button class="add-to-cart-btn" onclick="addCarrinho({codProduto})"><i class="fa fa-shopping-cart"></i> Adicionar ao Carrinho</button></div></div></div>';
            itemAtual = itemAtual.replace("{data}", JSON.stringify(element));
            itemAtual = itemAtual.replace("{codProduto}", element.id);
            itemAtual = itemAtual.replace("{codProduto}", element.id);
            itemAtual = itemAtual.replace("{codProduto}", element.id);
            itemAtual = itemAtual.replace("{img}", element.fl_tipo == 'A' ? "https://mundopossivel.files.wordpress.com/2009/09/agua-2.jpg" : "https://www.chama-app.com.br/img/mobile/botijao-dinheiro.png");
            itemAtual = itemAtual.replace("{tipo}", element.fl_tipo == 'A' ? "ÁGUA" : "GÁS");
            itemAtual = itemAtual.replace("{fornecedor}", element.fornecedor);
            itemAtual = itemAtual.replace("{valor}", element.vl_preco);

            render += itemAtual;
        });
    }

    if (agua && _produtos.agua != false && Array.isArray(_produtos.agua) && _produtos.agua.length > 0) {
        _produtos.agua.forEach(element => {
            var itemAtual = '<div class="col-md-4 col-xs-6" id="produto{codProduto}" produto={data}><div class="product"><div class="product-img"><img src="{img}" alt=""></div><div class="product-body"><p class="product-category">{tipo}</p><h3 class="product-name">{fornecedor}</h3><h4 class="product-price">R${valor}</h4><div class="product-rating"></div><div class="product-btns"><fieldset>Quantidade:</fieldset><input type="numeric" id="qtdProduto{codProduto}" style="text-align:center;" value="1"></div></div><div class="add-to-cart"><button class="add-to-cart-btn" onclick="addCarrinho({codProduto})"><i class="fa fa-shopping-cart"></i> Adicionar ao Carrinho</button></div></div></div>';
            itemAtual = itemAtual.replace("{data}", JSON.stringify(element));
            itemAtual = itemAtual.replace("{codProduto}", element.id);
            itemAtual = itemAtual.replace("{codProduto}", element.id);
            itemAtual = itemAtual.replace("{codProduto}", element.id);
            itemAtual = itemAtual.replace("{img}", element.fl_tipo == 'A' ? "https://mundopossivel.files.wordpress.com/2009/09/agua-2.jpg" : "https://www.chama-app.com.br/img/mobile/botijao-dinheiro.png");
            itemAtual = itemAtual.replace("{tipo}", element.fl_tipo == 'A' ? "ÁGUA" : "GÁS");
            itemAtual = itemAtual.replace("{fornecedor}", element.fornecedor);
            itemAtual = itemAtual.replace("{valor}", element.vl_preco);

            render += itemAtual;
        });
    }

    row.innerHTML = render;
}

function addCarrinho(codProduto) {

    var usuario = localStorage.getItem("usuarioLogado");

    if (usuario == null) {
        window.location.href = 'login.php';
    } else {
        usuario = JSON.parse(usuario);
    }
    debugger
    var data = JSON.parse(document.getElementById("produto" + codProduto).getAttribute('produto'));
    data.quantidade = document.getElementById("qtdProduto" + codProduto).value;
    data.idCarrinho = new Date().getTime();
    usuario.carrinho = Array.isArray(usuario.carrinho) ? usuario.carrinho.concat([data]) : [data];
    localStorage.setItem('usuarioLogado', JSON.stringify(usuario));

    if (usuario.carrinho != null) {
        document.getElementById('qty').hidden = false;
        document.getElementById('qty').innerHTML = usuario.carrinho.length;
    }

    alert("Produto Adicionado ao Carrinho!");
}


