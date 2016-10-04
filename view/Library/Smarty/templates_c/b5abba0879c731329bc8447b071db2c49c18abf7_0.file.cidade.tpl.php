<?php
/* Smarty version 3.1.30, created on 2016-09-24 09:38:24
  from "/var/www/html/admin/view/cidade.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_57e673c0361e59_76556436',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'b5abba0879c731329bc8447b071db2c49c18abf7' => 
    array (
      0 => '/var/www/html/admin/view/cidade.tpl',
      1 => 1474719457,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:view/begin.tpl' => 1,
    'file:view/cidadeAddModal.tpl' => 1,
    'file:view/cidadeUpdModal.tpl' => 1,
    'file:view/endListas.tpl' => 1,
  ),
),false)) {
function content_57e673c0361e59_76556436 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_subTemplateRender("file:view/begin.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>


<article>
    <div id="main" class="container">
        <div id="titulo" class="row">
            <div class="col-md-12">
                <h2>:: Cidades ::</h2>
                <hr>
            </div>
        </div>
        
        <div id="barraPesquisa" class="row">
            <div class="col-md-10">
                <form role="form" name="formPesquisa" id="formPesquisa" action="cidade.php" method="get">
                    <div class="input-group h2">
                        <input name="inputPesquisa" class="form-control" id="inputPesquisa" type="text" placeholder="Pesquisar por cidades" value="<?php echo $_smarty_tpl->tpl_vars['inputPesquisa']->value;?>
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
                            <th style="width: 10%;">Id</th>
                            <th style="width: 25%;">Estado</th>
                            <th style="width: 45%;">Cidade</th>
                            <th style="width: 20%;"class="actions text-center">Ações</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['lista']->value, 'row');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['row']->value) {
?>
                        <form action="cidade.php" method="post" name="FormExcluir_<?php echo $_smarty_tpl->tpl_vars['row']->value['idCidade'];?>
">
                            <input name="idCidade" type="hidden" value="<?php echo $_smarty_tpl->tpl_vars['row']->value['idCidade'];?>
" />                                                
                            <input name="acao" type="hidden" value="excluir" /> 
                        </form>	 
                        <tr>
                            <td><?php echo $_smarty_tpl->tpl_vars['row']->value['idCidade'];?>
</td>
                            <td><?php echo $_smarty_tpl->tpl_vars['row']->value['Estado'];?>
</td>
                            <td><?php echo $_smarty_tpl->tpl_vars['row']->value['Nome'];?>
</td>
                            <td class="actions text-center">
                                <a class="btn btn-warning btn-xs" data-toggle="modal" data-target="#upd_novo_cadastro_modal" onclick="loadCidadeUpdModal(<?php echo $_smarty_tpl->tpl_vars['row']->value['idCidade'];?>
, '<?php echo $_smarty_tpl->tpl_vars['row']->value['idEstado'];?>
', '<?php echo $_smarty_tpl->tpl_vars['row']->value['Nome'];?>
')">Editar</a>
                                <a class="btn btn-danger btn-xs" onclick="if(confirm('Confirma exclusão do registro? Ao Confirmar o item será excluído!'))document.FormExcluir_<?php echo $_smarty_tpl->tpl_vars['row']->value['idCidade'];?>
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

<?php $_smarty_tpl->_subTemplateRender("file:view/cidadeAddModal.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

<?php $_smarty_tpl->_subTemplateRender("file:view/cidadeUpdModal.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

                    
<?php $_smarty_tpl->_subTemplateRender("file:view/endListas.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

<?php }
}
