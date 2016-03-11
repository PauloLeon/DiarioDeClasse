<script type="text/javascript" src="js/jquery-min.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="../js/bootstrap-datepicker.js"></script>
<script src="../js/locales/bootstrap-datepicker.pt-BR.js"></script>
<script>
var disciplina_atual;
var disciplina_antiga; //variavel para trocar cores da borda-edit
var conteudo_atual;
var conteudo_antigo; //variavel para trocar cores da borda-edit
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

  //drop de escolha de disciplinas
  $("#escolhaTurma li").click(function() {
      var str = $(this).attr('id');
      turma = str;
      var idNameForButton = $(this).attr('idname');
      if (idNameForButton.length>25) {
        idNameForButton = idNameForButton.substring(0, 26) +"...";
      }
      $("#begin button[id|=dropdownMenu1]").html(idNameForButton + " <span class=\"caret\"></span>");
      buscaDisciplinas(str);
  });

 //editar disciplinas
  $("#editDisciplinas li").click(function() {
    var str = $(this).attr('id');
    buscaConteudo(str);
  });

  //click das disciplinas para exibir o historico
  function clickDisciplina(id)
  {
    $("#begin a[id|='delete_btn'").attr("disabled",true);
    if (disciplina_antiga != undefined) {
      $("#editDisciplinas img[id|="+disciplina_antiga+"GRAY]").show();
      $("#editDisciplinas img[id|="+disciplina_antiga+"GREEN]").hide();
    }
    disciplina_atual = id;
    $("#editDisciplinas img[id|="+disciplina_atual+"GRAY]").hide();
    $("#editDisciplinas   img[id|="+disciplina_atual+"GREEN]").show();
    disciplina_antiga = id;
    buscaConteudo(id);
  }

  //click da conteudo do disciplina para edição
  function clickConteudoEdit(idDisciplina, idConteudo, conteudo,tipoConteudo)
  {
    isEdicao = true;
    $("#begin a[id|='delete_btn'").attr("disabled",false);
    disciplina_atual = idDisciplina;
    if (conteudo_antigo != undefined) {
      $("#historico img[id|="+conteudo_antigo+"GRAY]").show();
      $("#historico img[id|="+conteudo_antigo+"GREEN]").hide();
    }
    conteudo_atual = idConteudo;
    $("#historico img[id|="+conteudo_atual+"GRAY]").hide();
    $("#historico img[id|="+conteudo_atual+"GREEN]").show();
    conteudo_antigo = idConteudo;
    $("#begin input[id|='textConteudo']").val(conteudo);
    $("#begin input[id|='textTipoDeConteudo']").val(tipoConteudo);

  }

  //busca de disciplinas em Ajax
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
                //editar aqui
                 document.getElementById("editDisciplinas").innerHTML = xmlhttp.responseText;
              }
          }
          xmlhttp.open("GET","getDisciplina.php?q="+str,true);
          xmlhttp.send();
      }
  }

  //busca de todas as Conteudo por disciplina/turma em Ajax
  //tenho que rever por que passa mais de um parametro pelo get
  function buscaConteudo(disciplina, turma) {
      if (disciplina == "" || turma == "") {
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
                 document.getElementById("editConteudo").innerHTML = xmlhttp.responseText;
              }
          }
          xmlhttp.open("GET","getAllConteudo.php?dis="+disciplina,true);
          xmlhttp.send();
      }
  }

  //lançamento de conteudo ou edição
  $("#begin a[id|='save_btn'").click(function()
  {
    console.log(isEdicao);
    var isDelete = false;
    if(isEdicao==true){
      //para conteudo
      var conteudo = $("#begin input[id|='textConteudo']").val();
      var tipoConteudo = $("#begin input[id|='textTipoDeConteudo']").val();
    	$.ajax({
    			  url: 'action_conteudo.php',
    			  type: "POST",
    			  data: ({
    					  disciplina_atual:disciplina_atual,
                conteudo: conteudo,
                tipoConteudo: tipoConteudo,
                conteudo_atual: conteudo_atual,
                isEdicao: isEdicao,
                isDelete: isDelete}),
    		 		success: function(data){
    						console.log(data); //debug
                buscaConteudo(disciplina_atual);//refresh no historico
                isEdicao= false; //saindo da edição
                $("#begin input[id|='textConteudo']").val(""); //limpando
                $("#begin input[id|='textTipoDeConteudo']").val(""); //limpando
    				}
    	}); // End Ajax
    }else{
      //para conteudo
      var conteudo = $("#begin input[id|='textConteudo']").val();
      var tipoConteudo = $("#begin input[id|='textTipoDeConteudo']").val();
      $.ajax({
            url: 'action_conteudo.php',
            type: "POST",
            data: ({
                disciplina_atual:disciplina_atual,
                conteudo: conteudo,
                tipoConteudo: tipoConteudo,
                isEdicao: isEdicao,
                isDelete: isDelete}),
            success: function(data){
                console.log(data);
                buscaConteudo(disciplina_atual);
                $("#begin input[id|='textConteudo']").val(""); //limpando
                $("#begin input[id|='textTipoDeConteudo']").val(""); //limpando
            }
      }); // End Ajax
    }
  });//End click



  //excluir conteudo ou edição
  $("#begin a[id|='delete_btn'").click(function()
  {
    var isDelete = true;
    if(isEdicao==true){
      //para conteudo
      var conteudo = $("#begin input[id|='textConteudo']").val();
      var tipoConteudo = $("#begin input[id|='textTipoDeConteudo']").val();
    	$.ajax({
    			  url: 'action_conteudo.php',
    			  type: "POST",
    			  data: ({
    					  disciplina_atual:disciplina_atual,
                conteudo: conteudo,
                tipoConteudo: tipoConteudo,
                conteudo_atual: conteudo_atual,
                isEdicao: isEdicao,
                isDelete: isDelete}),
    		 		success: function(data){
    						console.log(data); //debug
                buscaConteudo(disciplina_atual);//refresh no historico
                isEdicao= false; //saindo da edição
                $("#begin input[id|='textConteudo']").val(""); //limpando
                $("#begin input[id|='textTipoDeConteudo']").val(""); //limpando
                $("#begin a[id|='delete_btn'").attr("disabled",true);//desabilitando o botão de novo
    				}
    	}); // End Ajax
    }
  });//End click

</script>
