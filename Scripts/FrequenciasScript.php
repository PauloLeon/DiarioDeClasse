<script src="../js/jquery-1.11.0.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="../js/bootstrap-datepicker.js"></script>
<script src="../js/locales/bootstrap-datepicker.pt-BR.js"></script>
<script src="../Scripts/Justificativa.js"></script>
<script src="../Scripts/Falta.js"></script>

<script>
var arrayAlunosFalta = [];
var arrayJustificativa = [];
var idAux;
var flagForClick = false;
$("#begin div[marcador|='esconderDePrima']").hide();

//referente as listas de faltas
$("#qtdAulasLimitada li").click(function()
{
	  /*id auxiliar para desativar qualquer falta relacionada ao aluno (para o front-end)*/
	  idAux= $(this).attr('idforclicknew');
	  $("#qtdAulasLimitada li[idForClicknew|='"+idAux+"']").attr('class', '');
	  $(this).attr('class', 'active');
		var index;
		for (var i = 0; i < arrayAlunosFalta.length; i++) {
				if (arrayAlunosFalta[i].getIdAluno() == idAux) {
						index = i;
				}
		}
		if (index != undefined) {
			//extraindo somente o valor
			var stringAux = $(this).html();
			var indexAux = stringAux.indexOf("</a>");
			stringAux = stringAux.slice(indexAux-1,indexAux);
			//inserindo o novo valor de falta no array..
			arrayAlunosFalta[index].setFalta(stringAux);
		}
	  flagForClick =true;
});

//referente as listas de faltas
$("#qtdAulasLimitada li").click(function()
{
 	if ($("#qtdAulasLimitada li[tagForClick|='justificativa']")) {
		idAux= $(this).attr('idForClick');
		arrayJustificativa.push(new Justificativa({idAluno: idAux}));
 	}
});

//referente ao modal de Justificar Falta
$('#justificarFaltaModal').on('show.bs.modal', function (e)
{
		 idAux= $(this).attr('id');
});

$("#begin div[id|='cardAluno'").click(function()
{
	 if ( $(this).attr('class')=='panel panel-success'){
			$(this).attr('class', 'panel panel-danger');
		 	/*Array que será enviado para saber quantos alunos faltaram*/
			arrayAlunosFalta.push(new Falta({idAluno: $(this).attr('idAluno'), falta: quantidadeDeAulas}));
			$("#begin div[id|='divFaltas"+$(this).attr('idAluno')+"").show();

			//POR FAVOR NÃO ESQUECE DE MUDAR ISSO aqui em baixo pra fazer funcionar o clique e a falta rápida
			$("#qtdAulasLimitada li[id|='"+$(this).attr('idAluno')+"']").attr('class',  'active')
			console.log("danger");
	 }else {
			if(flagForClick == false){
				/*Array que será enviado para saber quantos alunos faltaram*/
				var index, indexJustificativa;

				for (var i = 0; i < arrayAlunosFalta.length; i++) {
						if (arrayAlunosFalta[i].getIdAluno() == $(this).attr('idAluno')) {
								index = i;
						}
						if (arrayJustificativa[i] != undefined) {
							if (arrayJustificativa[i].getIdAluno == $(this).attr('idAluno')) {
									indexJustificativa = i;
							}
						}
				}
				if (index > -1) arrayAlunosFalta.splice(index, 1);
				if (arrayJustificativa > -1) arrayJustificativa.splice(indexJustificativa, 1);

				$(this).attr('class', 'panel panel-success');
				$("#begin div[id|='divFaltas"+$(this).attr('idAluno')+"").hide();
				console.log("Success");

			}
			flagForClick = false;
	}
});
//caso cancele a justificativa, as faltas ficam padrão
$("#justificarFaltaModal button[id|='dismiss']").click(function() {
	$("#qtdAulasLimitada li[dismiss|='1']").attr('class', '');
	//Aqui eu retiro o id dele da lista..
	arrayJustificativa.pop();
});

//quando o professor lançar a justificativa, gravar no jsonJustificativa
$("#justificarFaltaModal button[id|='submit']").click(function()
{
			//inserindo a justificativa do aluno
		  var justificativa = $("#justificarFaltaModal input[id|='justificarArea']").val();
			var index = arrayJustificativa.length -1;
			arrayJustificativa[index].setJustificativa(justificativa);
			//Escondendo o modal e limpando o campo justificativa.
			$('#justificarFaltaModal').modal('hide');
			var clean = "";
			$("#justificarFaltaModal input[id|='justificarArea']").val(clean);
});

//lançamento de frequencia
$("#begin button[name|='lancarFrequencia']").click(function()
{
	var arrayAlunosFaltaNovo = [];
	var arrayJustificativaNovo = [];
	var arrayAlunosID = [];
	var arrayJustificativaID = [];
	//abrir os arrays de objetos em arrays padroes.
	for (var i = 0; i < arrayAlunosFalta.length; i++) {
		arrayAlunosFaltaNovo.push(arrayAlunosFalta[i].getFalta());
		arrayAlunosID.push(arrayAlunosFalta[i].getIdAluno());
	}
	for (var i = 0; i < arrayJustificativa.length; i++) {
		arrayJustificativaNovo.push(arrayJustificativa[i].getJustificativa());
		arrayJustificativaID.push(arrayJustificativa[i].getIdAluno());
	}
	$.ajax({
			  url: 'action_frequencia.php',
			  type: "POST",
			  data: ({dia:dia,
					  mes:mes,
					  ano:ano,
					  turma:turma,
					  disciplina:disciplina,
					  quantidade:quantidadeDeAulas,
						//falta
						arrayAlunosID:arrayAlunosID,
						arrayAlunosFalta:arrayAlunosFaltaNovo,
						//justificativa
						arrayJustificativaID:arrayJustificativaID,
						arrayJustificativa:arrayJustificativaNovo }),
		 		success: function(data){
						console.log(data);
				}
	}); // End Ajax
});//End click
</script>
