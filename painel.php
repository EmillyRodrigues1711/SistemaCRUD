<?php
session_start();
include 'verifica_login.php';
include 'menu.php';
include 'conexao.php';
include 'helper.php';

// VARIÁVEIS PARA ARMAZENAR RESULTADOS

// Cards/Métricas (Query 6, 7)
$total_alunos = 0;
$media_idade = 0;

// Gráficos (Labels e Data)
$cidades_labels = []; $cidades_data = [];
$cursos_labels = []; $cursos_data = [];
$responsavel_labels = []; $responsavel_data = [];
$bairro_labels = []; $bairro_data = [];
$ano_labels = []; $ano_data = [];

// Relatórios/Tabelas
$alunos_novos = [];
$alunos_crateus_detalhe = [];

//1.GRAFICOS
// Consulta #1: Alunos por Cidade
$sql_cidades = "SELECT cidade, COUNT(id) AS Total FROM alunos GROUP BY cidade ORDER BY Total DESC;";
$result_cidades = mysqli_query($conexao, $sql_cidades);
if ($result_cidades) {
    while ($linha = mysqli_fetch_assoc($result_cidades)) {
        $cidades_labels[] = $linha['cidade'];
        $cidades_data[] = $linha['Total'];
    }
}
// Consulta #2: Alunos por Curso
$sql_cursos = "SELECT curso, COUNT(id) AS Total FROM alunos GROUP BY curso ORDER BY curso;";
$result_cursos = mysqli_query($conexao, $sql_cursos);
if ($result_cursos) {
    while ($linha = mysqli_fetch_assoc($result_cursos)) {
        $cursos_labels[] = traduz_curso($linha['curso']);
        $cursos_data[] = $linha['Total'];
    }
}
// Consulta #3: Tipo de Responsável
$sql_responsavel = "SELECT tipo_responsavel, COUNT(id) AS Total FROM alunos GROUP BY tipo_responsavel;";
$result_responsavel = mysqli_query($conexao, $sql_responsavel);
if ($result_responsavel) {
    while ($linha = mysqli_fetch_assoc($result_responsavel)) {
        $label_traduzida = traduz_responsavel($linha['tipo_responsavel']);
        $responsavel_labels[] = $label_traduzida;
        $responsavel_data[] = $linha['Total'];
    }
}
// Consulta #4: Alunos por Bairro (Apenas Crateús)
$sql_bairro = "SELECT bairro, COUNT(id) AS Total FROM alunos WHERE cidade = 'Crateús' GROUP BY bairro HAVING Total > 1 ORDER BY Total DESC;";
$result_bairro = mysqli_query($conexao, $sql_bairro);
if ($result_bairro) {
    while ($linha = mysqli_fetch_assoc($result_bairro)) {
        $bairro_labels[] = $linha['bairro'];
        $bairro_data[] = $linha['Total'];
    }
}
// Consulta #5: Distribuição de Idade (Ano de Nascimento)
$sql_ano = "SELECT YEAR(data_nasc) AS Ano, COUNT(id) AS Total FROM alunos GROUP BY Ano ORDER BY Ano;";
$result_ano = mysqli_query($conexao, $sql_ano);
if ($result_ano) {
    while ($linha = mysqli_fetch_assoc($result_ano)) {
        $ano_labels[] = $linha['Ano'];
        $ano_data[] = $linha['Total'];
    }
}

//2.CARDS

// Consulta #6: Total Geral de Alunos
$sql_total = "SELECT COUNT(id) AS Total FROM alunos;";
$result_total = mysqli_query($conexao, $sql_total);
if ($result_total) {
    $linha = mysqli_fetch_assoc($result_total);
    $total_alunos = $linha['Total'] ?? 0;
}
// Consulta #7: Média de Idade
$sql_media_idade = "SELECT AVG(YEAR(CURDATE()) - YEAR(data_nasc)) AS Media_Idade FROM alunos;";
$result_media_idade = mysqli_query($conexao, $sql_media_idade);
if ($result_media_idade) {
    $linha = mysqli_fetch_assoc($result_media_idade);
    // Arredonda para uma casa decimal
    $media_idade = round($linha['Media_Idade'] ?? 0, 1);
}

// 3. CONSULTAS DE RELATÓRIOS (TABELAS - Queries 8, 9, 10)

// Consulta #9: Alunos Mais Novos (Top 5)
$sql_novos = "SELECT nome_aluno, data_nasc, nome_responsavel FROM alunos ORDER BY data_nasc DESC LIMIT 5;";
$result_novos = mysqli_query($conexao, $sql_novos);
if ($result_novos) {
    $alunos_novos = mysqli_fetch_all($result_novos, MYSQLI_ASSOC);
}
// Consulta #10: Alunos de Crateús com Detalhe de Endereço (NOVA)
$sql_crateus_detalhe = "SELECT nome_aluno, rua, bairro, cep FROM alunos WHERE cidade = 'Crateús' ORDER BY bairro, nome_aluno LIMIT 5;";
$result_crateus_detalhe = mysqli_query($conexao, $sql_crateus_detalhe);
if ($result_crateus_detalhe) {
    $alunos_crateus_detalhe = mysqli_fetch_all($result_crateus_detalhe, MYSQLI_ASSOC);
}

//Preparação JSON para JAVASCRIPT
// Cursos
$json_cursos_labels = json_encode($cursos_labels);
$json_cursos_data = json_encode($cursos_data);

// Cidades
$json_cidades_labels = json_encode($cidades_labels);
$json_cidades_data = json_encode($cidades_data);

// Responsável
$json_responsavel_labels = json_encode($responsavel_labels);
$json_responsavel_data = json_encode($responsavel_data);

// Bairro
$json_bairro_labels = json_encode($bairro_labels);
$json_bairro_data = json_encode($bairro_data);

// Ano de Nascimento
$json_ano_labels = json_encode($ano_labels);
$json_ano_data = json_encode($ano_data);

mysqli_close($conexao);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <title>Painel - Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/chart.js@4.4.1/dist/chart.umd.min.js"></script>
</head>

<body>
    <section>
        <div class="container">
            <h1 class="text-center mb-4">Página Inicial - Dashboard</h1>
            <!--CARDS--->
            <div class="row">
                <!-- Card 1: Total Geral (Query #6) -->
                <div class="col-lg-4 col-md-6 mb-4">
                    <div class="card shadow-lg">
                        <div class="card-body p-4 text-center">
                            <h5 class="card-title text-primary">Total de Candidatos</h5>
                            <hr>
                            <p class="display-5 fw-bold">
                                <!---Exibe o total de registros-->
                                <?php echo $total_alunos; ?>
                            </p>
                        </div>
                    </div>
                </div>
                <!-- Card 2: Média de Idade (Query #7) -->
                <div class="col-lg-4 col-md-6 mb-4">
                    <div class="card shadow-lg">
                        <div class="card-body p-4 text-center">
                            <h5 class="card-title text-success">Média de Idade dos Alunos</h5>
                            <hr>
                            <p class="display-5 fw-bold">
                                <?php echo $media_idade . "<small> anos </small>"; ?>
                            </p>
                        </div>
                    </div>
                </div>
                <!-- Card 3: Cidades Atendidas (Baseado na Query #1) -->
                <div class="col-lg-4 col-md-6 mb-4">
                    <div class="card shadow-lg">
                        <div class="card-body p-4 text-center">
                            <h5 class="card-title text-primary">Total de Cidades Atendidas</h5>
                            <hr>
                            <p class="display-5 fw-bold">
                                <?php echo count($cidades_labels); ?>
                            </p>
                        </div>
                    </div>
                </div>
            </div>
            <!-- LINHA DE GRÁFICOS PRINCIPAIS -->
            <div class="row">
                <!-- Gráfico 1: Distribuição por Curso (Query #2) -->
                <div class="col-lg-6 col-md-12 mb-4">
                    <div class="card shadow-lg">
                        <div class="card-body p-4">
                            <h5 class="card-title text-center mb-3">Distribuição de Alunos por Curso</h5>
                            <div style="height: 350px;">
                                <canvas id="graficoCursos"></canvas>
                            </div>
                        </div>
                    </div>
                </div>
    
                <!-- Gráfico 2: Alunos por Cidade (Query #1) -->
                <div class="col-lg-6 col-md-12 mb-4">
                    <div class="card shadow-lg">
                        <div class="card-body p-4">
                            <h5 class="card-title text-center mb-3">Alunos por Cidade de Origem</h5>
                            <div style="height: 350px;">
                                <canvas id="graficoCidades"></canvas>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- LINHA DE GRÁFICOS SECUNDÁRIOS -->
            <div class="row">
                <!-- Gráfico 3: Tipo de Responsável (Query #3) -->
                <div class="col-lg-4 col-md-12 mb-4">
                    <div class="card shadow-lg">
                        <div class="card-body p-4">
                            <h5 class="card-title text-center mb-3">Tipo de Responsável</h5>
                            <div style="height: 250px;">
                                <canvas id="graficoResponsavel"></canvas>
                            </div>
                        </div>
                    </div>
                </div>
    
                <!-- Gráfico 4: Distribuição por Bairro (Crateús) (Query #4) -->
                <div class="col-lg-4 col-md-12 mb-4">
                    <div class="card shadow-lg">
                        <div class="card-body p-4">
                            <h5 class="card-title text-center mb-3">Distribuição de Alunos (Bairros de Crateús)</h5>
                            <div style="height: 250px;">
                                <canvas id="graficoBairro"></canvas>
                            </div>
                        </div>
                    </div>
                </div>
    
                <!-- Gráfico 5: Alunos por Ano de Nascimento (Query #5) -->
                <div class="col-lg-4 col-md-12 mb-4">
                    <div class="card shadow-lg">
                        <div class="card-body p-4">
                            <h5 class="card-title text-center mb-3">Alunos por Ano de Nascimento</h5>
                            <div style="height: 250px;">
                                <canvas id="graficoAno"></canvas>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!---LINHA DE TABELAS DE RELATORIO--->
            <div class="row">
                <!-- Tabela 1: Alunos Mais Novos (Query #9) -->
                <div class="col-lg-6 mb-4">
                    <div class="card shadow-lg">
                        <div class="card-body p-4">
                            <h5 class="card-title text-secondary">Top 5 Alunos Mais Novos</h5>
                            <table id="tabelaNovos" class="table table-striped table-hover" style="width:100%">
                                <thead>
                                    <tr>
                                        <th>Nome do Aluno</th>
                                        <th>Data Nasc.</th>
                                        <th>Responsável</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($alunos_novos as $aluno): ?>
                                        <tr>
                                            <td><?php echo htmlspecialchars($aluno['nome_aluno']); ?></td>
                                            <td><?php echo date('d/m/Y', strtotime($aluno['data_nasc'])); ?></td>
                                            <td><?php echo htmlspecialchars($aluno['nome_responsavel']); ?></td>
                                        </tr>
                                    <?php endforeach; ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <!-- Tabela 2: Alunos de Crateús Detalhado (Query #10) -->
                <div class="col-lg-6 mb-4">
                    <div class="card shadow-lg">
                        <div class="card-body p-4">
                            <h5 class="card-title text-primary">Alunos de Crateús - Detalhe de Endereço</h5>
                            <table id="tabelaCrateusDetalhe" class="table table-striped table-hover" style="width:100%">
                                <thead>
                                    <tr>
                                        <th>Nome do Aluno</th>
                                        <th>Rua</th>
                                        <th>Bairro</th>
                                        <th>CEP</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($alunos_crateus_detalhe as $aluno): ?>
                                        <tr>
                                            <td><?php echo htmlspecialchars($aluno['nome_aluno']); ?></td>
                                            <td><?php echo htmlspecialchars($aluno['rua']); ?></td>
                                            <td><?php echo htmlspecialchars($aluno['bairro']); ?></td>
                                            <td><?php echo htmlspecialchars($aluno['cep']); ?></td>
                                        </tr>
                                    <?php endforeach; ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        </div>
    </section>


    <script>
        const backgroundColors = [
            'rgba(177, 5, 5, 0.9)', // Vermelho
            'rgba(5, 152, 165, 0.87)', // Azul
            'rgba(173, 162, 8, 0.81)', // Amarelo
            'rgba(10, 153, 18, 0.87)', // Verde
            'rgba(135, 8, 185, 0.86)', // Roxo
            'rgba(218, 94, 11, 0.93)', // Laranja
            'rgba(25, 16, 107, 0.86)', // Azul Escuro
        ];
        // 1. DADOS INJETADOS DO PHP (JSON)
        const labelsCursos = <?php echo $json_cursos_labels; ?>;
        const dataCursos = <?php echo $json_cursos_data; ?>;

        // Cidades (Query #1)
        const labelsCidades = <?php echo $json_cidades_labels; ?>;
        const dataCidades = <?php echo $json_cidades_data; ?>;

        // Tipo de Responsável (Query #3)
        const labelsResponsavel = <?php echo $json_responsavel_labels; ?>;
        const dataResponsavel = <?php echo $json_responsavel_data; ?>;

        // Bairros (Query #4)
        const labelsBairro = <?php echo $json_bairro_labels; ?>;
        const dataBairro = <?php echo $json_bairro_data; ?>;

        // Ano de Nascimento (Query #5)
        const labelsAno = <?php echo $json_ano_labels; ?>;
        const dataAno = <?php echo $json_ano_data; ?>;


        // 2. FUNÇÃO PARA CRIAR GRÁFICOS

        function createChart(id, type, labels, data, chartLabel, backgroundColor) {
            // Se o array de dados estiver vazio, a função não será executada e o gráfico não será desenhado.
            if (data.length === 0) {
                // Opcional: Adicionar uma mensagem de 'Sem Dados' ao invés do canvas vazio
                const container = document.getElementById(id).parentNode;
                container.innerHTML = '<div class="text-center p-5 text-muted">Sem dados disponíveis para este gráfico.</div>';
                return;
            }

            const ctx = document.getElementById(id);
            new Chart(ctx, {
                type: type,
                data: {
                    labels: labels,
                    datasets: [{
                        label: chartLabel,
                        data: data,
                        backgroundColor: backgroundColor || backgroundColors,
                        borderColor: '#333',
                        borderWidth: 1
                    }]
                },
                options: {
                    responsive: true,
                    maintainAspectRatio: false,
                    plugins: {
                        legend: {
                            display: type !== 'bar', // Esconde a legenda para Gráficos de Barra (fica no eixo X)
                            position: 'bottom',
                        },
                        title: {
                            display: false,
                        }
                    },
                    scales: {
                        y: {
                            beginAtZero: true,
                            display: type === 'bar' || type === 'line', // Mostra eixo Y para barra/linha
                            ticks: {
                                precision: 0, // Apenas números inteiros
                                stepSize: 1
                            }
                        }
                    }
                }
            });
        }

        // 3. CRIAÇÃO DOS GRÁFICOS

        // Gráfico 1: Cursos (MANTIDO E MELHORADO)
        createChart('graficoCursos', 'bar', labelsCursos, dataCursos, 'Contagem de Candidatos', backgroundColors);

        // Gráfico 2: Cidades
        createChart('graficoCidades', 'bar', labelsCidades, dataCidades, 'Alunos por Cidade', backgroundColors);

        // Gráfico 3: Tipo de Responsável
        createChart('graficoResponsavel', 'pie', labelsResponsavel, dataResponsavel, 'Tipos de Responsáveis', backgroundColors);

        // Gráfico 4: Bairros
        createChart('graficoBairro', 'bar', labelsBairro, dataBairro, 'Alunos por Bairro', backgroundColors.slice(0, 7)); // Apenas 5 cores

        // Gráfico 5: Ano de Nascimento
        createChart('graficoAno', 'line', labelsAno, dataAno, 'Total de Alunos', ['rgba(54, 162, 235, 0.8)']);


        // 3. INICIALIZAÇÃO DE DATATABLES
        $(document).ready(function () {
            // Tabela 1: Top 5 Alunos Novos
            $('#tabelaNovos').DataTable({
                "pageLength": 5, 
                "ordering": false, // Não permite ordenação
                "searching": false, // Não permite pesquisa
                "paging": false, // Não permite paginação
                "info": false, // Esconde informações
                "language": { "url": "//cdn.datatables.net/plug-ins/2.0.8/i18n/pt-BR.json" }
            });
            // Tabela 6: Alunos de Crateús Detalhado
            $('#tabelaCrateusDetalhe').DataTable({
                 "pageLength": 10,
                 "language": { "url": "//cdn.datatables.net/plug-ins/2.0.8/i18n/pt-BR.json" },
                 "order": [[2, 'asc']] // Ordena por Bairro (coluna 2)
            });
        });
    </script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>

</html>