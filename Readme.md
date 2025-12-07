Sistema CRUD - TRABALHO BANCO DE DADOS
* Produzido por Emilly Rodrigues Silva
* Disciplina ministrada pelo Professor Adeilson Aragão

## INTRODUÇÃO

Este projeto consiste no desenvolvimento de um **Sistema CRUD (Create, Read, Update, Delete)** para **o Sistema de Cadastro de Alunos**. O objetivo principal é demonstrar o ciclo completo de interação entre o banco de dados MySQL e uma interface web construída com PHP. O sistema abrange a inserção de dados via formulário e a apresentação de relatórios e análises através de consultas SQL avançadas. Para validação e robustez, o banco de dados foi populado com **mais de 100 registros**.

------

## TECNOLOGIAS UTILIZADAS

* **PHP:** Utilizado como linguagem de *backend* para a lógica do sistema, processamento de formulários e conexão segura com o banco de dados (via MySQLi/PDO).
* **MySQL:** Sistema Gerenciador de Banco de Dados (SGBD) relacional, gerenciado via **PHPMyAdmin**.
* **Servidor Apache (XAMPP/WAMP):** Ambiente local de desenvolvimento para execução dos scripts PHP.
* **HTML5 / CSS3 / Bootstrap:** Linguagens de *frontend* e framework CSS para garantir um design responsivo e acessível para a interface web.
* **Biblioteca Chart.js:** Biblioteca JavaScript utilizada para a **visualização de dados**, gerando gráficos dinâmicos (barras, pizza, etc.) a partir das consultas de agregação do banco de dados.
* **Git / GitHub:** Plataforma utilizada para controle de versão e entrega do código-fonte do projeto.

------

## ESTRUTURA BANCO DE DADOS (SQL)

O sistema utiliza um banco de dados chamado login. As duas tabelas principais criadas são users (para autenticação) e alunos (para o cadastro principal do sistema CRUD).

## Tabela users(Auteticação)

Esta tabela armazena as credenciais de acesso para a tela de login (index.php). A senha é armazenada utilizando a função de hash MD5, que serve principalmente para verificar a integridade de arquivos, criando uma "impressão digital" única para garantir que não foram alterados ou corrompidos. 

CREATE TABLE users (
    user_id INT(11) NOT NULL PRIMARY KEY AUTO_INCREMENT,
    user_name VARCHAR(100) NOT NULL,
    user_email VARCHAR(150) NOT NULL UNIQUE,
    user_password VARCHAR(32) NOT NULL -- O tamanho 32 é compatível com o hash MD5
);

## Tabela alunos(Cadastro Principal)

Esta é a tabela central para o CRUD do sistema e para a geração de relatórios e gráficos. Ela armazena os dados pessoais, de endereço e de matrícula dos candidatos.

CREATE TABLE alunos(
    id INT AUTO_INCREMENT PRIMARY KEY,
    nome_aluno VARCHAR(100) NOT NULL,
    data_nasc DATE NOT NULL,
    cidade VARCHAR(50) NOT NULL,
    bairro VARCHAR(80) NOT NULL,
    rua VARCHAR(120) NOT NULL,
    cep VARCHAR(10) NOT NULL,
    nome_responsavel VARCHAR(100) NOT NULL,
    tipo_responsavel INT(1) NOT NULL,  -- 1-pai, 2-mãe, etc...
    curso INT(1) NOT NULL -- 1-enfermagem, 2-informatica, etc...
);

---

## CONSULTAS CRIADAS E ANALISES VISUAIS

As 10 consultas abaixo estão implementadas no arquivo painel.php e são a base para a geração dos gráficos, cards e relatórios do sistema. 