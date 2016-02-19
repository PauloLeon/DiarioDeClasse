<?php
	include 'php/session.php';
?>
<!DOCTYPE html>
<html>

  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Diário de Classe</title>
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
      <script src="js/jquery-1.11.0.js"></script>
      <script src="js/bootstrap.min.js"></script>
      <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation"
      draggable="true">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
          <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="index.php"><img src="/imagem/site/diario-de-classe.png" class="img-responsive"style="width:150px;"></a>
        </div>
        <!-- Top Menu Items -->
        <ul class="nav navbar-right top-nav">

          <li class="dropdown">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-user"></i> <?php
										echo $userLogado->getNome();?> <b class="caret"></b></a>
            <ul class="dropdown-menu">
              <li>
                <a href="#" style="color: #428bca;"><i class="fa fa-fw fa-user"></i> Perfil</a>
              </li>
              <li>
                <a href="#" style="color: #428bca;"><i class="fa fa-fw fa-envelope"></i> Caixa de Menssagens</a>
              </li>
              <li>
                <a href="#" style="color: #428bca;"><i class="fa fa-fw fa-gear"></i> Configuração de Conta</a>
              </li>
              <li class="divider"></li>
              <li>
                <a href="action_logout.php"style="color: #c94141;"><i class="fa fa-fw fa-power-off"></i> Sair</a>
              </li>
            </ul>
          </li>
        </ul>
        <!-- Sidebar Menu Items - These collapse to the responsive navigation
        menu on small screens -->
        <div class="collapse navbar-collapse navbar-ex1-collapse">
          <ul class="div_blue nav navbar-nav side-nav">
            <li>
              <a href="index.php"><i class="fa fa-fw fa-desktop"></i> Dashboard</a>
            </li>
           <li>
                  <a href="">Cadastros<i class="fa fa-fw fa-caret-down"></i></a>
                </li>
                <li>
                  <a href="Cadastrar.php">Escola</a>
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
           <!-- <li>
              <a href="Frequencias.php"><i class="fa fa-fw fa-bar-chart-o"></i> Frequências</a>
            </li>
            <li>
              <a href="RegistroDeConteudo.php"><i class="fa fa-fw fa-table"></i> Registros de Conteúdos</a>
            </li>
            <li class="active">
              <a href="Notas.php"><i class="fa fa-fw fa-edit"></i> Notas</a>
            </li>
            <li>
              <a href="RelatoriosDeConceitos.php"><i class="fa fa-fw fa-file"></i> Relatórios de Conceitos</a>
            </li>
            <li>
              <a href="Ocorrencias.php"><i class="fa fa-fw fa-file"></i> Ocorrências</a>
            </li>-->
          </ul>
        </div>
        <!-- /.navbar-collapse -->
      </nav>
      <div id="page-wrapper">
        <div class="container-fluid">
          <div class="row">
            <div class="col-lg-12">
              <h1 class="page-header">Notas&nbsp;</h1>
              <!--<ol class="breadcrumb">
                <li>
                  <i class="fa fa-dashboard"></i>
                  <a href="index.php">Dashboard</a>
                </li>
                <li class="active">
                  <i class="fa fa-edit">&nbsp;Notas</i>
                </li>
              </ol>-->
            </div>
          </div>
          <!-- Page Heading -->
          <a class="btn btn-julio" data-toggle="modal" data-target="#ell">Clique aqui ir ao menu de notas</a>
          <table class="table" draggable="true">
            <thead>
              <tr>
                <th>#</th>
                <th>Nome</th>
                <th>1°</th>
                <th>2°</th>
                <th>3°</th>
                <th>4°</th>
                <th>Média</th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <td>1</td>
                <td>Caio</td>
                <td>
                  <input type="text" size="1">
                </td>
                <td>
                  <input type="text" size="1">
                </td>
                <td>
                  <input type="text" size="1">
                </td>
                <td>
                  <input type="text" size="1">
                </td>
              </tr>
              <tr>
                <td>2</td>
                <td>Paulo</td>
                <td>
                  <input type="text" size="1">
                </td>
                <td>
                  <input type="text" size="1">
                </td>
                <td>
                  <input type="text" size="1">
                </td>
                <td>
                  <input type="text" size="1">
                </td>
              </tr>
              <tr>
                <td>3</td>
                <td>Julio</td>
                <td>
                  <input type="text" size="1">
                </td>
                <td>
                  <input type="text" size="1">
                </td>
                <td>
                  <input type="text" size="1">
                </td>
                <td>
                  <input type="text" size="1">
                </td>
              </tr>
            </tbody>
          </table>
          <a class="btn btn-julio" style="float: right;">Salvar</a>
        </div>
      </div>
      <div class="modal fade" id="kk"></div>
      <div class="modal fade" id="ell">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
              <h4 class="modal-title">Dados Escolares</h4>
            </div>
            <div class="modal-body" draggable="true">
              <p>Escola:</p>
              <select class="form-control">
                <option value="one">São Francisco</option>
                <option value="two">Insa</option>
                <option value="three">Vestibulando</option>
                <option value="four">Basílio</option>
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
      <!-- /#page-wrapper -->
    </div>
    <!-- /#wrapper -->
    <!-- jQuery Version 1.11.0 -->
    <!-- Bootstrap Core JavaScript -->
  </body>

</html>
