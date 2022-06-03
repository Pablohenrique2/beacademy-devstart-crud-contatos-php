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

    $nome = $_POST['nome'];
    $email = $_POST['email'];
    $telefone = $_POST['telefone'];
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
