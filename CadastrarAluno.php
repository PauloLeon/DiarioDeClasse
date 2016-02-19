<?php
include 'php/session.php';

$varNome = "";
$jsonTurmas = $userLogado->getTurmaJSON($userLogado->getId());

if (!empty($_GET['formSubmit']))
{
  $varNome =  $_GET['inputNome'];
  $varTurma = $_GET['inputTurma'];
  $userLogado->insertAlunoBanco(trim($varNome),trim($varTurma),$userLogado->getId());
}
if(!empty($_GET['formEditSubmit']))
{
  $varNomeEdit = $_GET['inputNomeEdit'];
  $idAluno = $_GET['inputIdEdit'];
  debug_to_console($varNomeEdit. " | ".$idAluno);
  $userLogado->updateAluno(trim($varNomeEdit),$idAluno,$userLogado->getId());
}

if(!empty($_GET['formEditSubmitDelete']))
{
  $idAluno = $_GET['inputIdEdit'];
  $userLogado->removeAluno(trim($idAluno),$userLogado->getId());
}
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="Cadastro de Alunos" content="Cadastro de alunos do Diario de Classe">
  <meta name="Paulo Rosa" content="">
  <title>Diário de Classe</title>
  <link href="css/bootstrap.min.css" rel="stylesheet">
  <link href="css/bootstrap-switch.min.css" rel="stylesheet" type="text/css">
  <link href="css/sb-admin.css" rel="stylesheet">
  <!--      <link href="css/plugins/morris.css" rel="stylesheet">-->
  <link href="font-awesome-4.1.0/css/font-awesome.min.css" rel="stylesheet" type="text/css">
  <link href="css/bootstrap-modal.css" rel="stylesheet">
  <style>
  .scrollable-menu
  {
    height: auto;
    max-height: 250px;
    overflow-x: hidden;
  }
  </style>
</head>
<body>
  <div id="wrapper">
    <!-- Navigation -->
    <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
      <!-- Brand and toggle get grouped for better mobile display -->
      <div class="navbar-header">
        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse"> <span class="sr-only">Toggle navigation</span> <span class="icon-bar"></span> <span class="icon-bar"></span> <span class="icon-bar"></span> </button>
        <a class="navbar-brand" href="index.php"><img src="/imagem/site/diario-de-classe.png" class="img-responsive"style="width:150px;"></a>
      </div>
      <!-- Top Menu Items -->
      <ul class="nav navbar-right top-nav">
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-user"></i>
            <?php
            echo $userLogado->getNome();?>
            <b class="caret"></b></a>
            <ul class="dropdown-menu">
              <li> <a href="#" style="color: #428bca;"><i class="fa fa-fw fa-user"></i> Perfil</a> </li>
              <li> <a href="#" style="color: #428bca;"><i class="fa fa-fw fa-envelope"></i> Caixa de Mensagens</a> </li>
              <li> <a href="#" style="color: #428bca;"><i class="fa fa-fw fa-gear"></i> Configuração de Conta</a> </li>
              <li class="divider"></li>
              <li> <a href="action_logout.php"style="color: #c94141;"><i class="fa fa-fw fa-power-off"></i> Sair</a> </li>
            </ul>
          </li>
        </ul>
        <!-- Sidebar Menu Items  -->
        <div class="collapse navbar-collapse navbar-ex1-collapse">
          <ul class="div_blue nav navbar-nav side-nav">
            <li> <a href="index.php"><i class="fa fa-fw fa-desktop"></i> Dashboard</a> </li>
            <li>
              <a href="">Cadastros<i class="fa fa-fw fa-caret-down"></i></a>
            </li>
            <li>
              <a href="Cadastrar.php">Instituição/Escola</a>
            </li>
            <li>
              <a href="CadastrarDisciplina.php">Disciplina</a>
            </li>
            <li>
              <a href="CadastroTurma.php">Turma</a>
            </li>
            <li>
              <a href="CadastrarAluno.php">Aluno</a>
            </li>


          </ul>
        </div>
        <!-- END SideBar Menu Itens -->
      </nav>
      <div id="begin" style="min-height: 100vh; width: 100%; background-color: white;">
        <div class="container-fluid">
          <!-- Page Heading -->
          <div class="col-lg-12" id="alunos">
          <div class="row">
            <div class="col-lg-12">
              <h1 class="page-header">
                Cadastro <small>de Aluno</small>
              </h1>
              <!--<ul class="breadcrumb">
              <li> <a href="Cadastrar.php">Cadastrar</a> </li>
              <li class="active">Aluno</li>
            </ul>-->
            <div class="form-group" style="margin-bottom: 10px;">
              <div class="row">
                <div class="col-md-2"></div>
                <div class="col-md-8">

                  <div class="row hidden-xs ">
                    <div class="col-xs-12 col-sm-6 col-md-6">
                      <h3 class="panel-title"><div class="form-group">
                        <button class="btn btn-success" data-toggle="modal" data-target="#incluirModal" name="incluir" onClick="" value="submit_insert"><span class="glyphicon glyphicon-plus"></span> Novo Aluno</button>
                      </div></h3>
                    </div>
                    <div class="col-xs-12 col-sm-6 col-md-6">
                      <h3 class="panel-title">
                        <div class="input-group pull-right">
                          <input class="search pull-right" placeholder="Pesquisar" aria-describedby="basic-addon1" style="height: 30px;"/>
                          <span class="input-group-addon " id="basic-addon1">
                            <span class="glyphicon glyphicon-search" aria-hidden="true">
                            </span>
                          </span>
                        </div>
                      </h3>
                    </div>
                  </div>

                      <h3 class="panel-title visible-sm visible-xs"> <div class="form-group visible-xs">
                          <div class="input-group">
                          <span class="input-group-addon" id="basic-addon1"><span class="glyphicon glyphicon-search" aria-hidden="true"></span></span>
                          <input class="search" placeholder="Pesquisar" aria-describedby="basic-addon1" style="
                  height: 30px;"/>
                    </div>
                  </div></h3>

              <h3 class="panel-title visible-sm visible-xs"><div class="form-group visible-xs">
                <button class="btn btn-success" data-toggle="modal" data-target="#incluirModal" name="incluir" onClick="" value="submit_insert"><span class="glyphicon glyphicon-plus"></span> Novo Aluno</button>
                      </div></h3>


                </div>
                <div class="col-md-2"></div>
              </div>
            </div><!--END FORM_GROUP-->
            <div class="row">
              <div class="col-md-2"></div>
              <div class="col-md-8">
                <div class="dropdown ">
                  <button class="btn btn-default dropdown-toggle" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-expanded="true"> Escolha uma Turma: <span class="caret"></span> </button>
                  <ul id="escolhaTurma" class="dropdown-menu" role="menu" aria-labelledby="dropdownMenu1">
                    <?php
                    $jsonTurmas = json_decode($jsonTurmas);
                    if(empty($jsonTurmas))
                    {

                      echo"<li class=\"list-group-item\" >"."Você ainda não tem turmas cadastradas."."</li>";
                    }
                    foreach($jsonTurmas as $val)
                    {
                      $idName =  $val->nmTurma.' - '.$val->nmEscola."";
                      echo"<li id=".$val->idTurma." idname=\"".$idName."\"  class=\"list-group-item\"    text-align:center\">".$val->nmTurma." - ". $val->nmEscola."</li>";

                    }
                    ?>
                  </ul>
                </div>&nbsp;
              </div>
              <div class="col-md-2"></div>
            </div><!--END ROW-->


            <div class="row">
              <div class="col-md-2"></div>
              <div class="col-md-8">
                <div class="panel panel-primary" >
                  <div class="panel-heading">
                    <div class="row">
                      <div class="col-xs-4 col-sm-4 col-md-4"><h3 class="panel-title">Alunos</h3></div>
                      <div class="col-xs-4 col-sm-4 col-md-4"><h3 class="panel-title">Turma</h3></div>
                      <div class="col-xs-4 col-sm-4 col-md-4"><h3 class="panel-title">Editar</h3></div>
                    </div>
                  </div>
                  <div class="panel-body">
                    <form class="form-horizontal" role="form" draggable="true"
                    action="CadastrarAluno.php" method="get">
                    <ul id="editAlunos" class="list list-group" >
                      <div class="row">
                        <div class="col-md-2"></div>
                        <div class="col-md-8">
                          <img src="imagens/turmas.png" alt="..." class="img-thumbnail">
                        </div>
                        <div class="col-md-2"></div>
                      </div>
                    </ul>
                  </form>
                </div>
              </div>
            </div>
            <div class="col-md-2"></div>
          </div>
</div>




        </div>
      </div>
    </div>
  </div>
</div>
</div>

<!--MODAL INCLUIR-->
<div class="modal fade" id="incluirModal">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title">Incluir Novo Aluno...</h4>
      </div>
      <div class="modal-body">
        <div class="thumbnail" style="background-color: ghostwhite;">
          <form role="form" action="CadastrarAluno.php" method="get">
            <div class="form-group" draggable="true" style="margin-bottom: 2px;">
              <label class="control-label" for="text">Turma <br>
              </label>
            </div>
            <div class="input-group"style="margin-bottom: 10px;">
              <div class="input-group-btn">
                <button type="button" class="btn btn-primary dropdown-toggle"  data-toggle="dropdown" aria-expanded="false" >Turmas<span class="caret"></span></button>
                <ul id="listTurmas" class="dropdown-menu" role="menu">
                  <?php
                  /*$jsonTurmas = json_decode($jsonTurmas);
                  if(empty($jsonTurmas))
                  {
                  echo"<li class=\"list-group-item\" >"."Você ainda não tem turmas cadastradas."."</li>";
                }
                foreach($jsonTurmas as $val)
                {
                echo"<li class=\"list-group-item\">".$val->nmTurma." - ". $val->nmEscola."</li>";
              }*/
              ?>
              <?php
              // $jsonTurmas = json_decode($jsonTurmas);
              if(empty($jsonTurmas))
              {
                echo"<li class=\"list-group-item\" >"."Você ainda não tem turmas cadastradas."."</li>";
              }
              foreach($jsonTurmas as $val)
              {
                $jsonTurmaDisciplinas =  $userLogado->getTurmaDisciplinaJSON($val->idTurma);
                $jsonTurmaDisciplinas = json_decode($jsonTurmaDisciplinas);
                $array = array();
                foreach($jsonTurmaDisciplinas as $val_dis)
                {
                  if(!empty($val_dis->idDisciplina))
                  array_push($array,$val_dis->idDisciplina);
                  //debug_to_console($val_dis->idDisciplina);
                }
                if(empty($array)){
                  echo"<li id=".$val->idTurma."  class=\"list-group-item\" >".$val->nmTurma." - ". $val->nmEscola."</li>";
                }else{
                  $string = implode(",",$array);
                  echo"<li id=".$val->idTurma."  disciplina=\"".$string."\" class=\"list-group-item\" >".$val->nmTurma." - ". $val->nmEscola."</li>";
                }
              }
              ?>
            </ul>
          </div>
          <!-- /btn-group -->
          <input type="text"  placeholder="Selecione as opções ao lado" class="form-control" name="inputTurma" id="inputTurma" value="<?=$varTurma;?>" >

        </div>
        <!-- /input-group -->
        <div class="form-group">
          <label class="control-label" for="exampleInputPassword1" style="
          margin-bottom: 10px;
          ">Nome do Aluno <br>
        </label>
        <input class="form-control" id="exampleInputPassword1" placeholder="Entre com o nome do Aluno"
        type="text" name="inputNome" value="<?=$varNome;?>">
      </div>
      <div class="form-group">
        <div class="form-group " draggable="true" style="margin-bottom: 2px;">
          <label class="control-label" for="text">Incluir Disciplinas <br>
          </label>
        </div>
        <div class="thumbnail scrollable-menu" role="menu" style="background-color: #E4F0EA;">
          <?php
          $jsonDisciplinas = $userLogado->getDisciplinaJSON($userLogado->getId());
          $jsonDisciplinas = json_decode($jsonDisciplinas);
          if(empty($jsonDisciplinas))
          {
            echo"
            <li class=\"form-group\" style=\"margin-left: 30px;\">
            <input type=\"checkbox\" name=\"my-checkbox\" data-size=\"mini\" data-on-text=\"Sim\"
            data-off-text=\"Não\"  data-animate=\"true\" disabled=\"true\"  unchecked>
            Você ainda não tem disciplinas cadastradas.
            </li>";
          }
          foreach($jsonDisciplinas as $val)
          {
            echo"<li
            id=\"".$val->idDisciplina."\"
            class=\"list-group-item\"
            style=\"margin-left: 30px;  margin-right: 30px;\" >
            <input id=\"my-checkbox\"
            type=\"checkbox\"
            name="."Dis".$val->idDisciplina."
            name=".$val->idDisciplina."
            data-size=\"mini\"
            data-on-text=\"Sim\"
            data-off-text=\"Não\"
            data-animate=\"true\"
            unchecked>
            &nbsp;".$val->nome."
            </li>";
          }
          ?>
        </div>
      </div>
    </div>
    <div class="modal-footer">
      <button type="button" class="btn btn-default" data-dismiss="modal">Fechar</button>
      <button type="submit" onclick="teste()" class="btn btn-julio" name="formSubmit" value="submit_insert" draggable="true">Cadastrar</button>
    </div>
  </form>
</div><!-- /.modal-content -->
</div><!-- /.modal-dialog -->
</div><!-- /.modal -->


<!-- Modal de Edição ---------------------------------------------------------------------------------->
<div   class="modal fade" id="editModalTurma" tabindex="-1" role="dialog" aria-labelledby="modalTurma"
aria-hidden="true">
<div class="modal-dialog">
  <div class="modal-content">
    <div class="modal-header">
      <button type="button" class="close" data-dismiss="modal"> <span aria-hidden="true">×</span> <span class="sr-only">Close</span> </button>
      <h4 class="modal-title" id="modalTurma" draggable="true">Modo de Edição</h4>
    </div>
    <div id="modal" class="modal-body">
      <form class="form-horizontal" role="form" draggable="true"
      action="CadastrarAluno.php" method="get">
      <ul id="editAlunos" class="list-group" style="width: 350px;"></ul>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
      </div>
    </form>
  </div>
</div>
</div>
</div>
<!--END escolha Alunos Edicao -->

<!-- Modal de Edição ---------------------------------------------------------------------------------->
<div  class="modal" id="editModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
aria-hidden="true" style="top:1%">
<div class="modal-dialog" >
  <div class="modal-content" ><!--style="width:500px;  margin-left: 50px; margin-top: 87px;">-->
    <div id="modalFinal" class="modal-body" >
      <form class="form-horizontal" role="form" draggable="true"
      action="CadastrarAluno.php" method="get">
      <div class="form-group">
        <div class="col-sm-2">
          <label for="inputIdEdit" class="control-label" style="display:none">Código:</label>
        </div>
        <div class="col-sm-10">
          <input type="text"
          class="form-control"
          id="inputIdEdit"
          name="inputIdEdit"
          style="display:none"
          value="<?=$varIdEdit;?>"
          />
        </div>
      </div>
      <div class="form-group">
        <div class="col-sm-2">
          <label for="inputNomeEdit" class="control-label">Nome</label>
        </div>
        <div class="col-sm-10">
          <input type="text"
          class="form-control"
          id="inputNomeEdit"
          name="inputNomeEdit"
          value="<?=$varNomeEdit;?>"
          />
        </div>
      </div>
      <div class="modal-footer">
        <button type="submit" class="btn btn-danger" name="formEditSubmitDelete" value="Submit" onclick="clickEdit()">Excluir</button>
        <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
        <button type="submit" class="btn btn-julio" name="formEditSubmit" value="Submit" onclick="clickEdit()" >Atualizar</button>
      </div>
    </form>
  </div>
</div>
</div>
</div>
<!--END Edição -->
</body>
</html>
<?php
echo file_get_contents(dirname(__FILE__)."/Scripts/CadastrarAlunoScript.php", true);
?>
