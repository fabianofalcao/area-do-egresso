function loadNivelSatisfacaoUpdModal(id, descricao){
    $('#DescricaoModalUpd').val(descricao);
    $('#idNivelSatisfacaoModalUpd').val(id);    
}

function loadCursoUpdModal(id, idModalidade, Nome){
    $('#idModalidadeUpd option[value="' + idModalidade + '"]').attr({selected: "selected"});
    $('#idCursoModalUpd').val(id);
    $('#NomeModalUpd').val(Nome);
}

function loadModalidadeModal(id, descricao){
    console.log(id, descricao);
    $('#DescModalidadeModalUpd').val(descricao);
    $('#idModalidadeModalUpd').val(id);
}

function loadCidadeUpdModal(id, idEstado, Nome){
    $('#idEstadoUpd option[value="' + idEstado + '"]').attr({selected: "selected"});
    $('#idCidadeModalUpd').val(id);
    $('#NomeModalUpd').val(Nome);
}

function loadEgressoDgUpdModal(id, Nome, Apelido, CPF, Telefone, Celular, Email,
                               idCidade, idEstado, Logradouro, Numero, 
                               Complemento, Bairro, CEP){
    $('#idAlunoUpd').val(id);
    $('#NomeUpd').val(Nome);
    $('#ApelidoUpd').val(Apelido);
    $('#CPFUpd').val(CPF);
    $('#TelefoneUpd').val(Telefone);
    $('#CelularUpd').val(Celular);
    $('#EmailUpd').val(Email);
    $('#idCidadeUpd option[value="' + idCidade + '"]').attr({selected: "selected"});
    $('#idEstadoUpd option[value="' + idEstado + '"]').attr({selected: "selected"});
    $('#LogradouroUpd').val(Logradouro);
    $('#NumeroUpd').val(Numero);
    $('#ComplementoUpd').val(Complemento);
    $('#BairroUpd').val(Bairro);
    $('#CEPUpd').val(CEP);
}

function loadEgressoCursoEAFUpdModal(idAluno, idCurso, AnoIngresso, AnoFormacao){
    $('#idAlunoUpd option[value="' + idAluno + '"]').attr({selected: "selected"});
    $('#idCursoUpd option[value="' + idCurso + '"]').attr({selected: "selected"});
    $('#AnoIngressoUpd option[value="' + AnoIngresso + '"]').attr({selected: "selected"});
    $('#AnoFormacaoUpd option[value="' + AnoFormacao + '"]').attr({selected: "selected"});
}

function loadEgressoCursoExternoUpdModal(idAluno, CursoExterno, Instituicao, idModalidade){
    $('#idModalidadeUpd option[value="' + idModalidade + '"]').attr({selected: "selected"});
    $('#NomeCursoExternoUpd').val(CursoExterno);
    $('#InstituicaoUpd').val(Instituicao);
    $('#idAlunoUpd').val(idAluno);
}
