<!-- Bootstrap Modal - To Add New Record -->
<!-- Modal -->
<div class="modal fade" id="upd_cadastro_modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h3 class="modal-title" id="myModalLabel">Editar nível de satisfação</h3>
            </div>

            <form action="nivelSatisfacao.php" method="post" name="frmEditar">
                <div class="modal-body">
                    <div class="form-group">
                        <label for="Descricao">Descrição</label>
                        <input type="text" name="Descricao" id="DescricaoModalUpd" placeholder="Digite uma descrição" class="form-control" required/>
                        <input type="hidden" name="idNivelSatisfacao" id="idNivelSatisfacaoModalUpd"/>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
                    <button type="submit" class="btn btn-primary" name="acao" value="alterar">Salvar</button>
                </div>
            </form>
        </div>
    </div>
</div>