<?php
//Caio script
	
	//iniciando sessao do usuario
	session_start();
	//chamando arquivo do projeto
	require_once('objetos/User.php');
	//evitando warnings
	error_reporting(0);
	
	//parte do codigo que verifica se deve deslogar da sessao
	$redirecionar = "../index1.php";
	if((!isset ($_SESSION['userLogado']) == true))
	{
		debug_to_console("deslogou do sistema - ARQUIVO:CadastroTurma.php");
		unset($_SESSION['userLogado']);
		header('location:'.$redirecionar);
	}
	$userLogado = $_SESSION['userLogado'];
	/////////////////////////////////////////////////////////////////////
	
	
	
	//metodo para debug 
	function debug_to_console( $data ) 
	{
		if ( is_array( $data ) )
			$output = "<script>console.log( 'Debug Objects: " . implode( ',', $data) . "' );</script>";
		else
			$output = "<script>console.log( 'Debug Objects: " . $data . "' );</script>";
	
		echo $output;
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
    <title>SB Admin - Bootstrap Admin Template</title>
    <!-- Bootstrap Core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <!-- Custom CSS -->
    <link href="css/sb-admin.css" rel="stylesheet">
    <!-- Morris Charts CSS -->
    <link href="css/plugins/morris.css" rel="stylesheet">
    <!-- Custom Fonts -->
    <link href="font-awesome-4.1.0/css/font-awesome.min.css" rel="stylesheet"
    type="text/css">
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media
    queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file://
    -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>
  
  <body>
    <div id="wrapper">
      <!-- Navigation -->
      <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
          <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="index.php">Diário de Classe</a>
        </div>
        <!-- Top Menu Items -->
        <ul class="nav navbar-right top-nav">
          <li class="dropdown">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-envelope"></i> <b class="caret"></b></a>
            <ul class="dropdown-menu message-dropdown">
              <li class="message-preview">
                <a href="#">

                                <div class="media">

                                    <span class="pull-left">

                                        <img class="media-object" src="../../imagens site diario de classse/novo.png" alt="">

                                    </span>

                                    <div class="media-body">

                                        <h5 class="media-heading"><strong>Eduardo Saraiva</strong>

                                        </h5>

                                        <p class="small text-muted"><i class="fa fa-clock-o"></i> Ontem as 8:32 PM</p>

                                        <p>Chamada realizada pelo device com sucesso!</p>

                                    </div>

                                </div>

                            </a>
              </li>
              <li class="message-preview">
                <a href="#">

                                <div class="media">

                                    <span class="pull-left">

                                        <img class="media-object" src="../../imagens site diario de classse/lido.png" alt="">

                                    </span>

                                    <div class="media-body">

                                        <h5 class="media-heading"><strong>Eduardo Saraiva</strong>

                                        </h5>

                                        <p class="small text-muted"><i class="fa fa-clock-o"></i> Anteontem as 19:52 </p>

                                        <p>Bem-vindo ao seu Diário de classe siga as instrucões na Sala do Professor</p>

                                    </div>

                                </div>

                            </a>
              </li>
              <li class="message-preview">
                <a href="#">

                                <div class="media">

                                    <span class="pull-left">

                                        <img class="media-object" src="../../imagens site diario de classse/lido.png" alt="">

                                    </span>

                                    <div class="media-body">

                                        <h5 class="media-heading"><strong>Eduardo Saraiva</strong>

                                        </h5>

                                        <p class="small text-muted"><i class="fa fa-clock-o"></i> Anteontem as 19:52 PM</p>

                                        <p>Conta free ativada!</p>

                                    </div>

                                </div>

                            </a>
              </li>
              <li class="message-footer">
                <a href="#">Read All New Messages</a>
              </li>
            </ul>
          </li>
          <li class="dropdown">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-bell"></i> <b class="caret"></b></a>
            <ul class="dropdown-menu alert-dropdown">
              <li>
                <a href="#">Alert Name <span class="label label-default">Alert Badge</span></a>
              </li>
              <li>
                <a href="#">Alert Name <span class="label label-primary">Alert Badge</span></a>
              </li>
              <li>
                <a href="#">Alert Name <span class="label label-success">Alert Badge</span></a>
              </li>
              <li>
                <a href="#">Alert Name <span class="label label-info">Alert Badge</span></a>
              </li>
              <li>
                <a href="#">Alert Name <span class="label label-warning">Alert Badge</span></a>
              </li>
              <li>
                <a href="#">Alert Name <span class="label label-danger">Alert Badge</span></a>
              </li>
              <li class="divider"></li>
              <li>
                <a href="#">View All</a>
              </li>
            </ul>
          </li>
          <li class="dropdown">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-user"></i> Eduardo Saraiva <b class="caret"></b></a>
            <ul class="dropdown-menu">
              <li>
                <a href="#"><i class="fa fa-fw fa-user"></i> Perfil</a>
              </li>
              <li>
                <a href="#"><i class="fa fa-fw fa-envelope"></i> Caixa de Mensagens</a>
              </li>
              <li>
                <a href="#"><i class="fa fa-fw fa-gear"></i> Configuração de Conta</a>
              </li>
              <li class="divider"></li>
              <li>
                <a href="action_logout.php"><i class="fa fa-fw fa-power-off"></i> Sair</a>
              </li>
            </ul>
          </li>
        </ul>
        <!-- Sidebar Menu Items - These collapse to the responsive navigation
        menu on small screens -->
        <div class="collapse navbar-collapse navbar-ex1-collapse">
          <ul class="nav navbar-nav side-nav">
            <li>
              <a href="index.php"><i class="fa fa-fw fa-desktop"></i> Sala do Professor</a>
            </li>
            <li class="active">
              <a href="javascript:;" data-toggle="collapse" data-target="#demo"><i class="fa fa-fw fa-arrows-v"></i> Cadastrar <i class="fa fa-fw fa-caret-down"></i></a>
              <ul id="demo" class="collapse">
                <li>
                  <a href="Cadastrar.php">Escola</a>
                </li>
                <li>
                  <a href="CadastrarDisciplina.php">Disciplina</a>
                </li>
                <li>
                  <a href="CadastroTurma.php">Turma</a>
                </li>
              </ul>
            </li>
            <li>
              <a href="Frequencias.php"><i class="fa fa-fw fa-bar-chart-o"></i> Frequências</a>
            </li>
            <li draggable="true">
              <a href="RegistroDeConteudo.php"><i class="fa fa-fw fa-table"></i> Registros de Conteúdos</a>
            </li>
            <li>
              <a href="Notas.php"><i class="fa fa-fw fa-edit"></i> Notas</a>
            </li>
            <li>
              <a href="RelatoriosDeConceitos.php"><i class="fa fa-fw fa-file"></i> Relatórios de Conceitos</a>
            </li>
            <li>
              <a href="Ocorrencias.php"><i class="fa fa-fw fa-file"></i> Ocorrências</a>
            </li>
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
              <h1 class="page-header">Cadastro de Turma&nbsp;
                <small>Diário de Classe</small>
              </h1>
              <ul class="breadcrumb">
                <li>
                  <a href="Cadastrar.php">Cadastrar</a>
                </li>
                <li class="active">Turma</li>
              </ul>
              <form role="form">
                <div class="form-group">
                  <label class="control-label" for="exampleInputPassword1">Nome da Turma
                    <br>
                  </label>
                  <input class="form-control" id="exampleInputPassword1" placeholder="Entre com o nome da turma"
                  style="width: 350px;" type="password">
                </div>
              </form>
              <form role="form">
                <div class="form-group" draggable="true">
                  <label class="control-label" for="exampleInputEmail1">Turno
                    <br>
                  </label>
                  <input class="form-control" id="exampleInputEmail1" placeholder="Entre com o turno"
                  style="width: 350px;" type="email">
                </div>
                <div class="form-group">
                  <label class="control-label" for="exampleInputPassword1">Número de Alunos</label>
                  <input class="form-control" id="exampleInputPassword1"
                  placeholder="Digite o número de alunos" style="width: 350px;" type="password">
                </div>
                <button type="submit" class="btn btn-primary" draggable="true">Cadastrar</button>
              </form>
            </div>
          </div>
          <!-- /.row -->
          <!-- /.row -->
          <!-- /.row -->
          <!-- /.row -->
          <!-- /.row -->
        </div>
        <!-- /.container-fluid -->
      </div>
      <!-- /#page-wrapper -->
    </div>
    <!-- /#wrapper -->
    <!-- jQuery Version 1.11.0 -->
    <!-- Bootstrap Core JavaScript -->
    <!-- Morris Charts JavaScript -->
  </body>

</html>