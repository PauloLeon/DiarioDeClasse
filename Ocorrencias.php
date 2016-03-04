<?php
include 'php/session.php';
$jsonTurmas = $userLogado->getTurmaJSON($userLogado->getId());
$jsonEscolas = $userLogado->getEscolasJSON($userLogado->getId());

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
	<!-- Custom scroll -->
	<style>
	.scrollable-menu {
		height: auto;
		max-height: 275px;
		overflow-x: hidden;
	}
	.scrollable-menu-xl {
		height: auto;
		max-height: 520px;
		overflow-x: hidden;
	}
	.border-edit-green{
		border: 2px solid #51B867;
	}
	</style>
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
				<a class="navbar-brand" href="index.php"><img src="../DiarioDeClasse/imagem/site/diario-de-classe.png" class="img-responsive"style="width:150px;"></a>
			</div>
			<!-- Brand and toggle get grouped for better mobile display -->
			<ul class="nav navbar-right top-nav">

				<li class="dropdown">
					<a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-user"></i><?php echo $userLogado->getNome();?><b class="caret"></b></a>
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
		<div id="page-wrapper" style="min-height: 100vh; width: 100%; background-color: white;" >
			<div id="begin" class="container-fluid">
				<!-- Page Heading -->

				<div class="row">
					<div class="col-lg-6">
						<h2 class="page-header">Ocorrências</h2	>
						</div>
						<div class="col-lg-6 pull-right" style="float:right;">
							<div class="form-group" style="margin-bottom: 0px; margin-top: 10px;">
								<!--<div id="exemplo"></div>-->
									<div class="form-group">
										<div class="row">
											<div class="col-md-offset-8  col-md-4">
												<div class="dropdown ">
													<button class="btn btn-default dropdown-toggle" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-expanded="true"> Escolha uma Turma: <span class="caret"></span> </button>
													<ul id="escolhaTurma" class="dropdown-menu dropdown-menu-right" role="menu" aria-labelledby="dropdownMenu1">
														<?php
														$jsonTurmas = json_decode($jsonTurmas);
														if(empty($jsonTurmas))
														{
															echo"<li class=\"list-group-item\" >"."Você ainda não tem turmas cadastradas."."</li>";
														}
														foreach($jsonTurmas as $val)
														{
															$idName =  $val->nmTurma.' - '.$val->nmEscola."";
															echo"<li id=".$val->idTurma." idname=\"".utf8_decode($idName)."\"  class=\"list-group-item\">".utf8_decode($val->nmEscola)." - ".utf8_decode($val->nmTurma)."</li>";
														}
														?>
													</ul>
												</div>&nbsp;
									</div>
								</div>
							</div>
					</div>
				</div>
			</div>

			<form role="form">
				<div class="row">
					<div class="col-lg-6">
						<div class="panel panel-red" >
							<div class="panel-heading">
								<div class="row">
									<div class="col-xs-6 col-sm-6 col-md-6"><h3 class="panel-title">Alunos</h3></div>
									<div class="col-xs-6 col-sm-6 col-md-6"><h3 class="panel-title">Turma</h3></div>
									<!--<div class="col-xs-4 col-sm-4 col-md-4"><h3 class="panel-title">Editar</h4></div>-->
								</div>
							</div>
							<div class="panel-body" style="height:550px;">
								<div class="thumbnail scrollable-menu-xl" role="menu" style="background-color: rgba(230,143,141,0.3); height:520px;">
									<ul id="editAlunos" class="list-group" >
										<div class="row">
											<div class="col-md-2"></div>
											<div class="col-md-8">
												<!--<img src="../DiarioDeClasse/imagens/turmas.png" alt="..." class="img-thumbnail">-->
											</div>
											<div class="col-md-2"></div>
										</div>
									</ul>
								</div>
						</div>
					</div>
					</div>

					<div id="historico" class="col-lg-6">
							<div class="panel panel-red" >
								<div class="panel-heading">
									<h3 class="panel-title">Histórico</h3>
								</div>
								<div class="panel-body" style="height:300px;">
									<div class="thumbnail scrollable-menu" role="menu" style="background-color: rgba(230,143,141,0.3); height:275px;">
									<ul id="editOcorrencias" class="list-group" >
									</ul>
								</div>
								</div>
						</div>
						<div class="form-group">
							<div class="panel panel-red" >
								<div class="panel-heading">
									<h3 class="panel-title">Ocorrências</h3>
								</div>
								<div class="panel-body" style="height:190px;">
							<div id="exemplo" class="input-group date" data-provide="datepicker">
								<input id="calendar" type="text"  value="" class="form-control">
								<div class="input-group-addon">
									<span class="glyphicon glyphicon-th"></span>
								</div>
							</div>
							<label for="name"></label>
							<input id="textOcorrencia" value="" class="form-control" rows="10"></input>
							<div class="row" style="margin-top: 10px;">
								<div class="col-xs-2 col-sm-2 col-md-2"><h3 class="panel-title"><a id="save_btn" <a id="save_btn" class="btn btn-danger" style="color: #fff;">Salvar</a> </h3></div>
								<div class="col-xs-10 col-sm-10 col-md-10"><h3 class="panel-title"><a id="delete_btn" class="btn btn-danger" style="color: #fff;" >Excluir</a></h3></div>
							</div>
						</div>

						</div>

					</div>
				</div>
			</form>
			<!-- /.row -->
			<!-- /#page-wrapper -->
		</div>
		<!-- /#wrapper -->
	</div>
</div>
</body>
</html>

<?php
echo file_get_contents(dirname(__FILE__)."/Scripts/OcorrenciasScript.php", true);
?>
