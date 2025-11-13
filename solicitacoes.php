<?php
session_start();
include "conexao.php";
if (!isset($_SESSION['id'])) header("Location: entrar.php");

$msg = "";
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $local = $_POST['local'];
    $tipo  = $_POST['tipo'];
    $desc  = $_POST['descricao'];

    $sql = "INSERT INTO Solicitacoes (UtilizadorID, `Local`, TipoProblema, Descricao, DataSolicitacao)
            VALUES ({$_SESSION['id']}, '$local', '$tipo', '$desc', NOW())";
    if ($conn->query($sql)) $msg = "Solicitação criada com sucesso!";
    else $msg = "Erro: " . $conn->error;
}
?>
<!DOCTYPE html>
<html lang="pt">
<head><meta charset="UTF-8"><title>Nova Solicitação</title></head>
<body>
    <h2>Nova Solicitação</h2>
    <?php if ($msg) echo "<p>$msg</p>"; ?>
    <form method="post">
        Local:<br><input type="text" name="local" required><br>
        Tipo:<br>
        <select name="tipo">
            <option>Elétrico</option>
            <option>Canalização</option>
            <option>Equipamento</option>
            <option>Limpeza</option>
            <option>Outro</option>
        </select><br>
        Descrição:<br><textarea name="descricao" required></textarea><br><br>
        <input type="submit" value="Enviar Pedido">
    </form>
    <p><a href="painelinicial.php">Voltar</a></p>
</body>
</html>
