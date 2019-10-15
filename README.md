# gas-store
Projeto acadêmico, um e-commerce desenvolvido em JS, HTML, CSS e PHP. A única Framework  utilizada, foi o Slim PHP, para a contrução de uma API rest. Banco de dados utilizado foi o PostgresSQL. 

Objetivo final do projeto é permitir que determinado usuário realize uma compra e receba em sua casa o pedido. Isso acontece por 4 níveis de acesso diferentes, sendo eles, clientes, administradores, fornecedores e entregadores.

# Papeis
Administrador: Terá acesso ao painel administrativo e visualizará relatórios sobre as vendas, comissões,produtos etc...
Fornecedor: Terá acesso ao painel administrador para o cadastro, manutenção e relatórios dos seus produtos (CRUD).
Entregador: Terá acesso ao painel administrador para cadastrar o valor de cada viagem e visualizar seus relatórios.
Cliente: Terá acesso ao e-commerce e poderá manipular seus pedidos por meio de um carrinho de compras.

# Como usar

1) Download do composer: https://getcomposer.org/Composer-Setup.exe

2) Instalar composer e selecionar o modo desenvolvedor

3) Executar 'composer update' dentro da pasta 'gas-store/api'

4) Iniciar o server com o comando: 'php -S localhost:808
