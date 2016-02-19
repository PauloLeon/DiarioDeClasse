<script src="js/jquery-1.11.0.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/bootstrap-switch.js"></script>
<script src="../js/bootstrap-datepicker.js"></script>
<script src="../js/locales/bootstrap-datepicker.pt-BR.js"></script>
<script src="js/bootstrap-switch.js"></script>
<script src="js/list.js"></script>
<script>
function replaceAll(find, replace, str) {
  return str.replace(new RegExp(find, 'g'), replace);
}

//Fazer isto para que mesmo o cliente não clicando em nenhuma quantidade de aula, sempre vá pelo menos uma aula!
var quantidadeAulaUM = $("#qtdAulasList li").attr('class', 'active');
$("#editModal input[id|='number'").attr('value',$(quantidadeAulaUM).attr('id'));
//coloca todos os componente da lista desativados para o cliente escolher uma quantidade de aula
$("#qtdAulasList li").attr('class', '');
//turmaDisciplina variavel que contem minha tabela de turma_disciplina
turmaDisciplina = replaceAll("'", "\"",turmaDisciplina);
var turmaDisciplinaJSON = JSON.parse(turmaDisciplina);
//Acessando o JSON

console.log(turmaDisciplinaJSON[1]);
console.log("hiri --> "+turmaDisciplinaJSON.length);
console.log(turmaDisciplinaJSON[1].idDisciplina);
console.log(turmaDisciplinaJSON[1].nmDisciplina);
//console.log($("#getAjaxDisciplinas li[id|='"+turmaDisciplinaJSON[1].idDisciplina+"").hide());

$("#getAjaxDisciplinas li").hide();

  //criando o calendario
  $(document).ready(function () {
    $('#exemplo').datepicker({
		    todayBtn: "linked",
		    format: "dd/mm/yyyy",
		    language: "pt-BR",
        keyboardNavigation: false,
        forceParse: false,
        todayHighlight: true
	  });
  });

  //quantidade de aulas
  $("#qtdAulasList li").click(function()
  {
	  //coloca todos os componente da lista desativados
	  $("#qtdAulasList li").attr('class', '');
	  //passa o objeto clicado para ativo
	  $(this).attr('class', 'active');
	  //altera o value para os componentes escondidos na tela serem iguais ao clicados para passar no post important!
	  $("#editModal input[id|='number'").attr('value',$(this).attr('id'));

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


	//lista de Escolas para o Edit
  $("#getAjaxDisciplinas li").click(function() {
	  console.log("Essa porra passou aqui?")
	  var aux = $(this).html();// get id of clicked li
	  $("#editModal input[name|='disciplina'").val(aux);
  });

//para o pesquisar
var optionsnew = {
  valueNames: [ 'nome' ]
};

var userList1 = new List('users_1', optionsnew);

//lista das turmas para abrir o card do edit
  $("#listTurmasEDIT li").click(function() {
	  var auxId = $(this).attr('id');
	  $("#editModal input[name|='turma'").val(auxId);
	  var auxLancamento = $(this).attr('tipo_frequencia');
	  //caso o tipo_frequencia seja por turma.... nao abre o card, vai direto..
	  if (auxLancamento==0)
	  {
		  $.post("Frequencias.php");
		  window.location.replace("Frequencias.php");
	  }else{
		  //vou tentar deixar invisivel os componentes já criados
	 	// buscaDisciplinas(auxId);
		for (i = 0; i < turmaDisciplinaJSON.length; i++) {
    		if(turmaDisciplinaJSON[i].idTurma == $(this).attr('id'))
			{
				$("#getAjaxDisciplinas li[id|='"+turmaDisciplinaJSON[i].idDisciplina+"").show();
				//console.log("hiri--> ".turmaDisciplinaJSON[i].nmDisciplina);
			}
			//console.log("oi");
		}

	  }
  });

  //lista de disciplinas TALVEZ EDITAR AQUI
  $("#getAjaxDisciplinas li").click(function() {
	  var aux =  $(this).attr('id');// get id of clicked li
     //console.log( $("#disciplina").val(aux));
  });

  function freqOnClick()
  {
	  $("#disciplina").prop('disabled', false);a
  }


$("#editModal button[name|='submit'").click(function() {
  var stringDate = "" + $('#exemplo').datepicker('getUTCDate');
  var stringDateArray = stringDate.split(" ");
  console.log(stringDateArray[1]); //mes
  console.log(stringDateArray[2]); //dia
  console.log(stringDateArray[3]); //ano

 	$("#editModal input[name|='day'").attr('value',stringDateArray[2]);
	$("#editModal input[name|='month'").attr('value',stringDateArray[1]);
	$("#editModal  input[name|='year'").attr('value',stringDateArray[3]);
 });



//chamada ajax para trazer as disciplinas no modal
function buscaDisciplinas(str) {
    if (str == "") {
        document.getElementById("txtHint").innerHTML = "";
        return;
    } else {
        if (window.XMLHttpRequest) {
            // code for IE7+, Firefox, Chrome, Opera, Safari
            xmlhttp = new XMLHttpRequest();
        } else {
            // code for IE6, IE5
            xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
        }
        xmlhttp.onreadystatechange = function() {
            if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
               document.getElementById("getAjaxDisciplinas").innerHTML = xmlhttp.responseText;
            	//dia/mes/ano
   				//quando o ele escolher qual disciplina lançar, definir qual foi o dia/mes/ano
			   $("#editModal button[name|='submit'").click(function() {
		       		$("#editModal input[name|='day'").attr('value',$("#editModal td[class|='active day'").text());
			   		$("#editModal input[name|='month'").attr('value',$("#editModal span[class|='month active'").text());
		   	   		$("#editModal  input[name|='year'").attr('value',$("#editModal span[class|='year active'").text());
   			   });
			}
        }
        xmlhttp.open("GET","getDisciplina.php?q="+str,true);
        xmlhttp.send();
    }
}


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

	  $("#inputNomeEdit").val(jQuery.trim(auxEscolas));

	  $("#inputTurnoEdit").val(jQuery.trim(auxTurno));
	  $("#inputTurnoEdit").prop('disabled', true);

	  $("#inputEscolasEdit").val(jQuery.trim(auxNome));
	  $("#inputEscolasEdit").prop('disabled', true);



	  var auxId = $(this).attr('id');
	  $("#inputIdEdit").val(auxId);
	  $("#inputIdEdit").prop('disabled', true);
	  //um erro!!!!! dont know why
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
	$("#getAjaxDisciplinas li").hide();
  })

</script>
