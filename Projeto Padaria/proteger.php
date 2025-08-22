<?php
session_start();

if (!isset($_SESSION['usuario']) || !isset($_SESSION['funcao'])) {
    // Se não estiver logado, redireciona para a tela de login
    header("Location: entrar.php");
    exit();
}

// Regras adicionais (caso você queira impedir acesso manual a páginas indevidas)
$funcoes_permitidas = ['gerente', 'funcionario', 'repositor'];

if (!in_array(strtolower($_SESSION['funcao']), $funcoes_permitidas)) {
    echo "Função de usuário inválida.";
    session_destroy();
    exit();
}
?>
