function sair() {
    localStorage.removeItem("usuarioLogado");
    window.location.href = 'index.php';
}

function excluir() {
    if (confirm("Tem certeza que deseja excluir sua conta?")) {
        var success = function (obj) {
            alert('Conta excluída!')
            localStorage.removeItem("usuarioLogado");
            window.location.href = 'index.php';
        }

        var dados = JSON.parse(localStorage.getItem("usuarioLogado"));
        var parameters = {
            codUsuario: dados.usuario ? dados.usuario.id : null,
            codPessoa: dados.pessoa ? dados.pessoa.id : null,
            codEndereco: dados.endereco ? dados.endereco.id : null,
            codFornecedor: dados.fornecedor ? dados.fornecedor.id : null,
            codEntregador: dados.entregador ? dados.entregador.id : null
        };

        post_request('http://localhost:8080/services/usuario/excluirconta', success, null, parameters);
    }
}

var dados = JSON.parse(localStorage.getItem("usuarioLogado"));
if (dados && dados.pessoa) {
    document.getElementById("tx_nome").value = dados.pessoa.tx_nome;
    document.getElementById("tx_email").value = dados.pessoa.tx_email;
    document.getElementById("tx_documento").value = dados.pessoa.tx_documento;
    document.getElementById("dt_nascimento").value = dados.pessoa.dt_nascimento;
    document.getElementById("nr_telefone").value = dados.pessoa.nr_telefone;
    document.getElementById("nr_telefonefixo").value = dados.pessoa.nr_telefonefixo;
}

if (dados && dados.endereco) {
    document.getElementById("tx_estado").value = dados.endereco.tx_estado;
    document.getElementById("tx_cidade").value = dados.endereco.tx_cidade;
    document.getElementById("tx_bairro").value = dados.endereco.tx_bairro;
    document.getElementById("tx_rua").value = dados.endereco.tx_rua;
    document.getElementById("nr_numero").value = dados.endereco.nr_numero;
    document.getElementById("nr_cep").value = dados.endereco.nr_cep;
    document.getElementById("tx_complemento").value = dados.endereco.tx_complemento;
}

if (dados && dados.fornecedor) {
    document.getElementById("dadosFornecedor").hidden = false;
    document.getElementById("tx_razaosocial").value = dados.fornecedor.tx_razaosocial;
    document.getElementById("tx_nomefantasia").value = dados.fornecedor.tx_nomefantasia;
    document.getElementById("nr_cnpj").value = dados.fornecedor.nr_cnpj;
    document.getElementById("nr_telefonefornecedor").value = dados.fornecedor.nr_telefone;
    document.getElementById("nr_telefonefixofornecedor").value = dados.fornecedor.nr_telefonefixo;
    document.getElementById("tx_emailfornecedor").value = dados.fornecedor.tx_email;

}

if (dados && dados.entregador) {
    document.getElementById("dadosEntregador").hidden = false;
    document.getElementById("tx_placa").value = dados.entregador.tx_placa;
    document.getElementById("vl_frete").value = dados.entregador.vl_frete;
}

if (dados && dados.usuario) {
    document.getElementById("tx_login").value = dados.usuario.tx_login;
    document.getElementById("tx_senha").value = dados.usuario.tx_senha;
    document.getElementById("adm").hidden = dados.usuario.fl_tipoacesso=='C';
}

function editar() {

    //dados obrigatorios da pessoa
    if (campoInvalido('tx_nome') || campoInvalido('tx_email') ||
        campoInvalido('tx_documento') || campoInvalido('dt_nascimento') || campoInvalido('nr_telefone') ||
        campoInvalido('nr_telefonefixo') || campoInvalido('tx_estado') || campoInvalido('tx_cidade') ||
        campoInvalido('tx_bairro') || campoInvalido('tx_rua') || campoInvalido('nr_numero') ||
        campoInvalido('nr_cep') || campoInvalido('tx_complemento') || campoInvalido('tx_senha') || campoInvalido('tx_login')) {
        alert("Todos os campos são obrigatórios! Preencha os campos corretamente!");
        return;
    }

    var usuario = JSON.parse(localStorage.usuarioLogado);
    var tipoAcesso = usuario.usuario.fl_tipoacesso;

    //dados obrigatorios do fornecedor
    if (tipoAcesso == 'F' && (campoInvalido('tx_razaosocial') || campoInvalido('tx_nomefantasia') || campoInvalido('nr_cnpj') ||
        campoInvalido('nr_telefonefornecedor') || campoInvalido('nr_telefonefixofornecedor') || campoInvalido('tx_emailfornecedor'))) {
        alert("Todos os campos são obrigatórios! Preencha os campos corretamente!");
        return;
    }

    //dados obrigatorios do entregador
    if (tipoAcesso == 'E' && (campoInvalido('tx_placa') || campoInvalido('vl_frete'))) {
        alert("Todos os campos são obrigatórios! Preencha os campos corretamente!");
        return;
    }

    var success = function (obj) {
        if (obj) {
            localStorage.setItem('usuarioLogado', JSON.stringify(obj));
            alert("Cadastro editado com Sucesso!");
        } else {
            alert('Falha ao editar!');
        }
    }

    var parameters = {
        pessoa: {
            "id": usuario.pessoa.id,
            "nome": document.getElementById('tx_nome').value,
            "email": document.getElementById('tx_email').value,
            "documento": document.getElementById('tx_documento').value,
            "dataNascimento": document.getElementById('dt_nascimento').value,
            "telefone": document.getElementById('nr_telefone').value,
            "telefoneFixo": document.getElementById('nr_telefonefixo').value
        },
        endereco: {
            "id": usuario.endereco.id,
            "estado": document.getElementById('tx_estado').value,
            "cidade": document.getElementById('tx_cidade').value,
            "bairro": document.getElementById('tx_bairro').value,
            "rua": document.getElementById('tx_rua').value,
            "numero": document.getElementById('nr_numero').value,
            "cep": document.getElementById('nr_cep').value,
            "complemento": document.getElementById('tx_complemento').value
        },

        fornecedor: {
            "id": usuario.fornecedor ? usuario.fornecedor.id : null,
            "razaoSocial": document.getElementById('tx_razaosocial').value,
            "nomeFantasia": document.getElementById('tx_nomefantasia').value,
            "numeroCnpj": document.getElementById('nr_cnpj').value,
            "numeroTelefone": document.getElementById('nr_telefonefornecedor').value,
            "numeroTelefoneFixo": document.getElementById('nr_telefonefixofornecedor').value,
            "email": document.getElementById('tx_emailfornecedor').value
        },
        entregador: {
            "id": usuario.entregador ? usuario.entregador.id : null,
            "placa": document.getElementById('tx_placa').value,
            "valorFrete": document.getElementById('vl_frete').value
        },
        usuario: {
            "id": usuario.usuario.id,
            "login": document.getElementById('tx_login').value,
            "senha": document.getElementById('tx_senha').value,
            "tipoAcesso": tipoAcesso
        }
    };

    post_request('http://localhost:8080/services/pessoa/editar', success, null, parameters);
};

function campoInvalido(id) {
    var value = document.getElementById(id).value;
    if (value == null || value == undefined || value == '') {
        return true;
    }

    return false;
}


