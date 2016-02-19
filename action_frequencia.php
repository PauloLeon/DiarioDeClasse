<?php
include 'php/session.php';

    $quantidade =  $_POST['quantidade'];
    $fk_idTurma =  $_POST['turma'];
    $fk_idDisciplina =  $_POST['disciplina'];
    $dia =  $_POST['dia'];
    $mes =  $_POST['mes'];
    $ano =  $_POST['ano'];
    //falta
    $arrayAlunosFaltaID =  $_POST['arrayAlunosID'];
    $arrayAlunosFalta =  $_POST['arrayAlunosFalta'];
    //justificativa
    $arrayJustificativaID =  $_POST['arrayJustificativaID'];
    $arrayJustificativa =  $_POST['arrayJustificativa'];
    debug_to_console("Turma=".$fk_idTurma." | "."Disciplina=".$fk_idDisciplina." | "."Quantidade de Aulas=".$quantidade." | "."Dia=".$dia." | "."Mês=".$mes." | "."Ano=".$ano. "- ARQUIVO:action_frequencia.php");
    //Para inibir que entre com algum campo vazio
    if(!($userLogado->getId()=="" || $fk_idTurma=="" || $fk_idDisciplina=="" || $quantidade=="" || $dia=="" || $mes=="" || $ano=="") ){
     $userLogado->insertDiaDeAulaBanco($userLogado->getId(),$fk_idTurma,$fk_idDisciplina,$quantidade,$dia,$mes,$ano,$arrayAlunosFaltaID,$arrayAlunosFalta,$arrayJustificativaID, $arrayJustificativa);
    }else{
     getAvisosDeErro($userLogado->getId(),$fk_idTurma,$fk_idDisciplina,$quantidade,$dia,$mes,$ano);
    }


     //avisar para o programador qual o campo vazio
    function getAvisosDeErro($userLogado,$fk_idTurma,$fk_idDisciplina,$quantidade,$dia,$mes,$ano)
    {
      if(empty($userLogado)){
    	  echo"<script LANGUAGE=\"JavaScript\">
    		  alert(\"Desculpe, você não esta logado.\");
    	  </SCRIPT>";

       } else if(empty($fk_idTurma)){
    	  echo"<script LANGUAGE=\"JavaScript\">
    		  alert(\"Desculpe, você precisa definir a turma.\");
    	  </SCRIPT>";
       } else if(empty($fk_idDisciplina)){
    	  echo"<script LANGUAGE=\"JavaScript\">
    		  alert(\"Desculpe, você precisa definir a disciplina.\");
    	  </SCRIPT>";
       } else if(empty($quantidade)){
    	  echo"<script LANGUAGE=\"JavaScript\">
    		  alert(\"Desculpe, você precisa definir a quantidade de aulas ministradas na tela anterior.\");
    	  </SCRIPT>";
       } else if(empty($dia)){
    	  echo"<script LANGUAGE=\"JavaScript\">
    		  alert(\"Desculpe, você precisa definir a data na tela anterior.\");
    	  </SCRIPT>";
       } else if(empty($mes)){
    	  echo"<script LANGUAGE=\"JavaScript\">
    		  alert(\"Desculpe, você precisa definir a data na tela anterior.\");
    	  </SCRIPT>";
       } else if(empty($ano)){
    	  echo"<script LANGUAGE=\"JavaScript\">
    		  alert(\"Desculpe, você precisa definir a data na tela anterior.\");
    	  </SCRIPT>";
       }
    }
?>
