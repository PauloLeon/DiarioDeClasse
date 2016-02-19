$(function() {

$("#inputEscola").prop('disabled', true);
$("#inputTurno").prop('disabled', true);
  $("#listEscolas li").click(function() {
	  var aux = $(this).html();// get id of clicked li
	  if (aux=='Escolher Instituição Fixa' || aux =='Você ainda não tem instituições cadastradas.')
	  {
		  
	  }else{
		  $("#inputEscola").val(aux);
	  }
  });
  
  $("#listTurnos li").click(function() {
	  var aux = $(this).html();// get id of clicked li
	  if (aux=='Escolher um Turno Fixo')
	  {
		  
	  }else{
		  $("#inputTurno").val(aux);
	  }
  });
  
  //ainda falta editar
  $("#listTurmasEDIT li").click(function() {
	  var aux = $(this).html();
	  var auxEscolas=aux.substr(0,aux.indexOf("-"));
	  $("#inputNomeEdit").val(jQuery.trim(auxEscolas));
	  
	  
	  var auxTurno = aux.substring(aux.lastIndexOf("-")+1, aux.indexOf("<span class=\"badge\">edit </span>"));
	  $("#inputTurnoEdit").val(jQuery.trim(auxTurno));
	  $("#inputTurnoEdit").prop('disabled', true);
	  
	  var auxNome = aux.substring(aux.indexOf("-")+1, aux.lastIndexOf("-"));
	  $("#inputEscolasEdit").val(jQuery.trim(auxNome));
	  $("#inputEscolasEdit").prop('disabled', true);
	  
	  var auxId = $(this).attr('id');
	  $("#inputIdEdit").val(auxId);
	  $("#inputIdEdit").prop('disabled', true);
	  
	  
  });
  
  $("#listEscolasEDIT li").click(function() {
	  var aux = $(this).html();// get id of clicked li
	  $("#inputEscolasEdit").val(aux);
  });
  
  $("#listTurnosEDIT li").click(function() {
	  var aux = $(this).html();// get id of clicked li
	  $("#inputTurnoEdit").val(aux);
  });
  
  
  function clickEdit() {
	  $("#inputEscolasEdit").prop('disabled', false);
	   $("#inputTurnoEdit").prop('disabled', false);	
	   $("#inputIdEdit").prop('disabled', false);
  }
  function teste() {
	  $("#inputEscola").prop('disabled', false);
	   $("#inputTurno").prop('disabled', false);
  }
  
  
  /*function preLoad() 
  {
	  console.log($("#listDisciplinas li").html());
	  console.log($('input[id="Fisica"]').bootstrapSwitch('state')); 
	  console.log($('input[id="Fisica"]').prop("name")); 
	  for (i = 0; i < cars.length; i++) { 
		  $('input[id='+i+']').bootstrapSwitch('state')
	  }
  }*/
  

}).call(this);