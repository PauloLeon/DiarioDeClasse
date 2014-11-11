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
        <div class="navbar-header">
          <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="index.php">Diário de Classe</a>
        </div>
        <!-- Brand and toggle get grouped for better mobile display -->
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

                                        <p>Chamada realizada pelo aparelho com sucesso!</p>

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

                                        <p class="small text-muted"><i class="fa fa-clock-o"></i> Anteontem as 19:54</p>

                                        <p>Conta free ativada!</p>

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
            <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-user"></i> Eduardo Saraiva <b class="caret"></b></a>
            <ul class="dropdown-menu">
              <li>
                <a href="#"><i class="fa fa-fw fa-user"></i> Perfil</a>
              </li>
              <li>
                <a href="#"><i class="fa fa-fw fa-envelope"></i> Caixa de Menssagens</a>
              </li>
              <li>
                <a href="#"><i class="fa fa-fw fa-gear"></i> Configuração da Conta</a>
              </li>
              <li class="divider"></li>
              <li>
                <a href="action_logout.php"><i class="fa fa-fw fa-power-off"></i> Sair</a>
              </li>
            </ul>
          </li>
        </ul>
        <!-- Top Menu Items -->
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
            <li>
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
            <li class="active">
              <a href="Ocorrencias.php"><i class="fa fa-fw fa-file"></i> Ocorrências</a>
            </li>
          </ul>
        </div>
        <!-- /.navbar-collapse -->
      </nav>
      <div id="page-wrapper">
        <div class="container-fluid">
          <!-- Page Heading -->
          <div class="row">
            <div class="col-lg-12">
              <h1 class="page-header">Ocorrências</h1>
              <ol class="breadcrumb">
                <li>
                  <i class="fa fa-dashboard"></i>
                  <a href="index.php">Dashboard</a>
                </li>
                <li class="active">
                  <i class="fa fa-file">&nbsp;Ocorrências</i>
                </li>
              </ol>
            </div>
          </div>
          <a class="btn btn-primary" data-toggle="modal" data-target="#eto">Clique aqui para realizar a ocorrência</a>
          <div class="modal fade" id="eto">
            <div class="modal-dialog">
              <div class="modal-content">
                <div class="modal-header">
                  <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                  <h4 class="modal-title">Entre com os dados escolares</h4>
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
                  <p>Aluno (a):</p>
                  <select class="form-control">
                    <option value="one">Carlos Eduardo</option>
                    <option value="two">Vinícius Corrêa</option>
                    <option value="two">Alan Santos</option>
                    <option value="two">Tomas Turbando</option>
                    <option value="two">Luís Socaminha</option>
                    <option value="two">Mauro Pinto</option>
                    <option value="two">Takarasha no Muro</option>
                  </select>
                </div>
                <div class="modal-footer">
                  <a class="btn btn-default" data-dismiss="modal" draggable="true">Fechar</a>
                  <a class="btn btn-primary">Visualizar</a>
                </div>
              </div>
            </div>
          </div>
          <h1>Ocorrência:&nbsp;</h1>
          <form role="form">
            <div class="form-group">
              <label for="name"></label>
              <textarea class="form-control" rows="10" style="width: 700px;"></textarea>
            </div>
          </form>
          <!-- /.row -->
        </div>
        <a class="btn btn-primary">Salvar</a>
        <!-- /#page-wrapper -->
      </div>
      <script src="js/jquery-1.11.0.js"></script>
      <script src="js/bootstrap.min.js"></script>
      <!-- /#wrapper -->
      <!-- jQuery Version 1.11.0 -->
      <!-- Bootstrap Core JavaScript -->
    </div>
  </body>

</html>