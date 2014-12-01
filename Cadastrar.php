<?php 
	function debug_to_console( $data ) 
	{
		if ( is_array( $data ) )
			$output = "<script>console.log( 'Debug Objects: " . implode( ',', $data) . "' );</script>";
		else
			$output = "<script>console.log( 'Debug Objects: " . $data . "' );</script>";
	
		echo $output;
	}

	error_reporting(0);
	//aquivo de usuario
	require_once('objetos/User.php');
	
 	$redirecionar = "../index1.php";
	session_start();
	if((!isset ($_SESSION['userLogado']) == true))
	{
		unset($_SESSION['userLogado']);
		header('location:'.$redirecionar);
	}

	$userLogado = $_SESSION['userLogado'];
	
	$varNome = "";
	$varCidade = "";
	debug_to_console("entrou no geral - ARQUIVO:Cadastrar.php");
	debug_to_console($userLogado->isConnect()." - ARQUIVO:Cadastrar.php");
	debug_to_console($userLogado->isLink()." - ARQUIVO:Cadastrar.php");
	$jsonEscolas=$userLogado->getEscolasJSON($userLogado->getId());

	//nao consigo chamar isso
	 if (!empty($_GET['formSubmit'])) {
		 $varNome =  $_GET['inputNome'];
    	 $varCidade = $_GET['inputCidade'];
		 debug_to_console("entrou aqui- ARQUIVO:Cadastrar.php");
		 debug_to_console($varNome . "- ARQUIVO:Cadastrar.php");
  		 $userLogado->insertEscolaBanco($varNome,$varCidade,$userLogado->getId());
		 debug_to_console("passou aqui". "- ARQUIVO:Cadastrar.php");
 	 } else {
	 }
	

  ?>
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="description" content="">
<meta name="author" content="">
<title>Cadastrar &gt; Escola</title>
<!-- Bootstrap Core CSS -->
<link href="css/bootstrap.min.css" rel="stylesheet">
<!-- Custom CSS -->
<link href="css/sb-admin.css" rel="stylesheet">
<!-- Morris Charts CSS -->
<link href="css/plugins/morris.css" rel="stylesheet">
<!-- Custom Fonts -->
<link href="font-awesome-4.1.0/css/font-awesome.min.css" rel="stylesheet"
    type="text/css">
<script data-require="angular.js@1.2.x" src="http://code.angularjs.org/1.2.1/angular.js" data-semver="1.2.1"></script>

<script src="js/ControllerCadastrar.js"></script>

<!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media
    queries -->
<!-- WARNING: Respond.js doesn't work if you view the page via file://
    -->
<!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>

<body ng-app="mvcCadastrar" ng-controller="CadastrarController">
<div id="wrapper"> 
  <!-- Navigation -->
  <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation"> 
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse"> <span class="sr-only">Toggle navigation</span> <span class="icon-bar"></span> <span class="icon-bar"></span> <span class="icon-bar"></span> </button>
      <a class="navbar-brand" href="index.php">Diário de Classe</a> </div>
    <!-- Top Menu Items -->
    <ul class="nav navbar-right top-nav">
      <li class="dropdown"> <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-envelope"></i> <b class="caret"></b></a>
        <ul class="dropdown-menu message-dropdown">
          <li class="message-preview"> <a href="#">
            <div class="media"> <span class="pull-left"> <img class="media-object" src="../../imagens site diario de classse/novo.png" alt=""> </span>
              <div class="media-body">
                <h5 class="media-heading"><strong>
                  <?php 
										echo $userLogado->getNome();?>
                  </strong> </h5>
                <p class="small text-muted"><i class="fa fa-clock-o"></i> Ontem as 8:32 PM</p>
                <p>Chamada realizada pelo device com sucesso!</p>
              </div>
            </div>
            </a> </li>
          <li class="message-preview"> <a href="#">
            <div class="media"> <span class="pull-left"> <img class="media-object" src="../../imagens site diario de classse/lido.png" alt=""> </span>
              <div class="media-body">
                <h5 class="media-heading"><strong>
                  <?php 
										echo $userLogado->getNome();?>
                  </strong> </h5>
                <p class="small text-muted"><i class="fa fa-clock-o"></i> Anteontem as 19:52 </p>
                <p>Bem-vindo ao seu Diário de classe siga as instrucões na Sala do Professor</p>
              </div>
            </div>
            </a> </li>
          <li class="message-preview"> <a href="#">
            <div class="media"> <span class="pull-left"> <img class="media-object" src="../../imagens site diario de classse/lido.png" alt=""> </span>
              <div class="media-body">
                <h5 class="media-heading"><strong>
                  <?php 
										echo $userLogado->getNome();?>
                  </strong> </h5>
                <p class="small text-muted"><i class="fa fa-clock-o"></i> Anteontem as 19:52 PM</p>
                <p>Conta free ativada!</p>
              </div>
            </div>
            </a> </li>
          <li class="message-footer"> <a href="#">Read All New Messages</a> </li>
        </ul>
      </li>
      <li class="dropdown"> <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-bell"></i> <b class="caret"></b></a>
        <ul class="dropdown-menu alert-dropdown">
          <li> <a href="#">Alert Name <span class="label label-default">Alert Badge</span></a> </li>
          <li> <a href="#">Alert Name <span class="label label-primary">Alert Badge</span></a> </li>
          <li> <a href="#">Alert Name <span class="label label-success">Alert Badge</span></a> </li>
          <li> <a href="#">Alert Name <span class="label label-info">Alert Badge</span></a> </li>
          <li> <a href="#">Alert Name <span class="label label-warning">Alert Badge</span></a> </li>
          <li> <a href="#">Alert Name <span class="label label-danger">Alert Badge</span></a> </li>
          <li class="divider"></li>
          <li> <a href="#">View All</a> </li>
        </ul>
      </li>
      <li class="dropdown"> <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-user"></i>
        <?php 
										echo $userLogado->getNome();?>
        <b class="caret"></b></a>
        <ul class="dropdown-menu">
          <li> <a href="#"><i class="fa fa-fw fa-user"></i> Perfil</a> </li>
          <li> <a href="#"><i class="fa fa-fw fa-envelope"></i> Caixa de Mensagens</a> </li>
          <li> <a href="#"><i class="fa fa-fw fa-gear"></i> Configuração de Conta</a> </li>
          <li class="divider"></li>
          <li> <a href="action_logout.php"><i class="fa fa-fw fa-power-off"></i> Sair</a> </li>
        </ul>
      </li>
    </ul>
    <!-- Sidebar Menu Items - These collapse to the responsive navigation
        menu on small screens -->
    <div class="collapse navbar-collapse navbar-ex1-collapse">
      <ul class="nav navbar-nav side-nav">
        <li> <a href="index.php"><i class="fa fa-fw fa-desktop"></i> Sala do Professor:
          <?php 
										echo $userLogado->getNome();?>
          </a> </li>
        <li class="active"> <a href="javascript:;" data-toggle="collapse" data-target="#demo"><i class="fa fa-fw fa-arrows-v"></i> Cadastrar <i class="fa fa-fw fa-caret-down"></i></a>
          <ul id="demo" class="collapse">
            <li class="active"> <a href="Cadastrar.php">Escola</a> </li>
            <li> <a href="CadastrarDisciplina.php">Disciplina</a> </li>
            <li> <a href="CadastroTurma.php">Turma</a> </li>
          </ul>
        </li>
        <li> <a href="Frequencias.php"><i class="fa fa-fw fa-bar-chart-o"></i> Frequências</a> </li>
        <li draggable="true"> <a href="RegistroDeConteudo.php"><i class="fa fa-fw fa-table"></i> Registros de Conteúdos</a> </li>
        <li> <a href="Notas.php"><i class="fa fa-fw fa-edit"></i> Notas</a> </li>
        <li> <a href="RelatoriosDeConceitos.php"><i class="fa fa-fw fa-file"></i> Relatórios de Conceitos</a> </li>
        <li> <a href="Ocorrencias.php"><i class="fa fa-fw fa-file"></i> Ocorrências</a> </li>
      </ul>
    </div>
    <!-- /.navbar-collapse --> 
  </nav>
  <script src="js/jquery-1.11.0.js"></script> 
  <script src="js/bootstrap.min.js"></script> 
  <script src="js/plugins/morris/raphael.min.js"></script> 
  <script src="js/plugins/morris/morris.min.js"></script> 
  <script src="js/plugins/morris/morris-data.js"></script>
  <div id="page-wrapper">
    <div class="container-fluid"> 
      <!-- Page Heading -->
      <div class="row">
        <div class="col-lg-12">
          <h1 class="page-header">Cadastrar <small>Escola</small> </h1>
          <ol class="breadcrumb" draggable="true">
            <li class="active"> <i class="fa fa-desktop"></i>&nbsp;Cadastrar / Escola</li>
          </ol>
        </div>
      </div>
      <div>
        <p></p>
      </div>
      <form role="form" action="Cadastrar.php" method="get">
        <div class="form-group">
          <label class="control-label" for="exampleInputEmail1">Nome</label>
          <input class="form-control" id="exampleInputEmail1" placeholder="Nome da Escola"
              style="width: 350px;" type="text" name="inputNome" value="<?=$varNome;?>">
        </div>
        <div class="form-group">
          <label class="control-label" for="exampleInputEmail1">Cidade</label>
          <input class="form-control" id="exampleInputEmail1" placeholder="Cidade da Escola"
              style="width: 350px;" type="text" name="inputCidade"	value="<?=$varCidade;?>">
        </div>
        <button type="submit" class="btn btn-primary" name="formSubmit" value="submit_insert">Cadastrar</button>
        <p></p>
      </form>
      <ul class="list-group" style="width: 350px;">
        <label class="list-grupro-label" for="listGrupoLabel">Escolas Cadastradas</label>
        <?php
			$jsonEscolas = json_decode($jsonEscolas);
			//debug_to_console($jsonEscolas);
			if(empty($jsonEscolas))
			{
				echo"<li class=\"list-group-item\">"."Você ainda não tem escolas cadastradas."."</li>";
			}
			
			foreach($jsonEscolas as $val)
			{
				
			echo"<li class=\"list-group-item\">".$val->nome."-".$val->cidade."</li>";				
			}
		?>
         <!-- diretiva ng-repeat
      	<li class="list-group-item" ng-repeat="escola in escolas">{{escola.name}} - {{escola.cidade}}</li>  -->
     <!--   <li class="list-group-item" > IMpacto</li>-->
      </ul>
    </div>
  </div>
</div>
</body>
</html>