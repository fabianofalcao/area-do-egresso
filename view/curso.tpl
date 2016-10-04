{include file="view/begin.tpl"}

<article>
    <div id="main" class="container">
        <div id="titulo" class="row">
            <div class="col-md-12">
                <h2>:: Cursos ::</h2>
                <hr>
            </div>
        </div>
        
        <div id="barraPesquisa" class="row">
            <div class="col-md-10">
                <form role="form" name="formPesquisa" id="formPesquisa" action="curso.php" method="get">
                    <div class="input-group h2">
                        <input name="inputPesquisa" class="form-control" id="inputPesquisa" type="text" placeholder="Pesquisar por cursos" value="{$inputPesquisa}">
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
                            <th style="width: 25%;">Modalidade</th>
                            <th style="width: 45%;">Curso</th>
                            <th style="width: 20%;"class="actions text-center">Ações</th>
                        </tr>
                    </thead>
                    <tbody>
                        {foreach from=$lista item=row}
                        <form action="curso.php" method="post" name="FormExcluir_{$row.idCurso}">
                            <input name="idCurso" type="hidden" value="{$row.idCurso}" />                                                
                            <input name="acao" type="hidden" value="excluir" /> 
                        </form>	 
                        <tr>
                            <td>{$row.idCurso}</td>
                            <td>{$row.Modalidade}</td>
                            <td>{$row.Nome}</td>
                            <td class="actions text-center">
                                <a class="btn btn-warning btn-xs" data-toggle="modal" data-target="#upd_novo_cadastro_modal" onclick="loadCursoUpdModal({$row.idCurso}, '{$row.idModalidadeCurso}', '{$row.Nome}')">Editar</a>
                                <a class="btn btn-danger btn-xs" onclick="if(confirm('Confirma exclusão do registro? Ao Confirmar o item será excluído!'))document.FormExcluir_{$row.idCurso}.submit();">Excluir</a>
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

{include file="view/cursoAddModal.tpl"}
{include file="view/cursoUpdModal.tpl"}
                    
{include file="view/endListas.tpl"}
