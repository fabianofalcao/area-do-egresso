<?php
/* Smarty version 3.1.30, created on 2016-09-21 14:35:59
  from "C:\ServidorWeb\www\area-do-egresso\admin\view\nivelSatisfacaoAddModal.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_57e2c4ff943c32_60781568',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '8180a283405235ae295865a50fa319302648b88b' => 
    array (
      0 => 'C:\\ServidorWeb\\www\\area-do-egresso\\admin\\view\\nivelSatisfacaoAddModal.tpl',
      1 => 1474479357,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_57e2c4ff943c32_60781568 (Smarty_Internal_Template $_smarty_tpl) {
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
            
            <div class="modal-body">

                <div class="form-group">
                    <label for="Descricao">Descrição</label>
                    <input type="text" id="descricao" placeholder="Digite uma descrição" class="form-control" required/>
                </div>
            </div>
            
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
                <button type="button" class="btn btn-primary" onclick="addNivelSatisfacao();">Adicionar</button>
            </div>
        </div>
    </div>
</div><?php }
}
