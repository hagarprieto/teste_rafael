<?php

require __DIR__.'/vendor/autoload.php';

define('TITLE','Cadastrar Tarefa');

use \App\Entity\Tarefa;

$obTarefa = new Tarefa;

//VALIDAÇÃO DO POST
if(isset($_POST['descricao'])){

  $obTarefa->descricao    = $_POST['descricao'];
  $obTarefa->user_id      = $_GET['id'];
  $obTarefa->cadastrar();

  header('location: index.php?status=success');
  exit;
}

include __DIR__.'/includes/header.php';
include __DIR__.'/includes/formulario_tarefa.php';
include __DIR__.'/includes/footer.php';