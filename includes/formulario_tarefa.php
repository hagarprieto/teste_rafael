<main>

  <section>
  <a href="listar_tarefas.php?id=<?=$_GET['id']?>">
      <button class="btn btn-success">Voltar</button>
    </a>
  </section>

  <h2 class="mt-3"><?=TITLE?></h2>

  <form method="post">

    <div class="form-group">
      <label>Descrição da tarefa</label>
      <input type="text" class="form-control" name="descricao" value="<?=$obTarefa->descricao?>">
    </div>


    <div class="form-group">
      <button type="submit" class="btn btn-success">Enviar</button>
    </div>

  </form>

</main>