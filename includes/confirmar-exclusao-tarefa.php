<main>

  <h2 class="mt-3">Excluir tarefa</h2>

  <form method="post">

    <div class="form-group">
      <p>Você deseja realmente excluir a tarefa <strong><?=$obTarefa->descricao?></strong>?</p>
    </div>

    <div class="form-group">
      <a href="listar_tarefas.php?id=<?=$_GET['id']?>">
        <button type="button" class="btn btn-success">Cancelar</button>
      </a>

      <button type="submit" name="excluir" class="btn btn-danger">Excluir</button>
    </div>

  </form>

</main>