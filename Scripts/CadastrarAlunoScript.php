<script type="text/javascript" src="js/jquery-min.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/bootstrap-switch.js"></script>
<script type="text/javascript" src="js/bootstrap-modalmanager.js"></script>
<script type="text/javascript" src="js/bootstrap-modal.js"></script>
<script src="js/plugins/morris/raphael.min.js"></script>
<script src="js/list.js"></script>

<script>
//para o pesquisar
var optionsnew = {
  valueNames: [ 'alunoSearch' ]
};

var userList1 = new List('alunos', optionsnew);
//definindo os id's do checkbox
$("[id='my-checkbox']").bootstrapSwitch();



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
               document.getElementById("editAlunos").innerHTML = xmlhttp.responseText;
            }
        }
        xmlhttp.open("GET","getAlunos2.php?q="+str,true);
        xmlhttp.send();
    }
}
</script>
<script >
 	 $("#inputEscola").prop('disabled', true);
	 $("#inputTurma").prop('disabled', true);


	 	$("#escolhaTurma li").click(function() {
    		var str = $(this).attr('id');
        var idNameForButton = $(this).attr('idname');
        if (idNameForButton.length>25) {
          idNameForButton = idNameForButton.substring(0, 26) +"...";
        }
        $("#begin button[id|=dropdownMenu1]").html(idNameForButton + " <span class=\"caret\"></span>");
			buscaAlunos(str);
		});

		//escolha de turma
		$("#listTurmas li").click(function() {
    		$("[id='my-checkbox']").bootstrapSwitch('state',false);
			$("[id='my-checkbox']").bootstrapSwitch('readonly', false);
			var aux = $(this).html();// get id of clicked li
			var auxTurma = aux.substr(0,aux.indexOf("-"));
			if (aux=='Escolher uma Turma Fixo')
			{

			}else{
				$("#inputTurma").val(auxTurma);
			}

			var auxDisciplina = $(this).attr('disciplina');
	  		if (auxDisciplina!=undefined)
			{
				$("[id='my-checkbox']").bootstrapSwitch('readonly', true);
				auxDisciplina =  auxDisciplina.split(",");
				for (i = 0; i < auxDisciplina.length; i++)
				{

					$('input[name=Dis'+auxDisciplina[i]+']').bootstrapSwitch('readonly', false);
					$('input[name=Dis'+auxDisciplina[i]+']').bootstrapSwitch('state', true);
				}
	  		}else{
				$("[id='my-checkbox']").bootstrapSwitch('readonly', true);
			}



		});

		$("#listTurmasEDIT li").click(function() {
    	var aux = $(this).html();// get id of clicked li
			var auxTurma = aux.substr(0,aux.indexOf("-"));
			if (aux=='Escolher uma Turma Fixo')
			{

			}else{
				$("#inputTurmaEdit").val(auxTurma);

			}
		});

		function teste() {
			$("#inputEscola").prop('disabled', false);
			 $("#inputTurma").prop('disabled', false);
		}

		function clickEdit()
		{
			$("#inputTurmaEdit").prop('disabled', false);
			$("#inputIdEdit").prop('disabled', false);
		}

		function clickAluno(id)
		{

			$("#inputIdEdit").val(id);
			$("#inputIdEdit").prop('disabled', true);

			if (id == "") {
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
					$("#inputNomeEdit").val($.trim(xmlhttp.responseText));
           	    }
       	    }
      		 xmlhttp.open("GET","getAlunoEdit.php?q="+id,true);
       		 xmlhttp.send();
    		}


		}



</script>
