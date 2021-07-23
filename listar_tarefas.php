<?php

require __DIR__.'/vendor/autoload.php';

define('TITLE','Editar Usuário');

use \App\Entity\Usuario;
use \App\Entity\Tarefa;

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

$tarefas = Tarefa::getTarefas('user_id='.$_GET['id']);

include __DIR__.'/includes/header.php';
include __DIR__.'/includes/listagem-tarefas.php';
include __DIR__.'/includes/footer.php';