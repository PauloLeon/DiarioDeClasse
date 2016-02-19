<?php
include 'php/session.php';

    $fk_idAluno =  $_POST['aluno_atual'];
    $fk_idTurma =  $_POST['turma'];
    $ocorrencia =  $_POST['ocorrencia'];
    $idOcorrencia =  $_POST['ocorrencia_atual'];
    $dia =  $_POST['dia'];
    $mes =  $_POST['mes'];
    $ano =  $_POST['ano'];
    $isEdicao = $_POST['isEdicao'];
    $isDelete = $_POST['isDelete'];
    debug_to_console("isEdicao=".$isEdicao." | "."Turma=".$fk_idTurma." | "."Aluno=".$fk_idAluno." | "."Ocorrencia=".$ocorrencia." | "."Dia=".$dia." | "."Mês=".$mes." | "."Ano=".$ano. "- ARQUIVO:action_frequencia.php");
    //Para inibir que entre com algum campo vazio
    if(!($userLogado->getId()=="" || $fk_idTurma=="" || $ocorrencia=="" || $fk_idAluno=="" || $dia=="" || $mes=="" || $ano=="") ){
      if ($isEdicao=="true") {
        if ($isDelete=="false") {
          $userLogado->updateOcorrencia($userLogado->getId(),$fk_idAluno,$fk_idTurma,$dia,$mes,$ano,$ocorrencia,$idOcorrencia);
        } else {
          $userLogado->removeOcorrencia($idOcorrencia,$userLogado->getId(),$fk_idAluno);
        }  
      }else{
        $userLogado->insertOcorrencia($userLogado->getId(),$fk_idAluno,$fk_idTurma,$dia,$mes,$ano,$ocorrencia);
      }
    }else{
     //erro
    }
?>
