<?php
include 'conexao.php'; // Adicione a inclusão da conexão
include 'menu.php';
include 'helper.php';

// 1. Consulta SQL para buscar todos os alunos
$sql = "SELECT   
    a.id,     
    a.nome_aluno, 
    a.data_nasc, 
    a.cidade,
    a.cep,
    a.nome_responsavel,
    a.tipo_responsavel,
    a.curso
    FROM alunos a"; 

$result = mysqli_query($conexao, $sql);

// 2. Transforma o resultado da consulta em um array para uso no loop
$lista_cadastro = mysqli_fetch_all($result, MYSQLI_ASSOC);

mysqli_close($conexao); // Feche a conexão após a consulta
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="author" content="Muhamad Nauval Azhar">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <meta name="description" content="This is a login page template based on Bootstrap 5">
    <title>Bootstrap 5 Login Page</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
</head>

<body>
    <h1 class="text-center mt-4 mb-3">Lista de Alunos Cadastrados</h1>
    <div class="container mt-5 bg-white rounded-2 shadow p-3">
        <div class="table-responsive rounded-3">
            <table class="table table-striped">
                <thead>
                    <tr class="table-success" style="width: 100%;">
                        <th>Nome Candidato</th>
                        <th>Data Nascimento</th>
                        <th>Cidade</th>
                        <th>CEP</th>
                        <th>Nome Resposavel</th>
                        <th>Tipo Resposavel</th>
                        <th>Curso</th>
                        <th>Opções</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach($lista_cadastro as $cadastro) : ?>
                        <tr>
                            <td><?php echo $cadastro['nome_aluno']; ?></td>
                            <td><?php echo traduz_data_exibir($cadastro['data_nasc']); ?></td>
                            <td><?php echo $cadastro['cidade']; ?></td>
                            <td><?php echo $cadastro['cep']; ?></td>
                            <td><?php echo $cadastro['nome_responsavel']; ?></td>
                            <td><?php echo traduz_responsavel($cadastro['tipo_responsavel']); ?></td>
                            <td><?php echo traduz_curso($cadastro['curso']); ?></td>
                
                            <td>
                                <a href="editar.php?id=<?php echo $cadastro['id']; ?>" class="btn btn-md btn-primary">Editar</a>
                                <a href="excluir.php?id=<?php echo $cadastro['id']; ?>" class="btn btn-md btn-danger">Excluir</a>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                    </tbody>
            </table>
        </div>

    </div>
</body>
</html>