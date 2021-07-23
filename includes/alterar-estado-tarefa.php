<main>

  <h2 class="mt-3">Excluir tarefa</h2>

  <form method="post">

    <div class="form-group">
      <?php if ($obTarefa->estado==0){ ?>
        <p>Você deseja marcar a tarefa <strong><?=$obTarefa->descricao?></strong> como feita?</p>
      <?php } 
      else { ?>
        <p>Você deseja marcar a tarefa <strong><?=$obTarefa->descricao?></strong> como pendente?</p>   
      <?php
      }?>
    </div>

    <div class="form-group">
      <a href="listar_tarefas.php?id=<?=$_GET['id']?>">
        <button type="button" class="btn btn-success">Cancelar</button>
      </a>
      <?php if ($obTarefa->estado==0){ ?>
        <button type="submit" name="marcar_feito" class="btn btn-warning">Confirmar</button>
      <?php } 
      else { ?>
        <button type="submit" name="marcar_pendente" class="btn btn-warning">Confirmar</button>
      <?php
      } ?>
    </div>

  </form>

</main>