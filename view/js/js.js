;(function($)
{
        var cursosSelecionados = [];
        var anosIngresso = [];
        var anosFormacao = [];
        
        var cursosExternos = [];
        var modalidade = [];
        var instituicao = [];
        
        
	var App = function(args)
	{
		this.main();
	};

	App.prototype.main = function()
	{
		this.initListeners();
	};

	App.prototype.initListeners = function()
	{
		// codigo aqui
	    // relogio
	    $('.jclock').jclock();
	    // marcar botao clicado
	    var url = window.location.pathname;
		url = url.slice(url.lastIndexOf('/')+1);
	    $('a[href="' + url + '"]').parent().addClass('active');

	    // filtrar os alunos na lista
	    $("#txtBusca").keyup(function()
	    { 
			var texto = $(this).val().toUpperCase();

			// $(".groupUser").css("display", "block");
			$(".groupUser").removeClass('name-hidden');
			$(".nomeUser").each(function()
			{	
				if($(this).text().toUpperCase().indexOf(texto) < 0)
				   $(this).parent().addClass('name-hidden');
				   // $(this).parent().css("display", "none");
			});
		});

		// validar arquivo excel
		$('#enviarExcel').click(function()
		{
			var text = $('#arquivoExcel').val();

			if ( text.slice(text.lastIndexOf('.')+1) != 'xls' )
			{
				alert("Somente arquivos .xls");
				return false;
			}
		});

		//mascaras
		$('#dataNasc').mask('99/99/9999');
                $('#Telefone').mask('(99) 9999-9999');
                $('#Celular').mask("(99) 9999-9999");
                $('#CEP').mask("99999-999");
                $('#CPF').mask('999.999.999-99');
                
                //carregar cidades de acordo com o estado
                $('#idEstado').on('change', function()
                {
                   $('#idCidade').load("carregarCidades.php?idEstado="+this.value); 
                });
           
                //Campos data
		$( "#Data" ).datepicker(
		{
	        showButtonPanel:true,
	        dateFormat: 'dd/mm/yy',
	        changeMonth: true,
        	changeYear: true,
        	showOtherMonths: true,
        	selectOtherMonths: true,
        	ayNames: ['Domingo','Segunda','Terça','Quarta','Quinta','Sexta','Sábado','Domingo'],
	        dayNamesMin: ['D','S','T','Q','Q','S','S','D'],
	        dayNamesShort: ['Dom','Seg','Ter','Qua','Qui','Sex','Sáb','Dom'],
	        monthNames: ['Janeiro','Fevereiro','Março','Abril','Maio','Junho','Julho','Agosto','Setembro','Outubro','Novembro','Dezembro'],
	        monthNamesShort: ['Jan','Fev','Mar','Abr','Mai','Jun','Jul','Ago','Set','Out','Nov','Dez']
    	});
        
        $('#addCurso').on('click', function()
        {
            var value = $('.cursosFormInscricao').val();
            var name = $('.cursosFormInscricao option:selected').text();
            var anoIngresso = $('.anoIngresso').val();
            var anoFormacao = $('.anoFormacao').val();
            
            if (name == '') {
                alert("Informe o curso realizado na EAF/IFMG-SJE");
            }            
            else if (parseInt(anoIngresso) > parseInt(anoFormacao))
            {
                alert("O ano de ingresso não pode ser maior que o ano de formação!");
            }
            else
            {
                if (cursosSelecionados.indexOf(value) == -1)
                {
                    cursosSelecionados.push(value);
                    anosIngresso.push(anoIngresso);
                    anosFormacao.push(anoFormacao);
                    
                    var newRow = $("<tr id='removeCurso'>");
                    var inp = "";
                    
                    var inp =
                    "<td width='35%' style='text-align: left;'>"+name+"</td>"+  
                    "<td width='15%' style='text-align: center;'>"+anoIngresso+"</td>"+  
                    "<td width='40%' style='text-align: center;'>"+anoFormacao+"</td>"+  
                    "<td width='10%' style='text-align: center;'>"+
                        "<a title='Excluir.' onclick='returnfalse;' value='"+value+"'><img src='View/img/bt_excluir.png' width='15' height='15' alt='Excluir' /></a>"+
                    "</td>";
                    newRow.append(inp);
                   
                    
                    
                    
                    $('#minhaTabelaCurso').append(newRow);

                    $('#cursos').val(cursosSelecionados);
                    $('#anosIngresso').val(anosIngresso);
                    $('#anosFormacao').val(anosFormacao);
                }
                 //Fechar Modal e Limpar campos
            $("#modalNovoCursoEAF").modal("hide");
            $("#idCurso").val("");
            $("#AnoFormacao").val("");
            $("#AnoIngresso").val("");
            }
           
        });
        
        $(document).on('click', '#removeCurso', function()
        {
            var index = cursosSelecionados.indexOf(this.value);

            cursosSelecionados.splice(index, 1);
            anosIngresso.splice(index, 1);
            anosFormacao.splice(index, 1);
            $('#'+this.value).remove();
            this.remove();

            $('#cursos').val(cursosSelecionados);
            $('#anosIngresso').val(anosIngresso);
            $('#anosFormacao').val(anosFormacao);
        });
        
        
        
        $('#addCursoExterno').on('click', function()
        {
            var NomeCurso = $('.NomeCursoExterno').val();
            var IdModalidade = $('.modalidadeCursoExterno').val();
            var NomeModalidade = $('.modalidadeCursoExterno option:selected').text();
            var Instituicao = $('.instituicao').val();
            
            
            if (NomeCurso == '') {
                alert("Informe o nome do curso realizado pós EAF/IFMG-SJE!");
            }            
            else if (IdModalidade == '')
            {
                alert("Informe a modalidade do curso realizado pós EAF/IFMG-SJE!");
            }
            else if (Instituicao == '') {
                alert("Informe a instituição onde foi realizado o curso pós EAF/IFMG-SJE");
            }
            else
            {
                if (cursosExternos.indexOf(NomeCurso) == -1)
                {
                    cursosExternos.push(NomeCurso);
                    modalidade.push(IdModalidade);
                    instituicao.push(Instituicao);
                    
                    var newRow = $("<tr id='removeCursoExterno'>");
                    var inpce = "";
                    
                    var inpce =
                    "<td width='35%' style='text-align: left;'>"+NomeCurso+"</td>"+  
                    "<td width='15%' style='text-align: center;'>"+NomeModalidade+"</td>"+  
                    "<td width='40%' style='text-align: center;'>"+Instituicao+"</td>"+  
                    "<td width='10%' style='text-align: center;'>"+
                        "<a title='Excluir.' onclick='returnfalse;' value='"+NomeCurso+"'><img src='View/img/bt_excluir.png' width='15' height='15' alt='Excluir' /></a>"+
                    "</td>";
                    newRow.append(inpce);
                    
                    $('#minhaTabelaCursoExterno').append(newRow);

                    $('#NomeCursoExterno').val(cursosExternos);
                    $('#idModalidadeCurso').val(modalidade);
                    $('#Instituicao').val(instituicao);
                }
                 //Fechar Modal e Limpar campos
            $("#modalNovoCursoExterno").modal("hide");
            $("#NomeCursoExterno").val("");
            $("#idModalidadeCurso").val("");
            $("#Instituicao").val("");
            }
        });
        
        $(document).on('click', '#removeCursoExterno', function()
        {
            var index = cursosExternos.indexOf(this.value);

            cursosExternos.splice(index, 1);
            modalidade.splice(index, 1);
            instituicao.splice(index, 1);
            $('#'+this.value).remove();
            this.remove();

            $('#cursosExternos').val(cursosExternos);
            $('#idModalidadeCursoExterno').val(modalidade);
            $('#InstituicaoCursoExterno').val(instituicao);
        });
        
        
        

	$('#FormInserirAluno').submit(function() 
        {
            if (this.Nome.value == "" || this.CPF.value == ""|| this.Logradouro == ""||
                this.CEP.value == "")
            {
                alert("Preencha todos os campos obrigatórios!");
                this.Nome.focus();
                return false;
            }
            else if (this.cursos.value == "")
            {
                alert("Selecione o curso realizado na EAF/IFMG-SJE!");
                return false;
            }
            
        });
        
    };	

    $(function()
    {
	new App(null);
    });

})(jQuery);


function testCPF(cpf)
{
    cpf = cpf.replace(/[^\d]+/g,'');    
    if(cpf == '') return false; 
    // Elimina CPFs invalidos conhecidos    
    if (cpf.length != 11 || 
        cpf == "00000000000" || 
        cpf == "11111111111" || 
        cpf == "22222222222" || 
        cpf == "33333333333" || 
        cpf == "44444444444" || 
        cpf == "55555555555" || 
        cpf == "66666666666" || 
        cpf == "77777777777" || 
        cpf == "88888888888" || 
        cpf == "99999999999")
            return false;       
    // Valida 1o digito 
    add = 0;    
    for (i=0; i < 9; i ++)       
        add += parseInt(cpf.charAt(i)) * (10 - i);  
        rev = 11 - (add % 11);  
        if (rev == 10 || rev == 11)     
            rev = 0;    
        if (rev != parseInt(cpf.charAt(9)))     
            return false;       
    // Valida 2o digito 
    add = 0;    
    for (i = 0; i < 10; i ++)        
        add += parseInt(cpf.charAt(i)) * (11 - i);  
    rev = 11 - (add % 11);  
    if (rev == 10 || rev == 11) 
        rev = 0;    
    if (rev != parseInt(cpf.charAt(10)))
        return false;       
    return true;   
}