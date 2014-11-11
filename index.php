<?php  
	//aquivo de usuario
	require_once('objetos/User.php');
	//arquivo de conexao
	require_once('model/conexao.php');
	function debug_to_console( $data ) {

    if ( is_array( $data ) )
        $output = "<script>console.log( 'Debug Objects: " . implode( ',', $data) . "' );</script>";
    else
        $output = "<script>console.log( 'Debug Objects: " . $data . "' );</script>";

    echo $output;
}
	
 	$redirecionar = "../index1.php";
	session_start();
	if((!isset ($_SESSION['userLogado']) == true))
	{
		unset($_SESSION['userLogado']);
		debug_to_console("saindo da sessao");
		header('location:'.$redirecionar);
	}

	$userLogado = $_SESSION['userLogado'];
	
	debug_to_console("".$userLogado->getEmail());
	debug_to_console("Passou aqui");

  ?>
<!DOCTYPE html>
<html>
  
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Sala do Professor <?php echo $userLogado->getNome();?></title>
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
  
  <body draggable="true">
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



                                        <img class="media-object" src="imagens site diario de classse/novo.png" alt="">



                                    </span>



                                    <div class="media-body">



                                        <h5 class="media-heading"><strong><?php 
										echo $userLogado->getNome();?></strong>



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



                                        <img class="media-object" src="imagens site diario de classse/lido.png" alt="">



                                    </span>



                                    <div class="media-body">



                                        <h5 class="media-heading"><strong><?php 
										echo $userLogado->getNome();?></strong>



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



                                        <img class="media-object" src="imagens site diario de classse/lido.png" alt="">



                                    </span>



                                    <div class="media-body">



                                        <h5 class="media-heading"><strong><?php 
										echo $userLogado->getNome();?></strong>



                                        </h5>



                                        <p class="small text-muted"><i class="fa fa-clock-o"></i> Anteontem as 19:52 PM</p>



                                        <p>Conta free ativada!</p>



                                    </div>



                                </div>



                            </a>
              </li>
              <li class="message-footer">
                <a href="#">Ler Novas menssagens</a>
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
            <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-user"></i> <?php 
										echo $userLogado->getNome();?> <b class="caret"></b></a>
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
            <li class="active">
              <a href="index.php"><i class="fa fa-fw fa-desktop"></i> Sala do Professor: <?php 
										echo $userLogado->getNome();?></a>
            </li>
            <li>
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
              <a href="RegistroDeConteudo.php"><i class="fa fa-fw fa-table"></i> Registros de Conteudos</a>
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
              <h1 class="page-header">Sala do Professor: <?php 
										echo $userLogado->getNome();?>
                <small>Diário de Classe</small>
              </h1>
              <ol class="breadcrumb" contenteditable="true">
                <li class="active">
                  <i class="fa fa-desktop"></i>&nbsp;Sala do Professor</li>
              </ol>
            </div>
          </div>
          <!-- /.row -->
          <div class="row">
            <div class="col-lg-12">
              <div class="alert alert-danger alert-dismissable">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                <i class="fa fa-info-circle"></i>
                <strong>Bem-Vindo!</strong><?php 
										echo $userLogado->getNome();?>
                <a href="http://startbootstrap.com/template-overviews/sb-admin-2"
                class="alert-link">Atenção!!! </a>Você ainda não cadastrou nenhuma Instituição no sistema, vá em Cadastrar&gt;Instituição.</div>
            </div>
          </div>
          <div class="row">
            <div class="col-lg-3 col-md-3">
              <div class="panel panel-primary">
                <div class="panel-heading">
                  <div class="row">
                    <div class="col-xs-3">
                      <img class="media-object" src="imagens site diario de classse/clipboard.png"
                      alt="">
                    </div>
                    <div class="col-xs-9 text-right">
                      <div class="huge">1</div>
                      <div>Frequencias</div>
                    </div>
                  </div>
                </div>
                <a href="Frequencias.php">



                                <div class="panel-footer">



                                    <span class="pull-left">Ver Detalhes</span>



                                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>



                                    <div class="clearfix"></div>



                                </div>



                            </a>
              </div>
            </div>
            <div class="col-lg-3 col-md-3">
              <div class="panel panel-default panel-green">
                <div class="panel-heading">
                  <div class="row">
                    <div class="col-xs-3">
                      <img class="media-object" src="imagens site diario de classse/notas.png"
                      alt="">
                    </div>
                    <div class="col-xs-9 text-right">
                      <div class="huge">12</div>
                      <div>Notas</div>
                    </div>
                  </div>
                </div>
                <a href="Notas.php">



                                <div class="panel-footer">



                                    <span class="pull-left">Ver Detalhes</span>



                                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>



                                    <div class="clearfix"></div>



                                </div>



                            </a>
              </div>
            </div>
            <div class="col-lg-3 col-md-3">
              <div class="panel panel-yellow" draggable="true">
                <div class="panel-heading">
                  <div class="row">
                    <div class="col-xs-3">
                      <i class="fa fa-download fa-4x"></i>
                    </div>
                    <div class="col-xs-9 text-right">
                      <div class="huge" draggable="true">12</div>
                      <div>R. de Conteudos</div>
                    </div>
                  </div>
                </div>
                <a href="RegistroDeConteudo.php">



                                <div class="panel-footer">



                                    <span class="pull-left">Ver Detalhes</span>



                                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>



                                    <div class="clearfix"></div>



                                </div>



                            </a>
              </div>
            </div>
            <div class="row">
              <div class="col-lg-3 col-md-3" draggable="true">
                <div class="panel panel-red" draggable="true">
                  <div class="panel-heading">
                    <div class="row">
                      <div class="col-xs-3">
                        <i class="fa fa-warning fa-4x"></i>
                      </div>
                      <div class="col-xs-9 text-right">
                        <div class="huge">13</div>
                        <div>Relatorios de Conceitos</div>
                      </div>
                    </div>
                  </div>
                  <a href="RelatoriosDeConceitos.php">



                                <div class="panel-footer">



                                    <span class="pull-left">Ver Detalhes</span>



                                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>



                                    <div class="clearfix"></div>



                                </div>



                            </a>
                </div>
              </div>
              <div class="rw">
                <div class="col-lg-3 col-md-3" draggable="true">
                  <div class="panel panel-yellow" draggable="true">
                    <div class="panel-heading">
                      <div class="row">
                        <div class="col-xs-3">
                          <img class="media-object" src="imagens site diario de classse/clipboard.png"
                          alt="">
                        </div>
                        <div class="col-xs-9 text-right">
                          <div class="huge">1</div>
                          <div>Ocorrencias</div>
                        </div>
                      </div>
                    </div>
                    <a href="Ocorrencias.php">



                                <div class="panel-footer">



                                    <span class="pull-left">Ver Detalhes</span>



                                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>



                                    <div class="clearfix"></div>



                                </div>



                            </a>
                  </div>
                </div>
                <div class="rw">
                  <div class="col-lg-3 col-md-3">
                    <div class="panel panel-red" draggable="true">
                      <div class="panel-heading">
                        <div class="row">
                          <div class="col-xs-3">
                            <img class="media-object" src="imagens site diario de classse/clipboard.png"
                            alt="">
                          </div>
                          <div class="col-xs-9 text-right">
                            <div class="huge">1</div>
                            <div>Atualizações</div>
                          </div>
                        </div>
                      </div>
                      <a href="#">



                                <div class="panel-footer">



                                    <span class="pull-left">Ver Detalhes</span>



                                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>



                                    <div class="clearfix"></div>



                                </div>



                            </a>
                    </div>
                  </div>
                  <div class="w">
                    <div class="rw">
                      <div class="col-lg-3 col-md-3">
                        <div class="panel panel-primary" draggable="true">
                          <div class="panel-heading">
                            <div class="row">
                              <div class="col-xs-3">
                                <img class="media-object" src="imagens site diario de classse/clipboard.png"
                                alt="">
                              </div>
                              <div class="col-xs-9 text-right">
                                <div class="huge">1</div>
                                <div>Nao sei Ainda :)</div>
                              </div>
                            </div>
                          </div>
                          <a href="#">



                                <div class="panel-footer">



                                    <span class="pull-left">Ver Detalhes</span>



                                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>



                                    <div class="clearfix"></div>



                                </div>



                            </a>
                        </div>
                      </div>
                      <div class="rw">
                        <div class="col-lg-3 col-md-3" draggable="true">
                          <div class="panel panel-green" draggable="true">
                            <div class="panel-heading">
                              <div class="row">
                                <div class="col-xs-3">
                                  <img class="media-object" src="imagens site diario de classse/clipboard.png"
                                  alt="">
                                </div>
                                <div class="col-xs-9 text-right">
                                  <div class="huge">1</div>
                                  <div>Ocorrencias</div>
                                </div>
                              </div>
                            </div>
                            <a href="Ocorrencias.php">



                                <div class="panel-footer">



                                    <span class="pull-left">Ver Detalhes</span>



                                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>



                                    <div class="clearfix"></div>



                                </div>



                            </a>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
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