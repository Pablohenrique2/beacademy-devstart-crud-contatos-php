<?php

function home()
{
  include "./issets/telas/home.php";
}
function login()
{
  include "./issets/telas/login.php";
}
function cadastro()
{
  if ($_POST) {
    if (!empty($_POST['nome']) && strlen($_POST['nome']) > 3 && strlen($_POST['nome']) < 100) {
      $nome = $_POST['nome'];
    } else {
      echo "preencha o campo Nome corretamente: <a href='/cadastro'>Voltar</a>";
      die();
    }
    if (!empty($_POST['email']) && filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
      $email = $_POST['email'];
    } else {
      echo "preencha o campo Email corretamente: <a href='/cadastro'>Voltar</a>";
      die();
    }
    if (!empty($_POST['telefone']) && strlen($_POST['telefone']) > 9 && strlen($_POST['telefone']) < 12) {
      $telefone = $_POST['telefone'];
    } else {
      echo "preencha o campo de telefone corretamente: <a href='/cadastro'>Voltar</a>";
      die();
    }
    $arquivo = fopen("./issets/dados/contatos.csv", 'a+');
    fwrite($arquivo, "{$nome};{$email};{$telefone}" . PHP_EOL);
    fclose($arquivo);
    $mensagem = "Pronto,cadastro realizado";
    include "issets/telas/mensagem.php";
  }

  include "./issets/telas/cadastro.php";
}
function admin()
{
  include "./issets/telas/admin.php";
}
function erro()
{
  include "./issets/telas/error.php";
}
function listar()
{
  $contatos = file("./issets/dados/contatos.csv");

  include "./issets/telas/listar.php";
}
function excluir()
{
  $id = $_GET["id"];
  $contatos = file("./issets/dados/contatos.csv");
  unset($contatos[$id]);
  unlink("./issets/dados/contatos.csv");
  $arquivo = fopen("./issets/dados/contatos.csv", "a+");
  foreach ($contatos as $cadaContatos) {
    fwrite($arquivo, $cadaContatos);
  }
  $mensagem = "Contato excluído";
  include "issets/telas/mensagem.php";
}
function editar()
{
  $id = $_GET['id'];
  $contatos = file("./issets/dados/contatos.csv");


  if ($_POST) {
    $nome = $_POST['nome'];
    $email = $_POST['email'];
    $telefone = $_POST['telefone'];
    $contatos[$id] = "{$nome};{$email};{$telefone}" . PHP_EOL;
    unlink("./issets/dados/contatos.csv");
    $arquivo = fopen("./issets/dados/contatos.csv", "a+");
    foreach ($contatos as $cadaContatos) {
      fwrite($arquivo, $cadaContatos);
    }
    fclose($arquivo);
    $mensagem = "dados atualizado";
    include "issets/telas/mensagem.php";
  }
  $dados = explode(";", $contatos[$id]);
  include "./issets/telas/editar.php";
}
