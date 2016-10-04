<?php
/* Smarty version 3.1.30, created on 2016-09-25 22:00:27
  from "/var/www/html/admin/view/egressoCursoExternoUpdModal.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_57e8732bdf3d61_05410852',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'cbd1062cd5872b0c7f63bb58b83fde17eeaaaced' => 
    array (
      0 => '/var/www/html/admin/view/egressoCursoExternoUpdModal.tpl',
      1 => 1474851604,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_57e8732bdf3d61_05410852 (Smarty_Internal_Template $_smarty_tpl) {
?>
<!-- Bootstrap Modal - To Add New Record -->
<!-- Modal -->
<div class="modal fade" id="upd_novo_cadastro_modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h3 class="modal-title" id="myModalLabel">Editar curso realizado pós IFMG-SJE</h3>
            </div>
            <form action="egressoCursoExterno.php?inputPesquisa=<?php echo $_smarty_tpl->tpl_vars['inputPesquisa']->value;?>
" method="post" name="frmCadastrar">
                <div class="modal-body">
                    <div class="form-group col-md-12">
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
                        <input type="hidden" name="idAluno" id="idAlunoUpd"/>
                    </div>
                    <div class="form-group col-md-12">
                        <label for="Nome">Curso externo</label>
                        <input type="text" name="NomeCursoExterno" id="NomeCursoExternoUpd" placeholder="Digite o nome do curso" class="form-control" required/>
                    </div>
                    <div class="form-group col-md-12">
                        <label for="Nome">Instituicao</label>
                        <input type="text" name="Instituicao" id="InstituicaoUpd" placeholder="Digite o nome ds instituição" class="form-control" required/>
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
