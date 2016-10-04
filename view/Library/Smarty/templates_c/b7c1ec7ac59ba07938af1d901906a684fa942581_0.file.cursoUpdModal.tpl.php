<?php
/* Smarty version 3.1.30, created on 2016-09-25 21:19:43
  from "/var/www/html/admin/view/cursoUpdModal.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_57e8699f48a539_38427792',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'b7c1ec7ac59ba07938af1d901906a684fa942581' => 
    array (
      0 => '/var/www/html/admin/view/cursoUpdModal.tpl',
      1 => 1474720174,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_57e8699f48a539_38427792 (Smarty_Internal_Template $_smarty_tpl) {
?>
<!-- Bootstrap Modal - To Add New Record -->
<!-- Modal -->
<div class="modal fade" id="upd_novo_cadastro_modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h3 class="modal-title" id="myModalLabel">Editar curso</h3>
            </div>
            <form action="curso.php" method="post" name="frmCadastrar">
                <div class="modal-body">
                    <div class="form-group">
                    <label>Modalidade*</label>
                        <select class="form-control input-sm" name="idModalidadeCurso" id="idModalidadeUpd" required autofocus>
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
                        <input type="hidden" name="idCurso" id="idCursoModalUpd"/>
                    </div>
                    <div class="form-group">
                        <label for="Nome">Curso</label>
                        <input type="text" name="Nome" id="NomeModalUpd" placeholder="Digite o nome do curso" class="form-control" required/>
                    </div>
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
                    <button type="submit" class="btn btn-primary" name="acao" value="alterar">Adicionar</button>
                </div>
            </form>
        </div>
    </div>
</div><?php }
}
