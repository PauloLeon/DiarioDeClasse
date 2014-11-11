<!DOCTYPE html>
<html>
  
  <head></head>
  
  <body>console.log( 'Debug Objects: " . implode( ',', $data) . "' );"; else $output="
    <script>
      console.log( 'Debug Objects: ". $data . "' );
    </script>"; echo $output; } ?&gt;
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

                                        <p class="small text-muted"><i class="fa fa-clock-o"></i> Ontem as 19:52</p>

                                        <p>Diário de Classe</p>

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

                                        <p class="small text-muted"><i class="fa fa-clock-o"></i> Anteontem as 14:32</p>

                                        <p>Teste Diario</p>

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

                                        <p class="small text-muted"><i class="fa fa-clock-o"></i> Anteontem as 14:35 </p>

                                        <p>Teste Diario</p>

                                    </div>

                                </div>

                            </a>
              </li>
              <li class="message-footer">
                <a href="#">Ver Todas Messagens</a>
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
            <li class="active">
              <a href="Frequencias.php"><i class="fa fa-fw fa-bar-chart-o"></i> Frequências</a>
            </li>
            <li>
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
      <div id="page-wrapper">
        <div class="container-fluid">
          <div class="row">
            <div class="col-lg-12">
              <h1 class="page-header">Frequência</h1>
              <ol class="breadcrumb" draggable="true">
                <li class="active">
                  <i class="fa fa-bar-chart-o"></i>
                </li>
              </ol>
            </div>
          </div>
          <a class="btn btn-primary" data-toggle="modal" data-target="#kk" draggable="true">Escolha
          </a>
          <div class="row">
            <div class="col-md-12">
              <div class="panel panel-primary">
                <div class="panel-heading">
                  <h3 class="panel-title">Developers</h3>
                  <div class="pull-right">
                    <span class="clickable filter" data-toggle="tooltip" title="Toggle table filter"
                    data-container="body">
                      <i class="glyphicon glyphicon-filter"></i>
                    </span>
                  </div>
                </div>
                <div class="panel-body">
                  <input type="text" class="form-control" id="dev-table-filter" data-action="filter"
                  data-filters="#dev-table" placeholder="Filter Developers">
                </div>
                <table class="table table-hover" id="dev-table">
                  <thead>
                    <tr>
                      <th>#</th>
                      <th>Nome</th>
                      <th>Turma</th>
                      <th>Escola</th>
                      <th>Falta(s)</th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr>
                      <td>1</td>
                      <td>Caio</td>
                      <td>307</td>
                      <td>Nazare</td>
                      <td>
                        <select size="1">
                          <option value="zero">0</option>
                          <option value="one">1</option>
                          <option value="two">2</option>
                          <option value="three">3</option>
                        </select>
                        <div></div>
                      </td>
                    </tr>
                    <tr>
                      <td>2</td>
                      <td>Caizim</td>
                      <td>203</td>
                      <td>Impacto</td>
                      <td>
                        <select size="1">
                          <option value="zero">0</option>
                          <option value="one">1</option>
                          <option value="two">2</option>
                          <option value="three">3</option>
                        </select>
                        <div></div>
                      </td>
                    </tr>
                    <tr>
                      <td>3</td>
                      <td>Caiu</td>
                      <td>1001</td>
                      <td>Moderno</td>
                      <td>
                        <select size="1">
                          <option value="zero">0</option>
                          <option value="one">1</option>
                          <option value="two">2</option>
                          <option value="three">3</option>
                        </select>
                        <div></div>
                      </td>
                    </tr>
                  </tbody>
                </table>
              </div>
            </div>
            <div <p=""></div>
            <a class="btn btn-primary" style="float: right;">Salvar</a>
            <!-- Page Heading -->
            <div class="modal fade" id="kk" draggable="true">
              <div class="modal-dialog">
                <div class="modal-content">
                  <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                    <h4 class="modal-title">Escolha</h4>
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
                    <a class="btn btn-primary">Visualizar</a>
                  </div>
                </div>
              </div>
            </div>
            <!-- /.row -->
            <!-- Flot Charts -->
            <!-- /.row -->
            <!-- /.row -->
            <!-- /.row -->
            <!-- /.row -->
            <!-- Morris Charts -->
            <!-- /.row -->
            <!-- /.row -->
            <!-- /.row -->
          </div>
          <!-- /.container-fluid -->
        </div>
        <!-- /#page-wrapper -->
      </div>
      <script src="js/jquery-1.11.0.js"></script>
      <script src="js/filtroFrequencia.js"></script>
      <script src="js/bootstrap.min.js"></script>
      <script src="js/plugins/morris/raphael.min.js"></script>
      <script src="js/plugins/morris/morris.min.js"></script>
      <script src="js/plugins/morris/morris-data.js"></script>
      <script src="js/plugins/flot/jquery.flot.js"></script>
      <script src="js/plugins/flot/jquery.flot.tooltip.min.js"></script>
      <script src="js/plugins/flot/jquery.flot.resize.js"></script>
      <script src="js/plugins/flot/jquery.flot.pie.js"></script>
      <script src="js/plugins/flot/flot-data.js"></script>
      <!-- /#wrapper -->
      <!-- jQuery Version 1.11.0 -->
      <!-- Bootstrap Core JavaScript -->
      <!-- Morris Charts JavaScript -->
      <!-- Flot Charts JavaScript -->
      <!--[if lte IE 8]>
        <script src="js/excanvas.min.js"></script>
      <![endif]-->
    </div>
  </body>

</html>