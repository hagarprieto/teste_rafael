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
  foreach($usuarios as $usuario){
    $resultados .= '<tr>
                      <td>'.$usuario->id.'</td>
                      <td>'.$usuario->nome.'</td>
                      <td>
                      <a href="editar_usuario.php?id='.$usuario->id.'">
                      <button type="button" class="btn btn-primary">Editar</button>
                      </a>
                      <a href="listar_tarefas.php?id='.$usuario->id.'">
                      <button type="button" class="btn btn-info">Listar Tarefas</button>
                      </a>
                      <a href="excluir_usuario.php?id='.$usuario->id.'">
                      <button type="button" class="btn btn-danger">Excluir</button>
                      </a>
                      </td>
                    </tr>';
  }

  $resultados = strlen($resultados) ? $resultados : '<tr>
                                                       <td colspan="3" class="text-center">
                                                              Nenhuma usuário encontrado
                                                       </td>
                                                    </tr>';

?>
<main>

  <?=$mensagem?>

  <section>
    <a href="cadastrar_usuario.php">
      <button class="btn btn-success">Novo usuário</button>
    </a>
  </section>

  <section>

    <table class="table bg-light mt-3">
        <thead>
          <tr>
            <th>ID</th>
            <th>Nome</th>
            <th>Ações</th>
          </tr>
        </thead>
        <tbody>
            <?=$resultados?>
        </tbody>
    </table>

  </section>


</main>