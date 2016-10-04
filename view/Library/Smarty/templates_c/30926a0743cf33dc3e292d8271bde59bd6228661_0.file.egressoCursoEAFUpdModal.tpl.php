<?php
/* Smarty version 3.1.30, created on 2016-09-25 21:18:23
  from "/var/www/html/admin/view/egressoCursoEAFUpdModal.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_57e8694f93cb36_84684020',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '30926a0743cf33dc3e292d8271bde59bd6228661' => 
    array (
      0 => '/var/www/html/admin/view/egressoCursoEAFUpdModal.tpl',
      1 => 1474848934,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_57e8694f93cb36_84684020 (Smarty_Internal_Template $_smarty_tpl) {
?>
<!-- Bootstrap Modal - To Add New Record -->
<!-- Modal -->
<div class="modal fade" id="upd_novo_cadastro_modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h3 class="modal-title" id="myModalLabel">Editar curso realizado no IFMG-SJE</h3>
            </div>
            <form action="egressoCursoEAF.php?inputPesquisa=<?php echo $_smarty_tpl->tpl_vars['inputPesquisa']->value;?>
" method="post" name="frmCadastrar">
                <div class="modal-body">
                    <div class="form-group col-md-12">
                        <label for="idCurso">Curso</label>
                        <select class="form-control" name="idCurso" id="idCursoUpd" required>
                            <option></option>
                            <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['listaCurso']->value, 'j');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['j']->value) {
?>
                                <option value="<?php echo $_smarty_tpl->tpl_vars['j']->value['idCurso'];?>
"><?php echo $_smarty_tpl->tpl_vars['j']->value['Nome'];?>
</option>
                            <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl);
?>

                        </select>
                    </div>
                    <div class="form-group col-md-12">
                        <label for="idAluno">Aluno</label>
                        <select class="form-control" name="idAluno" id="idAlunoUpd" required>
                            <option></option>
                            <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['listaAluno']->value, 'j');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['j']->value) {
?>
                                <option value="<?php echo $_smarty_tpl->tpl_vars['j']->value['idAluno'];?>
"><?php echo $_smarty_tpl->tpl_vars['j']->value['Nome'];?>
</option>
                            <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl);
?>

                        </select>
                    </div>
                    <div class="form-group col-md-6">
                        <label for="AnoIngresso">Ano de Ingresso</label>
                        <select class="form-control" name="AnoIngresso" id="AnoIngressoUpd" required>
                            <option></option>
                            <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['listaAnos']->value, 'j');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['j']->value) {
?>
                                <option value="<?php echo $_smarty_tpl->tpl_vars['j']->value;?>
"><?php echo $_smarty_tpl->tpl_vars['j']->value;?>
</option>
                            <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl);
?>

                        </select>
                    </div>
                    <div class="form-group col-md-6">
                        <label for="AnoFormacao">Ano de Formação</label>
                        <select class="form-control" name="AnoFormacao" id="AnoFormacaoUpd" required>
                            <option></option>
                            <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['listaAnos']->value, 'j');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['j']->value) {
?>
                                <option value="<?php echo $_smarty_tpl->tpl_vars['j']->value;?>
"><?php echo $_smarty_tpl->tpl_vars['j']->value;?>
</option>
                            <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl);
?>

                        </select>
                    </div>
                </div>
                        <hr>        
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
                    <button type="submit" class="btn btn-primary" name="acao" value="alterar">Salvar</button>
                </div>
            </form>
        </div>
    </div>
</div><?php }
}
