//cotrollertelade cadastro
function cadastrar() {
    debugger

    //dados obrigatorios da pessoa
    if (campoInvalido('fl_tipoacesso') || campoInvalido('tx_nome') || campoInvalido('tx_email') ||
        campoInvalido('tx_documento') || campoInvalido('dt_nascimento') || campoInvalido('nr_telefone') ||
        campoInvalido('nr_telefonefixo') || campoInvalido('tx_estado') || campoInvalido('tx_cidade') ||
        campoInvalido('tx_bairro') || campoInvalido('tx_rua') || campoInvalido('nr_numero') ||
        campoInvalido('nr_cep') || campoInvalido('tx_complemento') || campoInvalido('tx_senha') || campoInvalido('tx_login')) {
        alert("Todos os campos são obrigatórios! Preencha os campos corretamente!");
        return;
    }

    var tipoAcesso = document.getElementById('fl_tipoacesso').value;

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
            alert("Cadastro efetuado com Sucesso!");
            document.getElementById('cadastroform').reset();
        } else {
            alert('Usuário já existente!');
        }
    }

    var parameters = {
        pessoa: {
            "nome": document.getElementById('tx_nome').value,
            "email": document.getElementById('tx_email').value,
            "documento": document.getElementById('tx_documento').value,
            "dataNascimento": document.getElementById('dt_nascimento').value,
            "telefone": document.getElementById('nr_telefone').value,
            "telefoneFixo": document.getElementById('nr_telefonefixo').value,
            "flagSexo": document.getElementById('fl_sexo').value
        },
        endereco: {
            "estado": document.getElementById('tx_estado').value,
            "cidade": document.getElementById('tx_cidade').value,
            "bairro": document.getElementById('tx_bairro').value,
            "rua": document.getElementById('tx_rua').value,
            "numero": document.getElementById('nr_numero').value,
            "cep": document.getElementById('nr_cep').value,
            "complemento": document.getElementById('tx_complemento').value
        },

        fornecedor: {
            "razaoSocial": document.getElementById('tx_razaosocial').value,
            "nomeFantasia": document.getElementById('tx_nomefantasia').value,
            "numeroCnpj": document.getElementById('nr_cnpj').value,
            "numeroTelefone": document.getElementById('nr_telefonefornecedor').value,
            "numeroTelefoneFixo": document.getElementById('nr_telefonefixofornecedor').value,
            "email": document.getElementById('tx_emailfornecedor').value
        },
        entregador: {
            "placa": document.getElementById('tx_placa').value,
            "valorFrete": document.getElementById('vl_frete').value
        },
        usuario: {
            "login": document.getElementById('tx_login').value,
            "senha": document.getElementById('tx_senha').value,
            "tipoAcesso": document.getElementById('fl_tipoacesso').value
        }
    };

    post_request('http://localhost:8080/services/pessoa/salvar', success, null, parameters);
};

function changeSelect() {
    var value = document.getElementById('fl_tipoacesso').value;
    document.getElementById('dadosFornecedor').hidden = value != 'F';
    document.getElementById('dadosEntregador').hidden = value != 'E';

};

function campoInvalido(id) {
    var value = document.getElementById(id).value;
    if (value == null || value == undefined || value == '') {
        return true;
    }

    return false;
}