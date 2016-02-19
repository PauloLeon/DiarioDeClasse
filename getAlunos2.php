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
			 nmAluno = ".$val->nmAluno."
			 nmTurma = 	".$val->nmTurma."
			 class=\"list-group-item\"
			 data-toggle=\"modal\"
			 data-target=\"#editModal\" >
			 <div class=\"alunoSearch row\">
			  <div class=\"col-xs-4 col-sm-4 col-md-4\">".$val->nmAluno."</div>
             		 <div class=\"col-xs-4 col-sm-4 col-md-4\">".$val->nmTurma."</div>
					 <div class=\"col-xs-4 col-sm-4 col-md-4\"><img src='imagens/editGray.png' alt=''></div>
            </div>
	     </li>";


}
?>
