<script type="text/javascript" src="js/jquery-min.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="../js/bootstrap-datepicker.js"></script>
<script src="../js/locales/bootstrap-datepicker.pt-BR.js"></script>
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
$("#begin a[id|='delete_btn'").attr("disabled",true);//desabilitando o botão de excluir toda vez que inicia a pagina


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

  //drop de escolha de alunos
  $("#escolhaTurma li").click(function() {
      var str = $(this).attr('id');
      turma = str;
      var idNameForButton = $(this).attr('idname');
      if (idNameForButton.length>25) {
        idNameForButton = idNameForButton.substring(0, 26) +"..."; 
      }
      $("#begin button[id|=dropdownMenu1]").html(idNameForButton + " <span class=\"caret\"></span>");
      buscaAlunos(str);
  });

 //editar alunos
  $("#editAlunos li").click(function() {
    var str = $(this).attr('id');
    buscaOcorrencia(str);
  });

  //click do aluno para exibir o historico
  function clickAluno(id)
  {
    $("#begin a[id|='delete_btn'").attr("disabled",true);
    if (aluno_antigo != undefined) {
      $("#editAlunos img[id|="+aluno_antigo+"GRAY]").show();
      $("#editAlunos img[id|="+aluno_antigo+"GREEN]").hide();
    }
    aluno_atual = id;
    $("#editAlunos img[id|="+aluno_atual+"GRAY]").hide();
    $("#editAlunos   img[id|="+aluno_atual+"GREEN]").show();
    aluno_antigo = id;
    buscaOcorrencia(id);
  }

  //click da ocorrencia do aluno para edição
  function clickOcorrenciaEdit(idAluno, idOcorrencia, ocorrencia,data)
  {
    isEdicao = true;
    $("#begin a[id|='delete_btn'").attr("disabled",false);
    aluno_atual = idAluno;
    if (ocorrencia_antiga != undefined) {
      $("#historico img[id|="+ocorrencia_antiga+"GRAY]").show();
      $("#historico img[id|="+ocorrencia_antiga+"GREEN]").hide();
    }
    ocorrencia_atual = idOcorrencia;
    $("#historico img[id|="+ocorrencia_atual+"GRAY]").hide();
    $("#historico img[id|="+ocorrencia_atual+"GREEN]").show();
    ocorrencia_antiga = idOcorrencia;
    $("#begin input[id|='textOcorrencia']").val(ocorrencia);
    data = data.replace(/-/g, "/");
    $("#begin input[id|='calendar']").val(data);

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
  $("#begin a[id|='save_btn'").click(function()
  {
    console.log(isEdicao);
    var isDelete = false;
    if(isEdicao==true){
      //para data
      var stringDate = $("#begin input[id|='calendar']").val();
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
                $("#begin input[id|='textOcorrencia']").val(""); //limpando
                $("#begin input[id|='calendar']").val(""); //limpando
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
      var ocorrencia = $("#begin input[id|='textOcorrencia']").val();
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
                $("#begin input[id|='textOcorrencia']").val(""); //limpando
                $("#begin input[id|='calendar']").val(""); //limpando
            }
      }); // End Ajax
    }
  });//End click



  //excluir ocorrencia ou edição
  $("#begin a[id|='delete_btn'").click(function()
  {
    var isDelete = true;
    if(isEdicao==true){
      //para data
      var stringDate = $("#begin input[id|='calendar']").val();
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
                $("#begin input[id|='textOcorrencia']").val(""); //limpando
                $("#begin input[id|='calendar']").val(""); //limpando
                $("#begin a[id|='delete_btn'").attr("disabled",true);//desabilitando o botão de novo
    				}
    	}); // End Ajax
    }
  });//End click

</script>
