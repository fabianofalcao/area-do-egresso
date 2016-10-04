{include file="view/begin.tpl"}


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
                        <input name="inputPesquisa" class="form-control" id="inputPesquisa" type="text" placeholder="Pesquisar modalidades de curso" value="{$inputPesquisa}">
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
                            <th style="width: 70%;">Modalidade de curso</th>
                            <th style="width: 20%;"class="actions text-center">Ações</th>
                        </tr>
                    </thead>
                    <tbody>
                        {foreach from=$lista item=row}
                        <form action="modalidadeCurso.php" method="post" name="FormExcluir_{$row.idModalidadeCurso}">
                            <input name="idModalidadeCurso" type="hidden" value="{$row.idModalidadeCurso}" />                                                
                            <input name="acao" type="hidden" value="excluir" /> 
                        </form>	 
                        <tr>
                            <td>{$row.idModalidadeCurso}</td>
                            <td>{$row.Descricao}</td>
                            <td class="actions text-center">
                                <a class="btn btn-warning btn-xs" data-toggle="modal" data-target="#upd_cadastro_modal" onclick="loadModalidadeModal({$row.idModalidadeCurso}, '{$row.Descricao}');">Editar</a>
                                <a class="btn btn-danger btn-xs" onclick="if(confirm('Confirma exclusão do registro? Ao Confirmar o item será excluído!'))document.FormExcluir_{$row.idModalidadeCurso}.submit();">Excluir</a>
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
                
{include file="view/modalidadeCursoAddModal.tpl"}
{include file="view/modalidadeCursoUpdModal.tpl"}


{include file="view/endListas.tpl"}