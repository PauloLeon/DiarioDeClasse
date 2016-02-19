<script src="js/jquery-1.11.0.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/bootstrap-switch.js"></script>
<script src="js/plugins/morris/raphael.min.js"></script>
<script src="js/list.js"></script>

<script>
//para o pesquisar
var optionsnew = {
  valueNames: [ 'turmaSearch' ]
};

var userList1 = new List('turma', optionsnew);

//definindo os id's do checkbox
$("[id='my-checkbox']").bootstrapSwitch();
$("[name='checkLancamento']").bootstrapSwitch();
$("[name='checkLancamento']").bootstrapSwitch('size','mini'	);
$("[name='checkLancamento']").bootstrapSwitch('onText','Disciplina');
$("[name='checkLancamento']").bootstrapSwitch('offText','Turma');
$("[name='checkLancamento']").bootstrapSwitch('offColor','primary');
$("[name='checkLancamento']").bootstrapSwitch('onColor','success');
//mensagem de ajuda (?)
$("[data-toggle='tooltip']").tooltip();
$("[name='checkLancamentoEdicao']").bootstrapSwitch();
$("[name='checkLancamentoEdicao']").bootstrapSwitch('size','mini');
$("[name='checkLancamentoEdicao']").bootstrapSwitch('onText','Disciplina');
$("[name='checkLancamentoEdicao']").bootstrapSwitch('offText','Turma');
$("[name='checkLancamentoEdicao']").bootstrapSwitch('offColor','primary');
$("[name='checkLancamentoEdicao']").bootstrapSwitch('onColor','success');
//$( "#lancamento" ).prop( "disabled", true );


//desabilitando botoes
$("#inputTurma").prop('disabled', true);
$("#inputEscola").prop('disabled', true);
$("#inputTurno").prop('disabled', true);

//lista de escolas
  $("#listEscolas li").click(function() {
	  var aux = $(this).html();// get id of clicked li
	  if (aux=='Escolher Instituição Fixa' || aux =='Você ainda não tem instituições cadastradas.')
	  {

	  }else{
		  $("#inputEscola").val(aux);
	  }
  });
//lista de turma
  $("#listTurmas li").click(function() {
    		var aux = $(this).html();// get id of clicked li
			var auxTurma = aux.substr(0,aux.indexOf("-"));
			if (aux=='Escolher uma Turma Fixo')
			{

			}else{
				$("#inputTurma").val(auxTurma);
			}
		});
//lista de turnos
  $("#listTurnos li").click(function() {
	  var aux = $(this).html();// get id of clicked li
	  if (aux=='Escolher um Turno Fixo')
	  {

	  }else{
		  $("#inputTurno").val(aux);
	  }
  });

//lista das turmas para abrir o card do edit
  $("#listTurmasEDIT li").click(function() {

	 var auxNome = $(this).attr('nmturma');
	 var auxTurno = $(this).attr('turno');
	 var auxEscolas = $(this).attr('nmescola');
	 var auxFrequencia =  $(this).attr('tipo_frequencia');

	 if (auxFrequencia==1){
		 $("[name='checkLancamentoEdicao']").bootstrapSwitch('state', true);
	 }else if (auxFrequencia==0){
		  $("[name='checkLancamentoEdicao']").bootstrapSwitch('state', false);
	 }


	  //var aux = $(this).html();
	  //var auxEscolas=aux.substr(0,aux.indexOf("-"));
	  $("#inputNomeEdit").val(jQuery.trim(auxEscolas));


	 // var auxTurno = aux.substring(aux.lastIndexOf("-")+1, aux.indexOf("<span class=\"badge\">edit </span>"));
	  $("#inputTurnoEdit").val(jQuery.trim(auxTurno));
	  $("#inputTurnoEdit").prop('disabled', true);

	 // var auxNome = aux.substring(aux.indexOf("-")+1, aux.lastIndexOf("-"));
	  $("#inputEscolasEdit").val(jQuery.trim(auxNome));
	  $("#inputEscolasEdit").prop('disabled', true);



	  var auxId = $(this).attr('id');
	  $("#inputIdEdit").val(auxId);
	  $("#inputIdEdit").prop('disabled', true);

	  var auxDisciplina = $(this).attr('disciplina');
	  if (auxDisciplina!=undefined){
	  	auxDisciplina =  auxDisciplina.split(",");
	 	for (i = 0; i < auxDisciplina.length; i++)
	 	{
			$('input[name=Dis'+auxDisciplina[i]+']').bootstrapSwitch('state', true);
	 	}
	  }

  });

//lista de Escolas para o Edit
  $("#listEscolasEDIT li").click(function() {
	  var aux = $(this).html();// get id of clicked li
	  $("#inputEscolasEdit").val(aux);
  });
//lista de Escolas para o Edit
  $("#listTurnosEDIT li").click(function() {
	  var aux = $(this).html();// get id of clicked li
	  $("#inputTurnoEdit").val(aux);
  });


  function editarOnClick()
  {
	  $("#inputEscolasEdit").prop('disabled', false);
	   $("#inputTurnoEdit").prop('disabled', false);
	   $("#inputIdEdit").prop('disabled', false);
  }

  function cadastrarOnClick()
  {
	  $("#inputEscola").prop('disabled', false);
	   $("#inputTurno").prop('disabled', false);
  }

  //para quando o modal fechar retornar ao padrão
  $('#editModal').on('hidden.bs.modal', function (e) {
  	$("[id='my-checkbox']").bootstrapSwitch('state',false);

  })
</script>
