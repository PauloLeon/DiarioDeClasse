 

<?php
include 'php/session.php';
$q = intval($_GET['q']);
$jsonDisciplinas =  $userLogado->getTurmaDisciplinaJSON($q);
$jsonDisciplinas = json_decode($jsonDisciplinas);

/*
 echo"<input type=\"text\"  
						   value=\"".$q."\" 
						   name=\"Turma\" 
						   style=\" width: 60%;
							 margin-right: 20%;
							 margin-left: 20%;
							 visibility: hidden; \" 
					/>";
	*/
	
 if(empty($jsonDisciplinas))
  {
	  echo"
	  <li class=\"list-group-item\" style=\"margin-left: 30px;\"> 
	 	 Você ainda não tem disciplinas cadastradas.  
	  </li>";
  }
  foreach($jsonDisciplinas as $val)
  {			
		echo"<li class=\"list-group-item\">".$val->nmDisciplina."</li>";				
		/*echo"<div class=\"form-group\">
				  <button id=\"".$val->idDisciplina."\"   
				  type=\"submit\"
				   class=\"btn btn-default\"
				    name=\"submit\"
					 value=\"".$val->idDisciplina."\"
					  class=\"btn btn-primary\" 
				  style=\"width: 60%;margin-right: 20%;margin-left: 20%;\">".$val->nmDisciplina."</button></div>";
						
		echo"<div class=\"bs-callout bs-callout-default\"  id=".$val->idDisciplina.">
				<button class=\"btn btn-default btn-custom\"  style=\"border-color: #fff; width: 100%;text-align: left;\ </button>
				<a href=\"#\"><i class=\"fa fa-2x fa-check fa-fw text-muted\"></i></a>".$val->nmDisciplina."
			</div>";
			*/  
 } 
?>


 

