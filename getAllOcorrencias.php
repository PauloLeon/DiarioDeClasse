<?php
include 'php/session.php';
$q = intval($_GET['q']);
$jsonOcorrencias = $userLogado->getAllOcorrencia($userLogado->getId(), $q);
$jsonOcorrencias = json_decode($jsonOcorrencias);



if(empty($jsonOcorrencias))
{
	echo"<div class=\"row\">
		   <div class=\"col-md-2\"></div>
		   <div class=\"col-md-8\">
			  <img src=\"imagens/turma_vazia.png\" alt=\"...\" class=\"img-thumbnail\">
		   </div>
		  <div class=\"col-md-2\"></div>
	   </div>";
}
foreach($jsonOcorrencias as $val)
{
	if(strlen($val->ocorrencia)>25){
		echo"<li id=".$val->idOcorrencia."
				 name=\"alu".$val->fk_idAluno."\"
 			 	 onclick=\"clickOcorrenciaEdit(".$val->fk_idAluno." , ".$val->idOcorrencia." , '".$val->ocorrencia."' , '".$val->data."')\"
				 class=\"list-group-item\"
				 data-toggle=\"modal\"
				 data-target=\"#editModal\" >
				 <div class=\"row\">
				  <div class=\"col-xs-6 col-sm-6 col-md-6\">".substr($val->ocorrencia, 0, 25)."...</div>
	             		 <div class=\"col-xs-6 col-sm-6 col-md-6\">".$val->data."</div>

					</div>
		     </li>";
	}else{
		echo"<li id=".$val->idOcorrencia."
				 name=\"alu".$val->fk_idAluno."\"
				 onclick=\"clickOcorrenciaEdit(".$val->fk_idAluno." , ".$val->idOcorrencia." , '".$val->ocorrencia."' , '".$val->data."')\"
				 class=\"list-group-item\"
				 data-toggle=\"modal\"
				 data-target=\"#editModal\" >
				 <div class=\"row\">
				  <div class=\"col-xs-6 col-sm-6 col-md-6\">".substr($val->ocorrencia, 0, 25)."...</div>
	             		 <div class=\"col-xs-6 col-sm-6 col-md-6\">".$val->data."</div>
					</div>
				 </li>";
	}



}

//									 <div class=\"col-xs-4 col-sm-4 col-md-4\"><img id='".$val->idOcorrencia."GRAY' src='imagens/editGray.png' alt=''> <img id='".$val->idOcorrencia."GREEN' src='imagens/editGreen.png' style='display: none;'' alt=''></div>

?>
