<?php
session_start();
include 'conexao.php';

// Verifica se o ID foi passado na URL
if (!isset($_GET['id']) || empty($_GET['id'])) {
    $_SESSION['mensagem'] = "ID do registro não fornecido.";
    header('Location: list.php');
    exit();
}

// Sanitiza o ID recebido
$id = mysqli_real_escape_string($conexao, trim($_GET['id']));

// Consulta SQL para deletar o registro
$sql_delete = "DELETE FROM alunos WHERE id = $id";

if (mysqli_query($conexao, $sql_delete)) {
    $_SESSION['mensagem'] = "Candidato excluído com sucesso!";
} else {
    $_SESSION['mensagem'] = "Erro ao excluir: <br>" . mysqli_error($conexao);
}

mysqli_close($conexao);

// Redireciona de volta para a lista
header('Location: list.php');
exit();
?>