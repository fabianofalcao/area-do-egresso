<?php
/* Smarty version 3.1.30, created on 2016-09-25 22:04:48
  from "/var/www/html/admin/view/egressoCursoExternoAddModal.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_57e87430cc15b8_53215064',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '037d746a5c64ead2121e945bdaa3d3a17d2ab371' => 
    array (
      0 => '/var/www/html/admin/view/egressoCursoExternoAddModal.tpl',
      1 => 1474851883,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_57e87430cc15b8_53215064 (Smarty_Internal_Template $_smarty_tpl) {
?>
<!-- Bootstrap Modal - To Add New Record -->
<!-- Modal -->
<div class="modal fade" id="add_novo_cadastro_modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h3 class="modal-title" id="myModalLabel">Cadastrar curso realizado pós IFMG-SJE</h3>
            </div>
            <form action="egressoCursoExterno.php?inputPesquisa=<?php echo $_smarty_tpl->tpl_vars['inputPesquisa']->value;?>
" method="post" name="frmCadastrar">
                <div class="modal-body">
                    <div class="form-group col-md-12">
                    <label>Modalidade*</label>
                        <select class="form-control input-sm" name="idModalidadeCurso" id="idModalidade" required autofocus>
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
                    <div class="form-group col-md-12">
                        <label for="Nome">Curso externo</label>
                        <input type="text" name="NomeCursoExterno" id="NomeCursoExterno" placeholder="Digite o nome do curso" class="form-control" required/>
                    </div>
                    <div class="form-group col-md-12">
                        <label for="Nome">Instituicao</label>
                        <input type="text" name="Instituicao" id="Instituicao" placeholder="Digite o nome ds instituição" class="form-control" required/>
                    </div>
                </div>
                        <hr>        
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
                    <button type="submit" class="btn btn-primary" name="acao" value="inserir">Adicionar</button>
                </div>
            </form>
        </div>
    </div>
</div><?php }
}
