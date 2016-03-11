<?php
include 'php/session.php';

$varNome = "";
$arrayTurmas = array();
$jsonTurmas = $userLogado->getTurmaJSON($userLogado->getId());
$jsonEscolas = $userLogado->getEscolasJSON($userLogado->getId());

if (!empty($_POST['preCarregandoDisciplinas']))
{
	$jsonDisciplinas = $userLogado->getDisciplinaJSON($userLogado->getId());
	$jsonDisciplinas = json_decode($jsonDisciplinas);
	foreach($jsonDisciplinas as $val)
	{
		if(!empty($_POST[$val->idDisciplina]))
		{
			array_push($arrayTurmas, $val->idDisciplina);
		}

	}

	$_SESSION['aux']= $arrayTurmas;

}

if (!empty($_GET['formSubmit']))
{
	$jsonDisciplinas = $userLogado->getDisciplinaJSON($userLogado->getId());
	$jsonDisciplinas = json_decode($jsonDisciplinas);
	foreach($jsonDisciplinas as $val)
	{
		if(!empty($_GET[$val->idDisciplina]))
		{
			array_push($arrayTurmas, $val->idDisciplina);
		}

	}

	$varNome =  $_GET['inputNome'];
	$varLancamento = $_GET['checkLancamento'];
	if($varLancamento=='on'){
		//disciplina
		$varLancamento = 1;
	}else{
		//turma
		$varLancamento = 0;
	}
	debug_to_console($varLancamento);
	$varTurno = $_GET['inputTurno'];
	$varEscola = $_GET['inputEscola'];
	$userLogado->insertTurmaBanco(trim($varNome),trim($varTurno),trim($varEscola),$userLogado->getId(),$arrayTurmas,$varLancamento);
}

//terminar
if (!empty($_GET['formEditSubmit']))
{
	$varNomeEdit = $_GET['inputNomeEdit'];
	$varTurnoEdit = $_GET['inputTurnoEdit'];
	$idTurma = $_GET['inputIdEdit'];
	$varEscolaEdit = $_GET['inputEscolasEdit'];
	$userLogado->updateTurma($idTurma,trim($varNomeEdit),trim($varTurnoEdit),$varEscolaEdit,$userLogado->getId());
}

if (!empty($_GET['formEditSubmitDelete']))
{
	$idTurma = $_GET['inputIdEdit'];
	$userLogado->removeTurma(trim($idTurma));
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
	<title>Diário de Classe</title>
	<link href="css/bootstrap.min.css" rel="stylesheet">
	<link href="css/bootstrap-switch.min.css" rel="stylesheet" type="text/css">
	<link href="css/sb-admin.css" rel="stylesheet">
	<link href="css/plugins/morris.css" rel="stylesheet">
	<link href="font-awesome-4.1.0/css/font-awesome.min.css" rel="stylesheet" type="text/css">

	<style>
	.scrollable-menu {
		height: auto;
		max-height: 250px;
		overflow-x: hidden;
	}
	</style>
</head>

<body>
	<div id="wrapper">
		<!-- Navigation -->
		<nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
			<!-- Brand and toggle get grouped for better mobile display -->
			<div class="navbar-header">
				<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse"> <span class="sr-only">Toggle navigation</span> <span class="icon-bar"></span> <span class="icon-bar"></span> <span class="icon-bar"></span> </button>
				<a class="navbar-brand" href="index.php"><img src="../DiarioDeClasse/imagem/site/diario-de-classe.png" class="img-responsive"style="width:150px;"></a> </div>
				<!-- Top Menu Items -->
				<ul class="nav navbar-right top-nav">
					<li class="dropdown"> <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-user"></i> <?php
					echo $userLogado->getNome();?> <b class="caret"></b></a>
					<ul class="dropdown-menu">
						<li> <a href="#" style="color: #428bca;"><i class="fa fa-fw fa-user"></i> Perfil</a> </li>
						<li> <a href="#" style="color: #428bca;"><i class="fa fa-fw fa-envelope"></i> Caixa de Mensagens</a> </li>
						<li> <a href="#" style="color: #428bca;"><i class="fa fa-fw fa-gear"></i> Configuração de Conta</a> </li>
						<li class="divider"></li>
						<li> <a href="action_logout.php"style="color: #c94141;"><i class="fa fa-fw fa-power-off"></i> Sair</a> </li>
					</ul>
				</li>
			</ul>
			<!-- Sidebar Menu Items - These collapse to the responsive navigation
			menu on small screens -->
			<div class="  collapse navbar-collapse navbar-ex1-collapse">
				<ul class="div_blue nav navbar-nav side-nav">
					<li> <a href="index.php"><i class="fa fa-fw fa-desktop"></i> Dashboard</a> </li>
					<li><a href="">Cadastros<i class="fa fa-fw fa-caret-down"></i></a></li>
					<li><a href="Cadastrar.php">Instituições de Ensino</a></li>
					<li><a href="CadastrarDisciplina.php">Disciplinas</a></li>
					<li><a href="CadastroTurma.php">Turmas</a></li>
					<li><a href="CadastrarAluno.php">Alunos</a></li>
				</ul>
			</div>
			<!-- /.navbar-collapse -->
		</nav>
		<div id="" style="min-height: 100vh; width: 100%; background-color: white;">
			<div class="container-fluid">
				<!-- Page Heading -->
				<div class="row">
					<div class="col-lg-12" id="turma">
						<h3 class="page-header" style="margin-top: 20px;" >Cadastro de Turmas </h3>
						<div class="row">
							<div class="col-md-2"></div>
							<div class="col-md-8">

								<div class="row hidden-xs ">
									<div class="col-xs-12 col-sm-6 col-md-6">
										<h3 class="panel-title"><div class="form-group">
											<button class="btn btn-success" data-toggle="modal" data-target="#incluirModal" name="incluir" onClick="incluirOnClick()" value="submit_insert"><span class="glyphicon glyphicon-plus"></span> Nova Turma</button>
										</div></h3>
									</div>
									<div class="col-xs-12 col-sm-6 col-md-6">
										<h3 class="panel-title">
											<div class="input-group pull-right">
												<input class="search pull-right" placeholder="Pesquisar" aria-describedby="basic-addon1" style="height: 30px;"/>
												<span class="input-group-addon " id="basic-addon1">
													<span class="glyphicon glyphicon-search" aria-hidden="true">
													</span>
												</span>
											</div>
										</h3>
									</div>
								</div>

								<h3 class="panel-title visible-sm visible-xs"><div class="form-group visible-xs">
									<button class="btn btn-success" data-toggle="modal" data-target="#incluirModal" name="incluir" onClick="incluirOnClick()" value="submit_insert"><span class="glyphicon glyphicon-plus"></span> Nova Turma</button>
												</div></h3>


										<h3 class="panel-title visible-sm visible-xs"> <div class="form-group visible-xs">
												<div class="input-group">
												<span class="input-group-addon" id="basic-addon1"><span class="glyphicon glyphicon-search" aria-hidden="true"></span></span>
												<input class="search" placeholder="Pesquisar" aria-describedby="basic-addon1" style="
								height: 30px;"/>
									</div>
								</div></h3>
								<div class="panel panel-primary" >
									<div class="panel-heading">
										<div class="row">
											<div class="col-xs-4 col-sm-4 col-md-4"><h3 class="panel-title">Turmas</h3></div>
											<div class="col-xs-4 col-sm-4 col-md-4"><h3 class="panel-title">Escola</h3></div>
											<div class="col-xs-4 col-sm-4 col-md-4"><h3 class="panel-title">Turno</h3></div>
										</div>
									</div>
									<div class="panel-body">
										<ul id="listTurmasEDIT" class="list list-group" style="width: auto">
											<?php
											$jsonTurmas = json_decode($jsonTurmas);
											if(empty($jsonTurmas))
											{
												echo"<li class=\"list-group-item\" >"."Você ainda não tem turmas cadastradas."."</li>";
											}
											foreach($jsonTurmas as $val)
											{
												$jsonTurmaDisciplinas =  $userLogado->getTurmaDisciplinaJSON($val->idTurma);
												$jsonTurmaDisciplinas = json_decode($jsonTurmaDisciplinas);
												$array = array();
												foreach($jsonTurmaDisciplinas as $val_dis)
												{
													if(!empty($val_dis->idDisciplina))
													array_push($array,$val_dis->idDisciplina);
													//debug_to_console($val_dis->idDisciplina);
												}
												if(empty($array)){
													//cores do span
													if($val->turno=="Matutino"){
														$spanClass = "#428bca";
													}else if($val->turno=="Intermediario"){
														$spanClass = "#5bc0de";
													}else if($val->turno=="Integral"){
														$spanClass = "#5cb85c";
													}else if($val->turno=="Noturno"){
														$spanClass = "#f0ad4e";
													}else if($val->turno=="Vespertino"){
														$spanClass = "#777";
													}
													echo"<li id=".$val->idTurma."
													turno=\"".$val->turno."\"
													nmEscola=\"".$val->nmEscola."\"
													nmTurma=\"".$val->nmTurma."\"
													tipo_frequencia=\"".$val->tipo_frequencia."\"
													class=\"list-group-item\"
													data-toggle=\"modal\" data-target=\"#editModal\"  >
													<div class=\"turmaSearch row\">
													<div class=\"col-xs-4 col-sm-4 col-md-4\">".$val->nmTurma."</div>
													<div class=\"col-xs-4 col-sm-4 col-md-4\">".$val->nmEscola."</div>
													<div class=\"col-xs-4 col-sm-4 col-md-4\">
													<span class=\"label label-paulo\" style=\" color:".$spanClass.";\" >".$val->turno."</span>&nbsp;</div>
													</div>
													</li>";
												}else{
													$disciplina = implode(",",$array);

													if($val->turno=="Matutino"){
														$spanClass = "#428bca";
													}else if($val->turno=="Intermediario"){
														$spanClass = "#5bc0de";
													}else if($val->turno=="Integral"){
														$spanClass = "#5cb85c";
													}else if($val->turno=="Noturno"){
														$spanClass = "#f0ad4e";
													}else if($val->turno=="Vespertino"){
														$spanClass = "#777";
													}

													echo"<li id=".$val->idTurma."
													disciplina=\"".$disciplina."\"
													turno=\"".$val->turno."\"
													nmEscola=\"".$val->nmEscola."\"
													nmTurma=\"".$val->nmTurma."\"
													tipo_frequencia=\"".$val->tipo_frequencia."\"
													class=\"list-group-item\"
													data-toggle=\"modal\" data-target=\"#editModal\"  >
													<div class=\"turmaSearch row\">
													<div class=\"col-xs-4 col-sm-4 col-md-4\">".$val->nmTurma."</div>
													<div class=\"col-xs-4 col-sm-4 col-md-4\">".$val->nmEscola."</div>
													<div class=\"col-xs-4 col-sm-4 col-md-4\">
													<span class=\"label label-paulo\" style=\" color:".$spanClass.";\" >".$val->turno."</span>&nbsp;</div>
													</div>
													</li>";
												}
											}
											?>
										</ul>
									</div>
								</div>
							</div>
							<div class="col-md-2"></div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>


	<!-- Modal DISCIPLINA---------------------------------------------------------------------------------->
	<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
		<div class="modal-dialog">
			<div class="modal-content">
				<!--MODAL HEADER-->
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
					<h4 class="modal-title" id="myModalLabel">Incluir Disciplinas: </h4>
				</div>
				<!--FIM MODAL HEADER-->
				<!--MODAL BODY-->
				<div class="modal-body">
					<form id="listDisciplinas" class="form-horizontal" role="form" draggable="true"
					action="CadastroTurma.php" method="post">
					<div class="thumbnail scrollable-menu" role="menu" style="background-color: #E4F0EA;">
						<?php
						$jsonDisciplinas = $userLogado->getDisciplinaJSON($userLogado->getId());
						$jsonDisciplinas = json_decode($jsonDisciplinas);
						if(empty($jsonDisciplinas))
						{
							echo"
							<li class=\"form-group\" style=\"margin-left: 30px;\">
							<input type=\"checkbox\" name=\"my-checkbox\" data-size=\"mini\" data-on-text=\"Sim\"
							data-off-text=\"Não\"  data-animate=\"true\" disabled=\"true\"  unchecked>
							Você ainda não tem disciplinas cadastradas.
							</li>";
						}
						foreach($jsonDisciplinas as $val)
						{
							echo"<li
							id=\"".$val->idDisciplina."\"
							class=\"list-group-item\"
							style=\"margin-left: 30px;  margin-right: 30px;\" >
							<input id=\"my-checkbox\"
							type=\"checkbox\"
							name=".$val->idDisciplina."
							data-size=\"mini\"
							data-on-text=\"Sim\"
							data-off-text=\"Não\"
							data-animate=\"true\"
							unchecked>
							&nbsp;".$val->nome."
							</li>";
						}
						?>
					</div>
					<div class="modal-footer">
						<button type="button" class="btn btn-default" data-dismiss="modal">Fechar</button>
						<button type="submit" onclick="teste()"  name="preCarregandoDisciplinas" value="Submit" class="btn btn-primary">Salvar</button>
					</div>
				</form>
			</div>
			<!--FIM MODALBODY-->
		</div>
		<!--FIM MODALCONTENT -->
	</div>
	<!--FIM MODALDIALOG-->
</div>
<!--FIM MODALFADE-->
<!--MODAL INCLUIR-->
<div class="modal fade" id="incluirModal">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				<h4 class="modal-title">Incluir Nova Turma...</h4>
			</div>
			<div class="modal-body">
				<div class="thumbnail" style=" background-color: ghostwhite;">
					<form role="form" action="CadastroTurma.php" method="get">

						<div class="form-group" draggable="true" style="margin-bottom: 2px;" >
							<label class="control-label" for="text"  style="
							margin-bottom: 10px;
							">Instituição Pertencente  <br>
						</label>
					</div>
					<div class="input-group"style="margin-bottom: 10px;">
						<div class="input-group-btn">
							<button type="button" class="btn btn-primary dropdown-toggle"  data-toggle="dropdown" aria-expanded="false" name="inputEscolaEscolha"  value="">Instituições<span class="caret"></span></button>
							<ul id="listEscolas" class="dropdown-menu" role="menu">
								<?php
								$jsonEscolas = json_decode($jsonEscolas);
								if(empty($jsonEscolas))
								{
									echo"<li class=\"list-group-item\">"."Você ainda não tem instituições cadastradas."."</li>";
								}
								foreach($jsonEscolas as $val)
								{
									echo"<li class=\"list-group-item\">".$val->nome."</li>";
								}
								?>
							</ul>
						</div><!-- /btn-group -->
						<input type="text" placeholder="Selecione as opções ao lado" class="form-control" name="inputEscola" id="inputEscola" value="<?=$varEscola;?>">

					</button>
				</div><!-- /input-group -->

				<form role="form">
					<div class="form-group" draggable="true" style="margin-bottom: 2px;">
						<label class="control-label" for="text">Turno <br>
						</label>
					</div>
					<div class="input-group"style="margin-bottom: 10px;">
						<div class="input-group-btn">
							<button type="button" class="btn btn-primary dropdown-toggle"  data-toggle="dropdown" aria-expanded="false" >&nbsp;&nbsp;&nbsp;&nbsp;Turno&nbsp;&nbsp;&nbsp;&nbsp;<span class="caret"></span></button>
							<ul id="listTurnos" class="dropdown-menu" role="menu">
								<li class="list-group-item">Matutino</li>
								<li class="list-group-item">Intermediario</li>
								<li class="list-group-item">Vespertino</li>
								<li class="list-group-item">Noturno</li>
								<li class="list-group-item">Integral</li>
							</ul>
						</div><!-- /btn-group -->
						<input type="text"  placeholder="Selecione as opções ao lado" class="form-control" name="inputTurno" id="inputTurno" value="<?=$varTurno;?>" >

					</button>
				</div><!-- /input-group -->
				<div class="form-group">
					<label class="control-label" for="exampleInputPassword1" style="
					margin-bottom: 10px;
					">Nome da Turma <br>
				</label>
				<input class="form-control" id="exampleInputPassword1" placeholder="Entre com o nome da turma"
				type="text" name="inputNome" value="<?=$varNome;?>">
			</div>


			<div class="form-group" style="margin-left:1px">
				<label class="control-label">Lançamento de Frequencia por:</label>

			</div>

			<div class="form-group" style="margin-left:3px">
				<input type="checkbox" name="checkLancamento" checked>
				<span data-toggle="tooltip" data-original-title="Use o Lançamento por Turma, para lançar frequencias diarias sem divisão por disciplinas." class="glyphicon glyphicon-question-sign" aria-hidden="true"></span>

			</div>


			<div class="form-group">


				<div class="form-group " draggable="true" style="margin-bottom: 2px;">
					<label class="control-label" for="text">Incluir Disciplinas <br>
					</label>
				</div>
				<div class="thumbnail scrollable-menu" role="menu" style="background-color: #E4F0EA;">
					<?php
					$jsonDisciplinas = $userLogado->getDisciplinaJSON($userLogado->getId());
					$jsonDisciplinas = json_decode($jsonDisciplinas);
					if(empty($jsonDisciplinas))
					{
						echo"
						<li class=\"form-group\" style=\"margin-left: 30px;\">
						<input type=\"checkbox\" name=\"my-checkbox\" data-size=\"mini\" data-on-text=\"Sim\"
						data-off-text=\"Não\"  data-animate=\"true\" disabled=\"true\"  unchecked>
						Você ainda não tem disciplinas cadastradas.
						</li>";
					}
					foreach($jsonDisciplinas as $val)
					{
						echo"<li
						id=\"".$val->idDisciplina."\"
						class=\"list-group-item\"
						style=\"margin-left: 30px;  margin-right: 30px;\" >
						<input id=\"my-checkbox\"
						type=\"checkbox\"
						name=".$val->idDisciplina."
						data-size=\"mini\"
						data-on-text=\"Sim\"
						data-off-text=\"Não\"
						data-animate=\"true\"
						unchecked>
						&nbsp;".$val->nome."
						</li>";
					}
					?>
				</div>
				<!--<button type="button" onclick="teste()" class="btn btn-julio" name="formSubmit" value="submit_insert" draggable="true" data-toggle="modal" data-target="#myModal" style="margin-bottom:10px" >Cadastrar</button>-->
			</div>
		</div>

	</div>
	<div class="modal-footer">
		<button type="button" class="btn btn-default" data-dismiss="modal">Fechar</button>
		<button type="submit" onclick="cadastrarOnClick()" class="btn btn-julio" name="formSubmit" value="submit_insert" draggable="true" >Cadastrar</button>
	</div>
</form>
</div><!-- /.modal-content -->
</div><!-- /.modal-dialog -->
</div><!-- /.modal -->



<!-- Modal de Edição ---------------------------------------------------------------------------------->
<div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
aria-hidden="true">
<div class="modal-dialog">
	<div class="modal-content">
		<div class="modal-header">
			<button type="button" class="close" data-dismiss="modal">
				<span aria-hidden="true">×</span>
				<span class="sr-only">Close</span>
			</button>
			<h4 class="modal-title" id="myModalLabel" draggable="true">Modo de Edição</h4>
		</div>
		<div class="modal-body">
			<form class="form-horizontal" role="form" draggable="true"
			action="CadastroTurma.php" method="get">
			<div class="form-group">
				<div class="col-sm-2">
					<label for="inputIdEdit" class="control-label">Código:</label>
				</div>
				<div class="col-sm-10">
					<input type="text"
					class="form-control"
					id="inputIdEdit"
					name="inputIdEdit"
					value="<?=$varIdEdit;?>"
					/>
				</div>
			</div>
			<div class="form-group">
				<div class="col-sm-2">
					<label for="inputNomeEdit" class="control-label">Nome:</label>
				</div>
				<div class="col-sm-10">
					<input type="text"
					class="form-control"
					id="inputNomeEdit"
					name="inputNomeEdit"
					value="<?=$varNomeEdit;?>"
					/>
				</div>
			</div>
			<div class="input-group"style="margin-bottom: 10px;">
				<div class="input-group-btn">
					<button type="button" class="btn btn-primary dropdown-toggle"  data-toggle="dropdown" aria-expanded="false" >Instituições<span class="caret"></span></button>
					<ul id="listEscolasEDIT" class="dropdown-menu" role="menu">
						<?php
						$jsonEscolas = $userLogado->getEscolasJSON($userLogado->getId());
						$jsonEscolas = json_decode($jsonEscolas);
						if(empty($jsonEscolas))
						{
							echo"<li class=\"list-group-item\">"."Você ainda não tem instituições cadastradas."."</li>";
						}
						foreach($jsonEscolas as $val)
						{
							echo"<li class=\"list-group-item\">".$val->nome."</li>";
						}
						?>
					</ul>
				</div><!-- /btn-group -->
				<input type="text"  placeholder="Selecione as opções ao lado" class="form-control" name="inputEscolasEdit" id="inputEscolasEdit" value="<?=$varEscolasEdit;?>" >
			</div><!-- /input-group -->
			<div class="input-group" style="margin-bottom: 10px;">
				<div class="input-group-btn">
					<button type="button" class="btn btn-primary dropdown-toggle"  data-toggle="dropdown" aria-expanded="false" >&nbsp;&nbsp;&nbsp;&nbsp;Turno&nbsp;&nbsp;&nbsp;&nbsp;<span class="caret"></span></button>
					<ul id="listTurnosEDIT" class="dropdown-menu" role="menu">
						<li class="list-group-item">Matutino</li>
						<li class="list-group-item">Intermediario</li>
						<li class="list-group-item">Vespertino</li>
						<li class="list-group-item">Noturno</li>
						<li class="list-group-item">Integral</li>
					</ul>
				</div><!-- /btn-group -->
				<input type="text"  placeholder="Selecione as opções ao lado" class="form-control" name="inputTurnoEdit" id="inputTurnoEdit" value="<?=$varTurnoEdit;?>" >
			</div><!-- /input-group -->


			<div class="form-group" style="margin-left:1px">
				<label class="control-label">Lançamento de Frequencia por:</label>

			</div>

			<div class="form-group" style="margin-left:3px">
				<input  type="checkbox" name="checkLancamentoEdicao" checked>
				<span data-toggle="tooltip" data-original-title="Use o Lançamento por Turma, para lançar frequencias diarias sem divisão por disciplinas." class="glyphicon glyphicon-question-sign" aria-hidden="true"></span>

			</div>



			<div class="form-group" style="margin-left:1px">
				<label class="control-label">Lista de Disciplinas:</label>
			</div>
			<!--Lista de Disciplinas-->
			<div id="listTurmaDisciplina" class="thumbnail scrollable-menu" role="menu" style="background-color: #E4F0EA;">
				<?php
				$jsonDisciplinas = $userLogado->getDisciplinaJSON($userLogado->getId());
				$jsonDisciplinas = json_decode($jsonDisciplinas);
				if(empty($jsonDisciplinas))
				{
					echo"
					<li class=\"form-group\" style=\"margin-left: 30px;\">
					<input type=\"checkbox\" name=\"my-checkbox\" data-size=\"mini\" data-on-text=\"Sim\"
					data-off-text=\"Não\"  data-animate=\"true\" disabled=\"true\"  unchecked>
					Você ainda não tem disciplinas cadastradas.
					</li>";
				}
				foreach($jsonDisciplinas as $val)
				{
					echo"<li
					id=\"".$val->idDisciplina."\"
					class=\"list-group-item \"
					style=\"margin-left: 30px;  margin-right: 30px;\" >
					<input id=\"my-checkbox\"
					type=\"checkbox\"
					name="."Dis".$val->idDisciplina."
					data-size=\"mini\"
					data-on-text=\"Sim\"
					data-off-text=\"Não\"
					data-animate=\"true\"
					unchecked>
					&nbsp;".$val->nome."
					</li>";


				}
				?>
			</div>

			<div class="modal-footer">
				<button type="submit" class="btn btn-danger" name="formEditSubmitDelete" value="Submit" onclick="editarOnClick()">Deletar</button>
				<button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
				<button type="submit" class="btn btn-julio" name="formEditSubmit" value="Submit" onclick="editarOnClick()" >Atualizar</button>
			</div>
		</form>
	</div>
</div>
</div>
<!--END TESTE -->
</body>
</html>
<?php
echo file_get_contents(dirname(__FILE__)."/Scripts/CadastrarTurmaScript.php", true);
?>
