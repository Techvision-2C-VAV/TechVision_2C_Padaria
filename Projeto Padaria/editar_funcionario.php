<?php
include "proteger.php";

if (trim(strtolower($_SESSION['funcao'])) !== 'gerente') {
    die("Acesso negado.");
}

include "conexao.php";

$id = intval($_GET['id'] ?? 0);

// Busca funcionário que não seja gerente
$sql = "SELECT * FROM funcionarios WHERE idFunc = $id AND funcao <> 'gerente'";
$result = $conn->query($sql);

if ($result->num_rows != 1) {
    die("Funcionário não encontrado ou acesso negado.");
}

$funcionario = $result->fetch_assoc();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $usuario = $_POST['usuario'];
    $nome_completo = $_POST['nome_completo'];
    $email = $_POST['email'];
    $funcao = $_POST['funcao'];

    if ($usuario == '' || $nome_completo == '' || $email == '' || $funcao == '') {
        echo "Preencha todos os campos!";
    } else {
        $sql = "UPDATE funcionarios SET 
            usuario='$usuario', 
            nome_completo='$nome_completo', 
            email='$email', 
            funcao='$funcao' 
            WHERE idFunc = $id";

        if ($conn->query($sql) === TRUE) {
            echo "Atualizado com sucesso! <a href='listar_funcionarios.php'>Voltar</a>";
            exit;
        } else {
            echo "Erro ao atualizar: " . $conn->error;
        }
    }
}
?>

<h2>Editar Funcionário</h2>

<form method="post">
    Usuário:<br>
    <input type="text" name="usuario" value="<?= $funcionario['usuario'] ?>"><br><br>

    Nome completo:<br>
    <input type="text" name="nome_completo" value="<?= $funcionario['nome_completo'] ?>"><br><br>

    Email:<br>
    <input type="email" name="email" value="<?= $funcionario['email'] ?>"><br><br>

    Função:<br>
    <select name="funcao">
        <option value="funcionario" <?= $funcionario['funcao'] == 'funcionario' ? 'selected' : '' ?>>Funcionário</option>
        <option value="outro" <?= $funcionario['funcao'] == 'outro' ? 'selected' : '' ?>>Outro</option>
    </select><br><br>

    <button type="submit">Salvar</button>
</form>
