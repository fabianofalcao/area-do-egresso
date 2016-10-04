{include file="view/begin.tpl"}

<article>
    <div id="main" class="container">
        <div id="titulo" class="row">
            <div class="col-md-12">
                <h2>:: Egressos - Dados gerais ::</h2>
                <hr>
            </div>
        </div>
        
        <div id="barraPesquisa" class="row">
            <div class="col-md-10">
                <form role="form" name="formPesquisa" id="formPesquisa" action="egressoDadosGerais.php" method="get">
                    <div class="input-group h2">
                        <input name="inputPesquisa" class="form-control" id="inputPesquisa" type="text" placeholder="Pesquisar por egressos" value="{$inputPesquisa}">
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
                            <th style="width: 40%;">Aluno</th>
                            <th style="width: 15%;">CPF</th>
                            <th style="width: 25%;">Cidade</th>
                            <th style="width: 10%;"class="actions text-center">Ações</th>
                        </tr>
                    </thead>
                    <tbody>
                        {foreach from=$lista item=row}
                        <tr>
                            <td>{$row.idAluno}</td>
                            <td>{$row.Nome}</td>
                            <td>{$row.CPF}</td>
                            <td>{$row.NomeCidade}</td>
                            <td class="actions text-center">
                                <a class="btn btn-warning btn-xs" data-toggle="modal" data-target="#upd_novo_cadastro_modal" 
                                    onclick="loadEgressoDgUpdModal({$row.idAluno}, '{$row.Nome}', '{$row.Apelido}', '{$row.CPF}' , '{$row.Telefone}',
                                                                  '{$row.Celular}', '{$row.Email}', '{$row.idCidade}', 
                                                                  '{$row.idEstado}', '{$row.Logradouro}',
                                                                  '{$row.Numero}', '{$row.Complemento}', '{$row.Bairro}', '{$row.CEP}')">Editar</a>
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

{include file="view/egressoDadosGeraisAddModal.tpl"}
{include file="view/egressoDadosGeraisUpdModal.tpl"}
                    
{include file="view/endListas.tpl"}
