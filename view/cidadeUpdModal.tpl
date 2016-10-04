<!-- Bootstrap Modal - To Add New Record -->
<!-- Modal -->
<div class="modal fade" id="upd_novo_cadastro_modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h3 class="modal-title" id="myModalLabel">Editar cidade</h3>
            </div>
            <form action="cidade.php" method="post" name="frmCadastrar">
                <div class="modal-body">
                    <div class="form-group">
                    <label>Estado*</label>
                        <select class="form-control input-sm" name="idEstado" id="idEstadoUpd" required autofocus>
                            <option></option>
                            {foreach from=$listaEstado item=j}
                                <option value="{$j['idEstado']}">{$j['Nome']}</option>
                            {/foreach}
                        </select>
                        <input type="hidden" name="idCidade" id="idCidadeModalUpd"/>
                    </div>
                    <div class="form-group">
                        <label for="Nome">Cidade</label>
                        <input type="text" name="Nome" id="NomeModalUpd" placeholder="Digite o nome da cidade" class="form-control" required/>
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