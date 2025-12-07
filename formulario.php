<?php
session_start();
include 'conexao.php';

//verifica se os campos estão vazios
if (empty($_POST['nome']) || empty($_POST['data_nasc']) || empty($_POST['nomeResponsavel'])) {
    $_SESSION['mensagem'] = "Preencha todos os campos!";
    header('Location: form.php');
    exit();
}

//sanitização
$nome = mysqli_real_escape_string($conexao, trim($_POST['nome']));
$data_nasc = mysqli_real_escape_string($conexao, trim($_POST['data_nasc']));
$rua = mysqli_real_escape_string($conexao, trim($_POST['rua']));
$bairro = mysqli_real_escape_string($conexao, trim($_POST['bairro']));
$cidade = mysqli_real_escape_string($conexao, trim($_POST['cidade']));
$cep = mysqli_real_escape_string($conexao, trim($_POST['cep']));
$nome_resp = mysqli_real_escape_string($conexao, trim($_POST['nomeResponsavel']));
$tipo_resp = mysqli_real_escape_string($conexao, trim($_POST['tipoResponsavel']));
$curso = mysqli_real_escape_string($conexao, trim($_POST['curso']));

$sql = "SELECT count(*) AS total FROM alunos WHERE nome_aluno = '$nome' ";
$result = mysqli_query($conexao, $sql);
$row = mysqli_fetch_assoc($result);

if($row['total'] > 0){
    $_SESSION['mensagem'] = "Nome já cadastrado!";
    header('Location: form.php');
    exit();
}

//inserir aluno
$sqlInserir = "INSERT INTO alunos(nome_aluno, data_nasc, nome_responsavel, tipo_responsavel, rua, bairro, cidade, cep, curso)
VALUES('$nome', '$data_nasc', '$nome_resp', $tipo_resp, '$rua', '$bairro', '$cidade', '$cep', $curso)";

if(mysqli_query($conexao, $sqlInserir)){
    $_SESSION['mensagem'] = "Candidato cadastrado com sucesso!";
    header('Location: form.php');
    exit();
}else{
    $_SESSION['mensagem'] = "Erro ao cadastrar: <br>" . mysqli_error($conexao);
    header('Location: form.php');
    exit();
}

?>