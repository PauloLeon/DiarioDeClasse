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
    <title>SB Admin - Bootstrap Admin Template</title>
    <!-- Bootstrap Core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <!-- Custom CSS -->
    <link href="css/sb-admin.css" rel="stylesheet">
    <!-- Custom Fonts -->
    <link href="font-awesome-4.1.0/css/font-awesome.min.css" rel="stylesheet"
    type="text/css">
  </head>

  <body>
    <div id="wrapper">
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
          <a class="navbar-brand" href="index.php"><img src="../DiarioDeClasse/imagem/site/diario-de-classe.png" class="img-responsive"style="width:150px;"></a>
        </div>
        <!-- Top Menu Items -->
        <ul class="nav navbar-right top-nav">

          <li class="dropdown">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-user"></i> Eduardo Saraiva <b class="caret"></b></a>
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
          <!--  <li>
              <a href="Frequencias.php"><i class="fa fa-fw fa-bar-chart-o"></i> Frequências</a>
            </li>
            <li>
              <a href="RegistroDeConteudo.php"><i class="fa fa-fw fa-table"></i> Registros de Conteúdos</a>
            </li>
            <li>
              <a href="Notas.php"><i class="fa fa-fw fa-edit"></i> Notas</a>
            </li>
            <li class="active" draggable="true">
              <a href="RelatoriosDeConceitos.php"><i class="fa fa-fw fa-file"></i> Relatórios de Conceitos</a>
            </li>
            <li>
              <a href="Ocorrencias.php"><i class="fa fa-fw fa-file"></i> Ocorrências</a>
            </li>-->
          </ul>
        </div>
        <!-- /.navbar-collapse -->
      </nav>
      <!-- Navigation -->
      <div id="page-wrapper">
        <div class="container-fluid">
          <!-- Page Heading -->
          <div class="row">
            <div class="col-lg-12">
              <h1 class="page-header">Relatórios de Conceitos</h1>
              <!--<ol class="breadcrumb">
                <li>
                  <i class="fa fa-dashboard"></i>
                  <a href="index.php">Dashboard</a>
                </li>
                <li class="active">
                  <i class="fa fa-desktop">&nbsp;Relatórios de Conceitos</i>
                </li>
              </ol>-->
            </div>
          </div>
          <a class="btn btn-julio" data-toggle="modal" data-target="#imp">Clique para imprimir algum relatório</a>
          <div class="modal fade" id="imp">
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
          <a class="btn btn-julio" data-toggle="modal" data-target="#kkk">Clique para fazer o relatório</a>
          <div class="modal fade" id="kkk">
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
          <table class="table">
            <thead>
              <tr>
                <th>#</th>
                <th>Nome</th>
                <th>Turma</th>
                <th>Relatório</th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <td>1</td>
                <td>Paulo Rosa</td>
                <td>309</td>
                <td>RELATÓRIO</td>
              </tr>
              <tr>
                <td>2</td>
                <td>Júlio Rodrigues</td>
                <td>305</td>
                <td>RELATÓRIO</td>
              </tr>
              <tr>
                <td>3</td>
                <td>Caio Borsoi</td>
                <td contenteditable="true">504</td>
                <td>RELATÓRIO</td>
              </tr>
            </tbody>
          </table>
          <h1>Relatório</h1>
        </div>
        <form role="form">
          <div class="form-group">
            <label for="name"></label>
            <textarea class="form-control" rows="10" style="width: 700px;"></textarea>
          </div>
        </form>
        <a class="btn btn-julio">Salvar</a>
        <!-- /.container-fluid -->
      </div>
      <!-- /#page-wrapper -->
    </div>
    <!-- /#wrapper -->
    <!-- jQuery Version 1.11.0 -->
    <script src="../DiarioDeClasse/js/jquery-1.11.0.js"></script>
    <!-- Bootstrap Core JavaScript -->
    <script src="../DiarioDeClasse/js/bootstrap.min.js"></script>
  </body>

</html>
