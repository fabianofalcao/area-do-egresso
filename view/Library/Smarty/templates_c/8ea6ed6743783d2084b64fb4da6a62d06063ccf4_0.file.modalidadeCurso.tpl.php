<?php
/* Smarty version 3.1.30, created on 2016-09-23 18:29:41
  from "/var/www/html/admin/view/modalidadeCurso.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_57e59ec56d0ec3_64510683',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '8ea6ed6743783d2084b64fb4da6a62d06063ccf4' => 
    array (
      0 => '/var/www/html/admin/view/modalidadeCurso.tpl',
      1 => 1474659505,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:view/begin.tpl' => 1,
    'file:view/modalidadeCursoAddModal.tpl' => 1,
    'file:view/modalidadeCursoUpdModal.tpl' => 1,
    'file:view/endListas.tpl' => 1,
  ),
),false)) {
function content_57e59ec56d0ec3_64510683 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_subTemplateRender("file:view/begin.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>



<article>

    <div id="main" class="container">
        <div id="titulo" class="row">
            <div class="col-md-12">
                <h2>:: Modalidades de curso ::</h2>
                <hr>
            </div>
        </div>
        <div id="barraPesquisa" class="row">
            <div class="col-md-10">
                <form role="form" name="formPesquisa" id="formPesquisa" action="modalidade.php" method="get">
                    <div class="input-group h2">
                        <input name="inputPesquisa" class="form-control" id="inputPesquisa" type="text" placeholder="Pesquisar modalidades de curso" value="<?php echo $_smarty_tpl->tpl_vars['inputPesquisa']->value;?>
">
                        <span class="input-group-btn">
                            <button class="btn btn-primary" type="submit">
                                <span class="glyphicon glyphicon-search"></span>
                            </button>
                        </span>
                    </div>
                </form>

            </div>
            <div class="col-md-2">
                <button class="btn btn-primary pull-right h2" data-toggle="modal" data-target="#add_novo_cadastro_modal">+Novo cadastro</button>
            </div>
        </div> <!-- /#top -->

        <hr />
        <?php echo $_smarty_tpl->tpl_vars['ErrMsg']->value;?>

        <div id="list" class="row">

            <div class="table-responsive col-md-12">
                <table class="table table-striped" cellspacing="0" cellpadding="0">
                    <thead>
                        <tr>
                            <th style="width: 10%;">Id</th>
                            <th style="width: 70%;">Modalidade de curso</th>
                            <th style="width: 20%;"class="actions text-center">Ações</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['lista']->value, 'row');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['row']->value) {
?>
                        <form action="modalidadeCurso.php" method="post" name="FormExcluir_<?php echo $_smarty_tpl->tpl_vars['row']->value['idModalidadeCurso'];?>
">
                            <input name="idModalidadeCurso" type="hidden" value="<?php echo $_smarty_tpl->tpl_vars['row']->value['idModalidadeCurso'];?>
" />                                                
                            <input name="acao" type="hidden" value="excluir" /> 
                        </form>	 
                        <tr>
                            <td><?php echo $_smarty_tpl->tpl_vars['row']->value['idModalidadeCurso'];?>
</td>
                            <td><?php echo $_smarty_tpl->tpl_vars['row']->value['Descricao'];?>
</td>
                            <td class="actions text-center">
                                <a class="btn btn-warning btn-xs" data-toggle="modal" data-target="#upd_cadastro_modal" onclick="loadModalidadeModal(<?php echo $_smarty_tpl->tpl_vars['row']->value['idModalidadeCurso'];?>
, '<?php echo $_smarty_tpl->tpl_vars['row']->value['Descricao'];?>
');">Editar</a>
                                <a class="btn btn-danger btn-xs" onclick="if(confirm('Confirma exclusão do registro? Ao Confirmar o item será excluído!'))document.FormExcluir_<?php echo $_smarty_tpl->tpl_vars['row']->value['idModalidadeCurso'];?>
.submit();">Excluir</a>
                            </td>
                        </tr>
                    <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl);
?>


                    </tbody>
                </table>
            </div> <!-- /#list -->
            <hr>
            <div id="bottom" class="row">
                
                <div class="col-md-12 text-center">
                    <?php echo $_smarty_tpl->tpl_vars['paginacao']->value;?>

                </div>
                
            </div> <!-- /#bottom -->
        </div>  <!-- /#main -->
    </div>
</article>
                
<?php $_smarty_tpl->_subTemplateRender("file:view/modalidadeCursoAddModal.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

<?php $_smarty_tpl->_subTemplateRender("file:view/modalidadeCursoUpdModal.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>



<?php $_smarty_tpl->_subTemplateRender("file:view/endListas.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
}
}
