<?php if(!isset($_SESSION['usuario:administrador'])) header("Location: http://localhost/infotech/resources/view/erro.php"); ?>
<?php $categorias = json_decode($_SESSION['categorias'], true); ?>
<?php $displayMsg = !isset($_SESSION['msg:addCategoria']) ? "none" : 'block' ?>

<div class="alert alert-info alert-dismissible" role="alert" style="display:<?php echo $displayMsg; ?>">
<button type="button" class="close" data-dismiss="alert" aria-label="Close">
<span aria-hidden="true">&times;</span>
</button>
<?php echo $_SESSION['msg:addCategoria']; ?>
</div>

<div class="col-md-12 col-sm-12 col-lg-12 col-xs-12">
    <div class="panel panel-default panel-table">
        <div class="panel-body">
            <table id="mytable" class="table table-striped table-bordered table-list">
                <thead>
                    <tr>
                        <th class="col-tools"><span class="glyphicon glyphicon-wrench" aria-hidden="true"></span>
                        </th>
                        <th class="hidden-xs">ID</th>
                        <th class="col-text">Nome da categoria</th>
                    </tr>
                </thead>
                <tbody id="categoria-tabela">
                    <?php foreach ($categorias as $key => $value) { ?>
                        <tr data-status="completed">
                            <td align="center">
                                <form action="../../../controller/removercategoriacontroller.php" method="post">
                                <a class="btn btn-default"><span class="glyphicon glyphicon-pencil"
                                    aria-hidden="true" data-toggle="modal" data-target="#modalConfirm-<?= $value['id']; ?>"></span></a>
                                <input type="hidden" name="id" value="<?= $value['id']; ?>">
                                <button type="submit" class="btn btn-danger"><span class="glyphicon glyphicon-remove" style="top: 2px;"></button>
                                </form>
                            </td>
                            <td class="hidden-xs"><?php echo $value['id']; ?></td>
                            <td><?php echo $value['nome']; ?></td>
                        </tr>
                        <div id="modalConfirm-<?= $value['id']; ?>" class="modal fade" role="dialog">
                        <div class="modal-dialog">
                          <!-- Modal content-->
                          <div class="modal-content">
                            <div class="modal-header">
                                <a href="#" data-dismiss="modal" aria-hidden="true" class="close">×</a>
                                 <h3>Editar categoria</h3>
                            </div>
                            <form method="post" action="../../../controller/editarcategoriacontroller.php" id="editar-<?= $value['id']; ?>">
                            <div class="modal-body">
                                <div class="form-group">
                                  <label>Nome</label>
                                  <input class="form-control" name="nome" value="<?= $value['nome'] ?>" form="editar-<?= $value['id']; ?>" required>
                                  <p class="help-block">Insira o nome da categoria.</p>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <input type="hidden" name="id" value="<?= $value['id']; ?>" form="editar-<?= $value['id']; ?>">
                                <input type="submit" class="btn btn-danger btn-sm" form="editar-<?= $value['id']; ?>" value="Salvar">
                                <button data-dismiss="modal" aria-hidden="true" class="btn btn-secndary btn-sm">Cancelar</button>
                            </div>
                            </form>
                          </div>
                        </div>
                      </div>
                    <?php } ?>
                </tbody>
            </table>
        </div>
        <div class="panel-footer">
            <div class="row">
                <div class="col-md-9 text-center">
                    <ul class="pagination pagination-lg pager" id="minhapagina"></ul>
                </div>

                <div class="col col-xs-3">
                    <div class="pull-right">
                        <button type="button" class="btn btn-primary"
                            data-toggle="modal" data-target="#modal">
                            <span class="glyphicon glyphicon-plus"
                            aria-hidden="true"></span>
                            Adicionar categoria
                        </button>
                    </div>
                    <div id="modal" class="modal fade" role="dialog">
                      <div class="modal-dialog">
                        <!-- Modal content-->
                        <div class="modal-content">
                          <div class="modal-header">
                              <a href="#" data-dismiss="modal" aria-hidden="true" class="close">×</a>
                               <h3>Adicionar categoria</h3>
                          </div>
                          <form method="post" action="../../../controller/adicionarcategoriacontroller.php" id="salvar">
                          <div class="modal-body">
                            <div class="form-group">
                                <label>Nome</label>
                                <input class="form-control" name="nome" required>
                                <p class="help-block">Insira o nome da categoria.</p>
                            </div>
                          </div>
                          <div class="modal-footer">
                              <input type="hidden" name="idExcluir" form="salvar" value="<?= $value['id']; ?>"/>
                              <input type="submit" class="btn btn-danger btn-sm" form="salvar" value="Salvar">
                              <button data-dismiss="modal" aria-hidden="true" class="btn btn-secndary btn-sm">Cancelar</button>
                          </div>
                          </form>
                        </div>
                      </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


<?php unset($_SESSION['categorias']); ?>
<?php unset($_SESSION['msg:addCategoria']); ?>
