<?php
/* Smarty version 3.1.30, created on 2016-09-23 18:38:01
  from "/var/www/html/admin/view/cursoAddModal.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_57e5a0b99702a8_13497000',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '896663f0a2e88679f449b2c5d2fd26aaf4db647c' => 
    array (
      0 => '/var/www/html/admin/view/cursoAddModal.tpl',
      1 => 1474650489,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_57e5a0b99702a8_13497000 (Smarty_Internal_Template $_smarty_tpl) {
?>
<!-- Bootstrap Modal - To Add New Record -->
<!-- Modal -->
<div class="modal fade" id="add_novo_cadastro_modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h3 class="modal-title" id="myModalLabel">Adicionar curso</h3>
            </div>
            <form action="curso.php" method="post" name="frmCadastrar">
                <div class="modal-body">
                    <div class="form-group">
                    <label>Modalidade*</label>
                    <select class="form-control input-sm" name="idModalidadeCurso" id="idModalIns" required autofocus>
                            <option></option>
                            <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['listaModalidade']->value, 'j');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['j']->value) {
?>
                                <option value="<?php echo $_smarty_tpl->tpl_vars['j']->value['idModalidadeCurso'];?>
"><?php echo $_smarty_tpl->tpl_vars['j']->value['Descricao'];?>
</option>
                            <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl);
?>

                        </select>
                    </div>
                    <div class="form-group">
                        <label for="Nome">Curso</label>
                        <input type="text" name="Nome" id="NomeModalIns" placeholder="Digite o nome do curso" class="form-control" required/>
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
