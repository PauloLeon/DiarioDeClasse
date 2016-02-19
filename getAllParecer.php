<?php
include 'php/session.php';
$q = intval($_GET['q']);
$jsonParecer = $userLogado->getAllParecer($userLogado->getId(), $q);
$jsonParecer = json_decode($jsonParecer);



if(empty($jsonParecer))
{
	echo"<div class=\"row\">
		   <div class=\"col-md-2\"></div>
		   <div class=\"col-md-8\">
			  <img src=\"imagens/turma_vazia.png\" alt=\"...\" class=\"img-thumbnail\">
		   </div>
		  <div class=\"col-md-2\"></div>
	   </div>";
}
foreach($jsonParecer as $val)
{
	if(strlen($val->parecer)>25){
		echo"<li id=".$val->idParecer."
				 name=\"alu".$val->fk_idAluno."\"
 			 	 onclick=\"clickParecerEdit(".$val->fk_idAluno." , ".$val->idParecer." , '".$val->parecer."' , '".$val->tipoParecer."')\"
				 class=\"list-group-item\"
				 data-toggle=\"modal\"
				 data-target=\"#editModal\" >
				 <div class=\"row\">
				  <div class=\"col-xs-4 col-sm-4 col-md-4\">".substr($val->parecer, 0, 25)."...</div>
	             		 <div class=\"col-xs-4 col-sm-4 col-md-4\">".$val->tipoParecer."</div>
									 <div class=\"col-xs-4 col-sm-4 col-md-4\"><img id='".$val->idParecer."GRAY' src='imagens/editGray.png' alt=''> <img id='".$val->idParecer."GREEN' src='imagens/editGreen.png' style='display: none;'' alt=''></div>

					</div>
		     </li>";
	}else{
		echo"<li id=".$val->idParecer."
				 name=\"alu".$val->fk_idAluno."\"
				 onclick=\"clickParecerEdit(".$val->fk_idAluno." , ".$val->idParecer." , '".$val->parecer."' , '".$val->tipoParecer."')\"
				 class=\"list-group-item\"
				 data-toggle=\"modal\"
				 data-target=\"#editModal\" >
				 <div class=\"row\">
					<div class=\"col-xs-4 col-sm-4 col-md-4\">".$val->parecer."</div>
									 <div class=\"col-xs-4 col-sm-4 col-md-4\">".$val->tipoParecer."</div>
									 <div class=\"col-xs-4 col-sm-4 col-md-4\"><img id='".$val->idParecer."GRAY' src='imagens/editGray.png' alt=''> <img id='".$val->idParecer."GREEN' src='imagens/editGreen.png' style='display: none;'' alt=''></div>

					</div>
				 </li>";
	}



}
?>
