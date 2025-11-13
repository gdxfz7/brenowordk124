<?php
session_start();
include "conexao.php";
$erro = "";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = $_POST['email'];
    $senha = $_POST['senha'];

    $res = $conn->query("SELECT * FROM Utilizadores WHERE email='$email' LIMIT 1");
    if ($res && $res->num_rows === 1) {
        $user = $res->fetch_assoc();
        if ($senha === $user['PalavraPasse']) {
            $_SESSION['id'] = $user['ID'];
            $_SESSION['nome'] = $user['nome'];
            $_SESSION['tipo'] = $user['TipoUtilizador'];
            header("Location: paginicial.php");
            exit;
        } else {
            $erro = "Palavra-passe incorreta.";
        }
    } else {
        $erro = "Email não encontrado.";
    }
}
?>
<!DOCTYPE html>
<html lang="pt">
<head><meta charset="UTF-8"><title>Entrar</title></head>
<body>
    <h2>Entrar</h2>
    <?php if ($erro) echo "<p style='color:red;'>$erro</p>"; ?>
    <form method="post">
        Email:<br><input type="email" name="email" required><br>
        Palavra-passe:<br><input type="password" name="senha" required><br><br>
        <input type="submit" value="Entrar">
    </form>
    <p><a href="registar.php">Registar</a></p>
</body>
</html>
