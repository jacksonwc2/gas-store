//controller da pagina login

$("#login").submit(function (event) {
    var success = function (obj) {
        if (obj) {
            localStorage.setItem('usuarioLogado', JSON.stringify(obj));
            window.location.href = 'index.php';
        } else {
            alert('Login inválido!');
        }
    }

    var parameters = {
        login: document.getElementById('email').value,
        senha: document.getElementById('senha').value
    };

    post_request('http://localhost:8080/services/autenticacao/login', success, null, parameters);
});