<div class=" container" style="width:600px ;">
  <h1>Editar cadastro</h1>
  <hr>
  <form action="" method="post">
    <input class="form-control mb-3" type="text" name="nome" value="<?php echo $dados[0]; ?>" placeholder="nome">
    <input class="form-control mb-3" type="email" name="email" value="<?php echo $dados[1]; ?>" placeholder="email">
    <input class="form-control mb-3" type="telefone" name="telefone" value="<?php echo $dados[2]; ?>" placeholder="telefone">

    <button class="btn btn-primary" style="width:580px ;">editar</button>

  </form>
</div>