<?php
session_start();
include 'menu.php';
include 'conexao.php';

if (!isset($_GET['id']) || empty($_GET['id'])) {
    $_SESSION['mensagem'] = "ID do registro não fornecido para edição.";
    header('Location: list.php');
    exit();
}

$id_aluno = mysqli_real_escape_string($conexao, $_GET['id']);

// 2. Consulta para buscar os dados do aluno
$sql_select = "SELECT * FROM alunos WHERE id = $id_aluno";
$result = mysqli_query($conexao, $sql_select);

if (mysqli_num_rows($result) == 0) {
    $_SESSION['mensagem'] = "Candidato não encontrado.";
    header('Location: list.php');
    exit();
}

$dados_aluno = mysqli_fetch_assoc($result);

mysqli_close($conexao);
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta name="author" content="Muhamad Nauval Azhar">
	<meta name="viewport" content="width=device-width,initial-scale=1">
	<meta name="description" content="This is a login page template based on Bootstrap 5">
	<title>Bootstrap 5 Login Page</title>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet"
		integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
</head>

<body>
	<section class="h-100">
		<div class="container mt-5 mb-5 h-100">
			<div class="col-sm-10 col-md-8 mx-auto p-4">
				<div class="card shadow-lg">
					<div class="card-body p-5">
						<h2 class="fw-bold">Editar Cadastro</h2>
                        <form action="atualizar.php" method="POST">
                            <!-- Mensagem de cadastro inicio--->
                            <?php if (isset($_SESSION['mensagem'])): ?>
                                <div class="alert alert-info alert-dismissible fade show" role="alert">
                                    <?= $_SESSION['mensagem']; ?>
                                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                </div>
                            <?php unset($_SESSION['mensagem']); //limpa mensagem

                            endif;
                            ?>
                            <input type="hidden" name="id" value="<?php echo $id_aluno; ?>">
                            <!--Campo Nome-->
                            <div class="mb-3">
                                <label class="mb-2" for="nome" class="form-label">Nome</label>
                                <input id="name" type="text" class="form-control" name="nome" value="<?php echo htmlspecialchars($dados_aluno['nome_aluno']);?>" required>
                            </div>
                            <!--Campo Data Nascimento-->
                            <div class="mb-3">
                                <label for="data_nasc" class="form-label">Data de Nascimento</label>
                                <input type="date" class="form-control" id="data" name="data_nasc" value="<?php echo $dados_aluno['data_nasc']; ?>" required>
                            </div>

                            <h2 class="fs-4 card-title fw-bold mb-4">Endereço</h2>
                            <div class="row">
                                <!--Campo Rua-->
                                <div class="col-md-6 mb-3">
                                    <label for="rua" class="form-label">Rua</label>
                                    <input type="text" class="form-control" id="rua" name="rua" placeholder="Rua..." value="<?php echo htmlspecialchars($dados_aluno['rua']); ?>" required>
                                </div>
                                <!--Campo Bairro-->
                                <div class="col-md-6 mb-3">
                                    <label for="bairro" class="form-label">Bairro</label>
                                    <input type="text" class="form-control" id="bairro" name="bairro" value="<?php echo htmlspecialchars($dados_aluno['bairro']); ?> " required>
                                </div>
                            </div>

                            <div class="row">
                                <!--Campo CEP-->
                                <div class="col-md-6 mb-3">
                                    <label for="cep" class="form-label" >CEP</label>
                                    <input type="text" class="form-control" id="cep" name="cep" value="<?php echo htmlspecialchars($dados_aluno['cep']); ?>" required>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="cidade" class="form-label">Cidade</label>
                                    <input type="text" class="form-control" id="cidade" name="cidade" value="<?php echo htmlspecialchars($dados_aluno['cidade']); ?>" required>
                                </div>
                            </div>

                            <h2 class="fs-4 card-title fw-bold mb-4">Resposável</h2>
                            <div class="row">
                                <!--Selecionar tipo de responsavel-->
                                <div class="col-md-4 mb-3">
                                    <label for="tipoResponsavel" class="form-label">Tipo</label>
                                    <select class="form-select" id="tipoResponsavel" name="tipoResponsavel" required>
                                        <option selected>Selecione</option>
                                        <option value="1" <?php echo ($dados_aluno['tipo_responsavel'] == 1) ? 'selected' : ''; ?>>Pai</option>
                                        <option value="2" <?php echo ($dados_aluno['tipo_responsavel'] == 2) ? 'selected' : ''; ?>>Mãe</option>
                                        <option value="3" <?php echo ($dados_aluno['tipo_responsavel'] == 3) ? 'selected' : ''; ?>>Tio(a)</option>
                                        <option value="4" <?php echo ($dados_aluno['tipo_responsavel'] == 4) ? 'selected' : ''; ?>>Avô(ó)</option>
                                        <option value="5" <?php echo ($dados_aluno['tipo_responsavel'] == 5) ? 'selected' : ''; ?>>Outro</option>
                                    </select>
                                </div>
                                <!--Nome Responsavel-->
                                <div class="col-md-8 mb-3">
                                    <label for="nomeResponsavel" class="form-label">Nome Responsável</label>
                                    <input type="text" class="form-control" id="nomeResponsavel" name="nomeResponsavel" value="<?php echo htmlspecialchars($dados_aluno['nome_responsavel']); ?>" required>
                                </div>
                            </div>

                            <div class="mb-3">
                                <label for="curso" class="form-label">Curso</label>
                                <select name="curso" id="" class="form-select">
                                    <option selected>Selecione</option>
                                    <option value="1" <?php echo ($dados_aluno['curso'] == 1) ? 'selected' : ''; ?>>Enfermagem</option>
                                    <option value="2" <?php echo ($dados_aluno['curso'] == 2) ? 'selected' : ''; ?>>Informática</option>
                                    <option value="3" <?php echo ($dados_aluno['curso'] == 3) ? 'selected' : ''; ?>>Desenvolvimento de Sistemas</option>
                                    <option value="4" <?php echo ($dados_aluno['curso'] == 4) ? 'selected' : ''; ?>>Administração</option>
                                </select>
                            </div>
                            <!--Botao cadastrar-->
                            <div class="align-items-center d-flex">
                                <button type="submit" class="btn btn-primary ms-auto">
                                    Editar
                                </button>
                            </div>

                        </form>
					</div>
                </div>
			</div>
		</div>
	</section>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script>
</body>
</html>