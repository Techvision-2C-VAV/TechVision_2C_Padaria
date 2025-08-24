<!DOCTYPE html>
<html lang="pt-BR">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Login</title>
  <style>
    body {
      font-family: 'Poppins', sans-serif;
      background-color: #fff9ef; /* bege claro */
      display: flex;
      justify-content: center;
      align-items: center;
      height: 100vh;
      margin: 0;
    }

    .login-container {
      background: #fffdfa;
      padding: 2.5rem;
      border-radius: 20px;
      box-shadow: 0 6px 15px rgba(0, 0, 0, 0.1);
      width: 350px;
      text-align: center;
    }

    .login-container h2 {
      color: #222;
      margin-bottom: 1.5rem;
      font-size: 1.8rem;
    }

    .login-container label {
      display: block;
      text-align: left;
      margin: 0.8rem 0 0.3rem;
      font-weight: 500;
      color: #333;
    }

    .login-container input {
      width: 100%;
      padding: 0.8rem;
      border: 1.5px solid #e0e0e0;
      border-radius: 12px;
      outline: none;
      font-size: 1rem;
      transition: 0.3s;
      background: #fff;
    }

    .login-container input:focus {
      border-color: #f4a300; /* amarelo dourado */
      box-shadow: 0 0 5px rgba(244, 163, 0, 0.4);
    }

    .login-container button {
      margin-top: 1.5rem;
      width: 100%;
      padding: 0.9rem;
      background: #f4a300;
      border: none;
      border-radius: 12px;
      font-size: 1.1rem;
      font-weight: bold;
      color: #fff;
      cursor: pointer;
      transition: 0.3s;
      box-shadow: 0 4px 10px rgba(244, 163, 0, 0.3);
    }

    .login-container button:hover {
      background: #d88d00;
    }
  </style>
</head>
<body>
  <div class="login-container">
    <h2>Entrar</h2>
    <form method="POST" action="login.php">
      <label for="usuario">Usuário:</label>
      <input type="text" id="usuario" name="usuario" required>

      <label for="senha">Senha:</label>
      <input type="password" id="senha" name="senha" required>

      <button type="submit">Entrar</button>
    </form>
  </div>
</body>
</html>
