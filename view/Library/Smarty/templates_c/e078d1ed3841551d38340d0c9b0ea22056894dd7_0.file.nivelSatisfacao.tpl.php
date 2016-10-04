<?php
/* Smarty version 3.1.30, created on 2016-09-21 15:42:28
  from "C:\ServidorWeb\www\area-do-egresso\admin\view\nivelSatisfacao.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_57e2d49475f638_92094912',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'e078d1ed3841551d38340d0c9b0ea22056894dd7' => 
    array (
      0 => 'C:\\ServidorWeb\\www\\area-do-egresso\\admin\\view\\nivelSatisfacao.tpl',
      1 => 1474483345,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:view/begin.tpl' => 1,
    'file:view/nivelSatisfacaoAddModal.tpl' => 1,
  ),
),false)) {
function content_57e2d49475f638_92094912 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_subTemplateRender("file:view/begin.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>



<article>

    <div id="main" class="container">
        <div id="titulo" class="row">
            <div class="col-md-12">
                <h2>Níveis de satisfação</h2>
                <hr>
            </div>
        </div>
        <div id="barraPesquisa" class="row">
            <div class="col-md-10">
               
                    <div class="input-group h2">
                        <input name="data[search]" class="form-control" id="search" type="text" placeholder="Pesquisar níveis de satisfação">
                        <span class="input-group-btn">
                            <button class="btn btn-primary" type="button" onclick="listaNivelSatisfacao();">
                                <span class="glyphicon glyphicon-search"></span>
                            </button>
                        </span>
                    </div>
                
            </div>
            <div class="col-md-2">
                <button class="btn btn-primary pull-right h2" data-toggle="modal" data-target="#add_novo_cadastro_modal">+Novo cadastro</button>
            </div>
        </div> <!-- /#top -->

        <hr />
        <div id="list" class="row">
            <!--
            <div class="table-responsive col-md-12">
                 <table class="table table-striped" cellspacing="0" cellpadding="0">
                    <thead>
                        <tr>
                            <th style="width: 10%;">Id</th>
                            <th style="width: 70%;">Nivel de satisfação</th>
                            <th style="width: 20%;"class="actions text-center">Ações</th>
                        </tr>
                    </thead>
                    <tbody>

                        <tr>
                            <td>1001</td>
                            <td>Lorem ipsum dolor sit amet, consectetur adipiscing</td>
                            <td class="actions text-center">
                                <a class="btn btn-success btn-xs " href="view.html">Visualizar</a>
                                <a class="btn btn-warning btn-xs  " href="edit.html">Editar</a>
                                <a class="btn btn-danger btn-xs "  href="#" data-toggle="modal" data-target="#delete-modal">Excluir</a>
                            </td>
                        </tr>

                    </tbody>
                </table>
            </div>
            -->
        </div> <!-- /#list -->
        <hr>
        <div id="bottom" class="row">
            <div class="col-md-12 text-center">

                <ul class="pagination">
                    <li class="disabled"><a>&lt; Anterior</a></li>
                    <li class="disabled"><a>1</a></li>
                    <li><a href="#">2</a></li>
                    <li><a href="#">3</a></li>
                    <li class="next"><a href="#" rel="next">Próximo &gt;</a></li>
                </ul><!-- /.pagination -->

            </div>
        </div> <!-- /#bottom -->
    </div>  <!-- /#main -->

</article>


<footer class="navbar navbar-fixed-bottom">
    <div class="col-md-3">

    </div>
    <div class="col-md-6" style="text-align: center;">
        IFMG <i>Campus</i> São João Evanglista<br/>
        Área do egresso COAGRI/EAFSJE/IFMG-SJE
    </div>
    <div class="col-md-3">
        <span class="jclock"></span>
    </div>
</footer>

<?php $_smarty_tpl->_subTemplateRender("file:view/nivelSatisfacaoAddModal.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>



<?php echo '<script'; ?>
 src="./view/js/jquery.js"><?php echo '</script'; ?>
>
<?php echo '<script'; ?>
 src="./view/bootstrap-3.3.6/js/bootstrap.min.js"><?php echo '</script'; ?>
>
<?php echo '<script'; ?>
 src="./view/js/jclock.js"><?php echo '</script'; ?>
>      
<?php echo '<script'; ?>
 src="./view/js/jmask.js"><?php echo '</script'; ?>
>      
<?php echo '<script'; ?>
 src="./view/js/jquery-ui.js"><?php echo '</script'; ?>
> 
<?php echo '<script'; ?>
 src="./view/js/ajax.js"><?php echo '</script'; ?>
> 

</body>
</html><?php }
}
