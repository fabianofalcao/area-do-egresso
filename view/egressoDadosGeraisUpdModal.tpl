<!-- Bootstrap Modal - To Add New Record -->
<!-- Modal -->
<div class="modal fade" id="upd_novo_cadastro_modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h3 class="modal-title" id="myModalLabel">Editar egresso - Dados gerais</h3>
            </div>
            <form action="egressoDadosGerais.php" method="post" name="frmCadastrar">
                <div class="modal-body">
                    <fieldset>
                        <legend>Dados gerais</legend>
                        <input type="hidden" name="idAluno" id="idAlunoUpd"/>
                    <div class="form-group col-md-6">
                        <label for="Nome">Nome completo*</label>
                        <input type="text" name="Nome" id="NomeUpd" placeholder="Digite o nome completo" class="form-control" required/>
                    </div>
                    <div class="form-group col-md-3">
                        <label for="Apelido">Apelido</label>
                        <input type="text" name="Apelido" id="ApelidoUpd" placeholder="Digite o apelido da época de estudante" class="form-control"/>
                    </div>
                    <div class="form-group col-md-3">
                        <label for="CPF">CPF*</label>
                        <input type="text" name="CPF" id="CPFUpd" placeholder="Digite o CPF" class="form-control" required/>
                    </div>
                    <div class="form-group col-md-3">
                        <label for="Telefone">Telefone</label>
                        <input type="text" name="Telefone" id="TelefoneUpd" placeholder="Digite o telefone" class="form-control"/>
                    </div>
                    <div class="form-group col-md-3">
                        <label for="Celular">Celular</label>
                        <input type="text" name="Celular" id="CelularUpd" placeholder="Digite o celular" class="form-control"/>
                    </div>
                    <div class="form-group col-md-6">
                        <label for="Email">E-mail*</label>
                        <input type="text" name="Email" id="EmailUpd" placeholder="Digite o e-mail" class="form-control" required/>
                    </div>
                    </fieldset>
                    <fieldset>
                        <legend>Endereço</legend>
                    <div class="form-group col-md-2">
                        <label for="CEP">CEP*</label>
                        <input type="text" name="CEP" id="CEPUpd" placeholder="Digite o CEP" class="form-control" required/>
                    </div>
                    <div class="form-group col-md-4">
                        <label>Estado*</label>
                        <select class="form-control" name="idEstado" id="idEstadoUpd" required>
                            <option></option>
                            {foreach from=$listaEstado item=j}
                                <option value="{$j['idEstado']}">{$j['Nome']}</option>
                            {/foreach}
                        </select>
                    </div>
                    <div class="form-group col-md-6">
                        <label for="Cidade">Cidade*</label>
                        <select class="form-control" name="idCidade" id="idCidadeUpd" required>
                            <option></option>
                            {foreach from=$listaCidade item=j}
                                <option value="{$j['idCidade']}">{$j['Nome']}</option>
                            {/foreach}
                        </select>
                    </div>
                    <div class="form-group col-md-4">
                        <label for="Logradouro">Logradouro</label>
                        <input type="text" name="Logradouro" id="LogradouroUpd" placeholder="Digite a rua, av, etc." class="form-control"/>
                    </div>                    
                    <div class="form-group col-md-2">
                        <label for="Numero">Número</label>
                        <input type="text" name="Numero" id="NumeroUpd" placeholder="Digite o número." class="form-control"/>
                    </div>
                    <div class="form-group col-md-2">
                        <label for="Complemento">Complemento</label>
                        <input type="text" name="Complemento" id="ComplementoUpd" placeholder="Digite o complemento." class="form-control"/>
                    </div>
                    <div class="form-group col-md-4">
                        <label for="Bairro">Bairro</label>
                        <input type="text" name="Bairro" id="BairroUpd" placeholder="Digite a rua, av, etc." class="form-control"/>
                    </div>
                    </fieldset>
                </div>
                        
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
                    <button type="submit" class="btn btn-primary" name="acao" value="alterar">Salvar</button>
                </div>
            </form>
        </div>
    </div>
</div>