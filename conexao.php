<?php
    ####CONEXÃO COM BANCO
    define('HOST', 'localhost');
    define('USUARIO', 'root');
    define('SENHA', '');
    define('BD', 'login');

    $conexao = mysqli_connect(HOST, USUARIO, SENHA, BD) or die('Não foi possivel conectar ao banco');
?>