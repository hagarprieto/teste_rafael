<?php

require __DIR__.'/vendor/autoload.php';

use \App\Entity\Tarefa;

//VALIDAÇÃO DO ID
if(!isset($_GET['id']) or !is_numeric($_GET['id'])){
  header('location: index.php?status=error');
  exit;
}

//CONSULTA TAREFA
$obTarefa = Tarefa::getTarefa($_GET['id']);

//VALIDAÇÃO TAREFA
if(!$obTarefa instanceof Tarefa){
  header('location: index.php?status=error');
  exit;
}

//VALIDAÇÃO DO POST
if(isset($_POST['marcar_feito'])){

  $obTarefa->marcar_feito();

  header('location: index.php?status=success');
  exit;
}

if(isset($_POST['marcar_pendente'])){

  $obTarefa->marcar_pendente();

  header('location: index.php?status=success');
  exit;
}

include __DIR__.'/includes/header.php';
include __DIR__.'/includes/alterar-estado-tarefa.php';
include __DIR__.'/includes/footer.php';