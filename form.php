<?php
session_start();
include 'menu.php';
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
							<h2 class="fw-bold">Cadastro do Candidato</h2>
							<!-- Mensagem de cadastro inicio--->
								<?php 
									if(isset($_SESSION['mensagem'])):
								?>
								<div class="alert alert-info alert-dismissible fade show" role="alert">
									<?= $_SESSION['mensagem']; ?>
									<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
								</div>
								
								<?php unset($_SESSION['mensagem']); //limpa mensagem 
									endif;
								?>
						<form action="formulario.php" method="POST">

							<!--Campo Nome-->
							<div class="mb-3">
								<label class="mb-2" for="nome" class="form-label">Nome</label>
								<input id="name" type="text" class="form-control" name="nome" value="" required>
							</div>
							<!--Campo Data Nascimento-->
							<div class="mb-3">
								<label for="data_nasc" class="form-label">Data de Nascimento</label>
								<input type="date" class="form-control" id="data" name="data_nasc" required>
							</div>

							<h2 class="fs-4 card-title fw-bold mb-4">Endereço</h2>
							<div class="row">
								<!--Campo Rua-->
								<div class="col-md-6 mb-3">
									<label for="rua" class="form-label">Rua</label>
									<input type="text" class="form-control" id="rua" name="rua" placeholder="Rua D.Pedro II, N°1539..." required>
								</div>
								<!--Campo Bairro-->
								<div class="col-md-6 mb-3">
									<label for="bairro" class="form-label">Bairro</label>
									<input type="text" class="form-control" id="bairro" name="bairro" required>
								</div>
							</div>
							
							<div class="row">
								<!--Campo CEP-->
								<div class="col-md-6 mb-3">
									<label for="cep" class="form-label">CEP</label>
									<input type="text" class="form-control" id="cep" name="cep" required>
								</div>
								<div class="col-md-6 mb-3">
									<label for="cidade" class="form-label">Cidade</label>
									<input type="text" class="form-control" id="cidade" name="cidade" required>
								</div>
							</div>

							<h2 class="fs-4 card-title fw-bold mb-4">Resposável</h2>
							<div class="row">
								<!--Selecionar tipo de responsavel-->
								<div class="col-md-4 mb-3">
									<label for="tipoResponsavel" class="form-label">Tipo</label>
									<select class="form-select" id="tipoResponsavel" name="tipoResponsavel" required>
										<option selected>Selecione</option>
										<option value="1">Pai</option>
										<option value="2">Mãe</option>
										<option value="3">Tio(a)</option>
										<option value="4">Avô(ó)</option>
										<option value="5">Outro</option>
									</select>
								</div>
								<!--Nome Responsavel-->
								<div class="col-md-8 mb-3">
									<label for="nomeResponsavel" class="form-label">Nome Responsável</label>
									<input type="text" class="form-control" id="nomeResponsavel" name="nomeResponsavel" required>
								</div>
							</div>

							<div class="mb-3">
								<label for="curso" class="form-label">Curso</label>
								<select name="curso" id="" class="form-select">
									<option selected>Selecione</option>
									<option value="1">Enfermagem</option>
									<option value="2">Informática</option>
									<option value="3">Desenvolvimento de Sistemas</option>
									<option value="4">Administração</option>
								</select>
							</div>
							<!--Botao cadastrar-->
							<div class="align-items-center d-flex">
									<button type="submit" class="btn btn-primary ms-auto">Register</button>
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