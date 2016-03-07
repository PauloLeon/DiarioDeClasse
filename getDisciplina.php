<?php
include 'php/session.php';
$q = intval($_GET['q']);
$jsonDisciplinas =  $userLogado->getTurmaDisciplinaJSON($q);
$jsonDisciplinas = json_decode($jsonDisciplinas);

if(empty($jsonDisciplinas))
{
  echo"
  <li class=\"list-group-item\" style=\"margin-left: 30px;\">
 	 Você ainda não tem disciplinas cadastradas.
  </li>";
}
foreach($jsonDisciplinas as $val)
{
	echo"<li class=\"list-group-item\">".utf8_decode($val->nmDisciplina)."</li>";
}
?>
