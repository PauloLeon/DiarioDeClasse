<?php
include 'php/session.php';

    $fk_idAluno =  $_POST['aluno_atual'];
    $parecer =  $_POST['parecer'];
    $tipoParecer =  $_POST['tipoParecer'];
    $idParecer =  $_POST['parecer_atual'];
    $isEdicao = $_POST['isEdicao'];
    $isDelete = $_POST['isDelete'];
    //debug_to_console("isEdicao=".$isEdicao." | "."Aluno=".$fk_idAluno." | "."Parecer=".$parecer." | "."Dia=".$dia." | "."Mês=".$mes." | "."Ano=".$ano. "- ARQUIVO:action_frequencia.php");
    //Para inibir que entre com algum campo vazio
    if(!($userLogado->getId()=="" || $parecer=="" || $fk_idAluno=="" ) ){
      if ($isEdicao=="true") {
        if ($isDelete=="false") {
          $userLogado->updateParecer($userLogado->getId(),$fk_idAluno,$parecer,$idParecer,$tipoParecer);
        } else {
          $userLogado->removeParecer($idParecer,$userLogado->getId());
        }
      }else{
        $userLogado->insertParecer($userLogado->getId(),$fk_idAluno,$parecer,$tipoParecer);
      }
    }else{
     //erro
    }
?>
