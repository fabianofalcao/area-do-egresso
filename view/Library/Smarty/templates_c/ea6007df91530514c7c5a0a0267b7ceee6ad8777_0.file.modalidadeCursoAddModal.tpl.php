<?php
/* Smarty version 3.1.30, created on 2016-09-23 18:29:41
  from "/var/www/html/admin/view/modalidadeCursoAddModal.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_57e59ec56d7855_89498848',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'ea6007df91530514c7c5a0a0267b7ceee6ad8777' => 
    array (
      0 => '/var/www/html/admin/view/modalidadeCursoAddModal.tpl',
      1 => 1474658326,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_57e59ec56d7855_89498848 (Smarty_Internal_Template $_smarty_tpl) {
?>
<!-- Bootstrap Modal - To Add New Record -->
<!-- Modal -->
<div class="modal fade" id="add_novo_cadastro_modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h3 class="modal-title" id="myModalLabel">Adicionar modalidade de curso</h3>
            </div>
            <form action="modalidade.php" method="post" name="frmCadastrar">
                <div class="modal-body">

                    <div class="form-group">
                        <label for="Descricao">Descrição</label>
                        <input type="text" name="Descricao" id="DescricaoModalIns" placeholder="Digite uma descrição" class="form-control" required/>
                    </div>
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
                    <button type="submit" class="btn btn-primary" name="acao" value="inserir">Adicionar</button>
                </div>
            </form>
        </div>
    </div>
</div><?php }
}
