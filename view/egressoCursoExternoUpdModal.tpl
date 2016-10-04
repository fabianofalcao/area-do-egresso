<!-- Bootstrap Modal - To Add New Record -->
<!-- Modal -->
<div class="modal fade" id="upd_novo_cadastro_modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h3 class="modal-title" id="myModalLabel">Editar curso realizado pós IFMG-SJE</h3>
            </div>
            <form action="egressoCursoExterno.php?inputPesquisa={$inputPesquisa}" method="post" name="frmCadastrar">
                <div class="modal-body">
                    <div class="form-group col-md-12">
                    <label>Modalidade*</label>
                        <select class="form-control input-sm" name="idModalidadeCurso" id="idModalidadeUpd" required autofocus>
                            <option></option>
                            {foreach from=$listaModalidade item=j}
                                <option value="{$j['idModalidadeCurso']}">{$j['Descricao']}</option>
                            {/foreach}
                        </select>
                        <input type="hidden" name="idAluno" id="idAlunoUpd"/>
                    </div>
                    <div class="form-group col-md-12">
                        <label for="Nome">Curso externo</label>
                        <input type="text" name="NomeCursoExterno" id="NomeCursoExternoUpd" placeholder="Digite o nome do curso" class="form-control" required/>
                    </div>
                    <div class="form-group col-md-12">
                        <label for="Nome">Instituicao</label>
                        <input type="text" name="Instituicao" id="InstituicaoUpd" placeholder="Digite o nome ds instituição" class="form-control" required/>
                    </div>
                </div>
                        <hr>        
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
                    <button type="submit" class="btn btn-primary" name="acao" value="alterar">Salvar</button>
                </div>
            </form>
        </div>
    </div>
</div>