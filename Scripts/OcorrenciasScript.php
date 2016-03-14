<script src="js/jquery-1.11.0.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/bootstrap-datepicker.js"></script>
<script src="js/locales/bootstrap-datepicker.pt-BR.js"></script>
<script>
var aluno_atual;
var aluno_antigo; //variavel para trocar cores do icone edit
var ocorrencia_atual;
var ocorrencia_antiga; //variavel para trocar cores do icone edit
var turma;
var dia;
var mes;
var ano;
var isEdicao = false; //flag para identificar se está edição
$("#incluirModal button[id|='delete_btn'").attr("disabled",true);//desabilitando o botão de excluir toda vez que inicia a pagina
$("#incluirModal button[id|='save_btn'").attr("disabled",true);//desabilitando o botão de salvar toda vez que inicia a pagina


/*
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
  */

  //drop de escolha de alunos
  $("#escolhaTurma li").click(function() {
      var str = $(this).attr('id');
      turma = str;
      var idNameForButton = $(this).attr('idname');
      if (idNameForButton.length>25) {
        idNameForButton = idNameForButton.substring(0, 26) +"...";
      }
      $("#begin button[id|=dropdownMenu1]").html(idNameForButton + " <span class=\"caret\"></span>");
      buscaAlunos(turma);
  });

 //editar alunos
  $("#editAlunos li").click(function() {
    var str = $(this).attr('id');
    buscaOcorrencia(str);
  });

  //click do aluno para exibir o historico
  function clickAluno(id)
  {
    $("#incluirModal button[id|='delete_btn'").attr("disabled",true);
    $("#incluirModal button[id|='save_btn'").attr("disabled",true);
    if (aluno_antigo != undefined) {
      $("#editAlunos li[id="+aluno_antigo+"]").removeClass("border-edit-green");
    }
    aluno_atual = id;
    $("#editAlunos li[id="+aluno_atual+"]").addClass("border-edit-green");

    aluno_antigo = id;
    buscaOcorrencia(id);
  }

  //click da ocorrencia do aluno para edição
  function clickOcorrenciaEdit(idAluno, idOcorrencia, ocorrencia,data)
  {
    isEdicao = true;
    $("#incluirModal button[id|='delete_btn'").attr("disabled",false);
    $("#incluirModal button[id|='save_btn'").attr("disabled",false);
    aluno_atual = idAluno;
    if (ocorrencia_antiga != undefined) {
      $("#historico li[id="+ocorrencia_antiga+"]").removeClass("border-edit-green");
    }
    ocorrencia_atual = idOcorrencia;
    $("#historico li[id="+ocorrencia_atual+"]").addClass("border-edit-green");
    ocorrencia_antiga = idOcorrencia;
    $("#incluirModal input[id|='textOcorrencia']").val(ocorrencia);
    data = data.replace(/-/g, "/");
    $("#incluirModal input[id|='calendar']").val(data);

  }

  //busca de alunos em Ajax
  function buscaAlunos(str) {
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
                //editar aqui
                 document.getElementById("editAlunos").innerHTML = xmlhttp.responseText;
              }
          }
          xmlhttp.open("GET","getAlunos3.php?q="+str,true);
          xmlhttp.send();
      }
  }

  //busca de todas as Ocorrencias por aluno em Ajax
  function buscaOcorrencia(str) {
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
                //editar aqui
                 document.getElementById("editOcorrencias").innerHTML = xmlhttp.responseText;
              }
          }
          xmlhttp.open("GET","getAllOcorrencias.php?q="+str,true);
          xmlhttp.send();
      }
  }

  //lançamento de ocorrencia ou edição
  $("#incluirModal button[id|='save_btn'").click(function()
  {
    console.log(isEdicao);
    var isDelete = false;
    if(isEdicao==true){
      //para data
      var stringDate = $("#incluirModal input[id|='calendar']").val();
      console.log(stringDate);
      var stringDateArray = stringDate.split("/");
      console.log(stringDateArray[0]); //dia
      console.log(stringDateArray[1]); //mes
      console.log(stringDateArray[2]); //ano
      mes = stringDateArray[1];
      dia = stringDateArray[0];
      ano = stringDateArray[2];
      //para ocorrencia
      var ocorrencia = $("#incluirModal input[id|='textOcorrencia']").val();
    	$.ajax({
    			  url: 'action_ocorrencia.php',
    			  type: "POST",
    			  data: ({dia:dia,
    					  mes:mes,
    					  ano:ano,
    					  aluno_atual:aluno_atual,
                ocorrencia: ocorrencia,
                ocorrencia_atual: ocorrencia_atual,
                turma: turma,
                isEdicao: isEdicao,
                isDelete: isDelete}),
    		 		success: function(data){
    						console.log(data); //debug
                buscaOcorrencia(aluno_atual);//refresh no historico
                isEdicao= false; //saindo da edição
                $("#incluirModal input[id|='textOcorrencia']").val(""); //limpando
                $("#incluirModal input[id|='calendar']").val(""); //limpando
    				}
    	}); // End Ajax
    }else{
      //para data
      var stringDate = "" + $('#exemplo').datepicker('getUTCDate');
      var stringDateArray = stringDate.split(" ");
      console.log(stringDateArray[1]); //mes
      console.log(stringDateArray[2]); //dia
      console.log(stringDateArray[3]); //ano
      dia = stringDateArray[2];
      mes = stringDateArray[1];
      ano = stringDateArray[3];
      //para ocorrencia
      var ocorrencia = $("#incluirModal input[id|='textOcorrencia']").val();
      $.ajax({
            url: 'action_ocorrencia.php',
            type: "POST",
            data: ({dia:dia,
                mes:mes,
                ano:ano,
                aluno_atual:aluno_atual,
                ocorrencia: ocorrencia,
                turma: turma,
                isEdicao: isEdicao,
                isDelete: isDelete}),
            success: function(data){
                console.log(data);
                buscaOcorrencia(aluno_atual);
                $("#incluirModal input[id|='textOcorrencia']").val(""); //limpando
                $("#incluirModal input[id|='calendar']").val(""); //limpando
                $("#incluirModal button[id|='delete_btn'").attr("disabled",true);//desabilitando o botão de novo
                $("#incluirModal button[id|='save_btn'").attr("disabled",true);//desabilitando o botão de novo
            }
      }); // End Ajax
    }
  });//End click



  //excluir ocorrencia ou edição
  $("#incluirModal button[id|='delete_btn'").click(function()
  {
    var isDelete = true;
    if(isEdicao==true){
      //para data
      var stringDate = $("#incluirModal input[id|='calendar']").val();
      console.log(stringDate);
      var stringDateArray = stringDate.split("/");
      console.log(stringDateArray[0]); //dia
      console.log(stringDateArray[1]); //mes
      console.log(stringDateArray[2]); //ano
      mes = stringDateArray[1];
      dia = stringDateArray[0];
      ano = stringDateArray[2];
      //para ocorrencia
      var ocorrencia = $("#begin input[id|='textOcorrencia']").val();
    	$.ajax({
    			  url: 'action_ocorrencia.php',
    			  type: "POST",
    			  data: ({dia:dia,
    					  mes:mes,
    					  ano:ano,
    					  aluno_atual:aluno_atual,
                ocorrencia: ocorrencia,
                ocorrencia_atual: ocorrencia_atual,
                turma: turma,
                isEdicao: isEdicao,
                isDelete: isDelete}),
    		 		success: function(data){
    						console.log(data); //debug
                buscaOcorrencia(aluno_atual);//refresh no historico
                isEdicao= false; //saindo da edição
                $("#incluirModal input[id|='textOcorrencia']").val(""); //limpando
                $("#incluirModal input[id|='calendar']").val(""); //limpando
                $("#incluirModal button[id|='delete_btn'").attr("disabled",true);//desabilitando o botão de novo
                $("#incluirModal button[id|='save_btn'").attr("disabled",true);//desabilitando o botão de novo

    				}
    	}); // End Ajax
    }
  });//End click

</script>
