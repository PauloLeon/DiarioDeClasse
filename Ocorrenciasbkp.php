<?php
	include 'php/session.php';
	$jsonTurmas = $userLogado->getTurmaJSON($userLogado->getId());
	$jsonEscolas = $userLogado->getEscolasJSON($userLogado->getId());
	debug_to_console($jsonTurmas);
?>
<!DOCTYPE html>
<html>

  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Arquivo de Ocorrencias do Diario de Classe">
    <meta name="author" content="Paulo Rosa">
    <title>Diário de Classe</title>
		<!-- Bootstrap Date Picker -->
		<link href="css/bootstrap-datepicker3.css" rel="stylesheet">
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
      <!-- Navigation -->
      <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="index.php"><img src="/imagem/site/diario-de-classe.png" class="img-responsive"style="width:150px;"></a>
        </div>
        <!-- Brand and toggle get grouped for better mobile display -->
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
                <a href="#" style="color: #428bca;"><i class="fa fa-fw fa-gear"></i> Configuração da Conta</a>
              </li>
              <li class="divider"></li>
              <li>
                <a href="action_logout.php"style="color: #c94141;"><i class="fa fa-fw fa-power-off"></i> Sair</a>
              </li>
            </ul>
          </li>
        </ul>
        <!-- Top Menu Items -->
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
          </ul>
        </div>
        <!-- /.navbar-collapse -->
      </nav>
      <div id="page-wrapper" style="height: 100vh; width: 100%; background-color: white;" >
        <div class="container-fluid">
          <!-- Page Heading -->

          <div class="row">
            <div class="col-lg-6">
              <h2 class="page-header">Ocorrências</h2	>
            </div>
						<div class="col-lg-6 pull-right" style="float:right;">
							<div class="form-group" style="margin-bottom: 0px; margin-top: 10px;">
            <label class="control-label col-md-offset-4 ">Data de Lançamento:</label>
            <!--<div id="exemplo"></div>-->
            <div style="overflow:hidden;">
                  <div class="form-group">
                <div class="row">
                      <div class="col-md-offset-4  col-md-8">
										<div id="exemplo" class="input-group date" data-provide="datepicker">
    									<input type="text"  value="" class="form-control">
    									<div class="input-group-addon">
        								<span class="glyphicon glyphicon-th"></span>
    									</div>
										</div>
                  </div>
                    </div>
              </div>
                </div>
          </div>
            </div>
					</div>
					<div class="row">
            <div class="col-lg-4">

								<p>Escola:</p>
								<div class="dropdown ">
									 <button class="btn btn-default dropdown-toggle" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-expanded="true"> Escolha uma Turma: <span class="caret"></span> </button>
									 <ul id="escolhaEscola" class="dropdown-menu" role="menu" aria-labelledby="dropdownMenu1">
											<?php
												 $jsonTurmas = json_decode($jsonTurmas);				 
												 if(empty($jsonEscolas))
												 {
													echo"<li class=\"list-group-item\" >"."Você ainda não tem Escolas cadastradas."."</li>";
												 }
												 foreach($jsonEscolas as $val)
												 {
													echo"<li id=".$val->idTurma." class=\"list-group-item\"text-align:center\">".$val->nmTurma." - ". $val->nmEscola."</li>";
												 }
											?>
									 </ul>
								 </div>&nbsp;
						</div>
						<div class="col-lg-4">
							<p>Turma:</p>
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
												echo"<li id=".$val->idTurma." class=\"list-group-item\"text-align:center\">".$val->nmTurma." - ". $val->nmEscola."</li>";
											 }
										?>
								 </ul>
							 </div>&nbsp;
            </div>
						<div class="col-lg-4">

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
          </div>

          <form role="form">
						<div class="row">
							<div class="col-lg-6">
								<div class="form-group">
									  <h3 class="page-header">Nova Ocorrência</h3>
		              <label for="name"></label>
		              <textarea class="form-control" rows="10" style="width: 700px;"></textarea>
		            </div>
							</div>
							<div class="col-lg-6">
								<div class="form-group">
								  <h3 class="page-header">Histórico</h3>
		              <label for="name"></label>
		              <textarea class="form-control" rows="10" style="width: 700px;"></textarea>
		            </div>
							</div>
						</div>
          </form>
          <!-- /.row -->
        </div>
        <a class="btn btn-julio">Salvar</a>
        <!-- /#page-wrapper -->
      </div>
      <!-- /#wrapper -->
    </div>
  </body>

</html>

<?php
	echo file_get_contents(dirname(__FILE__)."/Scripts/OcorrenciasScript.php", true);
?>
