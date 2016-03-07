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
      <script src="../DiarioDeClasse/https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="../DiarioDeClasse/https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>

<body draggable="true">
<div class="div_blue" id="wrapper">
<!-- Navigation -->
<nav class="navbar navbar-inverse navbar-fixed-top" role="navigation" style="background-color=#fff" >
  <!-- Brand and toggle get grouped for better mobile display -->
  <div class="navbar-header" >
    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse"> <span class="sr-only">Toggle navigation</span> <span class="icon-bar"></span> <span class="icon-bar"></span> <span class="icon-bar"></span> </button>
    <a class="navbar-brand" href="index.php"><img src="../DiarioDeClasse/imagem/site/diario-de-classe.png" class="img-responsive"style="width:150px;"></a> </div>
  <!-- Top Menu Items -->
  <ul class="nav navbar-right top-nav ">
    <li class="dropdown"> <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-user"></i>
      <?php echo $userLogado->getNome();?>
      <b class="caret"></b></a>
      <ul class="dropdown-menu">
        <li> <a href="#"style="color: #428bca;" ><i class="fa fa-fw fa-user"></i> Perfil</a> </li>
        <li> <a href="#" style="color: #428bca;"><i class="fa fa-fw fa-envelope"></i> Caixa de Mensagens</a> </li>
        <li> <a href="#" style="color: #428bca;"><i class="fa fa-fw fa-gear"></i> Configuração de Conta</a> </li>
        <li class="divider"></li>
        <li> <a href="action_logout.php"style="color: #c94141;" ><i class="fa fa-fw fa-power-off"></i> Sair</a> </li>
      </ul>
    </li>
  </ul>
  <!-- Sidebar Menu Items - These collapse to the responsive navigation
        menu on small screens -->
  <div class="collapse navbar-collapse navbar-ex1-collapse" style="background-color:#fff;">
    <ul class="div_blue nav navbar-nav side-nav "  >
      <li class="active"> <a href="index.php"><i class="fa fa-fw fa-desktop"></i> Dashboard </a> </li>
      <li> <a href="">Cadastros<i class="fa fa-fw fa-caret-down"></i></a> </li>
			<li><a href="Cadastrar.php">Instituições de Ensino</a></li>
			<li><a href="CadastrarDisciplina.php">Disciplinas</a></li>
			<li><a href="CadastroTurma.php">Turmas</a></li>
			<li><a href="CadastrarAluno.php">Alunos</a></li>
    </ul>
  </div>
  <!-- /.navbar-collapse -->
</nav>
<script src="../DiarioDeClasse/js/jquery-1.11.0.js"></script>
<script src="../DiarioDeClasse/js/bootstrap.min.js"></script>
<script src="../DiarioDeClasse/js/plugins/morris/raphael.min.js"></script>
<script src="../DiarioDeClasse/js/plugins/morris/morris.min.js"></script>
<script src="../DiarioDeClasse/js/plugins/morris/morris-data.js"></script>
<div id="begin" style="min-height: 100vh; width: 100%; background-color: white;">
  <div class="container-fluid">
    <!-- Page Heading -->
    <div class="row">
      <div class="col-lg-12">
        <h1 class="page-header">  </h1>
        <!--<ol class="breadcrumb" contenteditable="true">
          <li class="active"> <i class="fa fa-desktop"></i>&nbsp;Dashboard</li>
        </ol>-->
      </div>
    </div>
    <!-- /.row -->
    <div class="row">
      <div class="col-lg-12">
        <?php
				$jsonEscolas=$userLogado->getEscolasJSON($userLogado->getId());
				debug_to_console($jsonEscolas);
				if(empty($jsonEscolas)){
					echo'<div class="alert alert-danger alert-dismissable">
       					   <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
        					  <i class="fa fa-info-circle"></i> <strong>Bem-Vindo!</strong>';
       			 	echo $userLogado->getNome();

       			   echo	'<a href="http://startbootstrap.com/template-overviews/sb-admin-2"
             			   class="alert-link">, Atenção!!! </a>Você ainda não cadastrou nenhuma Instituição no sistema, vá em Cadastrar&gt;Instituição.
              			  </div>';
				}
		  ?>
      </div>
    </div>
    <div class="row">
			<div class="col-lg-4 col-md-4">
				<a href="TurmaDisciplina.php">
        <div class="panel panel-primary">
          <div class="panel-heading">
            <div class="row">

              <div class="col-xs-3"> <img class="media-object" src="../DiarioDeClasse/imagem/site/icon/frequencia_paulo.png"
                      alt=""> </div>
              <div class="col-xs-9 text-right">
                <!--<div class="huge">1</div>-->
                <div style="margin-top: 50px;">Frequencias</div>
              </div>
            </div>
          </div>
          <div class="panel-footer"> <span class="pull-left">Ver Detalhes</span> <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
            <div class="clearfix"></div>
          </div>
        </div>
				</a>
      </div>
      <div class="col-lg-4 col-md-4">
				<a href="RegistroDeConteudo.php">
        <div class="panel panel-gray">
          <div class="panel-heading">
            <div class="row">
              <div class="col-xs-3"> <img class="media-object" src="../DiarioDeClasse/imagem/site/icon/conteudo_paulo.png"
                      alt=""> </div>
              <div class="col-xs-9 text-right">
                <!--<div class="huge">1</div>-->
                <div style="margin-top: 50px;">Conteúdo</div>
              </div>
            </div>
          </div>
          <div class="panel-footer"> <span class="pull-left">Ver Detalhes</span> <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
            <div class="clearfix"></div>
          </div>
				</div>
				</a>
      </div>
			<div class="col-lg-4 col-md-4">
				<a href="Ocorrencias.php">
        <div class="panel panel-red">
          <div class="panel-heading">
            <div class="row">
              <div class="col-xs-3"> <img class="media-object" src="../DiarioDeClasse/imagem/site/icon/ocorrencias_paulo.png"
                      alt=""> </div>
              <div class="col-xs-9 text-right">
                <!--<div class="huge">1</div>-->
                <div style="margin-top: 50px;">Ocorrências</div>
              </div>
            </div>
          </div>
          <div class="panel-footer"> <span class="pull-left">Ver Detalhes</span> <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
            <div class="clearfix"></div>
          </div>
          </div>
				</a>
      </div>
			<div class="col-lg-4 col-md-4">
        <div class="panel panel-default panel-green" style="opacity: 0.5;">
          <div class="panel-heading">
            <div class="row">
              <div class="col-xs-3"> <img class="media-object" src="../DiarioDeClasse/imagem/site/icon/nota_paulo.png"
                      alt=""> </div>
              <div class="col-xs-9 text-right">
                <div style="margin-top: 50px;">Notas</div>
              </div>
            </div>
          </div>
          <!--<a href="Notas.php">-->
          <div class="panel-footer"> <span class="pull-left">Ver Detalhes</span> <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
            <div class="clearfix"></div>
          </div>
          <!--</a>--> </div>
      </div>
      <div class="col-lg-4 col-md-4">
        <div class="panel panel-yellow" style="opacity: 0.5;">
          <div class="panel-heading">
            <div class="row">
              <div class="col-xs-3"> <img class="media-object" src="../DiarioDeClasse/imagem/site/icon/conceito_paulo.png"
                      alt=""> </div>
              <div class="col-xs-9 text-right">
                <div style="margin-top: 50px;">Conceitos</div>
              </div>
            </div>
          </div>
          <!--<a href="RelatoriosDeConceitos.php">-->
          <div class="panel-footer"> <span class="pull-left">Ver Detalhes</span> <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
            <div class="clearfix"></div>
          </div>
          <!--</a>--> </div>
      </div>
      <div class="col-lg-4 col-md-4">
        <div id="parecer" class="panel panel-purple" style="opacity: 0.5;">
          <div class="panel-heading">
            <div class="row">
              <div class="col-xs-3"> <img class="media-object" src="../DiarioDeClasse/imagem/site/icon/parecer_paulo.png"
                      alt=""> </div>
              <div class="col-xs-9 text-right">
                <div style="margin-top: 50px;">Parecer</div>
              </div>
            </div>
          </div>
          <!--<a href="Parecer.php">-->
          <div class="panel-footer"> <span class="pull-left">Ver Detalhes</span> <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
            <div class="clearfix"></div>
          </div>
          <!--</a>--> </div>
      </div>

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
