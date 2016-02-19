<?php
include 'php/session.php';
$q = intval($_GET['q']);
$jsonAlunos =  $userLogado->getAlunoNome($q);
$jsonAlunos = implode($jsonAlunos);
echo trim($jsonAlunos);
?>
