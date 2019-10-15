//controller de produtos

$("#cadastro-produto").submit(function (event) {
    debugger
    var success = function (obj) {
        if (obj) {
            alert('Produto salvo com sucesso!');
            document.getElementById('cadastro-produto').reset();
        } else { 
            alert('Falha ao salvar produto');
        }
    }

    var parameters = {
        tipo: document.getElementById('tipoProduto').value,
        marca: document.getElementById('marcaProduto').value,
        volume: document.getElementById('volumeProduto').value,
        preco: document.getElementById('precoProduto').value,
        unidadeMedida: document.getElementById('unidadeMedidaProduto').value,
        codFornecedor: JSON.parse(localStorage.usuarioLogado).fornecedor.id
    };

    post_request('http://localhost:8080/services/produto/salvar', success, null, parameters);
});