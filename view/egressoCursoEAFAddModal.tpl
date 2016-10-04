<!-- Bootstrap Modal - To Add New Record -->
<!-- Modal -->
<div class="modal fade" id="add_novo_cadastro_modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h3 class="modal-title" id="myModalLabel">Adicionar curso realizado no IFMG-SJE</h3>
            </div>
            <form action="egressoCurso.php?inputPesquisa={$inputPesquisa}" method="post" name="frmCadastrar">
                <div class="modal-body">
                    <div class="form-group col-md-12">
                        <label for="idCurso">Curso</label>
                        <select class="form-control" name="idCurso" id="idCurso" required>
                            <option></option>
                            {foreach from=$listaCurso item=j}
                                <option value="{$j['idCurso']}">{$j['Nome']}</option>
                            {/foreach}
                        </select>
                    </div>
                    <div class="form-group col-md-12">
                        <label for="idAluno">Aluno</label>
                        <select class="form-control" name="idAluno" id="idAluno" required>
                            <option></option>
                            {foreach from=$listaAluno item=j}
                                <option value="{$j['idAluno']}">{$j['Nome']}</option>
                            {/foreach}
                        </select>
                    </div>
                    <div class="form-group col-md-6">
                        <label for="AnoIngresso">Ano de Ingresso</label>
                        <select class="form-control" name="AnoIngresso" id="AnoIngresso" required>
                            <option></option>
                            {foreach from=$listaAnos item=j}
                                <option value="{$j}">{$j}</option>
                            {/foreach}
                        </select>
                    </div>
                    <div class="form-group col-md-6">
                        <label for="AnoFormacao">Ano de Formação</label>
                        <select class="form-control" name="AnoFormacao" id="AnoFormacao" required>
                            <option></option>
                            {foreach from=$listaAnos item=j}
                                <option value="{$j}">{$j}</option>
                            {/foreach}
                        </select>
                    </div>
                </div>
                        <hr>       
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
                    <button type="submit" class="btn btn-primary" name="acao" value="inserir">Adicionar</button>
                </div>
            </form>
        </div>
    </div>
</div>