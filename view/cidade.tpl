{include file="view/begin.tpl"}

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
                        <input name="inputPesquisa" class="form-control" id="inputPesquisa" type="text" placeholder="Pesquisar por cidades" value="{$inputPesquisa}">
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
        {$ErrMsg}
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
                        {foreach from=$lista item=row}
                        <form action="cidade.php" method="post" name="FormExcluir_{$row.idCidade}">
                            <input name="idCidade" type="hidden" value="{$row.idCidade}" />                                                
                            <input name="acao" type="hidden" value="excluir" /> 
                        </form>	 
                        <tr>
                            <td>{$row.idCidade}</td>
                            <td>{$row.Estado}</td>
                            <td>{$row.Nome}</td>
                            <td class="actions text-center">
                                <a class="btn btn-warning btn-xs" data-toggle="modal" data-target="#upd_novo_cadastro_modal" onclick="loadCidadeUpdModal({$row.idCidade}, '{$row.idEstado}', '{$row.Nome}')">Editar</a>
                                <a class="btn btn-danger btn-xs" onclick="if(confirm('Confirma exclusão do registro? Ao Confirmar o item será excluído!'))document.FormExcluir_{$row.idCidade}.submit();">Excluir</a>
                            </td>
                        </tr>
                    {/foreach}
                    </tbody>
                </table>
            </div>
            <hr>
            <div id="bottom" class="row">
                <div class="col-md-12 text-center">
                    {$paginacao}
                </div>
            </div> <!-- /#bottom -->
        </div>
    </div>
</article>

{include file="view/cidadeAddModal.tpl"}
{include file="view/cidadeUpdModal.tpl"}
                    
{include file="view/endListas.tpl"}
