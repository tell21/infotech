<?php if(!isset($_SESSION['usuario:administrador'])) header("Location: http://localhost/infotech/resources/view/erro.php"); ?>
  <!-- Trigger the modal with a button -->

  <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal"><span class="glyphicon glyphicon-plus-sign" aria-hidden="true"></span></button>

  <!-- Modal -->
  <div id="myModal" class="modal fade" role="dialog">
    <div class="modal-dialog">

      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Cadastro de categoria</h4>
        </div>
        <form role="form" action="../../../controller/adicionarprodutocontroller.php" method="post" enctype="multipart/form-data" multipart>
        <div class="modal-body">
            <div class="form-group">
              <label>Nome</label>
              <input class="form-control" name="nome" required>
              <p class="help-block">Insira o nome da categoria.</p>
            </div>
        </div>
        <div class="modal-footer">
          <input type="submit" class="btn btn-default"></input>
          <button type="button" class="btn btn-default" data-dismiss="modal">Sair</button>
        </div>
        </form>
      </div>

    </div>
  </div>
