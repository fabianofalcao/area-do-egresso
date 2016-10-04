<?php
/* Smarty version 3.1.30, created on 2016-09-24 20:13:08
  from "/var/www/html/admin/view/nivelSatisfacaoAddModal.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_57e708844fa591_88400826',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '94453901a0decdb2a95e0a04d39faf59ca13e00d' => 
    array (
      0 => '/var/www/html/admin/view/nivelSatisfacaoAddModal.tpl',
      1 => 1474588970,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_57e708844fa591_88400826 (Smarty_Internal_Template $_smarty_tpl) {
?>
<!-- Bootstrap Modal - To Add New Record -->
<!-- Modal -->
<div class="modal fade" id="add_novo_cadastro_modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h3 class="modal-title" id="myModalLabel">Adicionar nível de satisfação</h3>
            </div>
            <form action="nivelSatisfacao.php" method="post" name="frmCadastrar">
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
