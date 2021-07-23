<?php

require __DIR__.'/vendor/autoload.php';

define('TITLE','Cadastrar Usuário');

use \App\Entity\Usuario;
$obUsuario = new Usuario;

//VALIDAÇÃO DO POST
if(isset($_POST['nome'])){

  $obUsuario->nome    = $_POST['nome'];
  $obUsuario->cadastrar();

  header('location: index.php?status=success');
  exit;
}

include __DIR__.'/includes/header.php';
include __DIR__.'/includes/formulario.php';
include __DIR__.'/includes/footer.php';