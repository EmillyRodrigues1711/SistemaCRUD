<?php
session_start();
include 'conexao.php';

// 1. Verifica se os campos obrigatórios e o ID estão preenchidos
if (empty($_POST['id']) || empty($_POST['nome']) || empty($_POST['data_nasc']) || empty($_POST['nomeResponsavel'])) {
    $_SESSION['mensagem'] = "Erro: ID ou campos obrigatórios vazios!";
    header('Location: list.php'); // Redireciona para a lista em caso de erro
    exit();
}

// 2. Sanitização e coleta de dados
$id = mysqli_real_escape_string($conexao, trim($_POST['id']));
$nome = mysqli_real_escape_string($conexao, trim($_POST['nome']));
$data_nasc = mysqli_real_escape_string($conexao, trim($_POST['data_nasc']));
$rua = mysqli_real_escape_string($conexao, trim($_POST['rua']));
$bairro = mysqli_real_escape_string($conexao, trim($_POST['bairro']));
$cidade = mysqli_real_escape_string($conexao, trim($_POST['cidade']));
$cep = mysqli_real_escape_string($conexao, trim($_POST['cep']));
$nome_resp = mysqli_real_escape_string($conexao, trim($_POST['nomeResponsavel']));
$tipo_resp = mysqli_real_escape_string($conexao, trim($_POST['tipoResponsavel']));
$curso = mysqli_real_escape_string($conexao, trim($_POST['curso']));

// 4. Monta a query de UPDATE
$sqlAtualizar = "UPDATE alunos SET
                    nome_aluno = '$nome',
                    data_nasc = '$data_nasc',
                    nome_responsavel = '$nome_resp',
                    tipo_responsavel = $tipo_resp,
                    rua = '$rua',
                    bairro = '$bairro',
                    cidade = '$cidade',
                    cep = '$cep',
                    curso = $curso
                WHERE id = $id";

if(mysqli_query($conexao, $sqlAtualizar)){
    $_SESSION['mensagem'] = "Cadastrado editado com sucesso!";
    header('Location: list.php'); // Redireciona para a lista
    exit();
}else{
    $_SESSION['mensagem'] = "Erro ao atualizar: <br>" . mysqli_error($conexao);
    header('Location: editar.php?id=' . $id); // Redireciona de volta para o form de edição
    exit();
}
?>