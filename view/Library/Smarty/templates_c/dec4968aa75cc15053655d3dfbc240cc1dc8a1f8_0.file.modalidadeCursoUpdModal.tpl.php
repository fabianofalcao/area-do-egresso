<?php
/* Smarty version 3.1.30, created on 2016-09-23 18:40:43
  from "/var/www/html/admin/view/modalidadeCursoUpdModal.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_57e5a15b1068f5_74343158',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'dec4968aa75cc15053655d3dfbc240cc1dc8a1f8' => 
    array (
      0 => '/var/www/html/admin/view/modalidadeCursoUpdModal.tpl',
      1 => 1474666750,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_57e5a15b1068f5_74343158 (Smarty_Internal_Template $_smarty_tpl) {
?>
<!-- Bootstrap Modal - To Add New Record -->
<!-- Modal -->
<div class="modal fade" id="upd_cadastro_modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h3 class="modal-title" id="myModalLabel">Editar modalidade de curso</h3>
            </div>

            <form action="modalidade.php" method="post" name="frmEditar">
                <div class="modal-body">
                    <div class="form-group">
                        <label for="Descricao">Descrição</label>
                        <input type="text" name="Descricao" id="DescModalidadeModalUpd" placeholder="Digite uma descrição" class="form-control" required/>
                        <input type="hidden" name="idModalidadeCurso" id="idModalidadeModalUpd"/>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
                    <button type="submit" class="btn btn-primary" name="acao" value="alterar">Salvar</button>
                </div>
            </form>
        </div>
    </div>
</div><?php }
}
