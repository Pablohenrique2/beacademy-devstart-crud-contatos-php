<?php

function home()
{
  include "./issets/telas/home.php";
}
function login()
{

  $contatos = file("./issets/dados/contatos.csv");
  if ($_POST) {
    $email = $_POST['email'];
    foreach ($contatos as $cadaContatos) {
      $partes = explode(";", $cadaContatos);
      if ($email === $partes[1]) {
        header("location: /");
      }
    }
    $mensage = "Ocorreu algum error ao fazer login!!";
    include "./issets/telas/mesagemerror.php";
  }
  include "./issets/telas/login.php";
}
function cadastro()
{
  if ($_POST) {
    include "./issets/src/classes/Validar.php";
    $nome = $_POST['nome'];
    $c1 = new Validar();
    $c1->validarNome($nome);

    $email = $_POST['email'];
    $c2 = new Validar();
    $c2->validarEmail($email);

    $telefone = $_POST['telefone'];
    $c3 = new Validar();
    $c3->validarTelefone($telefone);

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
