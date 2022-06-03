<?php
$url = explode("?", $_SERVER['REQUEST_URI']);
include './issets/telas/head.php';
include './issets/menu/index.php';
include 'acoes.php';
match ($url[0]) {
  "/" => home(),
  "/login" => login(),
  "/cadastro" => cadastro(),
  "/admin" => admin(),
  "/lista" => listar(),
  "/excluir" => excluir(),
  "/editar" => editar(),
  default => erro(),
};
include '../projeto/issets/telas/footer.php';
