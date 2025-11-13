<?php
include "conexao.php"; // ligação à base de dados
$mensagem = "";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nome  = $_POST['nome'];
    $email = $_POST['email'];
    $senha = $_POST['senha'];
    $tipo  = $_POST['tipo'];

    // Verifica se o email já existe
    $check = $conn->query("SELECT ID FROM Utilizadores WHERE email='$email' LIMIT 1");
    if ($check && $check->num_rows > 0) {
        $mensagem = "Email já registado.";
    } else {
        // Insere o utilizador na base de dados
        $sql = "INSERT INTO Utilizadores (nome, email, PalavraPasse, TipoUtilizador)
                VALUES ('$nome', '$email', '$senha', '$tipo')";
        if ($conn->query($sql)) {
            $mensagem = "Registo efetuado com sucesso! Podes agora entrar.";
        } else {
            $mensagem = "Erro ao registar: " . $conn->error;
        }
    }
}
?>

<!DOCTYPE html>
<html lang="pt">
<head>
    <meta charset="UTF-8">
    <title>Registar Utilizador</title>
</head>
<body>
    <h2>Registar</h2>
    
    <form method="post">
        Nome:<br>
        <input type="text" name="nome" required><br><br>

        Email:<br>
        <input type="email" name="email" required><br><br>

        Palavra-passe:<br>
        <input type="" name="senha" required><br><br>

        Tipo de Utilizador:<br>
        <select name="tipo" required>
            <option value="aluno">Aluno</option>
            <option value="professor">Professor</option>
            <option value="funcionario">Funcionário</option>
            <option value="admin">Administrador</option>
        </select><br><br>

        <input type="submit" value="Registar">
    </form>
    <p><a href="entrar.php">Voltar ao login</a></p>
</body>
</html>
