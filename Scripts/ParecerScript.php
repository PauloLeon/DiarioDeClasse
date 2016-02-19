<script type="text/javascript" src="js/jquery-min.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="../js/bootstrap-datepicker.js"></script>
<script src="../js/locales/bootstrap-datepicker.pt-BR.js"></script>
<script>
var aluno_atual;
var aluno_antigo; //variavel para trocar cores do icone edit
var parecer_atual;
var parecer_antiga; //variavel para trocar cores do icone edit
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
    buscaParecer(str);
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
    buscaParecer(id);
  }

  //click da parecer do aluno para edição
  function clickParecerEdit(idAluno, idParecer, parecer,tipoParecer)
  {
    isEdicao = true;
    $("#begin a[id|='delete_btn'").attr("disabled",false);
    aluno_atual = idAluno;
    if (parecer_antiga != undefined) {
      $("#historico img[id|="+parecer_antiga+"GRAY]").show();
      $("#historico img[id|="+parecer_antiga+"GREEN]").hide();
    }
    parecer_atual = idParecer;
    $("#historico img[id|="+parecer_atual+"GRAY]").hide();
    $("#historico img[id|="+parecer_atual+"GREEN]").show();
    parecer_antiga = idParecer;
    $("#begin input[id|='textParecer']").val(parecer);
    $("#begin input[id|='textTipoDeParecer']").val(tipoParecer);

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

  //busca de todas as Parecer por aluno em Ajax
  function buscaParecer(str) {
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
                 document.getElementById("editParecer").innerHTML = xmlhttp.responseText;
              }
          }
          xmlhttp.open("GET","getAllParecer.php?q="+str,true);
          xmlhttp.send();
      }
  }

  //lançamento de parecer ou edição
  $("#begin a[id|='save_btn'").click(function()
  {
    console.log(isEdicao);
    var isDelete = false;
    if(isEdicao==true){
      //para parecer
      var parecer = $("#begin input[id|='textParecer']").val();
      var tipoParecer = $("#begin input[id|='textTipoDeParecer']").val();
    	$.ajax({
    			  url: 'action_parecer.php',
    			  type: "POST",
    			  data: ({
    					  aluno_atual:aluno_atual,
                parecer: parecer,
                tipoParecer: tipoParecer,
                parecer_atual: parecer_atual,
                isEdicao: isEdicao,
                isDelete: isDelete}),
    		 		success: function(data){
    						console.log(data); //debug
                buscaParecer(aluno_atual);//refresh no historico
                isEdicao= false; //saindo da edição
                $("#begin input[id|='textParecer']").val(""); //limpando
                $("#begin input[id|='textTipoDeParecer']").val(""); //limpando
    				}
    	}); // End Ajax
    }else{
      //para parecer
      var parecer = $("#begin input[id|='textParecer']").val();
      var tipoParecer = $("#begin input[id|='textTipoDeParecer']").val();
      $.ajax({
            url: 'action_parecer.php',
            type: "POST",
            data: ({
                aluno_atual:aluno_atual,
                parecer: parecer,
                tipoParecer: tipoParecer,
                isEdicao: isEdicao,
                isDelete: isDelete}),
            success: function(data){
                console.log(data);
                buscaParecer(aluno_atual);
                $("#begin input[id|='textParecer']").val(""); //limpando
                $("#begin input[id|='textTipoDeParecer']").val(""); //limpando
            }
      }); // End Ajax
    }
  });//End click



  //excluir parecer ou edição
  $("#begin a[id|='delete_btn'").click(function()
  {
    var isDelete = true;
    if(isEdicao==true){
      //para parecer
      var parecer = $("#begin input[id|='textParecer']").val();
      var tipoParecer = $("#begin input[id|='textTipoDeParecer']").val();
    	$.ajax({
    			  url: 'action_parecer.php',
    			  type: "POST",
    			  data: ({
    					  aluno_atual:aluno_atual,
                parecer: parecer,
                tipoParecer: tipoParecer,
                parecer_atual: parecer_atual,
                isEdicao: isEdicao,
                isDelete: isDelete}),
    		 		success: function(data){
    						console.log(data); //debug
                buscaParecer(aluno_atual);//refresh no historico
                isEdicao= false; //saindo da edição
                $("#begin input[id|='textParecer']").val(""); //limpando
                $("#begin input[id|='textTipoDeParecer']").val(""); //limpando
                $("#begin a[id|='delete_btn'").attr("disabled",true);//desabilitando o botão de novo
    				}
    	}); // End Ajax
    }
  });//End click

</script>
