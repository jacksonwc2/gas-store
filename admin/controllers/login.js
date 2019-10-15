//controller da pagina login

$("#login").submit(function (event) {
    debugger
    var success = function (obj) {
        if (obj) {
            debugger
            localStorage.setItem('usuarioLogado', JSON.stringify(obj));
            setTimeout(window.location.href = 'index.php', 1000);
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