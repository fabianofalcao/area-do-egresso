<?php
/* Smarty version 3.1.30, created on 2016-09-25 22:02:30
  from "/var/www/html/admin/view/egressoCursoExterno.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_57e873a6f3c2c3_19929271',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '7993a70542258770f5ebaa0c2649c43471bec121' => 
    array (
      0 => '/var/www/html/admin/view/egressoCursoExterno.tpl',
      1 => 1474851745,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:view/begin.tpl' => 1,
    'file:view/egressoCursoExternoAddModal.tpl' => 1,
    'file:view/egressoCursoExternoUpdModal.tpl' => 1,
    'file:view/endListas.tpl' => 1,
  ),
),false)) {
function content_57e873a6f3c2c3_19929271 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_subTemplateRender("file:view/begin.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>


<article>
    <div id="main" class="container">
        <div id="titulo" class="row">
            <div class="col-md-12">
                <h2>:: Egressos - Cursos realizados pós IFMG-SJE ::</h2>
                <hr>
            </div>
        </div>
        
        <div id="barraPesquisa" class="row">
            <div class="col-md-10">
                <form role="form" name="formPesquisa" id="formPesquisa" action="egressoCursoExterno.php" method="get">
                    <div class="input-group h2">
                        <input name="inputPesquisa" class="form-control" id="inputPesquisa" type="text" placeholder="Pesquisar por egressos" value="<?php echo $_smarty_tpl->tpl_vars['inputPesquisa']->value;?>
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
        
        <hr/>
        <?php echo $_smarty_tpl->tpl_vars['ErrMsg']->value;?>

        <div id="list" class="row">
            <div class="table-responsive col-md-12">
                <table class="table table-striped" cellspacing="0" cellpadding="0">
                    <thead>
                        <tr>
                            <th style="width: 30%;">Aluno</th>
                            <th style="width: 30%;">Curso</th>
                            <th style="width: 30%;">Instituição</th>
                            <th style="width: 10%;"class="actions text-center">Ações</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['lista']->value, 'row');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['row']->value) {
?>
                        <tr>
                            <td><?php echo $_smarty_tpl->tpl_vars['row']->value['Nome'];?>
</td>
                            <td><?php echo $_smarty_tpl->tpl_vars['row']->value['NomeCursoExterno'];?>
</td>
                            <td><?php echo $_smarty_tpl->tpl_vars['row']->value['Instituicao'];?>
</td>
                            <td class="actions text-center">
                                <a class="btn btn-warning btn-xs" data-toggle="modal" data-target="#upd_novo_cadastro_modal" 
                                    onclick="loadEgressoCursoExternoUpdModal(<?php echo $_smarty_tpl->tpl_vars['row']->value['idAluno'];?>
, '<?php echo $_smarty_tpl->tpl_vars['row']->value['NomeCursoExterno'];?>
', '<?php echo $_smarty_tpl->tpl_vars['row']->value['Instituicao'];?>
', '<?php echo $_smarty_tpl->tpl_vars['row']->value['idModalidadeCurso'];?>
')">Editar</a>
                            </td>
                        </tr>
                    <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl);
?>

                    </tbody>
                </table>
            </div>
            <hr>
            <div id="bottom" class="row">
                <div class="col-md-12 text-center">
                    <?php echo $_smarty_tpl->tpl_vars['paginacao']->value;?>

                </div>
            </div> <!-- /#bottom -->
        </div>
    </div>
</article>

<?php $_smarty_tpl->_subTemplateRender("file:view/egressoCursoExternoAddModal.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

<?php $_smarty_tpl->_subTemplateRender("file:view/egressoCursoExternoUpdModal.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

                    
<?php $_smarty_tpl->_subTemplateRender("file:view/endListas.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

<?php }
}
