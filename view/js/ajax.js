// Adicionar Registro na tabela Nivel de Satisfacao
function addNivelSatisfacao() {
    // get values
    var descricao = $("#descricao").val();
     
    //Validar e enviar
    if (descricao == '') {
        alert("Informe a descricao");
        $('#descricao').focus();
    }            
    else{
    
        // Add record
        $.post("ajax/nivelSatisfacaoAdd.php", {
            descricao: descricao
        }, function (data, status) {
            // close the popup
            $("#add_novo_cadastro_modal").modal("hide");

            // read records again
            listaNivelSatisfacao();

            // clear fields from the popup
            $("#descricao").val("");
            $('#search').val("");
        });
    }
}
 
// READ records
function listaNivelSatisfacao() {
    var descricao = $('#search').val();
    $.post("ajax/nivelSatisfacaoLista.php", {descricao: descricao}, function (data, status) {
        $("#list").html(data);
    });
}

function excluirNivelSatisfacao(){
    var conf = confirm("Tem certeza que deseja excluir nível de satisfação?");
    if(conf == true){
        $.post("ajax/nivelSatisfacaoDel.php",{ idNivelSatisfacao: idNivelSatisfacao }, function(data, status){
            listaNivelSatisfacao();
        });
    }
}


$(document).ready(function () {
    // READ recods on page load
    listaNivelSatisfacao(); // calling function
});