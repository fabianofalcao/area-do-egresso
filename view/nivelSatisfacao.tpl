{include file="view/begin.tpl"}


<article>

    <div id="main" class="container">
        <div id="titulo" class="row">
            <div class="col-md-12">
                <h2>:: Níveis de satisfação ::</h2>
                <hr>
            </div>
        </div>
        <div id="barraPesquisa" class="row">
            <div class="col-md-10">
                <form role="form" name="formPesquisa" id="formPesquisa" action="nivelSatisfacao.php" method="get">
                    <div class="input-group h2">
                        <input name="inputPesquisa" class="form-control" id="inputPesquisa" type="text" placeholder="Pesquisar níveis de satisfação" value="{$inputPesquisa}">
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
        {$ErrMsg}
        <div id="list" class="row">

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
                        {foreach from=$lista item=row}
                        <form action="nivelSatisfacao.php" method="post" name="FormExcluir_{$row.idNivelSatisfacao}">
                            <input name="idNivelSatisfacao" type="hidden" value="{$row.idNivelSatisfacao}" />                                                
                            <input name="acao" type="hidden" value="excluir" /> 
                        </form>	 
                        <tr>
                            <td>{$row.idNivelSatisfacao}</td>
                            <td>{$row.Descricao}</td>
                            <td class="actions text-center">
                                <a class="btn btn-warning btn-xs" data-toggle="modal" data-target="#upd_cadastro_modal" onclick="loadNivelSatisfacaoUpdModal({$row.idNivelSatisfacao}, '{$row.Descricao}')">Editar</a>
                                <a class="btn btn-danger btn-xs" onclick="if(confirm('Confirma exclusão do registro? Ao Confirmar o item será excluído!'))document.FormExcluir_{$row.idNivelSatisfacao}.submit();">Excluir</a>
                            </td>
                        </tr>
                    {/foreach}

                    </tbody>
                </table>
            </div> <!-- /#list -->
            <hr>
            <div id="bottom" class="row">
                
                <div class="col-md-12 text-center">
                    {$paginacao}
                </div>
                
            </div> <!-- /#bottom -->
        </div>  <!-- /#main -->
    </div>
</article>


<footer style="margin-top: 50px;">
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

{include file="view/nivelSatisfacaoAddModal.tpl"}
{include file="view/nivelSatisfacaoUpdModal.tpl"}



<script src="./view/js/jquery.js"></script>
<script src="./view/bootstrap-3.3.6/js/bootstrap.min.js"></script>
<script src="./view/js/jclock.js"></script>      
<script src="./view/js/jmask.js"></script>      
<script src="./view/js/jquery-ui.js"></script> 
<script src="./view/js/modais.js"></script> 


</body>
</html>