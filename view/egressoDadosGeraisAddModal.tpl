<!-- Bootstrap Modal - To Add New Record -->
<!-- Modal -->
<div class="modal fade" id="add_novo_cadastro_modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h3 class="modal-title" id="myModalLabel">Adicionar egresso - Dados gerais</h3>
            </div>
            <form action="cidade.php" method="post" name="frmCadastrar">
                <div class="modal-body">
                    <fieldset>
                        <legend>Dados gerais</legend>
                    <div class="form-group col-md-6">
                        <label for="Nome">Nome completo*</label>
                        <input type="text" name="Nome" id="Nome" placeholder="Digite o nome completo" class="form-control" required/>
                    </div>
                    <div class="form-group col-md-3">
                        <label for="Apelido">Apelido</label>
                        <input type="text" name="Apelido" id="Apelido" placeholder="Digite o apelido da época de estudante" class="form-control"/>
                    </div>
                    <div class="form-group col-md-3">
                        <label for="CPF">CPF*</label>
                        <input type="text" name="CPF" id="CPF" placeholder="Digite o CPF" class="form-control" required/>
                    </div>
                    <div class="form-group col-md-3">
                        <label for="Telefone">Telefone</label>
                        <input type="text" name="Telefone" id="Telefone" placeholder="Digite o telefone" class="form-control"/>
                    </div>
                    <div class="form-group col-md-3">
                        <label for="Celular">Celular</label>
                        <input type="text" name="Celular" id="Celular" placeholder="Digite o celular" class="form-control"/>
                    </div>
                    <div class="form-group col-md-6">
                        <label for="Email">E-mail*</label>
                        <input type="text" name="Email" id="Email" placeholder="Digite o e-mail" class="form-control" required/>
                    </div>
                    <div class="form-group col-md-6">
                        <label for="Senha">Senha*</label>
                        <input type="password" name="Senha" id="Senha" placeholder="Digite a senha" class="form-control" required/>
                    </div>
                    <div class="form-group col-md-6">
                        <label for="ConfirmaSenha">Confirmação de senha</label>
                        <input type="text" name="ConfirmaSenha" id="ConfirmaSenha" placeholder="Confirme a senha" class="form-control" required/>
                    </div>
                    </fieldset>
                    <fieldset>
                        <legend>Endereço</legend>
                    <div class="form-group col-md-2">
                        <label for="CEP">CEP*</label>
                        <input type="text" name="CEP" id="CEP" placeholder="Digite o CEP" class="form-control" required/>
                    </div>
                    <div class="form-group col-md-4">
                        <label>Estado*</label>
                        <select class="form-control" name="idEstado" id="idEstado" required>
                            <option></option>
                            {foreach from=$listaEstado item=j}
                                <option value="{$j['idEstado']}">{$j['Nome']}</option>
                            {/foreach}
                        </select>
                    </div>
                    <div class="form-group col-md-6">
                        <label for="Cidade">Cidade*</label>
                        <select class="form-control" name="idCidade" id="idCidade" required>
                            <option></option>
                            {foreach from=$listaCidade item=j}
                                <option value="{$j['idCidade']}">{$j['Nome']}</option>
                            {/foreach}
                        </select>
                    </div>
                    <div class="form-group col-md-4">
                        <label for="Logradouro">Logradouro</label>
                        <input type="text" name="Logradouro" id="Logrdouro" placeholder="Digite a rua, av, etc." class="form-control"/>
                    </div>                    
                    <div class="form-group col-md-2">
                        <label for="Numero">Número</label>
                        <input type="text" name="Número" id="Numero" placeholder="Digite o número." class="form-control"/>
                    </div>
                    <div class="form-group col-md-2">
                        <label for="Complemento">Complemento</label>
                        <input type="text" name="Complemento" id="Complemento" placeholder="Digite o complemento." class="form-control"/>
                    </div>
                    <div class="form-group col-md-4">
                        <label for="Bairro">Bairro</label>
                        <input type="text" name="Bairro" id="Bairro" placeholder="Digite a rua, av, etc." class="form-control"/>
                    </div>
                    </fieldset>
                </div>
                        
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
                    <button type="submit" class="btn btn-primary" name="acao" value="inserir">Adicionar</button>
                </div>
            </form>
        </div>
    </div>
</div>