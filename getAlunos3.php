<?php
include 'php/session.php';
$q = intval($_GET['q']);
$jsonAlunos =  $userLogado->getAlunosJson($userLogado->getId(),$q);
$jsonAlunos = json_decode($jsonAlunos);

if(empty($jsonAlunos))
{
	//echo"<li class=\"list-group-item\" >"."Você ainda não tem alunos cadastrados."."</li>";

	echo"<div class=\"row\">
		   <div class=\"col-md-2\"></div>
		   <div class=\"col-md-8\">
			  <img src=\"imagens/turma_vazia.png\" alt=\"...\" class=\"img-thumbnail\">
		   </div>
		  <div class=\"col-md-2\"></div>
	   </div>";
}
foreach($jsonAlunos as $val)
{
	echo"<li id=".$val->idAluno."
			 name=\"alu".$val->idAluno."\"
			 onclick=\"clickAluno(".$val->idAluno.")\"
			 nmAluno = ".utf8_decode($val->nmAluno)."
			 nmTurma = 	".utf8_decode($val->nmTurma)."
			 class=\"list-group-item\"
			 data-toggle=\"modal\"
			 data-target=\"#editModal\" >
			 <div class=\"row\">
			  <div class=\"col-xs-4 col-sm-4 col-md-4\">".utf8_decode($val->nmAluno)."</div>
             		 <div class=\"col-xs-4 col-sm-4 col-md-4\">".utf8_decode($val->nmTurma)."</div>
					 <div class=\"col-xs-4 col-sm-4 col-md-4\"><img id='".$val->idAluno."GRAY' src='imagens/editGray.png' alt=''> <img id='".$val->idAluno."GREEN' src='imagens/editGreen.png' style='display: none;'' alt=''></div>
            </div>
	     </li>";


}
?>
