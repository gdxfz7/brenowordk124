<?php
session_start();
include "conexao.php";
if (!isset($_SESSION['id'])) header("Location: entrar.php");

$res = $conn->query("SELECT ID, `Local`, TipoProblema, Descricao, DataSolicitacao, Estado
                     FROM Solicitacoes WHERE UtilizadorID={$_SESSION['id']} ORDER BY DataSolicitacao DESC");
?>
<!DOCTYPE html>
<html lang="pt">
<head><meta charset="UTF-8"><title>Minhas Solicitações</title></head>
<body>
    <h2>Minhas Solicitações</h2>
    <table border="1" cellpadding="6">
        <tr><th>ID</th><th>Local</th><th>Tipo</th><th>Descrição</th><th>Data</th><th>Estado</th></tr>
        <?php while ($r = $res->fetch_assoc()) { ?>
            <tr>
                <td><?= $r['ID'] ?></td>
                <td><?= $r['Local'] ?></td>
                <td><?= $r['TipoProblema'] ?></td>
                <td><?= $r['Descricao'] ?></td>
                <td><?= $r['DataSolicitacao'] ?></td>
                <td><?= $r['Estado'] ?></td>
            </tr>
        <?php } ?>
    </table>
    <p><a href="painelinicial.php">Voltar</a></p>
</body>
</html>

