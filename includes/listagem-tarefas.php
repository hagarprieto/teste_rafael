<?php

  $mensagem = '';
  if(isset($_GET['status'])){
    switch ($_GET['status']) {
      case 'success':
        $mensagem = '<div class="alert alert-success">Ação executada com sucesso!</div>';
        break;

      case 'error':
        $mensagem = '<div class="alert alert-danger">Ação não executada!</div>';
        break;
    }
  }

  $resultados = '';
  foreach($tarefas as $tarefa){
    $resultados .= '<tr>
                      <td>'.$tarefa->id.'</td>
                      <td>'.$tarefa->descricao.'</td>
                      <td>'.($tarefa->estado == '1' ? 'Feito' : 'Pendente').'</td>
                      <td>
                      <a href="estado_tarefa.php?id='.$tarefa->id.'">
                      <button type="button" class="btn btn-primary">'.($tarefa->estado == '1' ? 'Marcar como Pendente' : 'Marcar como Feito').'</button>
                      </a>
                      <a href="excluir_tarefa.php?id='.$tarefa->id.'">
                      <button type="button" class="btn btn-danger">Excluir</button>
                      </a>
                      </td>
                    </tr>';
  }

  $resultados = strlen($resultados) ? $resultados : '<tr>
                                                       <td colspan="4" class="text-center">
                                                              Nenhuma tarefa encontrada
                                                       </td>
                                                    </tr>';

?>
<main>

  <?=$mensagem?>

  <section>
  <a href="index.php">
      <button class="btn btn-warning">Voltar</button>
    </a>
    <a href="cadastrar_tarefa.php?id=<?=$_GET['id']?>">
      <button class="btn btn-success">Nova tarefa</button>
    </a>
  </section>

  <section>

    <table class="table bg-light mt-3">
        <thead>
          <tr>
            <th>ID</th>
            <th>Descrição</th>
            <th>Estado</th>
            <th>Ações</th>
          </tr>
        </thead>
        <tbody>
            <?=$resultados?>
        </tbody>
    </table>

  </section>


</main>