<?php

declare(strict_types=1);

class Validar
{
  public function validarNome(string $nome)
  {
    if (!empty($nome) && strlen($nome) > 3 && strlen($nome) < 100) {
      $this->nome = $nome;
    } else {
      echo "preencha o campo Nome corretamente: <a href='/cadastro'>Voltar</a>";
      die();
    }
  }
  public function validarEmail(string $email)
  {
    if (!empty($_POST['email']) && filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
      $this->email = $email;
    } else {
      echo "preencha o campo Email corretamente: <a href='/cadastro'>Voltar</a>";
      die();
    }
  }
  public function validarTelefone(string $telefone)
  {
    if (!empty($_POST['telefone']) && strlen($_POST['telefone']) > 9 && strlen($_POST['telefone']) < 12) {
      $this->telefone = $telefone;
    } else {
      echo "preencha o campo de telefone corretamente: <a href='/cadastro'>Voltar</a>";
      die();
    }
  }
}
