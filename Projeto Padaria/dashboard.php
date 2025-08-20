<?php
include "proteger.php";

echo "Bem-vindo, " . $_SESSION['usuario'] . "<br>";

if ($_SESSION['funcao'] == 'gerente') {
    echo "<a href='cadastrar.php'>Cadastrar Funcionário</a><br>";
    echo "<a href='listar_funcionarios.php'>Gerenciar Funcionários</a><br>"; 
}
if ($_SESSION['funcao'] == 'gerente' || $_SESSION['funcao'] == 'repositor') {
    echo "<a href='lista_produtos.php'>Ver Lista de Produtos</a><br>"; 
}

echo "<a href='alterar_senha.php'>Alterar Minha Senha</a><br>";
echo "<a href='logout.php'>Sair</a>";
?>