<?php
/* Smarty version 3.1.30, created on 2016-09-24 09:38:24
  from "/var/www/html/admin/view/cidadeAddModal.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_57e673c03762e8_21412640',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '45fc8a44d6aca9b9df2098841c7cad0d9a5d55c6' => 
    array (
      0 => '/var/www/html/admin/view/cidadeAddModal.tpl',
      1 => 1474720149,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_57e673c03762e8_21412640 (Smarty_Internal_Template $_smarty_tpl) {
?>
<!-- Bootstrap Modal - To Add New Record -->
<!-- Modal -->
<div class="modal fade" id="add_novo_cadastro_modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h3 class="modal-title" id="myModalLabel">Adicionar cidade</h3>
            </div>
            <form action="cidade.php" method="post" name="frmCadastrar">
                <div class="modal-body">
                    <div class="form-group">
                    <label>Estado*</label>
                    <select class="form-control input-sm" name="idEstado" id="idModalIns" required autofocus>
                            <option></option>
                            <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['listaEstado']->value, 'j');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['j']->value) {
?>
                                <option value="<?php echo $_smarty_tpl->tpl_vars['j']->value['idEstado'];?>
"><?php echo $_smarty_tpl->tpl_vars['j']->value['Nome'];?>
</option>
                            <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl);
?>

                        </select>
                    </div>
                    <div class="form-group">
                        <label for="Nome">Cidade*</label>
                        <input type="text" name="Nome" id="NomeModalIns" placeholder="Digite o nome da cidade" class="form-control" required/>
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
