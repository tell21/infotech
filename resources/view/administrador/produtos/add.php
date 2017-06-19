<?php if(!isset($_SESSION['usuario:administrador'])) header("Location: http://localhost/infotech/resources/view/erro.php"); ?>
  <?php $categorias = json_decode($_SESSION['categorias'], true); ?>
  <!-- Trigger the modal with a button -->
  <a href="#" class="btn btn-info btn-lg input-group-addon" data-toggle="modal" data-target="#myModal">
    <span class="glyphicon glyphicon-plus-sign"></span>
  </a>
  <!-- Modal -->
  <div id="myModal" class="modal fade" role="dialog">
    <div class="modal-dialog">

      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Cadastro de produto</h4>
        </div>
        <form role="form" action="../../../controller/adicionarprodutocontroller.php" method="post" enctype="multipart/form-data" multipart>
          <div class="modal-body">
            <div class="form-group">
              <label>Nome</label>
              <input class="form-control" name="nome" required>
              <p class="help-block">Insira o nome do produto.</p>
            </div>
            <div class="form-group">
              <label>Preço</label>
              <input id="num"  type=number step=0.01 data-bind="value:num" class="form-control" name="preco" required>
              <p class="help-block">Insira o preço do produto.</p>
            </div>
            <div class="form-group">
              <label>Estoque</label>
              <input type="number" id="replyNumber" step=0 min="0" data-bind="value:replyNumber" class="form-control" name="estoque" required>
              <p class="help-block">Insira a quantidade disponivel em estoque.</p>
            </div>
            <div class="form-group">
              <label>Categoria</label>
              <select class="form-control" name="categoria" required>
                <?php
                foreach ($categorias as $key => $value){
                  echo "<option value=".$value['id']."> ".$value['nome']." </option>";
                }
                ?>
              </select>
            </div>
            <div class="form-group">
              <label>Descriçao</label>
              <textarea class="form-control" rows="3" name="descricao" required></textarea>
            </div>
            <div class="form-group">
              <label>Fotos</label>
              <input type="file" name="files[]" multiple required>
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
  <?php unset($_SESSION['categorias']); ?>
