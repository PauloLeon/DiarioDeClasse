<script src="../js/jquery-1.11.0.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="../js/bootstrap-datepicker.js"></script>
<script src="../js/locales/bootstrap-datepicker.pt-BR.js"></script>

<script>
//array auxiliar para o id dos alunos que irão receber falta
var arrayAlunosFalta = [];
//Json com o id e a justificativa respectivos do aluno.
var jsonJustificativa = [];
//numero de aulas 
//var quantidadeDeAulas = $("#qtdAulasLimitada ul").attr('quantidadeDeAulas');
//variavel de id Auxiliar, para a logica de como os botoes interagem ou não caso o aluno esteja presente ou faltoso
var idAux;
$("#begin div[marcador|='esconderDePrima']").hide();
var flagForClick = false;


//referente as listas de faltas
$("#qtdAulasLimitada li").click(function() {
	  /*id auxiliar para desativar qualquer falta relacionada ao aluno (para o front-end)*/
	  idAux= $(this).attr('idforclicknew');
	  console.log(idAux);
	  $("#qtdAulasLimitada li[idForClicknew|='"+idAux+"']").attr('class', '');
	  $(this).attr('class', 'active');
	 // }
	  flagForClick =true;
	  
});

//referente ao modal de Justificar Falta
$('#justificarFaltaModal').on('show.bs.modal', function (e) {
	console.log("Entrou aqui");
		 idAux= $(this).attr('id');
	     console.log($(this));
		 console.log(idAux);
		 console.log("Entrou aqui Esse é o id do rapaz: "+idAux);
	//idNovo = $(this).attr('idAluno');
//	  if(!($("#begin div[idForColor|='"+idAux+"']").prop('class')=='panel panel-danger')){
		//$('#justificarFaltaModal').modal('toogle');
	//	console.log("DEBUG - ENTROU NO TOOGLE");  
//	  }else{
	/*
		  console.log("DEBUG - MEU ELSE DE JUSTIFICATIVA");
		var index = jsonJustificativa.indexOf(Aluno.id[idAux]);
		console.log(index);
		if (index > -1) { // aluno existe na lista 
	      jsonJustificativa.splice(index, 1);
		  var Aluno = jsonJustificativa[index];
		  $("#justificarFaltaModal textarea[id|='justificarArea']").html(Aluno.justificativa);
		}
	 */ 
	//  }
	  
});

$("#begin button[idForClick|='4'").click(function(){
	console.log("oi");
	//$(this).attr('clickedit', 1);
});

	
$("#begin div[id|='cardAluno'").click(function() {
	 if ( $(this).attr('class')=='panel panel-success'){
		$(this).attr('class', 'panel panel-danger');
		 /*Array que será enviado para saber quantos alunos faltaram*/
		arrayAlunosFalta.push($(this).attr('idAluno'));
		$("#begin div[id|='divFaltas"+$(this).attr('idAluno')+"").show();
		
		//POR FAVOR NÃO ESQUECE DE MUDAR ISSO aqui em baixo pra fazer funcionar o clique e a falta rápida
		console.log($(this).attr('idAluno'));
		console.log($("#qtdAulasLimitada li[idForClicknew|='"+$(this).attr('idAluno')+"']").attr('class',  'active'));
		//console.log("OI-->"+$("#begin div[id|='divFaltas"+$(this).attr('idAluno')+"").html());
		//console.log("OI-->"+$(this).attr('idAluno'));
		console.log("danger");
		/* Serve para a achar a DIV que remete ao aluno clicado, ou seja a caixa de faltas para o aluno a sua esquerda no front end*/
		//$("#begin div[idForColor|='"+$(this).attr('idAluno')+"']").prop('class', 'form-group form-group-red');
		/*Procura a quantidade de aulas ministrada maxima e deixa ela como ativa*/
		//$("#qtdAulasLimitada li[idForNumber|='"+$(this).attr('idAluno')+"']").attr('class',  'active');
		/*Troca a cor da fonte do texto "Numero de Faltas"*/
		//$("#begin p[idForFont|='"+$(this).attr('idAluno')+"']").attr('class', 'font-edit-white');
		/*Retorna a imagem e o texto de Faltou!*/
		//faltasFrontEndHtml($(this).attr('idAluno'));
		//faltasHtml(quantidadeDeAulas,  $(this).attr('idAluno') );
	 }else {
		 //para a justificativa de falta
		/*if($("#qtdAulasLimitada li[idForClick|='"+$(this).attr('idAluno')+"']").id('clickedit')==1) {
			//$("#begin div[id|='cardAluno'").attr('class', 'panel panel-danger');
			$("#begin button[id|='btn'").attr('clickedit', 0);
		} else if($("#begin button[id|='btn_two'").attr('clickedit')==1) {
			$("#begin div[id|='cardAluno'").attr('class', 'panel panel-warning');
			$("#begin button[id|='btn_two'").attr('clickedit', 0);
		}	*/
		if(flagForClick == false)
		{
			/*Array que será enviado para saber quantos alunos faltaram*/
			var index = arrayAlunosFalta.indexOf($(this).attr('idAluno'));
			if (index > -1) {
    			arrayAlunosFalta.splice(index, 1);
			}
			$(this).attr('class', 'panel panel-success'); 
			//$("#begin div[id|='FUNFACARAI']").hide();
			console.log("sucess");
			$("#begin div[id|='divFaltas"+$(this).attr('idAluno')+"").hide();
		}
		flagForClick = false;
		 /* Serve para a achar a DIV que remete ao aluno clicado, ou seja a caixa de faltas para o aluno a sua esquerda no front end*/
		//$("#begin div[idForColor|='"+$(this).attr('idAluno')+"']").prop('class', 'form-group form-group-green');
		/*Desativa as aulas ministradas*/
		//$("#qtdAulasLimitada li[idForClick|='"+$(this).attr('idAluno')+"']").attr('class', '');
		/*Troca a cor da fonte do texto "Numero de Faltas"*/
		//$("#begin p[idForFont|='"+$(this).attr('idAluno')+"']").attr('class', 'font-edit-blue');
		/*Retorna a imagem e o texto de Presente!*/
		//returnFrontEndNormal($(this).attr('idAluno'));
	 }
});	
	
function returnFrontEndNormal(idAluno) {
	document.getElementById("divFaltas"+idAluno).innerHTML = "";
	document.getElementById("presenca"+idAluno).innerHTML ="Presente!";
	document.getElementById("img"+idAluno).src = "imagens/sx_masculino.png";
	return;
}


function faltasFrontEndHtml(idAluno) {
	document.getElementById("presenca"+idAluno).innerHTML ="Faltou!";
	document.getElementById("img"+idAluno).src = "imagens/sx_masculino_triste.png";
	return;
}

/*-------------------------------------Old Method------------------------------------------*/
function faltasHtml(str,idAluno) {
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
				document.getElementById("presenca"+idAluno).innerHTML ="Faltou!";
				document.getElementById("img"+idAluno).src = "imagens/sx_masculino_triste.png";
				document.getElementById("divFaltas"+idAluno).innerHTML = xmlhttp.responseText; 
            }
        }
        xmlhttp.open("GET","getNumberFaltas.php?q="+str+"&idAluno="+idAluno,true);
        xmlhttp.send();
    }
}
/*----------------------------------------------------------------------------------------------*/

/*-------------------------------------------------------------------------------------BEGIN--Justificativas-------------------------------------------------------------------------------------------*/
//caso cancele a justificativa, as faltas ficam padrão
$("#justificarFaltaModal button[id|='dismiss']").click(function() {
	$("#qtdAulasLimitada li[dismiss|='1']").attr('class', '');
	/*Procura a quantidade de aulas ministrada maxima e deixa ela como ativa*/
	//$("#qtdAulasLimitada li[idForNumber|='"+idAux+"']").attr('class',  'active');
});


//quando o professor lançar a justificativa, gravar no jsonJustificativa
$("#justificarFaltaModal button[id|='submit']").click(function() {
		 console.log("Entrou aqui Essa é a justificativa do mininu: "+ $("#justificarFaltaModal textarea[id|='justificarArea']").innerHTML());
		  var justificativa = $("#justificarFaltaModal textarea[id|='justificarArea']").innerHTML();
		  var Aluno = {id:idAux, justificativa:justificativa};
		  jsonJustificativa.push(Aluno);	
});
/*-------------------------------------------------------------------------------------END----Justificativas-------------------------------------------------------------------------------------------*/



//lançamento de frequencia   
$("#begin button[name|='lancarFrequencia']").click(function(){    
	var dia;
	var mes;
	var ano;
	var turma;
	var disciplina;
	//bloco para evitar testes ainda...
	if (false){			  
		  $.ajax({
			  url: 'actionFrequencia.php', 
			  type: "POST",
			  data: ({dia:dia,
					  mes:mes,
					  ano:ano,
					  turma:turma,
					  disciplina:disciplina,
					  quantidade:quantidadeDeAulas,
					  arrayAlunosFalta: arrayAlunosFalta,
					  jsonJustificativa: jsonJustificativa}),
			  success: function(data){
			  }
		  }); // End Ajax	
	}       
});//End click


</script>