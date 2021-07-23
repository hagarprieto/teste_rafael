<?php

require __DIR__.'/vendor/autoload.php';

define('TITLE','Editar Usuário');

use \App\Entity\Usuario;

//VALIDAÇÃO DO ID
if(!isset($_GET['id']) or !is_numeric($_GET['id'])){
  header('location: index.php?status=error');
  exit;
}

//CONSULTA USUÁRIO
$obUsuario = Usuario::getUsuario($_GET['id']);

//VALIDAÇÃO DA USUÁRIO
if(!$obUsuario instanceof Usuario){
  header('location: index.php?status=error');
  exit;
}

//VALIDAÇÃO DO POST
if(isset($_POST['nome'])){

  $obUsuario->nome    = $_POST['nome'];
  $obUsuario->atualizar();

  header('location: index.php?status=success');
  exit;
}

include __DIR__.'/includes/header.php';
include __DIR__.'/includes/formulario.php';
include __DIR__.'/includes/footer.php';