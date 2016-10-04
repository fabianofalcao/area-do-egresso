function addRecordCursoEAF(){
    //get values
    var idCurso = $("#idCurso").val();
    var AnoIngresso = $("#AnoIngresso").val();
    var AnoFormacao = $("#AnoFormacao").val();
    var idAluno = $("#idAluno").val();
    
    //Add record
    $.post("addRecordCursoEAF.php", {
        idCurso: idCurso,
        AnoIngresso: AnoIngresso,
        AnoFormacao: AnoFormacao,
        idAluno: idAluno
    }, function(data, status){
        //close the popup
        $("#modalNovoCursoEAF").modal("hide");
        
        // read fields from the popup
        $("#idCurso").val("");
        $("#AnoIngresso").val("");
        $("#AnoFormacao").val("");
        $("#idAluno").val("");
    });
}

function addRecordCursoExterno(){
    //get values
    var idModalidadeCurso = $("#idModalidadeCurso").val();
    var NomeCursoExterno = $("#NomeCursoExterno").val();
    var Instituicao = $("#Instituicao").val();
    var idAluno = $("#idAluno").val();
    
    //Add record
    $.post("addRecordCursoExterno.php", {
        idModalidadeCurso: idModalidadeCurso,
        NomeCursoExterno: NomeCursoExterno,
        Instituicao: Instituicao,
        idAluno: idAluno
    }, function(data, status){
        //close the popup
        $("#modalNovoCursoExterno").modal("hide");
         readRecords();
        // read fields from the popup
        $("#idModalidadeCurso").val("");
        $("#NomeCursoExterno").val("");
        $("#Instituicao").val("");
        
    });
}

function addRecordCursoEAF(){
    //get values
    var idCurso = $("#idCurso").val();
    var AnoIngresso = $("#AnoIngresso").val();
    var AnoFormacao = $("#AnoFormacao").val();
    var idAluno = $("#idAluno").val();
    
    //Add record
    $.post("addRecordCursoEAF.php", {
        idCurso: idCurso,
        AnoIngresso: AnoIngresso,
        AnoFormacao: AnoFormacao,
        idAluno: idAluno
    }, function(data, status){
        //close the popup
        $("#modalNovoCursoEAF").modal("hide");
         readRecordsCursoEAF();
        // read fields from the popup
        $("#idCurso").val("");
        $("#AnoFormacao").val("");
        $("#AnoIngresso").val("");
        
    });
}



//Read records
function readRecords(){
    $.get("carregarTabelaAlunoCursoExterno.php", {}, function(data, status){
       $(".carregarTabelaAlunoCursoExterno").html(data); 
       console.log(data);
    });
}

//Read records
function readRecordsCursoEAF(){
    $.get("carregarTabelaAlunoCursoEAF.php", {}, function(data, status){
       $(".carregarTabelaAlunoCursoEAF").html(data); 
       console.log(data);
    });
}

function DeleteCursoExterno(idAluno, NomeCursoExterno) {
    var conf = confirm("Deseja realmente excluir registro?");
    if (conf == true) {
        $.post("deleteCursoExterno.php", {
                idAluno: idAluno,
                NomeCursoExterno: NomeCursoExterno
            },
            function (data, status) {
                // reload Users by using readRecords();
                readRecords();
            }
        );
    }
}

function DeleteCursoEAF(idAluno, idCurso) {
    var conf = confirm("Deseja realmente excluir registro?");
    if (conf == true) {
        $.post("deleteCursoEAF.php", {
                idAluno: idAluno,
                idCurso: idCurso
            },
            function (data, status) {
                // reload Users by using readRecords();
                readRecordsCursoEAF();
            }
        );
    }
}

$(document).ready(function () {
    // READ recods on page load
    readRecords(); // calling function
    readRecordsCursoEAF(); // calling function
    
});


