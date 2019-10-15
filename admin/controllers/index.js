//controller da pagina login
if(localStorage.usuarioLogado == null || localStorage.usuarioLogado == undefined){
    window.location.href = 'login.php';
}