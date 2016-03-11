<?php
include 'php/session.php';
$dis = intval($_GET['dis']);
$tur = intval($_GET['tur']);
$jsonConteudo = $userLogado->getAllConteudo($userLogado->getId(), $dis, $tur);
$jsonConteudo = json_decode($jsonConteudo);

if(empty($jsonConteudo))
{
	echo"<div class=\"row\">
		   <div class=\"col-md-2\"></div>
		   <div class=\"col-md-8\">
			  <img src=\"imagens/turma_vazia.png\" alt=\"...\" class=\"img-thumbnail\">
		   </div>
		  <div class=\"col-md-2\"></div>
	   </div>";
}
foreach($jsonConteudo as $val)
{
	if(strlen($val->conteudo)>25){
		echo"<li id=".$val->idConteudo."
				 name=\"dis".$val->fk_idDisciplina."\"
 			 	 onclick=\"clickConteudoEdit(".$val->fk_idDisciplina." , ".$val->fk_idTurma" , ".$val->idConteudo." , '".$val->conteudo."' , '".$val->data."')\"
				 class=\"list-group-item\"
				 data-toggle=\"modal\"
				 data-target=\"#editModal\" >
				 <div class=\"row\">
				  <div class=\"col-xs-6 col-sm-6 col-md-6\">".substr($val->conteudo, 0, 25)."...</div>
	        <div class=\"col-xs-6 col-sm-6 col-md-6\">".$val->data."</div>
					</div>
		     </li>";
	}else{
		echo"<li id=".$val->idOcorrencia."
				 name=\"dis".$val->fk_idDisciplina."\"
				 onclick=\"clickConteudoEdit(".$val->fk_idDisciplina." , ".$val->fk_idTurma" , ".$val->idConteudo." , '".$val->conteudo."' , '".$val->data."')\"
				 class=\"list-group-item\"
				 data-toggle=\"modal\"
				 data-target=\"#editModal\" >
				 <div class=\"row\">
				  <div class=\"col-xs-6 col-sm-6 col-md-6\">".substr($val->conteudo, 0, 25)."...</div>
	        <div class=\"col-xs-6 col-sm-6 col-md-6\">".$val->data."</div>
					</div>
				 </li>";
	}
}
?>
