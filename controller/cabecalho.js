//controller
if (localStorage.getItem('usuarioLogado') == null) {
    document.getElementById('spanPerfil').innerHTML = 'Login';
    document.getElementById('btnPerfil').href = 'login.php';

} else if (JSON.parse(localStorage.getItem('usuarioLogado')).carrinho != null) {
    document.getElementById('qty').hidden = false;
    document.getElementById('qty').innerHTML = JSON.parse(localStorage.getItem('usuarioLogado')).carrinho.length;
}