<?php
session_start();
if (!isset($_SESSION['id'])) header("Location: entrar.php");
?>
<!DOCTYPE html>
<html lang="pt">
<head><meta charset="UTF-8"><title>Painel Inicial</title></head>
<body>
    <h2>Bem-vindo, <?php echo $_SESSION['nome']; ?>!</h2>
    <p>Tipo de utilizador: <?php echo $_SESSION['tipo']; ?></p>
    <p>
        <a href="solicitacoes.php">Nova Solicitação</a><br>
        <a href="minhassolicitacoes.php">Minhas Solicitações</a><br>
        <?php if ($_SESSION['tipo'] === 'admin') echo '<a href="paineladmin.php">Painel Admin</a><br>'; ?>
        <a href="logout.php">Sair</a>
    </p>
</body>
</html>