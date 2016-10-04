<!-- Bootstrap Modal - To Add New Record -->
<!-- Modal -->
<div class="modal fade" id="upd_novo_cadastro_modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h3 class="modal-title" id="myModalLabel">Editar curso</h3>
            </div>
            <form action="curso.php" method="post" name="frmCadastrar">
                <div class="modal-body">
                    <div class="form-group">
                    <label>Modalidade*</label>
                        <select class="form-control input-sm" name="idModalidadeCurso" id="idModalidadeUpd" required autofocus>
                            <option></option>
                            {foreach from=$listaModalidade item=j}
                                <option value="{$j['idModalidadeCurso']}">{$j['Descricao']}</option>
                            {/foreach}
                        </select>
                        <input type="hidden" name="idCurso" id="idCursoModalUpd"/>
                    </div>
                    <div class="form-group">
                        <label for="Nome">Curso</label>
                        <input type="text" name="Nome" id="NomeModalUpd" placeholder="Digite o nome do curso" class="form-control" required/>
                    </div>
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
                    <button type="submit" class="btn btn-primary" name="acao" value="alterar">Adicionar</button>
                </div>
            </form>
        </div>
    </div>
</div>