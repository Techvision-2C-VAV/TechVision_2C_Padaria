<?php
include "proteger.php";
if ($_SESSION['funcao'] != 'gerente') {
    die("Acesso negado.");
}
?>

<a href='dashboard.php'>Voltar</a><br><br>

<h2>Cadastrar Funcionários</h2>

<form method="POST">
    <input type="text" name="usuario" placeholder="Usuário" required>
    <input type="password" name="senha" placeholder="Senha" required>
    <input type="text" name="nome" placeholder="Nome completo" required>
    <input type="email" name="email" placeholder="Email" required>
    <select name="funcao">
        <option value="gerente">Gerente</option>
        <option value="funcionario">Funcionário</option>
        <option value="funcionario">Repositor</option>
    </select>
    <button type="submit">Cadastrar</button>
    <p>A senha deve ter entre 8 e 16 caracteres, com letras maiúsculas, minúsculas e números.</p>

</form>

<?php
include "conexao.php";

function validarSenha($senha) {
    return preg_match('/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)[A-Za-z\d]{8,16}$/', $senha);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $usuario = $_POST['usuario'];
    $senha = $_POST['senha'];
    $nome = $_POST['nome'];
    $email = $_POST['email'];
    $funcao = $_POST['funcao'];
    if (!validarSenha($senha)) {
        die("Senha Inválida!");
    }

    $senhaCriptografada = password_hash($senha, PASSWORD_DEFAULT);

    $stmt = $conn->prepare("INSERT INTO funcionarios (usuario, senha, nome_completo, email, funcao) VALUES (?, ?, ?, ?, ?)");
    $stmt->bind_param("sssss", $usuario, $senhaCriptografada, $nome, $email, $funcao);

    if ($stmt->execute()) {
        echo "Funcionário cadastrado com sucesso.";
    } else {
        echo "Erro: " . $stmt->error;
    }
}

?>