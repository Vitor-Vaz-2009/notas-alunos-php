# Agenda 6 - Notas dos Alunos

## Sobre o projeto

Este projeto foi desenvolvido como atividade da Agenda 6, utilizando PHP e MySQL.

O objetivo foi criar uma página web capaz de se conectar a um banco de dados MySQL e exibir as notas dos alunos de forma organizada.

## Funcionalidades

- Conexão do PHP com o banco de dados MySQL.
- Exibição dos alunos e suas quatro notas.
- Cálculo da média das notas.
- Organização dos alunos em um ranking pela maior média.
- Pesquisa de alunos pelo nome.
- Tabela estilizada com CSS.

## Tecnologias utilizadas

- PHP
- MySQL
- HTML
- CSS
- XAMPP
- W3.CSS

## Banco de dados

O projeto utiliza o banco de dados `pwii`.

A tabela utilizada é:

`alunoconcluinte`

Ela possui os seguintes dados:

- Código do aluno
- Nome
- Nota 1
- Nota 2
- Nota 3
- Nota 4

## Como executar

1. Instale o XAMPP.
2. Inicie o Apache e o MySQL.
3. Coloque os arquivos do projeto dentro da pasta:

`C:\xampp\htdocs\Agenda6`

4. Crie o banco de dados `pwii` no phpMyAdmin.
5. Crie a tabela `alunoconcluinte` e insira os dados dos alunos.
6. Acesse no navegador:

`http://localhost/Agenda6/`

## Arquivos principais

- `index.php` - Página inicial do projeto.
- `listar.php` - Exibe os alunos, notas, médias, pesquisa e ranking.
- `cadastro.php` - Página de cadastro.
- `cadastroAction.php` - Processa o cadastro.
- `atualizar.php` - Página de atualização.
- `atualizarAction.php` - Processa a atualização.
- `excluir.php` - Página para exclusão.
- `excluirAction.php` - Processa a exclusão.

## Relatório

O relatório da atividade contém os prints do funcionamento do projeto e as perguntas feitas à Inteligência Artificial durante o desenvolvimento.

## Autor

Vitor Vaz
