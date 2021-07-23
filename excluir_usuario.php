<?php

require __DIR__.'/vendor/autoload.php';

use \App\Entity\Usuario;

//VALIDAÇÃO DO ID
if(!isset($_GET['id']) or !is_numeric($_GET['id'])){
  header('location: index.php?status=error');
  exit;
}

//CONSULTA USUÁRIO
$obUsuario = Usuario::getUsuario($_GET['id']);

//VALIDAÇÃO USUÁRIO
if(!$obUsuario instanceof Usuario){
  header('location: index.php?status=error');
  exit;
}

//VALIDAÇÃO DO POST
if(isset($_POST['excluir'])){

  $obUsuario->excluir();

  header('location: index.php?status=success');
  exit;
}

include __DIR__.'/includes/header.php';
include __DIR__.'/includes/confirmar-exclusao.php';
include __DIR__.'/includes/footer.php';