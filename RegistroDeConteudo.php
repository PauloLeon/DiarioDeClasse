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

                                        <p class="small text-muted"><i class="fa fa-clock-o"></i> Ontem as 8:32</p>

                                        <p>Chamada realizada pelo aparelho com sucesso</p>

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

                                        <p class="small text-muted"><i class="fa fa-clock-o"></i> Anteontem as 19:52</p>

                                        <p>Bem-vindo ao seu Diário de Classe siga as instruções na Sala do Professor</p>

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

                                        <p class="small text-muted"><i class="fa fa-clock-o"></i> Anteontem as 19:54</p>

                                        <p>Conta grátis ativada!</p>

                                    </div>

                                </div>

                            </a>
              </li>
              <li class="message-footer">
                <a href="#">Ler novas menssagens</a>
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
            <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-user"></i>   <?php 
										echo $userLogado->getNome();?> <b class="caret"></b></a>
            <ul class="dropdown-menu">
              <li>
                <a href="#"><i class="fa fa-fw fa-user"></i> Perfil</a>
              </li>
              <li>
                <a href="#"><i class="fa fa-fw fa-envelope"></i> Caixa de Menssagens</a>
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
            <li>
              <a href="javascript:;" data-toggle="collapse" data-target="#demo"><i class="fa fa-fw fa-arrows-v"></i> Cadastrar <i class="fa fa-fw fa-caret-down"></i></a>
              <ul id="demo" class="collapse">
                <li>
                  <a href="Cadastrar.php">Escola</a>
                </li>
                <li>
                  <a href="CadastrarDisciplina">Disciplina</a>
                </li>
                <li>
                  <a href="CadastroTurma.php">Turma</a>
                </li>
              </ul>
            </li>
            <li>
              <a href="Frequencias.php"><i class="fa fa-fw fa-bar-chart-o"></i> Frequências</a>
            </li>
            <li class="active">
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
      <div id="page-wrapper">
        <div class="container-fluid">
          <div class="row">
            <div class="col-lg-12">
              <h1 class="page-header">Registro de Conteúdo</h1>
              <ol class="breadcrumb" contenteditable="true">
                <li class="active">
                  <i class="fa fa-table"></i>&nbsp;Registro de Conteúdo</li>
              </ol>
            </div>
          </div>
          <script type="text/javascript">
            function do_change(){
            document.getElementById("save").style.display = "block";
            document.getElementById("change").style.display = "block";
            document.getElementById("cancel").style.display = "block";
            }
          </script>
          <form name="form1" method="post" action="">
            <div class="buttons">
              <button type="button" class="btn btn-primary" name="edit" id="edit" onclick="do_change(); return false;"
              data-toggle="modal" data-target="#modal">Escolha</button>
              <div class="row">
                <div class="col-lg-1" draggable="true" name="cancel" id="cancel" style="display:none;">Cancel
                  <h5>Dia:</h5>
                  <select class="form-control" name="cancel" id="cancel" style="display:none;">Cancel
                    <option value="one">01</option>
                    <option value="two">02</option>
                    <option value="three">03</option>
                    <option value="four">04</option>
                    <option value="five">05</option>
                    <option value="six">06</option>
                    <option value="seven">07</option>
                    <option value="eight">08</option>
                    <option value="nine">09</option>
                    <option value="ten">10</option>
                    <option value="eleven">11</option>
                    <option value="twelve">12</option>
                    <option value="one">13</option>
                    <option value="two">14</option>
                    <option value="three">15</option>
                    <option value="four">16</option>
                    <option value="five">17</option>
                    <option value="six">18</option>
                    <option value="seven">19</option>
                    <option value="eight">20</option>
                    <option value="nine">21</option>
                    <option value="ten">22</option>
                    <option value="eleven">23</option>
                    <option value="twelve">24</option>
                    <option value="six">25</option>
                    <option value="seven">26</option>
                    <option value="eight">27</option>
                    <option value="nine">28</option>
                    <option value="ten">29</option>
                    <option value="eleven">30</option>
                    <option value="twelve">31</option>
                  </select>
                  <div class="table-responsive"></div>
                </div>
                <div class="col-lg-1" draggable="true" name="cancel" id="cancel" style="display:none;">Cancel
                  <h5>Mes:</h5>
                  <select class="form-control" name="cancel" id="cancel" style="display:none;">Cancel
                    <option value="one">01</option>
                    <option value="two">02</option>
                    <option value="three">03</option>
                    <option value="four">04</option>
                    <option value="five">05</option>
                    <option value="six">06</option>
                    <option value="seven">07</option>
                    <option value="eight">08</option>
                    <option value="nine">09</option>
                    <option value="ten">10</option>
                    <option value="eleven">11</option>
                    <option value="twelve">12</option>
                  </select>
                  <div class="table-responsive"></div>
                </div>
              </div>
              <h4>Conteúdo:</h4>
              <div <p=""></div>
              <div class="form-group">
                <textarea class="form-control" rows="7"></textarea>
              </div>
              <h4>Observações:</h4>
              <div <p=""></div>
              <div class="form-group">
                <textarea class="form-control" rows="7"></textarea>
              </div>
              <a class="btn btn-primary" style="float: right;">Salvar</a>
              <div class="modal fade" id="modal" draggable="true">
                <div class="modal-dialog">
                  <div class="modal-content">
                    <div class="modal-header">
                      <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                      <h4 class="modal-title">Escolha...</h4>
                    </div>
                    <div class="modal-body" draggable="true">
                      <p>Escola:</p>
                      <select class="form-control">
                        <option value="one">Impacto</option>
                        <option value="two">Nazare</option>
                        <option value="three">Universo</option>
                        <option value="four">Moderno</option>
                      </select>
                      <div>
                        <p></p>
                      </div>
                      <p>Turma:</p>
                      <select class="form-control">
                        <option value="one">307</option>
                        <option value="two">301</option>
                        <option value="three">302</option>
                      </select>
                      <div>
                        <p></p>
                      </div>
                      <p>Disciplina:</p>
                      <select class="form-control">
                        <option value="one">Matematica</option>
                        <option value="two">Física</option>
                      </select>
                    </div>
                    <div class="modal-footer">
                      <a class="btn btn-default" data-dismiss="modal" draggable="true">Fechar</a>
                      <button type="submit" class="btn btn-primary">Visualizar</button>
                    </div>
                  </div>
                </div>
              </div>
              <!-- /.row -->
              <!-- /.row -->
              <!-- /.row -->
              <!-- /.row -->
            </div>
          </form>
          <!-- Page Heading -->
          <!-- /.row -->
          <!-- /.row -->
          <!-- /.row -->
          <!-- /.row -->
        </div>
        <!-- /.container-fluid -->
      </div>
      <!-- /#page-wrapper -->
    </div>
  </body>

</html>